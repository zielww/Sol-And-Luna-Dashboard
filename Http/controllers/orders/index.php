<?php

use Core\App;
use Core\Database;
use Core\Session;

$admin = Session::get('admin');

$db = App::resolve(Database::class);

$status = match ($_GET['sort'] ?? false) {
    "new" => 'new',
    "processing" => 'processing',
    "shipped" => 'shipped',
    "delivered" => 'delivered',
    "cancelled" => 'cancelled',
    default => null,
};

$query = "
    SELECT order_items.*, products.*, orders.created_at, orders.status, orders.email
    FROM order_items
    JOIN products ON order_items.product_id = products.product_id
    JOIN orders ON order_items.order_id = orders.order_id
";

if ($status) {
    $query .= " WHERE orders.status = '$status'";
}

$orders = $db->query($query)->get();

$open_orders = array_filter($orders, function ($order) {
    return strtolower($order['status']) !== 'delivered' && strtolower($order['status']) !== 'cancelled';
});

$total_price = array_reduce($orders, function ($carry, $item) {
    return $carry + ($item['quantity'] * floatval($item['price']));
}, 0);

$success_message = Session::get('success') ?? '';
$error_message = Session::get('errors') ?? [];


require base_path('Http/views/orders/index.php');