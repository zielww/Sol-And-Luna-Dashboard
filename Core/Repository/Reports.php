<?php

namespace Core\Repository;

use Core\App;
use Core\Database;
use Core\Session;

class Reports
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function total_sales(): float
    {
        $total_sales = $this->db->query("
            SELECT SUM(total_amount) AS total_paid_amount
            FROM orders
            WHERE payment_status = :status;
        ", [':status' => 'paid'])->find();

        return $total_sales['total_paid_amount'];
    }

    public function total_product_quantity_sold(): int
    {
        $quantity_sold = $this->db->query("
            SELECT SUM(quantity_sold) AS total_quantity_sold
            FROM products
        ")->find();
        return $quantity_sold['total_quantity_sold'];
    }

    public function payment_count(): int
    {
        $payment_count = $this->db->query("
            SELECT * 
            FROM orders 
            WHERE payment_status = :status
        ", [':status' => 'paid'])->get();
        return count($payment_count ?? []);
    }

    public function delivery_count(): int
    {
        $delivery_count = $this->db->query("
            SELECT * 
            FROM orders 
            WHERE status = :status
        ", [':status' => 'delivered'])->get();
        return count($delivery_count ?? []);
    }

    public function sales_report(): array
    {
        return $this->db->query("
            SELECT *
            FROM orders
            WHERE payment_status = :status;
        ", [':status' => 'paid'])->get();
    }

    public function payment_report(): array
    {
        return $this->db->query("
            SELECT * 
            FROM orders 
            WHERE payment_status = :status
        ", [':status' => 'paid'])->get();
    }

    public function product_report(): array
    {
        return $this->db->query("
            SELECT p.name, p.quantity_sold
            FROM products p
            LIMIT 10
        ")->get();
    }

    public function delivery_report() : array
    {
        return $this->db->query("
            SELECT * 
            FROM orders 
            WHERE status = :status
        ", [':status' => 'delivered'])->get();
    }
}