<?php

use Core\App;
use Core\Database;

use Core\Session;

$admin = Session::get('admin');
$db = App::resolve(Database::class);

if (!$_GET['id']) {
    redirect('/category');
}

//Fetch Categories
$category = $db->query("select * from categories where category_id = :category_id", ['category_id' => $_GET['id']])->find();

//Get Error Session
$error_message = \Core\Session::get('errors') ?? [];
$success_message = \Core\Session::get('success') ?? '';

require base_path('Http/views/categories/edit.php');