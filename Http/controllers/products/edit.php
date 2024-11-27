<?php

use Core\App;
use Core\Database;
use Core\Repository\Products;

$db = App::resolve(Database::class);

$main_categories = $db->query("select * from categories where parent_category_id = :parent and visibility = :visible", [':parent' => 0, ':visible' => 1])->get();

$categories = $db->query("select * from categories where parent_category_id != :parent and visibility = :visible", [':parent' => 0, 'visible' => '1'])->get();

$products = $db->query("
    SELECT p.product_id, p.name, p.description, p.visibility, p.price, p.stock_quantity, p.category_id, p.created_by, p.created_at, 
           pi.image_id, pi.image_url, pi.is_primary 
    FROM products p 
    LEFT JOIN product_images pi 
    ON p.product_id = pi.product_id
")->get();

$product = current(array_filter($products, fn($product) => $product['product_id'] == $_GET['id']));

$product_categories = $db->query("
    SELECT c.name 
    FROM categories c 
    JOIN product_categories pc 
    ON pc.category_id = c.category_id 
    WHERE pc.product_id = :product_id"
    , ['product_id' => $product['product_id']])->get();

$product_categories = array_map(function($item) {
    return $item['name'];
}, $product_categories);

$images = (new Products())->get_product_images((int)$product['product_id'], false);

require base_path('Http/views/products/edit.php');