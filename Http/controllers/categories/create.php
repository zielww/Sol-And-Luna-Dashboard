<?php

use Core\Authenticator\CategoryAuth;
use Core\Repository\Categories;
use Http\Forms\CategoryForm;

$form = CategoryForm::validate($attributes = [
    'name' => strtolower($_POST['name']),
    'parent_category' => $_POST['parent_category'],
    'visibility' => $_POST['visibility'],
    'description' => $_POST['description'],
]);

if ((new CategoryAuth())->attempt($attributes['name'])) {
    $form->error('body', 'name')->throw();
}

(new Categories())->store($attributes);

redirect('/categories');