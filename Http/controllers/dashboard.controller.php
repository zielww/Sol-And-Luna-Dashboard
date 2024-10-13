<?php

use Core\App;
use Core\Database;
use Core\Session;

$admin = Session::get('admin');

$db = App::resolve(Database::class);

/**
 *
 * Query order_items table and fetch the values
 * Get the product_id and math the product id to the products table by querying
 * Assign them to a variable and display them in the dashboard
 *
 * */

$orders = $db->query("
    SELECT order_items.*, products.*, orders.created_at, orders.status
    FROM order_items
    JOIN products ON order_items.product_id = products.product_id
    JOIN orders ON order_items.order_id = orders.order_id
")->get();


require base_path('Http/views/dashboard.view.php');