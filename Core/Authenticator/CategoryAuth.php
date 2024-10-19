<?php

namespace Core\Authenticator;

use Core\App;
use Core\Database;

class CategoryAuth
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function attempt(string $name): bool
    {
        return (bool) $this->db->query("select * from categories where name = :name", ['name' => strtolower($name)])->find();
    }

    public function edit_attempt(string $name, string | int $id) : bool
    {
        $similar_category = (bool) $this->db->query('select * from categories where category_id = :id and name = :name', ['id' => $id, 'name' => $name])
            ->find();

        if ($similar_category) {
            return false;
        }

        return $this->attempt($name);
    }
}