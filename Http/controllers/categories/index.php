<?php

use Core\App;
use Core\Database;
use Core\Session;

$admin = Session::get('admin');
$db = App::resolve(Database::class);

//Fetch Categories
$categories = $db->query("select * from categories")->get();

//Alerts
$success_message = Session::get('success') ?? '';
$error_message = Session::get('errors') ?? [];

require base_path('Http/views/categories/index.php');