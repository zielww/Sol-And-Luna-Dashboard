<?php

namespace Core\Repository;

use Core\App;
use Core\Database;
use Core\Session;

class Products
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function store(array $attributes): void
    {
        $category = $this->get_category($attributes['category']);
        $product_id = $this->insert_product($attributes, $category['category_id']);
        $this->upload_images($product_id, true);

        Session::flash('success', 'Product added successfully!');
    }

    public function update(array $attributes): void
    {
        $category = $this->get_category($attributes['category']);
        $this->update_product($attributes, $category['category_id']);

        if (!empty($_FILES['images']['name'][0])) {
            $this->upload_images($attributes['product_id'], false);
        }

        Session::flash('success', 'Product updated successfully!');
    }

    public function delete(int $id): void
    {
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

    private function get_category(string $categoryName): array
    {
        return $this->db->query("SELECT * FROM categories WHERE name = :category", ['category' => $categoryName])->find();
    }

    private function insert_product(array $attributes, int $category_id): int
    {
        $this->db->query("INSERT INTO products (name, description, visibility, price, stock_quantity, category_id) 
            VALUES (:name, :description, :visibility, :price, :stock_quantity, :category_id)", [
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'visibility' => $attributes['visibility'] === 'true' ? 1 : 0,
            'price' => floatval($attributes['price']),
            'stock_quantity' => (int)$attributes['quantity'],
            'category_id' => $category_id,
        ]);

        $product = $this->db->query("SELECT * FROM products ORDER BY product_id DESC LIMIT 1")->find();
        return $product['product_id'];
    }

    private function update_product(array $attributes, int $category_id): void
    {
        $this->db->query("UPDATE products SET name = :name, description = :description, visibility = :visibility, 
            price = :price, stock_quantity = :stock_quantity, category_id = :category_id WHERE product_id = :product_id", [
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'visibility' => $attributes['visibility'] === 'true' ? 1 : 0,
            'price' => floatval($attributes['price']),
            'stock_quantity' => (int)$attributes['quantity'],
            'category_id' => $category_id,
            'product_id' => $attributes['product_id'],
        ]);
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

            $target_path = $this->move_uploaded_file($upload_directory, $image_tmp_names[$index], $image_name);
            $this->save_image_to_database($product_id, $image_name, $target_path, $index === 0);
        }
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

    private function save_image_to_database(int $product_id, string $image_name, string $image_path, bool $is_primary): void
    {
        $this->db->query("INSERT INTO product_images (product_id, name, image_url, is_primary) 
            VALUES (:product_id, :name, :image_url, :is_primary)", [
            'product_id' => $product_id,
            'name' => $image_name,
            'image_url' => $image_path,
            'is_primary' => $is_primary ? 1 : 0,
        ]);
    }
}