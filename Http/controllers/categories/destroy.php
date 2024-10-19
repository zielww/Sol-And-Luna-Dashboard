<?php

use Core\Repository\Categories;

(new Categories())->delete($_POST['id']);

redirect('/categories');