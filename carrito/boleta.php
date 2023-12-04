<?php
require('D:/Downlands/fpdf186/fpdf.php');// Asegúrate de que la ruta sea correcta según la ubicación de tu archivo FPDF

class PDF extends FPDF
{
    function Header()
    {
        // Encabezado
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(80);
        $this->Cell(30, 10, 'Boleta de Compra', 0, 0, 'C');
        $this->Ln(20);
    }

    function Footer()
    {
        // Pie de página
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }

    function AddProduct($product)
    {
        $this->SetFont('Arial', '', 12);
        $this->Cell(60, 10, $product['NOMBRE'], 1);
        $this->Cell(30, 10, $product['CANTIDAD'], 1, 0, 'C');
        $this->Cell(30, 10, '$' . number_format($product['PRECIO'], 2), 1, 0, 'R');
        $this->Ln();
    }
}

session_start();

if (isset($_SESSION['CARRITO'])) {
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Productos', 0, 1);

    foreach ($_SESSION['CARRITO'] as $producto) {
        $pdf->AddProduct($producto);
    }

    // Total
    $pdf->Cell(60);
    $pdf->Cell(30, 10, 'Total:', 1);
    $total = array_reduce($_SESSION['CARRITO'], function ($carry, $item) {
        return $carry + ($item['CANTIDAD'] * $item['PRECIO']);
    }, 0);
    $pdf->Cell(30, 10, '$' . number_format($total, 2), 1, 0, 'R');

    // Salida PDF
    $pdf->Output();
} else {
    echo "No hay productos en el carrito.";
}
?>
