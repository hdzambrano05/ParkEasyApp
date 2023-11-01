//Enviar formulario
function enviarFormularios() {
    var formCliente = document.getElementById("form_cli");
    var formVehiculo = document.getElementById("form_veh");

    var formDataCliente = new FormData(formCliente);
    var formDataVehiculo = new FormData(formVehiculo);

    var xhrCliente = new XMLHttpRequest();

    xhrCliente.onreadystatechange = function() {
        if (xhrCliente.readyState == XMLHttpRequest.DONE) {
            if (xhrCliente.status == 200) {
                // Manejar la respuesta si es necesario
                alert("Cliente agregado correctamente");
                formCliente.reset(); // Reiniciar campos del formulario
            } else {
                // Manejar errores si es necesario
                alert("Error al agregar cliente");
            }
        }
    };

    xhrCliente.open("POST", formCliente.action, true);
    xhrCliente.send(formDataCliente);

    var xhrVehiculo = new XMLHttpRequest();

    xhrVehiculo.onreadystatechange = function() {
        if (xhrVehiculo.readyState == XMLHttpRequest.DONE) {
            if (xhrVehiculo.status == 200) {
                // Manejar la respuesta si es necesario
                alert("Vehículo agregado correctamente");
                formVehiculo.reset(); // Reiniciar campos del formulario
            } else {
                // Manejar errores si es necesario
                alert("Error al agregar vehículo");
            }
        }
    };

    xhrVehiculo.open("POST", formVehiculo.action, true);
    xhrVehiculo.send(formDataVehiculo);
}