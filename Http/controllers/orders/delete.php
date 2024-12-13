<?php

use Core\Repository\Orders;
use Http\Forms\OrderForm;

$form = OrderForm::validate($attributes = [
    'order_id' => $_POST['order_id'],
]);

(new Orders)->delete($attributes);

redirect('/orders');