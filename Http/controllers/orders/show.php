<?php

use Core\App;
use Core\Database;
use Core\Session;

$admin = Session::get('admin');

$db = App::resolve(Database::class);

if (!$_GET['id']) {
    redirect('/orders');
}

//Fetch Categories
$categories = $db->query("select * from categories")->get();

$orders = $db->query("
    SELECT order_items.*, products.*, orders.created_at, orders.status, orders.user
    FROM order_items
    JOIN products ON order_items.product_id = products.product_id
    JOIN orders ON order_items.order_id = orders.order_id
    WHERE order_items.order_id = :order_id
", ['order_id' => $_GET['id']])->get();

$order = $orders[0];

$customer_name = $orders[0]['user'] . '\'s' . ' ' . 'Order';

require base_path('Http/views/orders/show.php');