<?php
include 'conexion.php';

$cedula = $_POST['cedula'];
$placa = $_POST['placa'];
$fechaI = $_POST['date'];
$horaI = $_POST['time'];
$espacio = $_POST['space'];

// Verificar si el espacio ya está en uso
$sql_verificar = "SELECT * FROM reservas WHERE Numero_Espacio = '$espacio'";
$result_verificar = $conn->query($sql_verificar);

if ($result_verificar->num_rows > 0) {
    // Si hay resultados, significa que el espacio ya está en uso
    echo "Error: El espacio ya está reservado.";
} else {
    // Si no hay resultados, se puede proceder con la inserción
    $sql = "INSERT INTO reservas (Cedula_Cliente, Placa_Vehiculo, Fecha_Inicio, Hora_Inicio, Fecha_Final, Hora_Final, Numero_Espacio) VALUES ('$cedula', '$placa', '$fechaI', '$horaI', null , null, '$espacio')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Nuevo registro creado correctamente";
    } else {
        echo "Error al ejecutar la consulta: " . $conn->error;
    }
}

$conn->close();
?>
