<?php

use Core\Repository\Reports;

$reports = new Reports();

// Primary Info

$total_sales = $reports->total_sales();
$total_product_quantity_sold = $reports->total_product_quantity_sold();
$payment_count = $reports->payment_count();
$delivery_count = $reports->delivery_count();

// Reports Info
$sales_report = $reports->sales_report();
$sales_report_json = json_encode($sales_report);

$payment_report = $reports->payment_report();
$payment_report_json = json_encode($payment_report);

$product_report = $reports->product_report();
$product_report_json = json_encode($product_report);

$delivery_report = $reports->delivery_report();
$delivery_report_json = json_encode($delivery_report);

require base_path('Http/views/reports/index.php');