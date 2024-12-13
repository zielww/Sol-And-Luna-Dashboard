<?php

use Core\App;
use Core\Database;
use Core\Repository\Customers;

$db = App::resolve(Database::class);

$customer = $db->query("select * from users where user_id = :user_id", ['user_id' => $_GET['id']])->find();

if (!$customer) {
    redirect('/customers');
}

$addresses = $db->query("select * from addresses where user_id = :user_id", ['user_id' => $_GET['id']])->get() ?? [];

$default_address = array_filter($addresses, fn($address) => $address['is_default'] == 1) ?? [];

$image = (new Customers())->get_customer_image($_GET['id']);

require base_path('Http/views/customers/edit.php');