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
        $category = $this->getCategory($attributes['category']);
        $productId = $this->insertProduct($attributes, $category['category_id']);
        $this->uploadImages($productId, true);

        Session::flash('success', 'Product added successfully!');
    }

    public function update(array $attributes): void
    {
        $category = $this->getCategory($attributes['category']);
        $this->updateProduct($attributes, $category['category_id']);

        if (!empty($_FILES['images']['name'][0])) {
            $this->uploadImages($attributes['product_id'], false);
        }

        Session::flash('success', 'Product updated successfully!');
    }

    public function delete(int $id): void
    {
        $this->db->query("DELETE FROM products WHERE product_id = :id", ['id' => $id]);
        Session::flash('success', 'Product deleted successfully!');
    }

    public function getProductImages(int $productId, bool $primaryOnly = true): array
    {
        $query = "SELECT image_id, name, image_url FROM product_images WHERE product_id = :product_id";
        if ($primaryOnly) {
            $query .= " AND is_primary = 1";
        }

        return $this->db->query($query, ['product_id' => $productId])->get();
    }

    private function getCategory(string $categoryName): array
    {
        return $this->db->query("SELECT * FROM categories WHERE name = :category", ['category' => $categoryName])->find();
    }

    private function insertProduct(array $attributes, int $categoryId): int
    {
        $this->db->query("INSERT INTO products (name, description, visibility, price, stock_quantity, category_id) 
            VALUES (:name, :description, :visibility, :price, :stock_quantity, :category_id)", [
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'visibility' => $attributes['visibility'] === 'true' ? 1 : 0,
            'price' => floatval($attributes['price']),
            'stock_quantity' => (int)$attributes['quantity'],
            'category_id' => $categoryId,
        ]);

        $product = $this->db->query("SELECT * FROM products ORDER BY product_id DESC LIMIT 1")->find();
        return $product['product_id'];
    }

    private function updateProduct(array $attributes, int $categoryId): void
    {
        $this->db->query("UPDATE products SET name = :name, description = :description, visibility = :visibility, 
            price = :price, stock_quantity = :stock_quantity, category_id = :category_id WHERE product_id = :product_id", [
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'visibility' => $attributes['visibility'] === 'true' ? 1 : 0,
            'price' => floatval($attributes['price']),
            'stock_quantity' => (int)$attributes['quantity'],
            'category_id' => $categoryId,
            'product_id' => $attributes['product_id'],
        ]);
    }

    private function getUploadDirectory(): string
    {
        $uploadDirectory = base_path('public/uploads/');
        if (!is_dir($uploadDirectory) && !mkdir($uploadDirectory, 0755, true)) {
            throw new \RuntimeException('Failed to create upload directory');
        }
        return $uploadDirectory;
    }

    private function moveUploadedFile(string $uploadDirectory, string $tmpName, string $imageName): string
    {
        $targetPath = $uploadDirectory . basename($imageName);
        if (!move_uploaded_file($tmpName, $targetPath)) {
            throw new \RuntimeException("Failed to move uploaded file: $imageName");
        }
        return $targetPath;
    }

    private function uploadImages(int $productId, bool $isNewProduct): void
    {
        $uploadDirectory = $this->getUploadDirectory();
        $imageNames = $_FILES['images']['name'];
        $imageTmpNames = $_FILES['images']['tmp_name'];
        $imageErrors = $_FILES['images']['error'];

        // If updating, remove old images first
        if (!$isNewProduct) {
            $this->removeOldImages($productId);
        }

        foreach ($imageNames as $index => $imageName) {
            if ($imageErrors[$index] !== UPLOAD_ERR_OK) {
                throw new \RuntimeException("Error with file upload: $imageName");
            }

            $targetPath = $this->moveUploadedFile($uploadDirectory, $imageTmpNames[$index], $imageName);
            $this->saveImageToDatabase($productId, $imageName, $targetPath, $index === 0);
        }
    }

    private function removeOldImages(int $productId): void
    {
        $oldImages = $this->getProductImages($productId, false);
        foreach ($oldImages as $image) {
            if (file_exists($image['image_url'])) {
                unlink($image['image_url']);
            }
        }
        $this->db->query("DELETE FROM product_images WHERE product_id = :product_id", ['product_id' => $productId]);
    }

    private function saveImageToDatabase(int $productId, string $imageName, string $imagePath, bool $isPrimary): void
    {
        $this->db->query("INSERT INTO product_images (product_id, name, image_url, is_primary) 
            VALUES (:product_id, :name, :image_url, :is_primary)", [
            'product_id' => $productId,
            'name' => $imageName,
            'image_url' => $imagePath,
            'is_primary' => $isPrimary ? 1 : 0,
        ]);
    }
}