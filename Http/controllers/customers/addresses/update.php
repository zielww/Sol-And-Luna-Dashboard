<?php

use Core\Repository\Addresses;
use Http\Forms\AddressForm;

$form = AddressForm::validate($attributes = [
    'address_id' => $_POST['address_id'],
    'street_address' => $_POST['street_address'],
    'city' => $_POST['city'],
    'zip_code' => $_POST['zip_code'],
    'province' => $_POST['province'],
    'country' => $_POST['country'],
    'is_default' => intval($_POST['primary']),
]);

(new Addresses)->update($attributes);

redirect('/customers');