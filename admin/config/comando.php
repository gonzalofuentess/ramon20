<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Ajustes / Comando</h5>
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
                            <h3 class="card-title">Comando Alertas</h3>
                        </div>
                        <div class="form-group">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="frecuencia">Comando Curl</label>
                                    <textarea class="form-control" id="comando" rows="3"></textarea> 
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" onclick="guardar(document.getElementById('comando').value)">Guardar</button>
                            <span> <button type="submit" class="btn btn-info">Probar</button></span>
                            <span> <button type="submit" class="btn btn-danger">Borrar</button></span>
                        </div>
                    </div>                           
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    
    function eliminar() {  
      
            var respuesta = confirm("¿Desea Eliminar el Comando?");
            if (respuesta === true){
                ejecutar();   
            }
    }
    function ejecutar() {
        $.ajax({
            url: "del_comando.php",
            success: function (resp) {
                alert(resp);
                //$('#resultado').html(resp)
                if (resp === "Datos Actualizados") {
                    location.reload();
                }
            }
        });

    } 
    
    
    function probar(comando) {
        $.ajax({
            url: "pruebacomando.php",
            type: "POST",
            data: "comando=" + comando,
            success: function (resp) {
                alert(resp);
                //$('#resultado').html(resp)
                if (resp === "Comando Ejecutado") {
                    location.reload();
                }

            }
        });
    }

    function guardar(comando) {
        $.ajax({
            url: "up_comando.php",
            type: "POST",
            data: "comando=" + comando,
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