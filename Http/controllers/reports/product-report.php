<?php

use Core\Repository\Reports;

$reports = new Reports();

$product = $reports->get_products($_GET['start'] ?? Null, $_GET['end'] ?? Null);

$_SESSION['product-report'] = $product;
$_SESSION['date'] = [
  'start' => $_GET['start'] ?? null,
  'end' => $_GET['end'] ?? null,
];

require base_path('Http/views/reports/product-report.php');