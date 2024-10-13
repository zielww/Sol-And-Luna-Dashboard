<?php

use Core\App;
use Core\Database;
use Core\Session;

$admin = Session::get('admin');

$db = App::resolve(Database::class);

//Get Products
$orders = $db->query("
    SELECT order_items.*, products.*, orders.created_at, orders.status, orders.user
    FROM order_items
    JOIN products ON order_items.product_id = products.product_id
    JOIN orders ON order_items.order_id = orders.order_id
")->get();

$open_orders = array_filter($orders, fn($order) => strtolower($order['status']) !== 'delivered');

$total_price =  array_reduce($orders, function($carry, $item) {
    return $carry + ($item['quantity'] * floatval($item['price']));
}, 0);

$success_message = \Core\Session::get('success') ?? '';
$error_message = \Core\Session::get('errors') ?? [];

require base_path('Http/views/orders/index.php');