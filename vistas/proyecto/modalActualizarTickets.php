<form id="frmActualizarTickets" method="POST" onsubmit="return actualizarTickets()">  
    <div class="modal fade" id="modalActualizarTickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idTickets" name="idTickets">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="nombreClienteu">Nombre</label>
                            <input type="text" class="form-control" id="nombreClienteu" name="nombreClienteu" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="celularu">Celular</label>
                            <input type="text" class="form-control" id="celularu" name="celularu" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="direccionu">Direccion</label>
                            <input type="text" class="form-control" id="direccionu" name="direccionu" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="zonau">Zona</label>
                            <select class="form-control" id="zonau" name="zonau" required>
                                <option value=""></option>
                                <option value="Bogota">Bogota</option>
                                <option value="Soacha">Soacha</option>
                                <option value="Coello">Coello</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="tipoActividadu">Tipo de Actividad</label>
                            <select class="form-control" id="tipoActividadu" name="tipoActividadu" required>
                                <option value=""></option>
                                <option value="Mantenimiento Fibra">Mantenimiento Fibra</option>
                                <option value="Mantenimiento Antena">Mantenimiento Antena</option>
                                <option value="Instalacion Fibra">Instalacion Fibra</option>
                                <option value="Instalacion Antena">Instalacion Antena</option>                               
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="fechau">Fecha</label>
                            <input type="date" class="form-control" id="fechau" name="fechau" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="horau">Hora</label>
                            <select class="form-control" id="horau" name="horau" required>
                                <option value="">Selecionar hora</option>
                                <option value="07:00">07:00 AM</option>
                                <option value="07:30">07:30 AM</option>
                                <option value="08:00">08:00 AM</option>
                                <option value="08:30">08:30 AM</option>
                                <option value="09:00">09:00 AM</option>
                                <option value="09:30">09:30 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="10:30">10:30 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="11:30">11:30 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="12:30">12:30 PM</option>
                                <option value="13:00">01:00 PM</option>
                                <option value="13:30">01:30 PM</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="14:30">02:30 PM</option>
                                <option value="15:00">03:00 PM</option>
                                <option value="15:30">03:30 PM</option>
                                <option value="16:00">04:00 PM</option>
                                <option value="16:30">04:30 PM</option>
                                <option value="17:00">05:00 PM</option>
                                <option value="17:30">05:30 PM</option>
                                <option value="18:00">06:00 PM</option>
                                <option value="18:30">06:30 PM</option>
                                <option value="19:00">07:00 PM</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tecnicou">Técnico:</label>
                                <select id="tecnicou" name="tecnicou" class="form-control" required>
                                <option value="" disabled selected>Seleccionar técnico</option>
                                    <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'soma_helpdesk');
                                    $getsql =  "SELECT usuarios.id_usuario, 
                                                persona.nombre, 
                                                persona.paterno,
                                                persona.materno 
                                                FROM t_usuarios AS usuarios 
                                                INNER JOIN t_persona AS persona ON usuarios.id_persona = persona.id_persona
                                                WHERE id_rol = 3 AND activo = 1"; 
                                    $resultado = mysqli_query($conn, $getsql);
                                    // Iterar sobre los resultados
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        $nombre = $row['nombre'];
                                        $paterno = $row['paterno'];
                                        $materno = $row['materno'];
                                        $nombreCompleto = $nombre . " " . $paterno . " " . $materno; // Nombre completo del técnico
                                    ?>
                                        <!-- Asigna el nombre completo al atributo "value" -->
                                        <option value="<?php echo htmlspecialchars($nombreCompleto, ENT_QUOTES, 'UTF-8'); ?>">
                                            <?php echo $nombreCompleto; ?>
                                        </option>
                                    <?php
                                    }
                                    // Cierra la conexión a la base de datos
                                    mysqli_close($conn);
                                    ?>
                               </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="auxiliaru">Auxiliar:</label>
                                <select id="auxiliaru" name="auxiliaru" class="form-control" required>
                                <option value="" disabled selected>Seleccionar técnico</option>
                                    <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'soma_helpdesk');
                                    $getsql =  "SELECT usuarios.id_usuario, 
                                                persona.nombre, 
                                                persona.paterno,
                                                persona.materno 
                                                FROM t_usuarios AS usuarios 
                                                INNER JOIN t_persona AS persona ON usuarios.id_persona = persona.id_persona
                                                WHERE id_rol = 4 AND activo = 1"; 
                                    $resultado = mysqli_query($conn, $getsql);
                                    // Iterar sobre los resultados
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        $nombre = $row['nombre'];
                                        $paterno = $row['paterno'];
                                        $materno = $row['materno'];
                                        $nombreCompleto = $nombre . " " . $paterno . " " . $materno; // Nombre completo del técnico
                                    ?>
                                        <!-- Asigna el nombre completo al atributo "value" -->
                                        <option value="<?php echo htmlspecialchars($nombreCompleto, ENT_QUOTES, 'UTF-8'); ?>">
                                            <?php echo $nombreCompleto; ?>
                                        </option>
                                    <?php
                                    }

                                    // Cierra la conexión a la base de datos
                                    mysqli_close($conn);
                                    ?>
                               </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="descripcionu">Descripcion</label>
                                <textarea name="descripcionu" id="descripcionu" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>                       
                        <div class="modal-footer">
                            <button class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>                        
                </div>
            </div>           
        </div>
    </div>
</form>