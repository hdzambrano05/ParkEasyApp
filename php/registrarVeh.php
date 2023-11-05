<?php
include ('conexion.php');

$placa = $_POST['placa'];
$color = $_POST['color'];
$tipo = $_POST['tipo'];
$cedula = $_POST['cedula'];

// Verificar si la placa ya existe
$check_query = "SELECT * FROM vehiculos WHERE Placa='$placa'";
$result = $conn->query($check_query);

if ($result->num_rows > 0) {
    echo "La placa ya existe en la base de datos. Por favor, ingrese una placa diferente.";
} else {
    // Insertar el registro si la placa no existe
    $sql = "INSERT INTO vehiculos (Placa, Color, Tipo, Cedula) VALUES ('$placa', '$color', '$tipo' , '$cedula')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

