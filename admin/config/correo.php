<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Ajustes / Correo</h5>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Servidor SMTP</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="frecuencia">Dirección Servidor</label>
                                                <input type="text" class="form-control" id="senal" type="text" placeholder="Ingrese Dirección Servidor">
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion">Puerto</label>
                                                <input type="number" class="form-control" id="descripcion"  placeholder="Ingrese Puerto">
                                            </div>
                                            <div class="form-group">
                                                <label for="silencio">Remitente</label>
                                                <input type="text" class="form-control" id="tiempo" placeholder="Remitente Correo">
                                            </div> 
                                            <div class="form-group">
                                                <br>
                                                <label for="volumen">STARTLS</label>
                                                <input type="checkbox" id="switchbaja" name="switchbaja" checked data-bootstrap-switch>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>¿Autentificación?</label>
                                                <select class="form-control">
                                                    <option>SI</option>
                                                    <option>NO</option>                      
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion">Usuario</label>
                                                <input type="text" class="form-control" id="descripcion" placeholder="Ingrese Usuario">
                                            </div>
                                            <div class="form-group">
                                                <label for="silencio">Contraseña</label>
                                                <input type="password" class="form-control"  placeholder="Ingrese Contraseña">
                                            </div> 
                                        </div>
                                    </div>
                                    <!-- /.form-group -->

                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <span> <button type="submit" class="btn btn-danger">Borrar</button></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>