<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Vehiculo</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/main.js"></script>
</head>

<body>

    <div class="head">
        <div class="logo">
            <a href="#"><img src="../css/img/LogoParkEasy.png" alt="ParkEasy" title="ParkEasy" width="60" height="50"></a>
        </div>
        <nav class="navbar">
            <a href="#">Inicio</a>
            <a href="../pages/record.html">Registra</a>
            <a href="reserve.php">Reservar</a>
            <a href="#">Espacios</a>
            <a href="#">Contactos</a>
        </nav>
    </div>

    <section class="reserve container">
        <div class="reserve-content">
            <h2>Listado de Reservas</h2>
            <br>
            <div class="btn-1" align="right">
                <a href="enter_vehicle.php">Ingreso de Vehiculo</a>
                <a href="">Salida de Vehiculo</a>
            </div>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Id Reservas</th>
                        <th>Id Cliente</th>
                        <th>Placa del Vehiculo</th>
                        <th>Fecha de Ingreso</th>
                        <th>Hora de Ingreso</th>
                        <th>Fecha de Salida</th>
                        <th>Hora de salida</th>
                        <th>Estado</th>
                        <th>Espacio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'conexion.php';

                    $sql = "SELECT * FROM reservas";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["ID_Reserva"]."</td>";
                            echo "<td>".$row["ID_Cliente"]."</td>";
                            echo "<td>".$row["Placa_Vehiculo"]."</td>";
                            echo "<td>".$row["Fecha_Inicio"]."</td>";
                            echo "<td>".$row["Hora_Inicio"]."</td>";
                            echo "<td>".$row["Fecha_Final"]."</td>";
                            echo "<td>".$row["Hora_Final"]."</td>";
                            echo "<td>".$row["Estado"]."</td>";
                            echo "<td>".$row["Numero_Espacio"]."</td>";
                            echo "<td>
                                <a href='' >Editar</a>
                                <a href=''>Eliminar</a>
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
