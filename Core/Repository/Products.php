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

    public function store(array $attributes) : void
    {
        // Get the category
        $category = $this->db->query("SELECT * FROM categories WHERE name = :category", ['category' => $attributes['category']])->find();

        // Insert the product
        $this->db->query("INSERT INTO products (name, description, visibility, price, stock_quantity, category_id) VALUES (:name, :description, :visibility, :price, :stock_quantity, :category_id)", [
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'visibility' => $attributes['visibility'] == 'true' ? 1 : 0,
            'price' => floatval($attributes['price']),
            'stock_quantity' => (int) $attributes['quantity'],
            'category_id' => $category['category_id'],
        ]);

        // Fetch the last inserted product ID
        $product = $this->db->query("SELECT * FROM products ORDER BY product_id DESC LIMIT 1")->find();
        $productId = $product['product_id'];
        $query = "INSERT INTO product_images (product_id, name, image_url, is_primary) VALUES (:product_id, :name, :image_url, :is_primary)";

        $this->upload_image($productId, $query);

        Session::flash('success', 'Product added successfully!');
    }

    public function upload_image($productId, $query)
    {
        // Upload The images
        $uploadDirectory = base_path('public/uploads/');
        $imageNames = $_FILES['images']['name'];
        $imageTmpNames = $_FILES['images']['tmp_name'];
        $imageErrors = $_FILES['images']['error'];
        $primary = true;

        foreach ($imageNames as $index => $imageName) {
            $targetPath = $uploadDirectory . basename($imageName);

            if ($imageErrors[$index] === UPLOAD_ERR_OK) {
                if (move_uploaded_file($imageTmpNames[$index], $targetPath)) {
                    // Insert image details into product_images table
                    $this->db->query($query, [
                        'product_id' => $productId,
                        'name' => $imageName,
                        'image_url' => $targetPath,
                        'is_primary' => $primary ? 1 : 0,
                    ]);

                    $primary = false;
                } else {
                    echo "Error uploading file: " . $imageName;
                }
            } else {
                echo "Error with file upload: " . $imageName;
            }
        }
    }

    public function getProductImages(int $productId, $primary = 'AND is_primary = 1')
    {
        // Query to fetch primary image for the given product ID
        $images = $this->db->query("
        SELECT image_id, name, image_url 
        FROM product_images 
        WHERE product_id = :product_id $primary", [
            'product_id' => $productId
        ])->get();

        return $images;
    }

    public function update(array $attributes) : void
    {
        // Get the category
        $category = $this->db->query("SELECT * FROM categories WHERE name = :category", ['category' => $attributes['category']])->find();

        // Update the product
        $this->db->query("UPDATE products SET name = :name, description = :description, visibility = :visibility, price = :price, stock_quantity = :stock_quantity, category_id = :category_id WHERE product_id = :product_id" , [
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'visibility' => $attributes['visibility'] == 'true' ? 1 : 0,
            'price' => floatval($attributes['price']),
            'stock_quantity' => (int) $attributes['quantity'],
            'category_id' => $category['category_id'],
            'product_id' => $attributes['product_id'],
        ]);

        // Fetch the last inserted product ID
        $productId = $attributes['product_id'];
        $query = "UPDATE product_images SET product_id = :product_id, name = :name, image_url = :image_url, is_primary = :is_primary WHERE product_id = :product_id";

        //Upload The image
        $this->upload_image($productId, $query);

        Session::flash('success', 'Product updated successfully!');
    }

    public function delete(int $id) : void
    {
        $this->db->query("DELETE FROM products WHERE product_id = :id", ['id' => $id]);

        Session::flash('success', 'Product deleted successfully!');
    }
}