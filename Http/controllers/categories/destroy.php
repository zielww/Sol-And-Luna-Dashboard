<?php

use Core\App;
use Core\Database;
use Core\Repository\Categories;

$db = App::resolve(Database::class);

(new Categories())->delete($_POST['id']);

redirect('/categories');