<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$customers = $db->query('SELECT * FROM users WHERE user_type = :user_type', ['user_type' => 'customer'])->get();

require base_path('Http/views/customers/index.php');