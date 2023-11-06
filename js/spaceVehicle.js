
document.addEventListener('DOMContentLoaded', function() {
    function actualizarEspacios() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var reservasActualizadas = JSON.parse(this.responseText);
                actualizarBotones(reservasActualizadas);
            }
        };
        xhttp.open("GET", "../php/actualizar_reservas.php", true);
        xhttp.send();
    }

    function actualizarBotones(reservas) {
        reservas.forEach(reserva => {
            const boton = document.getElementById(reserva.Numero_Espacio);
            if (boton) {
                boton.style.backgroundColor = 'red';
                boton.disabled = true;
            }
        });
    }

    setInterval(actualizarEspacios, 1000); // Realizar actualización cada 5 segundos (5000 milisegundos)
});
