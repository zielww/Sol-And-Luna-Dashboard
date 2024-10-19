<?php

use Core\Authenticator\CustomerAuth;
use Core\Repository\Customers;
use Http\Forms\CustomerForm;

$form = CustomerForm::validate($attributes = [
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => strtolower($_POST['email']),
    'password' => $_POST['password'],
    'phone' => $_POST['phone'],
    'country' => $_POST['country'],
    'image' => $_FILES['image'],
]);

if ((new CustomerAuth())->attempt($attributes['email'])) {
    $form->error('body', 'user')->throw();
}

(new Customers)->store($attributes);

redirect('/customers');