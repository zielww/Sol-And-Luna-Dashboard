<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => strtolower($_POST['email']),
    'password' => $_POST['password'],
]);

$signed_in = (new Authenticator())->login_attempt($attributes['email'], $attributes['password']);

if (!$signed_in) {
    $form->error('body', 'Invalid Credentials.')->throw();
}

redirect('/dashboard');

