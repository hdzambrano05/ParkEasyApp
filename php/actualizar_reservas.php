<?php
include 'conexion.php';

$sql = "SELECT * FROM reservas";
$result = $conn->query($sql);

$reservas = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reservas[] = $row;
    }
}

echo json_encode($reservas);

$conn->close();
?>
