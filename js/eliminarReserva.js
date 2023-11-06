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
