<?php

use Core\Repository\Reports;

$reports = new Reports();

$payment = $reports->get_payment($_GET['start'] ?? Null, $_GET['end'] ?? Null);

$_SESSION['payment-report'] = $payment;
$_SESSION['date'] = [
  'start' => $_GET['start'] ?? null,
  'end' => $_GET['end'] ?? null,
];

require base_path('Http/views/reports/payment-report.php');