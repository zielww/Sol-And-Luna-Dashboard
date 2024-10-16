<?php

use Core\App;
use Core\Database;
use Core\Repository\Products;
use Http\Forms\ProductForm;

$db = App::resolve(Database::class);

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