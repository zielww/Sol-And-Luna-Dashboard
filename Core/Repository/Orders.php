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

    public function update(array $attributes): void
    {
        $this->db->query("update orders set status = :status where order_id = :order_id", ['status' => $attributes['status'], 'order_id' => $attributes['order_id']]);

        if ($attributes['tracking_number']) {
            $this->db->query("update orders set tracking_number = :tracking_number where order_id = :order_id", ['tracking_number' => $attributes['tracking_number'], 'order_id' => $attributes['order_id']]);
        }
        Session::flash('success', 'Order updated successfully');
    }

    public function delete($attributes): void
    {
        $this->db->query("delete from orders where order_id = :order_id", [':order_id' => $attributes['order_id']]);
        Session::flash('success', 'Order deleted succesfully');
    }
}