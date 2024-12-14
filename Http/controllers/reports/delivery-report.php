<?php

use Core\Repository\Reports;

$reports = new Reports();

$delivery = $reports->get_deliveries($_GET['start'] ?? Null, $_GET['end'] ?? Null);

$_SESSION['delivery-report'] = $delivery;
$_SESSION['date'] = [
  'start' => $_GET['start'] ?? null,
  'end' => $_GET['end'] ?? null,
];

require base_path('Http/views/reports/delivery-report.php');