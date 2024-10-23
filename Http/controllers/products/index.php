<?php

use Core\App;
use Core\Database;
$db = App::resolve(Database::class);

$categories = $db->query("select * from categories where visibility = :visible", ['visible' => '1'])->get();

$products = $db->query("
    SELECT p.product_id, p.name, p.description, p.visibility, p.price, p.stock_quantity, p.category_id, p.created_by, p.created_at, 
           pi.image_id, pi.image_url, pi.is_primary 
    FROM products p 
    LEFT JOIN product_images pi 
    ON p.product_id = pi.product_id AND pi.is_primary = 1
")->get();

$total_quantity = array_reduce($products, function ($carry, $product) {
    return $carry + $product['stock_quantity'];
}, 0);
$total_price = array_reduce($products, function ($carry, $item) {
    return $carry + ($item['stock_quantity'] * floatval($item['price']));
}, 0);

require base_path('Http/views/products/index.php');