<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$address = $db->query("select * from addresses where address_id = :address_id", ['address_id' => $_GET['id']])->find
() ?? [];

$default_address = $db->query("select * from addresses where user_id = :user_id and is_default = :default", [
    'user_id' => $address['user_id'],
    'default' => 1
])->find();

$same_address = $address['address_id'] === $default_address['address_id'];

require base_path('Http/views/customers/addresses/edit.php');