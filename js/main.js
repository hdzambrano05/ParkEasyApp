function enviarFormularios() {
    var formCliente = document.getElementById("form_cli");

    // Verificar si algún campo está vacío
    var inputs = formCliente.querySelectorAll('input[type="text"]');
    var isEmpty = false;
    inputs.forEach(function(input) {
        if (input.value.trim() === '') {
            isEmpty = true;
        }
    });

    if (isEmpty) {
        alert("Por favor completa todos los campos.");
        return;
    }

    var formDataCliente = new FormData(formCliente);

    var xhrCliente = new XMLHttpRequest();

    xhrCliente.onreadystatechange = function() {
        if (xhrCliente.readyState == XMLHttpRequest.DONE) {
            if (xhrCliente.status == 200) {
                var response = JSON.parse(xhrCliente.responseText);
                if (response.status == "success") {
                    alert(response.message);
                    formCliente.reset();
                } else {
                    alert(response.message);
                }
            } else {
                alert("Error al agregar cliente");
            }
        }
    };

    xhrCliente.open("POST", formCliente.action, true);
    xhrCliente.send(formDataCliente);

    // Borra los campos manualmente (opcional)
    document.getElementById("cedula").value = "";
    document.getElementById("name").value = "";
    document.getElementById("lastname").value = "";
    document.getElementById("phone").value = "";
    document.getElementById("email").value = "";
}
