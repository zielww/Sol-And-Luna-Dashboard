<?php

use Core\Repository\Products;
use Http\Forms\ProductForm;

$form = ProductForm::validate($attributes = [
    'name' => $_POST['name'],
    'price' =>  floatval(str_replace(',', '', $_POST['price'])),
    'quantity' => intval(str_replace(',', '', $_POST['quantity'])),
    'category' => explode(',',$_POST['category']),
    'visibility' => $_POST['visibility'],
    'description' => $_POST['description'],
    'images' => $_FILES['images'],
]);

(new Products())->store($attributes);

redirect('/products');