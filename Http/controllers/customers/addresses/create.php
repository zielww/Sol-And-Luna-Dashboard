<?php

use Core\Repository\Addresses;
use Http\Forms\AddressForm;

$form = AddressForm::validate($attributes = [
    'user_id' => $_POST['user_id'],
    'street_address' => $_POST['street_address'],
    'city' => $_POST['city'],
    'zip_code' => $_POST['zip_code'],
    'province' => $_POST['province'],
    'country' => $_POST['country'],
    'is_default' => intval($_POST['primary']),
]);

(new Addresses)->store($attributes);

redirect(previous_url());