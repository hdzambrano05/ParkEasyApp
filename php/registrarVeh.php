<?php
include ('conexion.php');

$placa = $_POST['placa'];
$color = $_POST['color'];
$tipo = $_POST['tipo'];
$cedula= $_POST['cedula'];

$sql = "INSERT INTO vehiculos (Placa, Color, Tipo, Cedula) VALUES ('$placa', '$color', '$tipo' , '$cedula')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>