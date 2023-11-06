<?php
include 'conexion.php';

$codigo = $_GET['id'];

$sql = "DELETE FROM reservas WHERE ID_Reserva=$codigo";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado correctamente";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

$conn->close();
?>
