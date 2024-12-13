<?php

use Core\Repository\Orders;
use Http\Forms\OrderForm;

$form = OrderForm::validate($attributes = [
    'status' => $_POST['status'],
    'tracking_number' => $_POST['tracking_number'],
    'order_id' => $_POST['order_id'],
]);

(new Orders)->update($attributes);

redirect($_SERVER['HTTP_REFERER']);