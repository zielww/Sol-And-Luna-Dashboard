<?php

namespace Core\Repository;

use Core\App;
use Core\Database;
use Core\Session;

class Customers
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function store(array $attributes): void
    {
        $customer_id = $this->insert_customer($attributes);
        $this->upload_image($customer_id);

        Session::flash('success', 'Customer added successfully!');
    }

    private function insert_customer(array $attributes): int
    {
        $this->db->query("INSERT INTO users (email, first_name, last_name, password_hash, phone, country, user_type) 
            VALUES (:email, :first_name, :last_name, :password, :phone, :country, :user_type)", [
            'email' => $attributes['email'],
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'password' => password_hash($attributes['password'], PASSWORD_DEFAULT),
            'phone' => $attributes['phone'],
            'country' => $attributes['country'],
            'user_type' => 'customer',
        ]);

        $customer = $this->db->query("SELECT * FROM users ORDER BY user_id DESC LIMIT 1")->find();
        return $customer['user_id'];
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

    private function upload_image(int $customer_id): void
    {
        $upload_directory = $this->get_upload_directory();
        $target_path = $this->move_uploaded_file($upload_directory, $_FILES['image']['tmp_name'], $_FILES['image']['name']);
        $this->save_image_to_database($customer_id, $_FILES['image']['name'], $target_path);
    }

    private function save_image_to_database(int $user_id, string $image_name, string $image_path): void
    {
        $this->db->query("INSERT INTO user_images (user_id, image_url, name) 
            VALUES (:user_id, :image_url, :name)", [
            'user_id' => $user_id,
            'name' => $image_name,
            'image_url' => $image_path,
        ]);
    }

    public function get_customer_image(int $customer_id): array
    {
        $query = "SELECT * FROM user_images WHERE customer_id = :customer_id";

        return $this->db->query($query, ['customer_id' => $customer_id])->get();
    }
}