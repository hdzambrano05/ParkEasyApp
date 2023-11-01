<?php
include ('conexion.php');

$nombres= $_POST['name'];
$apellidos = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "INSERT INTO clientes (Nombre,Apellido,Telefono,CorreoElectronico) VALUES ('$nombres', '$apellidos','$phone ','$email')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>