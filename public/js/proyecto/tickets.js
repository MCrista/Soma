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
                /*$('#tablaTicketsCollapseLoad').load("proyecto/tablaTicketsCollapse.php");*/
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

function obtenerDatosTickets(idTickets){
    $.ajax({
        type: "POST",
        data: "idTickets=" + idTickets,
        url: "../procesos/proyecto/obtenerDatosTickets.php",
        success:function(respuesta) {
            console.log(respuesta);
            respuesta = jQuery.parseJSON(respuesta);
            $('#idTickets').val(respuesta['idTickets']);
            $('#nombreClienteu').val(respuesta['nombreCliente']);
            $('#celularu').val(respuesta['celular']);
            $('#direccionu').val(respuesta['direccion']);
            $('#zonau').val(respuesta['zona']);
            $('#tipoActividadu').val(respuesta['tipoActividad']);
            $('#fechau').val(respuesta['fecha']);
            $('#horau').val(respuesta['hora']);
            $('#tecnicou').val(respuesta['tecnico']);
            $('#auxiliaru').val(respuesta['auxiliar']);
            $('#descripcionu').val(respuesta['descripcion']);
        },
        error: function(xhr, status, error) {
            console.log("Error al obtener datos:", error);
        }
    });
}

function actualizarTickets() {
    $.ajax({
        type:"POST",
        data:$('#frmActualizarTickets').serialize(),
        url:"../procesos/proyecto/actualizarTickets.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaTicketsLoad').load("proyecto/tablaTickets.php");
                $('#modalActualizarTickets').modal('hide');
                Swal.fire(":D","Actualizado con Exito!","success");

            }else {
                Swal.fire(":(","Error al actualizar" + respuesta,"error")
            }
        }
    });

    return false;
}


function agregarComentarioTickets() {
    $.ajax({
        type: "POST",
        data: $('#FrmAgregarComentario').serialize(),
        url: "../procesos/proyecto/agregarComentarioTickets.php",
        success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#FrmAgregarComentario')[0].reset();
                Swal.fire(":D", "Agregado con éxito!", "success");
            } else {
                Swal.fire(":(", "Error al agregar: " + respuesta, "error");
            }
        }
    });
    return false; // Evitar la recarga de la página
}