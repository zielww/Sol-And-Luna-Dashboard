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

        if ($attributes['status'] == 'delivered') {
            $this->db->query("update orders set payment_status = :payment_status, delivered_on = :delivered_on where order_id = :order_id", [':payment_status' => 'paid',':delivered_on' => date('Y-m-d H:i:s'), 'order_id' => $attributes['order_id']]);
        }

        if ($attributes['tracking_number']) {
            $this->db->query("update orders set tracking_number = :tracking_number where order_id = :order_id", ['tracking_number' => $attributes['tracking_number'], 'order_id' => $attributes['order_id']]);
        }
        Session::flash('success', 'Order updated successfully');
    }

    public function delete($attributes): void
    {
        $items = $this->db->query("select * from order_items where order_id = :order_id", [':order_id' => $attributes['order_id']])->get();

        $sizes = [
            'S' => 'small_quantity',
            'M' => 'medium_quantity',
            'L' => 'large_quantity',
            'XL' => 'xl_quantity',
            'XXL' => 'xxl_quantity'
        ];

        foreach ($items as $item) {
            $this->db->query("update products set {$sizes[$item['size']]} = {$sizes[$item['size']]} + :quantity, quantity_sold = quantity_sold - :quantity where product_id = :product_id", [
                ':quantity' => $item['quantity'],
                ':product_id' => $item['product_id']
            ]);
        }

        $this->db->query("delete from orders where order_id = :order_id", [':order_id' => $attributes['order_id']]);
        Session::flash('success', 'Order deleted succesfully');
    }
}