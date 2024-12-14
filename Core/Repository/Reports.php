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

    public function get_sales(string $start = null, string $end = null) : array
    {
        $query = "select o.*, od.created_at, od.status, od.email, od.payment, od.total_amount, p.name from order_items o join orders od on o.order_id = od.order_id join products p on p.product_id = o.product_id where od.payment_status = :status";
        $params = [':status' => 'paid'];

        if ($start && $end) {
            $startParts = explode('/', $start);
            $startFormatted = $startParts[2] . '-' . $startParts[0] . '-' . $startParts[1] . ' 00:00:00';

            $endParts = explode('/', $end);
            $endFormatted = $endParts[2] . '-' . $endParts[0] . '-' . $endParts[1] . ' 23:59:59';

            $query .= " and od.created_at between :start and :end";
            $params[':start'] = $startFormatted;
            $params[':end'] = $endFormatted;
        }

        return $this->db->query($query, $params)->get();
    }
}