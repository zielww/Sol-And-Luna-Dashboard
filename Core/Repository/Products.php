<?php

namespace Core\Repository;

use Core\App;
use Core\Database;

class Products
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function store($attributes)
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
    }


    public function update()
    {

    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM products WHERE product_id = :id", ['id' => $id]);
    }
}