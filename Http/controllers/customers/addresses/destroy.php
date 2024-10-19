<?php

use Core\Repository\Addresses;

(new Addresses())->delete($_POST['id']);

redirect('/customers');