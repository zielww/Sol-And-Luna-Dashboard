<?php

use Core\Repository\Products;

(new Products())->delete($_POST['id']);

redirect('/products');