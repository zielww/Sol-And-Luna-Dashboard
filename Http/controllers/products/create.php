<?php

use Core\Repository\Products;
use Http\Forms\ProductForm;

$form = ProductForm::validate($attributes = [
    'name' => $_POST['name'],
    'price' =>  floatval(str_replace(',', '', $_POST['price'])),
    'small_quantity' => intval(str_replace(',', '', $_POST['small_quantity'])),
    'medium_quantity' => intval(str_replace(',', '', $_POST['medium_quantity'])),
    'large_quantity' => intval(str_replace(',', '', $_POST['large_quantity'])),
    'xl_quantity' => intval(str_replace(',', '', $_POST['xl_quantity'])),
    'xxl_quantity' => intval(str_replace(',', '', $_POST['xxl_quantity'])),
    'category' => explode(',',$_POST['category']),
    'visibility' => $_POST['visibility'],
    'description' => $_POST['description'],
    'images' => $_FILES['images'],
]);

(new Products())->store($attributes);

redirect('/products');