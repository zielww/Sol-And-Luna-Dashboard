<?php

if (!$_SESSION['sales-report']) {
    redirect('/sales-report');
}

$report_date = $_SESSION['date'];
$start_date = $report_date['start'] ?? null;
$end_date = $report_date['end'] ?? null;
$date_message = $start_date ? $start_date . ' to ' . $end_date: 'All time.';

use Fpdf\Fpdf;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 8);

$pageWidth = $pdf->GetPageWidth();
$pageHeight = $pdf->GetPageHeight();
$centerX = $pageWidth / 2;
$centerY = $pageHeight / 2;

$pdf->image(base_path('/public/images/logo.png'), 10, 8, 33);

$pdf->SetXY(50, 10);

$pdf->SetFont('Arial', '', 20);
$pdf->cell(0, 10, 'Sol & Luna Apparel Sales Report', 0, 1, 'L');

# Optionally, add a tagline or description
$pdf->SetXY($start_date ? 70 : 80, 20);
$pdf->SetFont('Arial', '', 10);
$pdf->cell(0, 10, 'Sales report for ' . $date_message , 0, 1, 'L');

# Add a line break after the header
$pdf->ln(10);

// Table Header
$header = [
    'Order Id', 'Email', 'Name', 'Size', 'Quantity', 'Status', 'Payment', 'Total Amount'
];

// Column widths (same for each column)
$widths = [20, 33, 50, 10, 15, 15, 25, 20];

$pdf->SetFont('Arial', 'B', 7);
// Table Header
foreach ($header as $i => $col) {
    $pdf->Cell($widths[$i], 10, $col, 1, 0, 'C');
}
$pdf->Ln();

// Table Data
$pdf->SetFont('Arial', '', 7);
foreach ($_SESSION['sales-report'] as $row) {
    foreach ($header as $i => $col) {
        $pdf->Cell($widths[$i], 10, $row[strtolower(str_replace(' ', '_', $col))], 1, 0, 'C');
    }
    $pdf->Ln();
}

// Output the PDF
$pdf->Output();