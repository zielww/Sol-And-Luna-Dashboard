<?php

use Core\App;
use Core\Database;
use Core\Repository\Categories;
use Http\Forms\CategoryForm;

$db = App::resolve(Database::class);

$form = CategoryForm::validate($attributes = [
    'name' => $_POST['name'],
    'visibility' => $_POST['visibility'],
    'description' => $_POST['description'],
]);

(new Categories())->store($attributes);

redirect('/categories');