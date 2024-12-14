<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$status = match ($_GET['sort'] ?? false) {
    "pending" => 'pending',
    "new" => 'new',
    "processing" => 'processing',
    "shipped" => 'shipped',
    "delivered" => 'delivered',
    "cancelled" => 'cancelled',
    default => null,
};

$query = "
    SELECT *
    FROM orders
";

if ($status) {
    $query .= " WHERE orders.status = '$status'";
}
$orders = $db->query($query)->get();

$open_orders = array_filter($orders, function ($order) {
    return strtolower($order['status']) !== 'delivered' && strtolower($order['status']) !== 'cancelled';
});

$total_price = array_reduce($orders, function ($carry, $item) {
    return $carry + floatval($item['total_amount']);
}, 0);

require base_path('Http/views/orders/index.php');