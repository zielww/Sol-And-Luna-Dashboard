<?php

if (!$_SESSION['delivery-report']) {
    redirect('/delivery-report');
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
$pdf->cell(0, 10, 'Sol & Luna Apparel Delivery Report', 0, 1, 'L');

# Optionally, add a tagline or description
$pdf->SetXY($start_date ? 70 : 80, 20);
$pdf->SetFont('Arial', '', 10);
$pdf->cell(0, 10, 'Delivery report for ' . $date_message , 0, 1, 'L');

# Add a line break after the header
$pdf->ln(10);

// Table Header
$header = [
    'Delivered On', 'Order Id', 'Email', 'Status', 'Payment', 'Payment Status', 'Total Amount'
];

// Column widths (same for each column)
$widths = [30, 25, 50, 15, 30, 20, 20];

$pdf->SetFont('Arial', 'B', 7);
// Table Header
foreach ($header as $i => $col) {
    $pdf->Cell($widths[$i], 10, $col, 1, 0, 'C');
}
$pdf->Ln();

// Table Data
$pdf->SetFont('Arial', '', 7);
foreach ($_SESSION['delivery-report'] as $row) {
    foreach ($header as $i => $col) {
        $pdf->Cell($widths[$i], 10, $row[strtolower(str_replace(' ', '_', $col))], 1, 0, 'C');
    }
    $pdf->Ln();
}

// Output the PDF
$pdf->Output();
