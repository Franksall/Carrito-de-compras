<?php
require('tcpdf/tcpdf.php');

if ($_GET) {
    // Obtiene los datos de la URL
    $paymentToken = $_GET['paymentToken'];
    $paymentID = $_GET['paymentID'];

    // Añade más detalles según sea necesario

    // Crear un nuevo objeto PDF
    $pdf = new TCPDF();

    // Agrega una página
    $pdf->AddPage();

    // Agrega contenido al PDF
    $contenido = "
        <h1>Boleta de Pago</h1>
        <p>Detalles del pago:</p>
        <ul>
            <li>Payment Token: $paymentToken</li>
            <li>Payment ID: $paymentID</li>
            <!-- Agrega más detalles según sea necesario -->
        </ul>
    ";

    $pdf->writeHTML($contenido, true, false, true, false, '');

    // Descarga el PDF
    $pdf->Output('boleta_pago.pdf', 'D');
} else {
    // Redirige a la página principal si no hay datos
    header("Location: index.php");
    exit;
}
?>
