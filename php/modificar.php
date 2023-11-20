<?php
include 'conexion.php';

// Verificar si se proporcionó un ID de reserva válido
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_reserva = $_GET['id'];

    // Realizar consulta para obtener la información de la reserva
    $sql = "SELECT * FROM reservas WHERE ID_Reserva = $id_reserva";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modificar Reserva</title>
            <link rel="stylesheet" href="../css/main.css">
            <script src="../js/modificar.js"></script>
        </head>

        <body>
    

            <section class="reserve container">
                <div class="reserve-content">
                    <h2>Modificar Reserva</h2>
                    <form action="actualizar_reserva.php" method="post" onsubmit="return validarEspacios()">
                        <input type="hidden" name="id_reserva" value="<?php echo $row['ID_Reserva']; ?>">

                        <table>
                            <thead>
                            <tr>
                                <th>Cédula Cliente:</th>
                                <th>Placa del Vehículo:</th>
                                <th>Fecha de Ingreso:</th>
                                <th>Fecha de Salida:</th>
                                <th>Número de Espacio:</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <td><input type="text" name="cedula" value="<?php echo $row['Cedula_Cliente']; ?>" required></td>
                               <td><input type="text" name="placa" value="<?php echo $row['Placa_Vehiculo']; ?>" required></td>
                               <td><input type="datetime-local" name="fecha_inicio" value="<?php echo $row['Fecha_Inicio']; ?>" required></td>
                               <td><input type="datetime-local" name="fecha_final" value="<?php echo $row['Fecha_Final']; ?>" required></td>
                               <td><input type="text" name="num_espacio" value="<?php echo $row['Numero_Espacio']; ?>" required></td>
                           </tr>

                            </tbody>
                        
                           
                        </table>

                        <button type="button" onclick="validarYModificar()">Guardar cambios</button>
                    </form>
                </div>
            </section>

        </body>

        </html>
        <?php
    } else {
        echo "Reserva no encontrada";
    }
} else {
    echo "Parámetros no válidos";
}

$conn->close();
?>
