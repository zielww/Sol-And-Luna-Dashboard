<?php

use Core\App;
use Core\Database;
use Core\Repository\Products;

$db = App::resolve(Database::class);

(new Products())->delete($_POST['id']);

redirect('/products');