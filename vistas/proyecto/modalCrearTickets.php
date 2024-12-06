<form id="frmCrearTickets" method="POST" onsubmit="return crearTickets()">  
    <div class="modal fade" id="modalCrearTickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Tickets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="nombreCliente">Nombre</label>
                            <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="zona">Zona</label>
                            <select class="form-control" id="zona" name="zona" required>
                                <option value=""></option>
                                <option value="Bogota">Bogota</option>
                                <option value="Soacha">Soacha</option>
                                <option value="Coello">Coello</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="tipoActividad">Tipo de Actividad</label>
                            <select class="form-control" id="tipoActividad" name="tipoActividad" required>
                                <option value=""></option>
                                <option value="Mantenimiento Fibra">Mantenimiento Fibra</option>
                                <option value="Mantenimiento Antena">Mantenimiento Antena</option>
                                <option value="Instalacion Fibra">Instalacion Fibra</option>
                                <option value="Instalacion Antena">Instalacion Antena</option>                               
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="hora">Hora</label>
                            <input type="time" class="form-control" id="hora" name="hora" required>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tecnico">Técnico:</label>
                                <select id="tecnico" name="tecnico" class="form-control">
                                    <option value=""></option>
                                    <option value="Carlos Andres lopez">Carlos Andres lopez</option>
                                    <option value="Marcos Rojas Mendez">Marcos Rojas Mendez</option>
                                    <option value="Oscar Murial Toro">Oscar Murial Toro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="auxiliar">Auxiliar</label>
                            <select id="auxiliar" name="auxiliar" class="form-control">
                                <option value=""></option>
                                <option value="Sofía Martínez López">Sofía Martínez López</option>
                                <option value="Carlos Fernández García">Carlos Fernández García</option>
                                <option value="Ana Gómez Rodríguez">Oscar Murial Toro</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="descripcion">Descripcion</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>
                        
                        <div class="modal-footer">
                            <div class="mb-0 form-check">
                                <input type="checkbox" class="form-check-input" id="CheckCrearOtroTickets">
                                <label class="form-check-label" for="CheckCrearOtroTickets">Crear Otro Tickets</label>
                            </div>
                            <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
                            <button class="btn btn-primary">Agregar</button>
                        </div>
                    </div>                        
                </div>
            </div>           
        </div>
    </div>
</form>