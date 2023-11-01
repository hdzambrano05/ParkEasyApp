<?php
include ('conexion.php');

$placa = $_POST['placa'];
$marca = $_POST['brand'];
$modelo = $_POST['model'];
$color = $_POST['color'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO vehiculos (Placa, Marca, Modelo, Color, Tipo) VALUES ('$placa', '$marca', '$modelo', '$color', '$tipo')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>