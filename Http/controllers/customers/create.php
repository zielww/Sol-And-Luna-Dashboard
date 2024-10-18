<?php

use Core\App;
use Core\Database;
use Core\Repository\Customers;
use Http\Forms\CustomerForm;

$db = App::resolve(Database::class);

$form = CustomerForm::validate($attributes = [
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'phone' => $_POST['phone'],
    'country' => $_POST['country'],
    'image' => $_FILES['image'],
]);

(new Customers)->store($attributes);

redirect('/customers');