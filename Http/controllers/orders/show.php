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

$order = $db->query("
    SELECT order_items.*, products.*, orders.created_at, orders.status, orders.user
    FROM order_items
    JOIN products ON order_items.product_id = products.product_id
    JOIN orders ON order_items.order_id = orders.order_id
    WHERE order_items.order_item_id = :order_item_id
", ['order_item_id' => $_GET['id']])->find();

$customer_name = $order['user'] . '\'s' . ' ' . 'Order';

require base_path('Http/views/orders/show.php');