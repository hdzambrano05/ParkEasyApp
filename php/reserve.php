<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas del Vehiculos</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/reserve.js"></script>
</head>

<body>

    <div class="head">
        <div class="logo">
            <a href="#"><img src="../css/img/LogoParkEasy.jpg" alt="ParkEasy" title="ParkEasy" width="60" height="50"></a>
        </div>
        <nav class="navbar">
            <a href="../index.html">Inicio</a>
            <a href="../pages/record_user.html">Registra Usuario</a>
            <a href="reserve.php">Reservar</a>
            <a href="../pages/spaceVehicle.html">Espacios</a>
            <a href="../pages/main_contact.html">Contactos</a>
        </nav>
    </div>

    <section class="reserve container">
        <div class="reserve-content">
            <h2>Listado de Reservas</h2>
            <br>
            <div class="btn-1" align="right">
            <a href="../pages/record_vehicle.htm">Registrar Vehiculo</a>
                <a href="../pages/enter_vehicle.html">Entrada de Vehiculo</a>
                <a href="../pages/exit_vehicle.html">Salida de Vehiculo</a>
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Id Reservas</th>
                        <th>Cedula Cliente</th>
                        <th>Placa del Vehiculo</th>
                        <th>Tipo de Vehiculo</th>
                        <th>Fecha de Ingreso</th>
                        <th>Fecha de Salida</th>
                        <th>Espacio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'conexion.php';

                    $sql = "SELECT * FROM reservas ORDER BY ID_Reserva DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["ID_Reserva"]."</td>";
                            echo "<td>".$row["Cedula_Cliente"]."</td>";
                            echo "<td>".$row["Placa_Vehiculo"]."</td>";
                            echo "<td>".$row["Tipo_Vehiculo"]."</td>";
                            echo "<td>".$row["Fecha_Inicio"]."</td>";
                            echo "<td>".$row["Fecha_Final"]."</td>";
                            echo "<td>".$row["Numero_Espacio"]."</td>";
                            echo "<td>
                            <a href='modificar.php?id=" . $row["ID_Reserva"] . "'>Modificar</a>
                            <a href='#' onclick='eliminarReserva(".$row["ID_Reserva"].")'>Eliminar</a>
                            <a href='#' onclick='pagarReserva(".$row["ID_Reserva"].", \"".$row["Tipo_Vehiculo"]."\")'>Pagar</a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>0 resultados</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>

        </div>
    </section>

</body>

</html>