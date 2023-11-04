<?php
include ('conexion.php');

$cedula = $_POST['cedula'];
$nombres = $_POST['name'];
$apellidos = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Verifica si la cédula ya está registrada
$sql_verificacion = "SELECT * FROM clientes WHERE Cedula = '$cedula'";
$resultado_verificacion = $conn->query($sql_verificacion);

$response = array();

if ($resultado_verificacion->num_rows > 0) {
    $response['status'] = "error";
    $response['message'] = "La cédula $cedula ya está registrada en la base de datos.";
} else {
    // La cédula no está registrada, procede con la inserción en la base de datos
    $sql_insercion = "INSERT INTO clientes (Cedula,Nombre,Apellido,Telefono,CorreoElectronico) VALUES ('$cedula','$nombres', '$apellidos','$phone ','$email')";

    if ($conn->query($sql_insercion) === TRUE) {
        $response['status'] = "success";
        $response['message'] = "Nuevo registro creado correctamente";
    } else {
        $response['status'] = "error";
        $response['message'] = "Error: " . $sql_insercion . "<br>" . $conn->error;
    }
}

echo json_encode($response);

$conn->close();
?>
