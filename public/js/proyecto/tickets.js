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
    $("#idTickets").val(idTickets);
    console.log("ID Ticket cargado:", idTickets)
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
    var datos = $("#frmActualizarTickets").serialize();
    console.log(datos); // Verifica los datos enviados
    $.ajax({
        type:"POST",
        url:"../procesos/proyecto/actualizarTickets.php",
        data: datos,
        success:function(respuesta) {
            console.log(respuesta); // Verifica la respuesta del servidor
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaTicketsLoad').load("proyecto/tablaTickets.php");
                $('#modalActualizarTickets').modal('hide');
                $('#FrmDetallesTickets').load(location.href + " #FrmDetallesTickets"); // Recarga solo el formulario
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
                $('#FrmAgregarComentario').load(location.href + " #FrmAgregarComentario"); // Recarga solo el formulario
                $('#FrmAgregarComentario')[0].reset();
            } else {
                Swal.fire(":(", "Error al agregar: " + respuesta, "error");
            }
        }
    });
    return false; // Evitar la recarga de la página
}