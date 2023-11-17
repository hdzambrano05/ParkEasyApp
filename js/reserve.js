function eliminarReserva(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert("Registro eliminado correctamente");
                location.reload(); // Recarga la página
            } else {
                alert("Error al eliminar el registro: " + xhr.responseText);
            }
        }
    };
    xhr.open("GET", "../php/eliminarReserva.php?id=" + id, true);
    xhr.send();
}



function pagarReserva(idReserva, tipoVehiculo) {
    // Hacer una solicitud AJAX al servidor para calcular el pago y generar el PDF
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'calcular_pago.php?id=' + idReserva + '&tipo=' + tipoVehiculo, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            alert(response); 
            // Mostrar la alerta con la respuesta del servidor
        }
    };

    xhr.send();
}
