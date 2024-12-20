<?php

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container();
$container->bind('Core\Database', function () {
    $config = require base_path("config.php");
    return new Database($config['database'], $_ENV['DATABASE_USERNAME'], $_ENV['DATABASE_PASSWORD']);
});

App::setContainer($container);

