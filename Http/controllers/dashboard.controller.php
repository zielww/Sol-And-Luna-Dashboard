<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Repository\Reports;

$success = Session::get('success') ?? '';
$db = App::resolve(Database::class);
$admin = Session::get('admin');
$current_user = $db->query('select * from user_images where user_id = :user_id', [
    'user_id' => $admin['user_id']
])->find();

$orders = $db->query("
    SELECT order_items.*, products.*, orders.created_at, orders.status
    FROM order_items
    JOIN products ON order_items.product_id = products.product_id
    JOIN orders ON order_items.order_id = orders.order_id
    LIMIT 5
")->get();

// Instantiate Reports
$reports = new Reports();

// Primary Info

$total_sales = $reports->total_sales();
$total_product_quantity_sold = $reports->total_product_quantity_sold();
$payment_count = $reports->payment_count();

// Reports Info
$sales_report = $reports->sales_report();
$sales_report_json = json_encode($sales_report);

$payment_report = $reports->payment_report();
$payment_report_json = json_encode($payment_report);

$product_report = $reports->product_report();
$product_report_json = json_encode($product_report);

require base_path('Http/views/dashboard/index.php');