<?php
include ('conexion.php');

$placa = $_GET['placa'];

$check_query = "SELECT * FROM vehiculos WHERE Placa='$placa'";
$result = $conn->query($check_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cedula = $row['Cedula'];
    echo json_encode(array('Cedula' => $cedula));
} else {
    echo json_encode(array('Cedula' => null));
}

$conn->close();
?>
