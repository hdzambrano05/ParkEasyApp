function pagarReserva(idReserva) {
    // Aquí debes implementar la lógica para calcular la diferencia de horas y el monto a pagar
    // Puedes hacer una solicitud AJAX para obtener el tipo de vehículo y realizar el cálculo en el servidor

    // Ejemplo de solicitud AJAX utilizando jQuery
    $.ajax({
        type: 'POST',
        url: 'calcular_tarifa.php', // Archivo PHP para calcular la tarifa
        data: { idReserva: idReserva },
        success: function(response) {
            alert('Monto a pagar: ' + response);
            // Aquí puedes agregar más lógica, como redireccionar a una página de pago, etc.
        },
        error: function(error) {
            console.error('Error al calcular la tarifa: ' + error);
        }
    });
}