<?php 
    include "header.php"; 
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1|| $_SESSION['usuario']['rol']==3){
?>

<?php
// Conectar con la base de datos
include "../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

$mostrarid = $_GET['id']; // Obtener el ID del ticket desde la URL

// Consulta para obtener los detalles del ticket
$sql = "SELECT tickets.id_tickets AS idTickets, 
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
		usuarios.id_rol AS idRol,
        persona.nombre AS nombrePersona,
        persona.paterno AS paterno,
        persona.materno AS materno		
        FROM t_tickets AS tickets
		INNER JOIN
                t_usuarios AS usuarios
		INNER JOIN
                t_persona AS persona ON usuarios.id_persona = persona.id_persona
		WHERE id_tickets ='$mostrarid'";
$respuesta = mysqli_query($conexion, $sql);
$mostrar= mysqli_fetch_array($respuesta);
/*se utilizara para consultar el nombre de usuario con un id rol 3
$sql_tecnicos = "SELECT usuarios.id_usuario AS idUsuario, 
                        CONCAT(persona.nombre, ' ', persona.paterno, ' ', persona.materno) AS nombreCompleto
                 FROM t_usuarios AS usuarios
                 INNER JOIN t_persona AS persona ON usuarios.id_persona = persona.id_persona
                 WHERE usuarios.id_rol = 3";
$resultado_tecnicos = mysqli_query($conexion, $sql_tecnicos);
*/
?>

<div class="container-fluid" style = "min-height:calc(100vh - 40px);">
        <div class="card border-0 shadow my-0 pl-3 pt-1 pr-1 pb-1">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p class="mb-1">
                            <a href="Tickets.php?id=<?php echo $mostrarid['idTickets']; ?>">
                                <strong><?php echo 'TKT-' . str_pad($mostrar['idTickets'], 5, '0', STR_PAD_LEFT); ?></strong>
                            </a>
                                <strong><?php echo $mostrar['tipoActividad'] . ' ' . $mostrar['nombreCliente']; ?></strong>
                        </p>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col">
                        <button class="btn btn-gray mb-2" 
                                style="color: gray;"
                                data-toggle="modal"     
                                data-target="#modalActualizarTickets"
                                onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)"> Editar            
                        </button>
                        <button class="btn btn-gray mb-2" 
                                style="color: gray;"
                                data-toggle="modal"     
                                data-target="#modalActualizarUsuarios"
                                onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario'] ?>)">Añadir Comentario            
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
                                onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)"> Clonar            
                        </button>
                        <button class="btn btn-gray mb-2" 
                                style="color: gray;"
                                data-toggle="modal"     
                                data-target="#modalActualizarTickets"
                                onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)">Enviar a en progreso            
                        </button>
                        <button class="btn btn-gray mb-2" 
                                style="color: gray;"
                                data-toggle="modal"     
                                data-target="#modalActualizarTickets"
                                onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)">Enviar a Bloqueado           
                        </button>
                    </div>
                </div>
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
                                <p class="mb-1">
                                    <?php 
                                        $estados = [
                                            1 => "Creado",
                                            2 => "En progreso",
                                            3 => "Finalizado",
                                            4 => "Bloqueado"
                                        ];
                                        
                                        echo isset($estados[$mostrar['estadoTickets']]) 
                                            ? $estados[$mostrar['estadoTickets']] 
                                            : "Estado desconocido";
                                    ?>
                                </p>
                                <p class="mb-1">
                                    <?php 
                                        $estados = [
                                            1 => "Sin Resolver",
                                            2 => "Resuelto",
                                        ];
                                        
                                        echo isset($estados[$mostrar['resolucion']]) 
                                            ? $estados[$mostrar['resolucion']] 
                                            : "Estado desconocido";
                                    ?>
                                </p>
                                <p class="mb-1"><?php echo $mostrar['fecha']; ?></p>
                                <p class="mb-1"><?php echo $mostrar['hora']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-11">
                                <label" for="descripcion">Descripción: </label> 
                                <textarea name="descripcion" id="descripcion" class="form-control"><?php echo $mostrar['descripcion']; ?></textarea>
                            </div>  
                        </div>
                        <!-- 
                        <div class="row mb-3">
                            <div class="col-11">
                                <label for="formFileMultiple" class="form-label">Adjuntos</label>
                                <input class="form-control" type="file" id="formFileMultiple" multiple>
                            </div>  
                        </div>
                        -->
                        <div class="row mb-3">
                            <div class="col-11">
                                <div class="seccionComentarios">
                                    <p class="mb-1"><strong>Comentarios</strong></p>
                                    <form id="FrmAgregarComentario" method="POST" onsubmit="return agregarComentarioTickets()">
                                        <textarea id="comentario" name="comentario" class="form-control mb-2" placeholder="Ingresar comentario" required></textarea>
                                        <!--se ingresa el valor idTickets obtenido desde la url-->
                                        <input type="hidden" class="form-control" id="idTickets" name="idTickets" 
                                            value="<?php echo htmlspecialchars($mostrarid, ENT_QUOTES, 'UTF-8'); ?>" required>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </form>
                                    <div id="displayComentarios"></div><!--commentsDisplay-->
                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>      
    </div>

<?php
include "proyecto/modalActualizarTickets.php"; 
include "footer.php";
?>
<script src="../public/js/proyecto/tickets.js"></script>  
<?php

    } else {
        header("location:../index.html");
    }
?>
