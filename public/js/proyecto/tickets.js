$(document).ready(function(){
    $('#tablaTicketsLoad').load("proyecto/tablaTickets.php");
});

function crearTickets() {
    $.ajax({
        type: "POST",
        data: $('#frmCrearTickets').serialize(),
        url: "../procesos/proyecto/crearTickets.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (!isNaN(respuesta) && respuesta > 0) {  // Verificar si la respuesta es un número (ID)
                const nuevoIdTicket = respuesta;  // El ID del ticket creado

                $('#tablaTicketsLoad').load("proyecto/tablaTickets.php");

                // Limpiar el formulario y cerrar el modal si no se desea crear otro ticket
                if ($('#CheckCrearOtroTickets').is(':checked')) {                
                    $('#frmCrearTickets')[0].reset();
                } else {
                    $('#frmCrearTickets')[0].reset();
                    $('#modalCrearTickets').modal('hide');
                }

                // Mostrar mensaje con el ID del ticket recién creado
                Swal.fire(":D", `¡Ticket TKT-${nuevoIdTicket} creado con éxito!`, "success");
            } else {
                Swal.fire(":(", "Error al agregar el ticket: " + respuesta, "error");
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

function cambioEstatusTickets(idTickets, estatusTickets) {
    const estados = {
        1: "Creado",
        2: "En progreso",
        3: "Finalizado",
        4: "Cancelado",
        5: "Bloqueado"
    };

    $.ajax({
        type: "POST",
        data: {
            idTickets: idTickets,
            estatusTickets: estatusTickets
        },
        url: "../procesos/proyecto/extras/cambioEstatusTickets.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                const nuevoEstado = estados[estatusTickets] || "Estado desconocido"; // Obtiene el texto del estado
                Swal.fire(
                    ":D", 
                    `El TKT-${idTickets} fue cambiado de estado a "${nuevoEstado}"`, 
                    "success"
                ).then(() => {
                    location.reload(); // Recarga la página después de cerrar la alerta
                });
            } else {
                Swal.fire(":(", "Error al cambiar el estatus: " + respuesta, "error");
            }
        }
    });
}