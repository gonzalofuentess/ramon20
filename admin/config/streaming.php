<?php 

require '../static/modeloa.php';
$servidor = (new Consulta())->listaStreaming();

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Ajustes / Streaming</h5>
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
                            <h3 class="card-title">Servidor Icecast</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="frecuencia">Dirección Servidor</label>
                                                <input type="text" class="form-control" id="servidor" type="text" placeholder="Ingrese Dirección Servidor" value="<?php echo $servidor['servidor'];?>">
                                                <div class="text-danger">
                                                    <small id="serv"></small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion">Puerto</label>
                                                <input type="number" class="form-control" id="puerto"  placeholder="Ingrese Puerto" value="<?php echo $servidor['puerto'];?>">
                                                <div class="text-danger">
                                                    <small id="port"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="descripcion">Punto de Montaje</label>
                                                <input type="text" class="form-control" id="montaje" placeholder="Ingrese Usuario" value="<?php echo $servidor['montaje'];?>">
                                                <div class="text-danger">
                                                    <small id="mont"></small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="silencio">Contraseña</label>
                                                <input type="password" id="password" class="form-control"  placeholder="Ingrese Contraseña">
                                                <div class="text-danger">
                                                    <small id="pass"></small>
                                                </div>
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
                            <button type="submit" class="btn btn-success" onclick="server(document.getElementById('servidor').value,document.getElementById('puerto').value,document.getElementById('montaje').value,document.getElementById('password').value)">Guardar</button>
                            <span> <button type="submit" class="btn btn-danger" onclick="eliminar()" <?php if(!$servidor['servidor']){ echo 'disabled';}?>>Borrar</button></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<script>

function server(servidor, puerto, montaje, password) {
        var serv = $.trim(servidor);
        var port = $.trim(puerto);
        var mont = $.trim(montaje);
        var pass = $.trim(password);
        var ok = true;
        if (!serv) {
            $('#serv').html('Debe completar este campo');
            ok = false;
            var element = document.getElementById("servidor");
            element.classList.add("is-invalid");
        } else {
            var element = document.getElementById("servidor");
            element.classList.remove("is-invalid");
            $('#serv').html('');
        }
        if (port < 25  || port > 45003) {
            $('#port').html('Debe ingresar un puerto válido');
            ok = false;
            var element = document.getElementById("puerto");
            element.classList.add("is-invalid");
        } else {
            var element = document.getElementById("puerto");
            element.classList.remove("is-invalid");
            $('#port').html('');
        }
        if (!mont) {         
            $('#mont').html('Ingrese un punto de montaje válido /puntomontaje');
            ok = false;
            var element = document.getElementById("montaje");
            element.classList.add("is-invalid");
        } else {
            if(validaMontaje(mont)){
               var element = document.getElementById("montaje");
               element.classList.remove("is-invalid");
               $('#mont').html('');
            }else{
               $('#mont').html('Ingrese un punto de montaje válido /puntomontaje');
               ok = false;
               var element = document.getElementById("montaje");
               element.classList.add("is-invalid");
            }
        }
        if (!pass) {
            $('#pass').html('Debe completar este campo');
            ok = false;
            var element = document.getElementById("password");
            element.classList.add("is-invalid");
        } else {
            var element = document.getElementById("password");
            element.classList.remove("is-invalid");
            $('#pass').html('');
        }        
        if (ok) {
                guardadatos(serv, port, mont, pass);
        }
        
}
function validaMontaje(montaje) {
        return /\/([A-N]|[O-Z]|[a-n]|[o-z]|[0-9])/.test(montaje);
}

function guardadatos(servidor,puerto,montaje,password){
            $.ajax({
            url: "up_streaming.php",
            type: "POST",
            data: "servidor=" + servidor + "&puerto=" + puerto + "&montaje=" + montaje + "&password=" + password,
            success: function (resp) {
                alert(resp);
                //$('#resultado').html(resp)
                if (resp === "Datos Actualizados") {
                    location.reload();
                }

            }
        });
}

function eliminar() {  
      
            var respuesta = confirm("¿Desea Eliminar Datos y Bajar Servicio Streaming?");
            if (respuesta === true){
                ejecutar();   
            }
    }
 function ejecutar() {
        $.ajax({
            url: "del_streaming.php",
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