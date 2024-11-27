<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$categories = $db->query("select * from categories")->get();
$main_categories = $db->query("select * from categories where parent_category_id = 0")->get();

require base_path('Http/views/categories/index.php');