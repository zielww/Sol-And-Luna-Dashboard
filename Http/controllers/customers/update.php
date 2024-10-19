<?php

use Core\Authenticator\CustomerAuth;
use Core\Repository\Customers;
use Http\Forms\CustomerForm;

$form = CustomerForm::validate($attributes = [
    'user_id' => intval($_POST['id']),
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => strtolower($_POST['email']),
    'password' => null,
    'phone' => $_POST['phone'],
    'country' => $_POST['country'],
    'image' => $_FILES['image'],
]);

if ((new CustomerAuth())->edit_attempt($attributes['email'], $attributes['user_id'])) {
    $form->error('body', 'user')->throw();
}

(new Customers())->update($attributes);

redirect('/customers');