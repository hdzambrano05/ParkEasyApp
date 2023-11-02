
<?php
include ('conexion.php');
// Consulta para obtener los países desde tu base de datos
    $sql = "SELECT Placa FROM vehiculos";
    $result = $conn->query($sql);

    // Imprime opciones en la lista desplegable
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['Placa'] . '">' . $row['Placa'] . '</option>';
        }
    } else {
        echo "0 resultados";
    }
    // Cierra la conexión
    $conn->close();
    ?>


