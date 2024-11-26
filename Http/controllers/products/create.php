<?php

use Core\Repository\Products;
use Http\Forms\ProductForm;

dd($_POST);

$form = ProductForm::validate($attributes = [
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'quantity' => $_POST['quantity'],
    'category' => $_POST['category'],
    'visibility' => $_POST['visibility'],
    'description' => $_POST['description'],
    'images' => $_FILES['images'],
]);

(new Products())->store($attributes);

redirect('/products');