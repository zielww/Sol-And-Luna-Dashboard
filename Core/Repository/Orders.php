<?php

namespace Core\Repository;

use Core\App;
use Core\Database;
use Core\Session;

class Orders
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function update(array $attributes) : void
    {
        $this->db->query("update orders set status = :status where order_id = :order_id", ['status' => $attributes['status'], 'order_id' => $attributes['order_id']]);
        Session::flash('success', 'Status updated successfully');
    }
}