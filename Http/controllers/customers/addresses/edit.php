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

//Fetch customer addresses
$address = $db->query("select * from addresses where address_id = :address_id", ['address_id' => $_GET['id']])->find
() ?? [];

$default_address = $db->query("select * from addresses where user_id = :user_id and is_default = :default", [
    'user_id' => $address['user_id'],
    'default' => 1
])->find();

$same_address = $address['address_id'] === $default_address['address_id'];

//Get Error Session
$error_message = Session::get('errors') ?? [];
$success_message = Session::get('success') ?? '';

require base_path('Http/views/customers/addresses/edit.php');