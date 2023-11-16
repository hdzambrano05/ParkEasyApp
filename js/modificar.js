
function validarEspacios() {
    var numEspacio = document.getElementsByName("num_espacio")[0].value;
    var espacios = document.getElementsByClassName("num-espacio");

    for (var i = 0; i < espacios.length; i++) {
        if (espacios[i].innerText == numEspacio) {
            alert("Error: El número de espacio ya existe. Por favor, elija otro.");
            return false;
        }
    }

    return true;
}

function mostrarAlerta() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                if (xhr.responseText === "Modificación exitosa") {
                    // Redirige a la página anterior (reserve.php)
                    window.location.href = '../php/reserve.php';
                }
            } else {
                alert("Error al realizar la modificación: " + xhr.responseText);
            }
        }
    };

    var formulario = document.querySelector("form");
    var formData = new FormData(formulario);
    xhr.open("POST", "actualizar_reserva.php", true);
    xhr.send(formData);
}

function validarYModificar() {
    if (validarEspacios()) {
        mostrarAlerta();
    }
}
