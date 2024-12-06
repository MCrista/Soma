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
                            <input type="time" class="form-control" id="horau" name="horau" required>
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