<?php

use Core\Repository\Reports;

$reports = new Reports();

$sales = $reports->get_sales($_GET['start'] ?? Null, $_GET['end'] ?? Null);

$_SESSION['sales-report'] = $sales;
$_SESSION['date'] = [
  'start' => $_GET['start'] ?? null,
  'end' => $_GET['end'] ?? null,
];

require base_path('Http/views/reports/sales-report.php');