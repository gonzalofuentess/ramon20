<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Ajustes / Radio</h5>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Radio</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="frecuencia">Frecuencia</label>
                                    <input type="number" class="form-control" id="senal" type="number" min="88.1" max="107.9" step="0.1" placeholder="Ingrese Frecuencia">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" maxlength="16" placeholder="Ingrese Descripción">
                                </div>
                                <div class="form-group">
                                    <label for="silencio">Tiempo de Silencio</label>
                                    <input type="number" class="form-control" id="tiempo" min="5" max="900" placeholder="Ingrese Tiempo de Silencio">
                                </div> 
                                <div class="form-group">
                                    <label for="volumen">Volumen</label>
                                    <input type="number" min="1" max="5" class="form-control" id="volumen" placeholder="Ingrese Volumen" required>
                                </div>  
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- right column -->

                    <!-- /.card -->
                    <!-- general form elements disabled -->

                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content-header -->
    <!-- Main content -->




    <!-- /.content -->
</div>