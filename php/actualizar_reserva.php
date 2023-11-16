<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario POST
    $id_reserva = $_POST['id_reserva'];
    $cedula = $_POST['cedula'];
    $placa = $_POST['placa'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];
    $num_espacio = $_POST['num_espacio'];
    // Recupera otros campos del formulario según sea necesario

    // Realizar la consulta SQL UPDATE para actualizar la reserva
    $sql = "UPDATE reservas SET Cedula_Cliente='$cedula', Placa_Vehiculo='$placa', Fecha_Inicio='$fecha_inicio', Fecha_Final='$fecha_final', Numero_Espacio='$num_espacio' WHERE ID_Reserva=$id_reserva";
    if ($conn->query($sql) === TRUE) {
        // Devolver un mensaje de éxito como respuesta
        echo "Modificación exitosa";
    } else {
        echo "Error al actualizar la reserva: " . $conn->error;
    }
} else {
    echo "Método no permitido";
}

$conn->close();
?>
