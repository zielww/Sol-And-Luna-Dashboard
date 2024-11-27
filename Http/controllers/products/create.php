<?php

use Core\Repository\Products;
use Http\Forms\ProductForm;

$form = ProductForm::validate($attributes = [
    'name' => $_POST['name'],
    'price' => floatval($_POST['price']),
    'quantity' => floatval($_POST['price']),
    'category' => explode(',',$_POST['category']),
    'visibility' => $_POST['visibility'],
    'description' => $_POST['description'],
    'images' => $_FILES['images'],
]);

(new Products())->store($attributes);

redirect('/products');