<?php

use Core\App;
use Core\Database;
use Core\Repository\Categories;
use Http\Forms\CategoryForm;

$db = App::resolve(Database::class);

$form = CategoryForm::validate($attributes = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'visibility' => $_POST['visibility'] ?? 'false',
    'description' => $_POST['description'],
]);

(new Categories())->update($attributes);

redirect('/categories');