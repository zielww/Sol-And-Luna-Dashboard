<?php

use Core\App;
use Core\Database;
use Core\Repository\Customers;
use Core\Session;

$admin = Session::get('admin');
$db = App::resolve(Database::class);

if (!$_GET['id']) {
    redirect('/customers');
}

//Fetch Customer
$customer = $db->query("select * from users where user_id = :user_id", ['user_id' => $_GET['id']])->find();

//Fetch customer addresses
$addresses = $db->query("select * from addresses where user_id = :user_id", ['user_id' => $_GET['id']])->get() ?? [];

//Check address if one has is default
$default_address = array_filter($addresses, fn($address) => $address['is_default'] == 1) ?? [];

//Fetch image
$image = (new Customers())->get_customer_image($_GET['id']);

//Get Error Session
$error_message = Session::get('errors') ?? [];
$success_message = Session::get('success') ?? '';

require base_path('Http/views/customers/edit.php');