<?php

use Core\Repository\Customers;

(new Customers())->delete($_POST['id']);

redirect('/customers');