function validarPlaca() {
    var placa = document.getElementById('placa').value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.Cedula) {
                    document.getElementById('cedula').value = response.Cedula;
                } else {
                    alert("La placa no existe en la base de datos.");
                }
            }
        }
    };
    xhr.open('GET', '../php/validarPlaca.php?placa=' + placa, true);
    xhr.send();
}

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
                
                var response = xhrVehiculo.responseText;
                alert(response); 
                if (response.includes("Nuevo registro creado correctamente")) {
                    alert("Vehículo agregado correctamente");
                    formVehiculo.reset(); 
                } else {
                    alert("Error al agregar vehículo");
                }
            } else {
                // Manejar errores si es necesario
                alert("Error al agregar vehículo");
            }
        }
    };

    xhrVehiculo.open("POST", formVehiculo.action, true);
    xhrVehiculo.send(formDataVehiculo);
}

