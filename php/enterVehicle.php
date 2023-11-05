<?php
include 'conexion.php';

$cedula = $_POST['cedula'];
$placa = $_POST['placa'];
$fechaI = $_POST['date'];
$horaI = $_POST['time'];
$espacio = $_POST['space'];
$estado =  $_POST['state'];


$sql = "INSERT INTO reservas (Cedula_Cliente, Placa_Vehiculo, Fecha_Inicio, Hora_Inicio, Fecha_Final, Hora_Final, Numero_Espacio, Estado) VALUES ('$cedula', '$placa', '$fechaI', '$horaI', null , null, '$espacio', '$estado')";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Nuevo registro creado correctamente";
} else {
    echo "Error al ejecutar la consulta: " . $conn->error;
}

$conn->close();
?>
