$(document).ready(function(){
    $('#tablaTicketsLoad').load("proyecto/tablaTickets.php");
});

function crearTickets(){

    $.ajax({
        type: "POST",
        data: $('frmCrearTickets').serialize(),
        url: "../procesos/proyecto/crearTickets.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1){
                $('#tablaTicketsLoad').load("proyecto/tablaTickets.php");
                $('frmCrearTickets')[0].reset();
                Swal.fire(":D","Agregado con Exito!","success");
            }else {
                Swal.fire(":(","Error al agregar" + respuesta,"error")
            }
        } 
    });
    
    return false;
}