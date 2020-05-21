<?php
require '../static/modeloa.php';
$consulta = new Consulta();
$radio = $consulta->Radio();
$baja = $consulta->Baja();
?>

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
                                    <input type="number" class="form-control" id="senal" type="number" min="88.1" max="107.9" step="0.1" placeholder="Ingrese Frecuencia" value="<?php echo $radio['frecuencia']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" maxlength="16" placeholder="Ingrese Descripción" value="<?php echo $radio['descripcion']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="silencio">Tiempo de Silencio</label>
                                    <input type="number" class="form-control" id="tiempo" min="5" max="900" placeholder="Ingrese Tiempo de Silencio" value="<?php echo $radio['silencio']; ?>">
                                </div> 
                                <div class="form-group">
                                    <label for="volumen">Volumen</label>
                                    <input type="number" min="1" max="5" class="form-control" id="volumen" placeholder="Ingrese Volumen" value="<?php echo $radio['volumen']; ?>">
                                </div>  
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="radio(document.getElementById('senal').value, document.getElementById('descripcion').value, document.getElementById('tiempo').value, document.getElementById('volumen').value)">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Señal Baja Crítica</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="bajacriticaltext">Señal Baja</label>
                                    <input type="number" class="form-control" id="bajacriticaltext" type="number" min="5" max="60" step="1" placeholder="Señal Baja" value="<?php echo $baja['valor'];?>">
                                </div>
                                <div class="form-group">                                      
                                    <input type="checkbox" id="switchbaja" name="switchbaja" <?php if($baja['estado']==1){ echo 'checked';} ?> data-bootstrap-switch>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="baja(document.getElementById('bajacriticaltext').value)">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- right column -->

                    <!-- /.card -->
                    <!-- general form elements disabled -->

                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Señal</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->                      
                    <div align="center">
                        <br>
                        <br>
                        <div  id="payloadMeterDiv"></div>
                        <br>
                        <br>
                    </div>        
                    </div>

                    <!-- right column -->

                    <!-- /.card -->
                    <!-- general form elements disabled -->

                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>

<script>
    document.getElementById('switchbaja').onchange = function () {
        document.getElementById('bajacriticaltext').disabled = !this.checked;
    };
</script>

<script>
    function radio(senal, descripcion, tiempo,volumen) {
        var descr = $.trim(descripcion);
        var ok = true;
        if (!descr) {
            $('#desc').html('<font color="red">Debe completar este campo</font>');
            ok = false;
        }
        if (tiempo < 5 || tiempo > 900 || !tiempo) {
            $('#sile').html('<font color="red">Debe ingresar un valor entre 5 y 900</font>');
            ok = false;
        }
        if (volumen < 1 || volumen > 5) {
            $('#volu').html('<font color="red">Debe ingresar un valor entre 1 y 5</font>');
            ok = false;
        }
        try {
            var res = senal * 10;
            if (res > 880 && res < 1080) {
                var anterior = <?php echo $radio['frecuencia']; ?>;
                if (parseFloat(anterior) !== parseFloat(senal)) {
                    var respuesta = confirm("Al modificar la frecuencia se eliminará el historial de registros asociados. ¿Desea Continuar?");
                    if (respuesta === true)
                        if (ok) {
                            ejecutar(senal, descripcion, tiempo,volumen);
                        }
                } else
                if (ok) {
                    ejecutar(senal, descripcion, tiempo,volumen);
                }
            } else {
                $('#freq').html('<font color="red">Debe Ingresar un valor entre 88.1 y 107.9</font>');
            }
        } catch (err) {
            $('#freq').html('<font color="red">Debe Ingresar un valor entre 88.1 y 107.9</font>');
        }
    }

    function ejecutar(senal, descripcion, tiempo,volumen) {
        $.ajax({
            url: "ejecuta.php",
            type: "POST",
            data: "senal=" + senal + "&descripcion=" + descripcion + "&tiempo=" + tiempo +"&volumen=" + volumen,
            success: function (resp) {
                alert(resp);
                //$('#resultado').html(resp)
                if (resp === "Datos Actualizados") {
                    location.reload();
                }
            }
        });
    }
    
     function baja(bajacriticaltext) {
       if (document.getElementById('switchbaja').checked) { 
                if (bajacriticaltext > 60 || bajacriticaltext < 5) {
                    $('#baj').html('<font color="red">Debe ingresar un valor entre 5 a 60</font>');
                } else {
                    actualizabaja(bajacriticaltext);
                }
             
        } else {
            actualizabaja(bajacriticaltext);
        }
       
    }
    function actualizabaja(bajacriticaltext) {
        $.ajax({
            url: "baja.php",
            type: "POST",
            data: "baja=" + document.getElementById('switchbaja').checked + "&bajacriticaltext=" + bajacriticaltext,
            success: function (resp) {
                alert(resp);
                //$('#resultado').html(resp)
                if (resp === "Datos Actualizados") {
                    location.reload();
                }
            }
        });
    }

</script>
