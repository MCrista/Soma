<form id="frmActualizarTickets" method="POST" onsubmit="return actualizarTickets()">
    <div class="container-fluid mb-5" style = "min-height:calc(100vh - 135px);">
        <div class="card border-0 shadow my-1">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col">
                        <p class="mb-1">
                            <a href="Tickets.php?id=<?php echo $idTickets['id_tickets']; ?>">
                                <strong><?php echo 'TKT-' . str_pad($idTickets['id_tickets'], 5, '0', STR_PAD_LEFT); ?></strong>
                            </a>
                                <strong><?php echo $idTickets['tipo_actividad'] . ' ' . $idTickets['nombre_cliente']; ?></strong>
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button class="btn btn-gray btn-sm mb-2" 
                                style="color: gray;"
                                data-toggle="modal"     
                                data-target="#modalActualizarTickets"
                                onclick="obtenerDatosTickets(<?php echo $mostrar['id_Tickets'] ?>)"> Editar            
                        </button>
                        <button class="btn btn-gray btn-sm mb-2" 
                                style="color: gray;"
                                data-toggle="modal"     
                                data-target="#modalActualizarTickets"
                                onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)">Añadir Comentario            
                        </button>
                        <button class="btn btn-gray btn-sm mb-2" 
                                style="color: gray;"
                                data-toggle="modal"     
                                data-target="#modalActualizarTickets"
                                onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)">Asignar            
                        </button>
                        <button class="btn btn-gray btn-sm mb-2" 
                                style="color: gray;"
                                data-toggle="modal"     
                                data-target="#modalActualizarTickets"
                                onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)"> Clonar            
                        </button>
                        <button class="btn btn-gray btn-sm mb-2" 
                                style="color: gray;"
                                data-toggle="modal"     
                                data-target="#modalActualizarTickets"
                                onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)">Enviar a en progreso            
                        </button>
                        <button class="btn btn-gray btn-sm mb-2" 
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
                            <div class="col-5 col-md-5 col-lg-3 p-1">
                                <p class="mb-1"><?php echo $idTickets['nombre_cliente']; ?></p>
                                <p class="mb-1"><?php echo $idTickets['celular']; ?></p> 
                                <p class="mb-1"><?php echo $idTickets['direccion']; ?></p> 
                                <p class="mb-1"><?php echo $idTickets['zona']; ?></p> 
                                <p class="mb-1"><?php echo $idTickets['tipo_actividad']; ?></p>
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
                                        
                                        echo isset($estados[$idTickets['estado_tickets']]) 
                                            ? $estados[$idTickets['estado_tickets']] 
                                            : "Estado desconocido";
                                    ?>
                                </p>
                                <p class="mb-1">
                                    <?php 
                                        $estados = [
                                            1 => "Sin Resolver",
                                            2 => "Resuelto",
                                        ];
                                        
                                        echo isset($estados[$idTickets['resolucion']]) 
                                            ? $estados[$idTickets['resolucion']] 
                                            : "Estado desconocido";
                                    ?>
                                </p>
                                <p class="mb-1"><?php echo $idTickets['fecha']; ?></p>
                                <p class="mb-1"><?php echo $idTickets['hora']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-11">
                                <label" for="descripcion">Descripción: </label> 
                                <textarea name="descripcion" id="descripcion" class="form-control"><?php echo $idTickets['descripcion']; ?></textarea>
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
                                <label" for="descripcion">Comentarios </label>
                                <hr>
                                <button class="btn btn-gray btn-sm mb-2" 
                                        style="color: gray;"
                                        data-toggle="modal"     
                                        data-target="#modalActualizarTickets"
                                        onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)">Añadir Comentario            
                                </button>
                            </div>  
                        </div>
                    </div>
                    <div  class="col-3 pl-1 pt-1 pr-3 pb-1">
                        <p class="mb-1"><strong>Personas</strong></p>
                        <div class="row">                                         
                            <div class="col-12 col-md-12 col-lg-12">
                                <p class="mb-1">Tecnico: <?php echo $idTickets['nombre_cliente']; ?></p> 
                                <p class="mb-1">Auxiliar: <?php echo $idTickets['nombre_cliente']; ?></p> 
                                <p class="mb-1">Informador: <?php echo $idTickets['nombre_cliente']; ?></p> 
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>      
    </div>
</form>

