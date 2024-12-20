<?php

namespace Core\Repository;

use Core\App;
use Core\Database;
use Core\Session;
use CURLFile;

class Products
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function store(array $attributes): void
    {
        $categories = $this->get_categories($attributes['category']);
        $product_id = $this->insert_product($attributes, $categories);
        $this->upload_images($product_id, true);

        Session::flash('success', 'Product added successfully!');
    }

    public function update(array $attributes): void
    {
        $categories = $this->get_categories($attributes['category']);
        $this->update_product($attributes, $categories);

        if (!empty($_FILES['images']['name'][0])) {
            $this->upload_images($attributes['product_id'], false);
        }

        Session::flash('success', 'Product updated successfully!');
    }

    public function delete(int $id): void
    {
        $this->remove_old_images($id);
        $this->db->query("DELETE FROM products WHERE product_id = :id", ['id' => $id]);
        Session::flash('success', 'Product deleted successfully!');
    }

    public function get_product_images(int $product_id, bool $primaryOnly = true): array
    {
        $query = "SELECT image_id, name, image_url FROM product_images WHERE product_id = :product_id";
        if ($primaryOnly) {
            $query .= " AND is_primary = 1";
        }

        return $this->db->query($query, ['product_id' => $product_id])->get();
    }

    private function get_categories(array $categories): array
    {
        $category_names = [];
        foreach ($categories as $category) {
            array_push($category_names, $this->db->query("SELECT * FROM categories WHERE name = :category", ['category' => $category])->find());
        }
        return $category_names;
    }

    private function insert_product(array $attributes, array $categories): int
    {
        $this->db->query("INSERT INTO products (name, description, visibility, price, small_quantity, medium_quantity, large_quantity, xl_quantity, xxl_quantity) 
            VALUES (:name, :description, :visibility, :price, :small_quantity, :medium_quantity, :large_quantity, :xl_quantity, :xxl_quantity)", [
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'visibility' => $attributes['visibility'] === 'true' ? 1 : 0,
            'price' => floatval($attributes['price']),
            'small_quantity' => (int)$attributes['small_quantity'],
            'medium_quantity' => (int)$attributes['medium_quantity'],
            'large_quantity' => (int)$attributes['large_quantity'],
            'xl_quantity' => (int)$attributes['xl_quantity'],
            'xxl_quantity' => (int)$attributes['xxl_quantity'],
        ]);

        $product = $this->db->query("SELECT * FROM products ORDER BY product_id DESC LIMIT 1")->find();

        foreach ($categories as $category) {
            $this->db->query("INSERT INTO product_categories (product_id, category_id) VALUES (:product_id, :category_id)", [
                'product_id' => $product['product_id'],
                'category_id' => intval($category['category_id']),
            ]);
        }

        return $product['product_id'];
    }

    private function update_product(array $attributes, array $categories): void
    {
        $this->db->query("UPDATE products SET name = :name, description = :description, visibility = :visibility,
            price = :price, small_quantity = :small_quantity, medium_quantity = :medium_quantity, large_quantity = :large_quantity, xl_quantity = :xl_quantity, xxl_quantity = :xxl_quantity WHERE product_id = :product_id", [
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'visibility' => $attributes['visibility'] === 'true' ? 1 : 0,
            'price' => floatval($attributes['price']),
            'small_quantity' => (int)$attributes['small_quantity'],
            'medium_quantity' => (int)$attributes['medium_quantity'],
            'large_quantity' => (int)$attributes['large_quantity'],
            'xl_quantity' => (int)$attributes['xl_quantity'],
            'xxl_quantity' => (int)$attributes['xxl_quantity'],
            'product_id' => $attributes['product_id'],
        ]);

        $this->db->query("DELETE FROM product_categories WHERE product_id = :product_id", ['product_id' => $attributes['product_id']]);

        foreach ($categories as $category) {
            $this->db->query("INSERT INTO product_categories (product_id, category_id) VALUES (:product_id, :category_id)", [
                'product_id' => $attributes['product_id'],
                'category_id' => intval($category['category_id']),
            ]);
        }
    }

    private function get_upload_directory(): string
    {
        $upload_directory = base_path('public/uploads/');
        if (!is_dir($upload_directory) && !mkdir($upload_directory, 0755, true)) {
            throw new \RuntimeException('Failed to create upload directory');
        }
        return $upload_directory;
    }

    private function move_uploaded_file(string $upload_directory, string $tmpName, string $image_name): string
    {
        $target_path = $upload_directory . basename($image_name);
        if (!move_uploaded_file($tmpName, $target_path)) {
            throw new \RuntimeException("Failed to move uploaded file: $image_name");
        }
        return $target_path;
    }

    private function upload_images(int $product_id, bool $is_new_product): void
    {
        $upload_directory = $this->get_upload_directory();
        $image_names = $_FILES['images']['name'];
        $image_tmp_names = $_FILES['images']['tmp_name'];
        $image_errors = $_FILES['images']['error'];

        // If updating, remove old images first
        if (!$is_new_product) {
            $this->remove_old_images($product_id);
        }

        foreach ($image_names as $index => $image_name) {
            if ($image_errors[$index] !== UPLOAD_ERR_OK) {
                throw new \RuntimeException("Error with file upload: $image_name");
            }

            $image_id = generateUniqueId();
            $image_name = $image_id . $image_name;
            $target_path = $this->move_uploaded_file($upload_directory, $image_tmp_names[$index], $image_name);
            $cloud_path = $this->upload_to_cloud($image_name);
            $this->save_image_to_database($product_id, $image_name, $target_path, $cloud_path, $index === 0);
        }
    }

    private function upload_to_cloud($image_name): string
    {
        $api_key = $_ENV['IMGBB_API_KEY'];
        $url = 'https://api.imgbb.com/1/upload';
        $file_path = base_path('/public/uploads/') . $image_name;

        $ch = curl_init();

        $file_data = [
            'key' => $api_key,
            'image' => base64_encode(file_get_contents($file_path))
        ];

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $file_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        $response_data = json_decode($response, true);

        return $response_data['data']['url'];
    }

    private function remove_old_images(int $product_id): void
    {
        $oldImages = $this->get_product_images($product_id, false);
        foreach ($oldImages as $image) {
            if (file_exists($image['image_url'])) {
                unlink($image['image_url']);
            }
        }
        $this->db->query("DELETE FROM product_images WHERE product_id = :product_id", ['product_id' => $product_id]);
    }

    private function save_image_to_database(int $product_id, string $image_name, string $image_path, string $cloud_url, bool $is_primary): void
    {
        $this->db->query("INSERT INTO product_images (product_id, name, image_url, cloud_url, is_primary) 
            VALUES (:product_id, :name, :image_url, :cloud_url, :is_primary)", [
            'product_id' => $product_id,
            'name' => $image_name,
            'image_url' => $image_path,
            'cloud_url' => $cloud_url,
            'is_primary' => $is_primary ? 1 : 0,
        ]);
    }
}