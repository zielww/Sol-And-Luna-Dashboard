<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$category = $db->query("select * from categories where category_id = :category_id", ['category_id' => $_GET['id']])->find();
$slug = $db->query("select * from categories where category_id = :parent_category_id", ['parent_category_id' => $category['parent_category_id']])->find();

require base_path('Http/views/categories/edit.php');