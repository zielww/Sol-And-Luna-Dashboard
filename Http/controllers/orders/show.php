<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$categories = $db->query("select * from categories")->get();

$orders = $db->query("
    SELECT order_items.*, products.*, orders.created_at, orders.tracking_number, orders.payment, orders.payment_status, orders.status, orders.email, orders.user_id, orders.shipping_address_id, orders.notes
    FROM order_items
    JOIN products ON order_items.product_id = products.product_id
    JOIN orders ON order_items.order_id = orders.order_id
    WHERE order_items.order_id = :order_id
", ['order_id' => $_GET['id']])->get();

if (!$orders) {
    redirect('/orders');
}

$order = $orders[0];

$shipping_address = $db->query("select * from addresses where address_id = :address_id", ['address_id' => $order['shipping_address_id']])->find();

require base_path('Http/views/orders/show.php');