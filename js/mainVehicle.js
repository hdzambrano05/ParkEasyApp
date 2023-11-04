function enviarFormularios() {
    var formVehiculo = document.getElementById("form_veh");

    // Verificar si hay campos vacíos
    var inputs = formVehiculo.querySelectorAll('input');
    var camposVacios = false;

    inputs.forEach(function(input) {
        if (input.value.trim() === "") {
            camposVacios = true;
        }
    });

    if (camposVacios) {
        alert("Por favor, llena todos los campos");
        return;
    }

    var formDataVehiculo = new FormData(formVehiculo);

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
