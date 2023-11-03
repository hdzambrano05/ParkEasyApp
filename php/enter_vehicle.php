<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="../css/main.css">
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
    </div>

    <section class="record container">
        <div class="record-content">
            <h2>Ingreso de Vehiculos</h2>
            <br>

            <form id="form_veh" action="../php/registrarVeh.php" method="post">

                <div class="field">
                    <label for="placa">Placa:</label>
                    <select name="placa" id="placa" required>
                        <option value="">Seleccione una Placa</option>

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
                        
                        <option value="Otro">Otro</option>
                    </select>
                </div>
    
                <div class="field">
                    <label for="brand">Nombres:</label>
                    <input type="text" name="brand" id="brand" >
                </div>
    
                <div class="field">
                    <label for="date">Fecha de ingreso:</label>
                    <input type="date" name="date" id="date" >
                </div>
    
                <div class="field">
                    <label for="time">Hora de ingreso</label>
                    <input type="time" name="time" id="time" required>
                </div>
            </form>
            <br>

            <button onclick="enviarFormularios()">Enviar</button>
        </div>
    </section>
    


    <br>
</body>

</html>