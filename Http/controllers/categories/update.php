<?php

use Core\Authenticator\CategoryAuth;
use Core\Repository\Categories;
use Http\Forms\CategoryForm;

$form = CategoryForm::validate($attributes = [
    'id' => $_POST['id'],
    'name' => strtolower($_POST['name']),
    'visibility' => $_POST['visibility'] ?? 'false',
    'description' => $_POST['description'],
]);

if ((new CategoryAuth())->edit_attempt($attributes['name'], $attributes['id'])) {
    $form->error('body', 'name')->throw();
}

(new Categories())->update($attributes);

redirect('/categories');