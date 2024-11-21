$(document).ready(function(){
    $('#tablaTicketsLoad').load("proyecto/tablaTickets.php");
});

function crearTickets(){
    $.ajax({
        type: "POST",
        data: $('#frmCrearTickets').serialize(),
        url: "../procesos/proyecto/crearTickets.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1){
                $('#tablaTicketsLoad').load("proyecto/tablaTickets.php");
                if ($('#CheckCrearOtroTickets').is(':checked')) {                
                    $('#frmCrearTickets')[0].reset();
                } else {
                    // Si no está seleccionado, limpiamos el formulario y cerramos el modal
                    $('#frmCrearTickets')[0].reset();
                    $('#modalCrearTickets').modal('hide');
                }   
                Swal.fire(":D","Agregado con Exito!","success");
            }else {
                Swal.fire(":(","Error al agregar" + respuesta,"error")
            }
        } 
    });
    
    return false;
}