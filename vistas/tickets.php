<?php 
    include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1|| $_SESSION['usuario']['rol']==3
    || $_SESSION['usuario']['rol']==4){
        $idUsuario = $_SESSION['usuario']['id'];
?>

<?php
// Conectar con la base de datos
include "../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

$mostrarid = intval($_GET['id']); // Obtener el ID del ticket desde la URL

$sql_id = "SELECT COUNT(*) AS total FROM t_tickets WHERE id_tickets = ?";
$stmt = $conexion->prepare($sql_id);
$stmt->bind_param("i", $mostrarid);
$stmt->execute();
$resultado = $stmt->get_result();
$fila = $resultado->fetch_assoc();
$existe = $fila['total'] ;

if (!$existe) {
    echo "<script>
        alert('TICKET NO EXISTE.');
        window.location.href = 'reporteTickets.php';
    </script>";
    exit;
}

// Consulta para obtener los detalles del ticket
$sql_datos_tickets = "SELECT tickets.id_tickets AS idTickets, 
		tickets.nombre_cliente AS nombreCliente, 
		tickets.celular, 
		tickets.direccion, 
		tickets.zona, 
        tickets.tipo_actividad AS tipoActividad, 
		tickets.fecha, 
		tickets.hora, 
		tickets.tecnico,
		tickets.auxiliar, 
		tickets.descripcion, 
        tickets.estado_tickets AS estadoTickets, 
		tickets.resolucion,
        tickets.fecha_creacion AS fechaCreacion,
        usuarios.id_rol AS idRol,
        CONCAT(persona.nombre, ' ', persona.paterno, ' ', persona.materno) AS nombreCompletou		
        FROM t_tickets AS tickets
		INNER JOIN
                t_usuarios AS usuarios ON tickets.id_usuario = usuarios.id_usuario
		INNER JOIN
                t_persona AS persona ON usuarios.id_persona = persona.id_persona
		WHERE id_tickets ='$mostrarid'";
$respuesta = mysqli_query($conexion, $sql_datos_tickets);
$mostrar= mysqli_fetch_array($respuesta);

//consulta para comentarios
$sql_comentarios = "SELECT comentarios.comentario, 
                           comentarios.fecha_creacion, 
                           CONCAT(persona.nombre, ' ', persona.paterno, ' ', persona.materno) AS nombreCompleto 
                    FROM t_comentarios AS comentarios
                    INNER JOIN t_usuarios AS usuarios ON comentarios.id_usuario = usuarios.id_usuario
                    INNER JOIN t_persona AS persona ON usuarios.id_persona = persona.id_persona
                    WHERE comentarios.id_tickets = $mostrarid
                    ORDER BY comentarios.fecha_creacion DESC";
$respuesta = mysqli_query($conexion, $sql_comentarios);

?>

<div class="container-fluid" style = "min-height:calc(100vh - 40px);">
        <div class="card border-0 shadow my-0 pl-3 pt-1 pr-1 pb-1">
            <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="mb-1">
                                <a href="Tickets.php?id=<?php echo $mostrar['idTickets']; ?>">
                                    <strong><?php echo 'TKT-' . $mostrar['idTickets']; ?></strong>
                                </a>
                                <strong><?php echo ' - ' . $mostrar['tipoActividad'] . ' - ' . $mostrar['nombreCliente']; ?></strong>
                            </p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <?php if ($_SESSION['usuario']['rol'] == 1): ?>
                                <button class="btn btn-gray mb-2" 
                                        style="color: gray;"
                                        data-toggle="modal"     
                                        data-target="#modalActualizarTickets"
                                        onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)"> 
                                    Editar            
                                </button>
                            <?php endif; ?>
                            <button class="btn btn-gray mb-2" 
                                    style="color: gray;"
                                    data-toggle="modal"     
                                    data-target="#modalActualizarUsuarios"
                                    onclick="obtenerDatosTickets(<?php echo $mostrar['idUsuario'] ?>)">Añadir Comentario            
                            </button>
                            <button class="btn btn-gray mb-2" 
                                    style="color: gray;"
                                    data-toggle="modal"     
                                    data-target="#modalActualizarTickets"
                                    onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)">Asignar            
                            </button>
                            <button class="btn btn-gray mb-2" 
                                    style="color: gray;"
                                    data-toggle="modal"     
                                    data-target="#modalActualizarTickets"
                                    onclick="obtenerDatosTickets(<?php echo $mostrarid['idTickets'] ?>)"> Clonar            
                            </button>
                            <?php 
                                if ($_SESSION['usuario']['rol'] == 3 || $_SESSION['usuario']['rol'] == 4) {
                                    if ($mostrar['estadoTickets'] == 1) { // Creado
                                    ?>
                                        <button class="btn btn-info mb-2"
                                                onclick="cambioEstatusTickets(<?php echo $mostrar['idTickets'] ?>, 2)">
                                            Enviar a en Progreso
                                        </button>
                                        <button class="btn btn-gray mb-2" style="color: gray;"
                                                onclick="cambioEstatusTickets(<?php echo $mostrar['idTickets']; ?>, 4)">
                                            Cancelar
                                        </button>
                                    <?php 
                                    } elseif ($mostrar['estadoTickets'] == 2) { // En Progreso
                                    ?>
                                        <button class="btn btn-info mb-2"
                                                onclick="cambioEstatusTickets(<?php echo $mostrar['idTickets'] ?>, 3)">
                                            Finalizar
                                        </button>
                                        <button class="btn btn-gray mb-2" style="color: gray;"
                                                onclick="cambioEstatusTickets(<?php echo $mostrar['idTickets'] ?>, 4)">
                                            Cancelar
                                        </button>
                                        <button class="btn btn-gray mb-2" style="color: gray;"
                                                onclick="cambioEstatusTickets(<?php echo $mostrar['idTickets'] ?>, 5)">
                                            Bloquear
                                        </button>
                                    <?php 
                                    } elseif ($mostrar['estadoTickets'] == 5) { // Finalizado
                                    ?>
                                        <button class="btn btn-info mb-2"
                                                onclick="cambioEstatusTickets(<?php echo $mostrar['idTickets'] ?>, 2)">
                                            Desbloquear
                                        </button>
                                        <button class="btn btn-gray mb-2" style="color: gray;"
                                                onclick="cambioEstatusTickets(<?php echo $mostrar['idTickets'] ?>, 4)">
                                            Cancelar
                                        </button>
                                    <?php 
                                    }
                                }
                            ?>                                          
                        </div>
                    </div>
                <form id="FrmDetallesTickets" method="POST" onsubmit="return actualizarTickets()">
                    <div class="row">
                        <div class="col-9 col-md-9 col-lg-8">
                            <p class="mb-1"><strong>Detalles</strong></p>
                            <div class="row">
                                <div class="col-3 col-md-3 col-lg-2 pl-3 pt-1 pr-1 pb-1">
                                    <p class="mb-1" >Nombre Cliente:</p>
                                    <p class="mb-1">Celular:</p> 
                                    <p class="mb-1">Direccion:</p> 
                                    <p class="mb-1">Zona:</p> 
                                    <p class="mb-1">Tipo de Actividad:</p>
                                </div>
                                <div class="col-4 col-md-5 col-lg-3 p-1">
                                    <p class="mb-1"><?php echo $mostrar['nombreCliente']; ?></p>
                                    <p class="mb-1"><?php echo $mostrar['celular']; ?></p> 
                                    <p class="mb-1"><?php echo $mostrar['direccion']; ?></p> 
                                    <p class="mb-1"><?php echo $mostrar['zona']; ?></p> 
                                    <p class="mb-1"><?php echo $mostrar['tipoActividad']; ?></p>
                                </div>
                                <div class="col-2 col-md-2 col-lg-1 p-1" >
                                    <p class="mb-1" >Estado:</p> 
                                    <p class="mb-1">Resolucion:</p> 
                                    <p class="mb-1">Fecha:</p> 
                                    <p class="mb-1">Hora:</p>
                                </div>
                                <div class="col-2 col-md-2 col-lg-2 p-1" >
                                    <p class="mb-1" style="font-weight: bold;">
                                        <?php 
                                            $estados = [
                                                1 => ["Creado", "color: gray;"],
                                                2 => ["En progreso", "color: blue;"],
                                                3 => ["Finalizado", "color: green;"],
                                                4 => ["Cancelado", "color: red;"],
                                                5 => ["Bloqueado", "color: orange;"]
                                            ];
                                            
                                            if (isset($estados[$mostrar['estadoTickets']])) {
                                                $estado = $estados[$mostrar['estadoTickets']];
                                                echo '<span style="' . $estado[1] . '">' . $estado[0] . '</span>';
                                            } else {
                                                echo '<span style="color: black;">Estado desconocido</span>';
                                            }
                                        ?>
                                    </p>
                                    <p class="mb-1">
                                        <?php 
                                            $resolucion = [
                                                1 => "Sin Resolver",
                                                2 => "Resuelto",
                                            ];
                                            
                                            echo isset($resolucion[$mostrar['resolucion']]) 
                                                ? $resolucion[$mostrar['resolucion']] 
                                                : "Estado desconocido";
                                        ?>
                                    </p>
                                    <p class="mb-1"><?php echo $mostrar['fecha']; ?></p>
                                    <p class="mb-1"><?php echo $mostrar['hora']; ?></p>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-11">
                                    <label for="descripcion">Descripción: </label>
                                    <textarea name="descripcion" id="descripcion" class="form-control" readonly><?php echo $mostrar['descripcion']; ?></textarea>
                                </div>  
                            </div>                            
                        </div>
                        <div  class="col-3 pl-1 pt-1 pr-3 pb-1">
                            <p class="mb-1"><strong>Personas</strong></p>
                            <div class="row">                                         
                                <div class="col-12 col-md-12 col-lg-12">
                                <!-- 
                                <div class="form-group">
                                    <label for="tecnico">Asignar Técnico:</label>
                                    <select id="tecnico" name="tecnico" class="form-control">
                                        <option value="">Seleccione un técnico</option>
                                        <?php 
                                        while ($tecnico = mysqli_fetch_array($resultado_tecnicos)) {
                                            echo "<option value='{$tecnico['idUsuario']}'>{$tecnico['nombreCompleto']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                -->
                                    <p class="mb-1">Tecnico: <?php echo $mostrar['tecnico']; ?></p> 
                                    <p class="mb-1">Auxiliar: <?php echo $mostrar['auxiliar']; ?></p> 
                                    <p class="mb-1">Informador: <?php echo $mostrar['nombreCompletou']; ?></p> 
                                </div>
                            </div>
                            <p class="mb-1"><strong>Fechas</strong></p>
                            <div class="row">                                         
                                <div class="col-12 col-md-12 col-lg-12">
                                    <p class="mb-1">Creación: <?php echo $mostrar['fechaCreacion']; ?></p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>                      
                <form id="FrmAgregarComentario" method="POST" onsubmit="return agregarComentarioTickets()">
                    <div class="row mb-0">
                        <div class="col-11 p-0">
                            <div class="col-8">
                                <div class="seccionComentarios">
                                    <p class="mb-1"><strong>Comentarios</strong></p>                           
                                    <!--se ingresa el valor idTickets obtenido desde la url-->
                                    <input type="hidden" class="form-control" id="idTicketsu" name="idTicketsu"  
                                            value="<?php echo htmlspecialchars($mostrarid, ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" class="form-control" id="idUsuariou" name="idUsuariou" 
                                            value="<?php echo htmlspecialchars($_SESSION['usuario']['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <textarea id="comentario" name="comentario" class="form-control mb-2" placeholder="Ingresar comentario" required></textarea>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mb-3">Enviar</button>
                                    </div>
                                    <hr>
                                    <div id="displayComentarios">
                                        <?php  while ($mostrar_comentarios= mysqli_fetch_array($respuesta)) { ?>
                                            <div class="comentario">
                                                <b><?php echo ($mostrar_comentarios['nombreCompleto']); ?></b> (<?php echo ($mostrar_comentarios['fecha_creacion']); ?>) dijo:
                                                <p><?php echo htmlspecialchars($mostrar_comentarios['comentario']); ?></p>
                                                <hr>
                                            </div>
                                        <?php } ?>
                                    </div>                            
                                </div>
                            </div>
                        </div> 
                       <div class="col-3"></div>                                    
                    </div>
                </form>


            </div>
        </div>      
    </div>

<?php
    include "proyecto/modalActualizarTickets.php"; 
    include "footer.php";
?>
<?php

    } else {
        header("location:../index.html");
    }
?>
