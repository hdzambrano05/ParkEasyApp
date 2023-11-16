
<?php
include 'conexion.php';


$placa = $_POST['placa'];
$salida = $_POST['dateEnd'];

// Actualizar la fecha final en la base de datos
$sql = "UPDATE reservas SET Fecha_Final = '$salida' WHERE Placa_Vehiculo = '$placa'";

if ($conn->query($sql) === TRUE) {
    echo "Fecha Final actualizada con éxito";
} else {
    echo "Error al actualizar la Fecha Final: " . $conn->error;
}

$conn->close();
?>