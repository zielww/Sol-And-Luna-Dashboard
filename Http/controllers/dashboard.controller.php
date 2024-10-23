<?php

use Core\App;
use Core\Database;
use Core\Session;

$success = Session::get('success') ?? '';
$db = App::resolve(Database::class);

$orders = $db->query("
    SELECT order_items.*, products.*, orders.created_at, orders.status
    FROM order_items
    JOIN products ON order_items.product_id = products.product_id
    JOIN orders ON order_items.order_id = orders.order_id
    LIMIT 5
")->get();

require base_path('Http/views/dashboard.view.php');