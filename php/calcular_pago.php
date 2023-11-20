<?php
require('fpdf/fpdf.php');

include 'conexion.php';

$idReserva = $_GET['id'];
$tipoVehiculo = $_GET['tipo'];

$sql = "SELECT * FROM reservas WHERE ID_Reserva = $idReserva";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    $precioPrimeraHoraCarro = 2000;
    $precioHorasAdicionalesCarro = 1000;

    $precioPrimeraHoraMoto = 1500;
    $precioHorasAdicionalesMoto = 500;

    // Obtener la fecha y hora de inicio y fin como objetos DateTime
    $fechaInicio = new DateTime($row['Fecha_Inicio']);
    $fechaFinal = new DateTime($row['Fecha_Final']);

    // Calcular las horas adicionales considerando 30 minutos como una hora adicional
    $intervalo = $fechaInicio->diff($fechaFinal);
    $totalHoras = $intervalo->h;
    $totalHoras += ($intervalo->i >= 30) ? 1 : 0;

    if ($tipoVehiculo == 'Carro') {
        $precioPrimeraHora = $precioPrimeraHoraCarro;
        $precioHorasAdicionales = $precioHorasAdicionalesCarro;
    } elseif ($tipoVehiculo == 'Moto') {
        $precioPrimeraHora = $precioPrimeraHoraMoto;
        $precioHorasAdicionales = $precioHorasAdicionalesMoto;
    } else {
        echo "Tipo de vehículo no válido.";
        exit;
    }

    $totalPagar = $precioPrimeraHora + max(0, $totalHoras - 1) * $precioHorasAdicionales;

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
    $pdf->Ln(10); // Salto de línea
    $pdf->Cell(40, 10, 'Total a Pagar: $' . $totalPagar);

    $pdf->Output($pdfFileName, 'F'); // Guardar el PDF en la carpeta "facturas"

    // Mostrar la notificación con la diferencia en horas, el total a pagar y la confirmación de guardado
    echo "Diferencia en horas: " . $totalHoras . " horas\n";
    echo "Monto a Pagar: $" . $totalPagar . "\nSe ha guardado correctamente.";

} else {
    echo "Reserva no encontrada.";
}

$conn->close();
?>
