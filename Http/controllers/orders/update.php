<?php

use Core\Repository\Orders;
use Http\Forms\OrderForm;

$form = OrderForm::validate($attributes = [
    'status' => $_POST['status'],
    'order_id' => $_POST['order_id'],
]);

(new Orders)->update($attributes);

redirect('/orders');