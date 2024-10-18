<?php

use Core\App;
use Core\Database;
use Core\Session;

$admin = Session::get('admin');
$db = App::resolve(Database::class);

//Fetch customers
$customers = $db->query('SELECT * FROM users WHERE user_type = :user_type', ['user_type' => 'customer'])->get();

//Alerts
$success_message = \Core\Session::get('success') ?? '';
$error_message = \Core\Session::get('errors') ?? [];

require base_path('Http/views/customers/index.php');