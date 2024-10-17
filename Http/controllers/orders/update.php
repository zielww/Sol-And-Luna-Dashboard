<?php

use Core\App;
use Core\Database;
use Core\Repository\Orders;
use Core\Session;
use Http\Forms\OrderForm;

$admin = Session::get('admin');

dd($_POST);

$db = App::resolve(Database::class);

$form = OrderForm::validate($attributes = [
    'status' => $_POST['status'],
    'order_id' => $_POST['order_id'],
]);

(new Orders)->update($attributes);

redirect('/orders');