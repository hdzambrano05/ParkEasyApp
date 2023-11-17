<?php
require('fpdf/fpdf.php');

include 'conexion.php';

$idReserva = $_GET['id'];
$tipoVehiculo = $_GET['tipo'];

$sql = "SELECT * FROM reservas WHERE ID_Reserva = $idReserva";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    $precioBase = ($tipoVehiculo == 'carro') ? 2000 : 1500;
    
    // Calcular las horas adicionales considerando 30 minutos como una hora adicional
    $horasAdicionales = ceil((strtotime($row['Fecha_Final']) - strtotime($row['Fecha_Inicio']) + 1800) / 3600) - 1;

    $totalPagar = $precioBase + $horasAdicionales * (($tipoVehiculo == 'carro') ? 1000 : 500);

    // Carpeta donde se guardarán los PDFs
    $carpetaFacturas = 'facturas/';

    // Asegurar que la carpeta existe, si no, crearla
    if (!file_exists($carpetaFacturas)) {
        mkdir($carpetaFacturas, 0777, true);
    }

    // Ruta completa del archivo PDF
    $pdfFileName = $carpetaFacturas . 'factura_' . $idReserva . '.pdf';

    // Crear y guardar el PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Factura de Pago');

    $pdf->SetFont('Arial', '', 12);
    $pdf->Ln(); // Salto de línea
    $pdf->Cell(40, 10, 'ID Reserva: ' . $idReserva);
    $pdf->Cell(40, 10, 'Cedula Cliente: ' . $row['Cedula_Cliente']);
    
    // Agregar más espacio o un salto de línea aquí
    $pdf->Ln(10); // Puedes ajustar el valor según tu preferencia

    $pdf->Cell(40, 10, 'Total a Pagar: $' . $totalPagar);

    $pdf->Output($pdfFileName, 'F'); // Guardar el PDF en la carpeta "facturas"

    // Mostrar la factura
    $response = "Factura generada correctamente.\n\nMonto a Pagar: $" . $totalPagar . "\nSe ha guardado como: " . $pdfFileName;
    echo $response;

} else {
    echo "Reserva no encontrada.";
}

$conn->close();
?>
