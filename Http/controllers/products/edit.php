<?php

use Core\App;
use Core\Database;
use Core\Repository\Products;
use Core\Session;

$admin = Session::get('admin');
$db = App::resolve(Database::class);

if (!$_GET['id']) {
    redirect('/products');
}

//Fetch Categories
$categories = $db->query("select * from categories where visibility = :visible", ['visible' => '1'])->get();

//Fetch products
$products = $db->query("
    SELECT p.product_id, p.name, p.description, p.visibility, p.price, p.stock_quantity, p.category_id, p.created_by, p.created_at, 
           pi.image_id, pi.image_url, pi.is_primary 
    FROM products p 
    LEFT JOIN product_images pi 
    ON p.product_id = pi.product_id
")->get();
$product = current(array_filter($products, fn($product) => $product['product_id'] == $_GET['id']));
$product_category = $db->query("SELECT * FROM categories WHERE category_id = :id", ['id' => $product['category_id']])->find();

//Fetch images
$images = (new Products())->get_product_images((int)$product['product_id'], false);

//Get Error Session
$error_message = Session::get('errors') ?? [];
$success_message = Session::get('success') ?? '';

require base_path('Http/views/products/edit.php');