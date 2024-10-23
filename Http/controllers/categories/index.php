<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$categories = $db->query("select * from categories")->get();

require base_path('Http/views/categories/index.php');