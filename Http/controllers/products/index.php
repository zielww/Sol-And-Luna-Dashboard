<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$main_categories = $db->query("select * from categories where parent_category_id = :parent and visibility = :visible", [':parent' => 0, ':visible' => 1])->get();

$categories = $db->query("select * from categories where parent_category_id != :parent and visibility = :visible", [':parent' => 0, 'visible' => '1'])->get();

$products = $db->query("
    SELECT p.*, 
           pi.image_id, pi.image_url, pi.is_primary 
    FROM products p 
    LEFT JOIN product_images pi 
    ON p.product_id = pi.product_id AND pi.is_primary = 1
")->get();

$total_quantity = array_reduce($products, function ($carry, $product) {
    return $carry + $product['small_quantity'] + $product['medium_quantity'] + $product['large_quantity'] + $product['xl_quantity'] + $product['xxl_quantity'];
}, 0);
$total_price = array_reduce($products, function ($carry, $product) {
    return $carry + (($product['small_quantity'] + $product['medium_quantity'] + $product['large_quantity'] + $product['xl_quantity'] + $product['xxl_quantity']) * floatval($product['price']));
}, 0);


require base_path('Http/views/products/index.php');