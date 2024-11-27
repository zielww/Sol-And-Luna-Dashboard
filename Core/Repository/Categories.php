<?php

namespace Core\Repository;

use Core\App;
use Core\Database;
use Core\Session;

class Categories
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function store(array $attributes): void
    {
        $this->db->query("INSERT INTO categories (name, parent_category_id, visibility, description) VALUES (:name, :parent_category_id, :visibility, :description)", [
            'name' => $attributes['name'],
            'parent_category_id' => $attributes['parent_category'],
            'visibility' => $attributes['visibility'] === 'true' ? 1 : 0,
            'description' => $attributes['description'],
        ]);

        Session::flash('success', 'Category added successfully!');
    }

    public function update(array $attributes): void
    {
        $this->db->query("UPDATE categories SET name = :name, visibility = :visibility, description = :description WHERE category_id = :category_id", [
            'name' => $attributes['name'],
            'visibility' => $attributes['visibility'] === 'true' ? 1 : 0,
            'description' => $attributes['description'],
            'category_id' => $attributes['id'],
        ]);

        Session::flash('success', 'Category updated successfully!');
    }

    public function delete(int $id): void
    {
        $this->db->query("DELETE FROM categories WHERE category_id = :id", ['id' => $id]);
        Session::flash('success', 'Category deleted successfully!');
    }
}