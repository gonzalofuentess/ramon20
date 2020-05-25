<?php
require_once '../static/modeloa.php';

$consulta = (new Consulta())->Servidor();
$destinatario = (new Consulta())->listarDestinatarios();

#foreach ($destinatario as $key => $objeto) {
#    print_r($objeto['id']);
#    print_r($objeto['correo']);
#}
?>

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
                                                <label for="servidor">Dirección Servidor</label>
                                                <input type="text" class="form-control" id="servidor" type="text" placeholder="Ingrese Dirección Servidor" value="<?php echo $consulta['servidor']; ?>">
                                                <div class="text-danger">
                                                    <small id="serv"></small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="puerto">Puerto</label>
                                                <input type="number" class="form-control" id="puerto"  placeholder="Ingrese Puerto" value="<?php echo $consulta['puerto']; ?>">
                                                <div class="text-danger">
                                                    <small id="port"></small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="remitente">Remitente</label>
                                                <input type="text" class="form-control" id="remitente" placeholder="Remitente Correo" value="<?php echo $consulta['remitente']; ?>">
                                                <div class="text-danger">
                                                    <small id="rem"></small>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <br>
                                                <label for="switchtls">STARTLS</label>
                                                <input type="checkbox" id="switchtls" name="switchtls" <?php if ($consulta['tls'] == 1) echo 'checked'; ?> data-bootstrap-switch>
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
                                                <select class="form-control" onchange="autentica.call(this, event)" id="autenticacion">
                                                    <option>SI</option>
                                                    <option <?php if ($consulta['autentificacion'] == 0) echo 'selected'; ?>>NO</option>                      
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="usuario">Usuario</label>
                                                <input type="text" class="form-control" id="usuario" placeholder="Ingrese Usuario" value="<?php echo $consulta['usuario']; ?>" <?php if ($consulta['autentificacion'] == 0) echo 'disabled'; ?>>
                                                <div class="text-danger">
                                                    <small id="user"></small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="contraseña">Contraseña</label>
                                                <input type="password" class="form-control" id="password" placeholder="Ingrese Contraseña" <?php if ($consulta['autentificacion'] == 0) echo 'disabled'; ?>>
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
                            <button type="submit" class="btn btn-success" onclick="server(document.getElementById('servidor').value, document.getElementById('puerto').value, document.getElementById('remitente').value, document.getElementById('usuario').value, document.getElementById('password').value)">Guardar</button>
                            <span> <button type="submit" class="btn btn-danger" onclick="eliminar()" <?php if ($consulta['servidor'] == NULL || $destinatario) echo 'disabled'; ?>>Borrar</button></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Destinatarios Alertas</h3>
                        </div>
                        <!-- /.card-header -->


                        <div class="form-group">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="destinatario">Ingrese Correo:</label>
                                    <input type="text" class="form-control" id="destinatario" type="text" placeholder="Ingrese Destinatario">
                                    <div class="text-danger">
                                        <small id="dest"></small>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" onclick="destinatario(document.getElementById('destinatario').value)" <?php if ($consulta['servidor'] == NULL) echo 'disabled'; ?>>Agregar</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Destinatarios Alertas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="form-group">
                                <div class="card-body">                                            
                                    <div class="form-group">
                                        <label for="destinatarios">Destinatarios Actuales:</label>
                                          <?php if (!$destinatario){  ?>
                                              <h2>Sin Destinatarios</h2> 
                                          <?php }else{ ?>
                                        <table class="table table-bordered">
                                            <thead>                  
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Dirección</th>
                                                    <th style="width: 110px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $var = 1;                                                        
                                                        foreach ($destinatario as $key => $objeto){ ?>
                                                <tr>
                                                    <td><?php echo $var; ?></td>
                                                    <td><?php echo $objeto['correo']; ?></td>
                                                    <td><i class="btn btn-danger btn-sm" onclick="elimina(<?php echo $objeto['id']; ?>)"><i class="fas fa-trash"></i> Eliminar</i></td>
                                                </tr>
                                                <?php $var++;}?>
                                            </tbody>
                                        </table>
                                          <?php     }        ?>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script>
    function autentica(event) {

        valor = this.options[this.selectedIndex].text;

        if (valor === "NO") {

            document.getElementById("usuario").disabled = true;
            document.getElementById("password").disabled = true;
            document.getElementById("usuario").value = "";
            document.getElementById("password").value = "";
            var element = document.getElementById("usuario");
            element.classList.remove("is-invalid");
            var element = document.getElementById("password");
            element.classList.remove("is-invalid");
            $('#user').html('');
            $('#pass').html('');

        } else {
            document.getElementById("usuario").disabled = false;
            document.getElementById("password").disabled = false;

        }
        //alert(this.options[this.selectedIndex].text);

    }
</script>
<script>
    function server(servidor, puerto, remitente, correousuario, correopassword) {
        var serv = $.trim(servidor);
        var e = document.getElementById("autenticacion");
        var autenticacion = e.options[e.selectedIndex].text;
        var ok = true;
        var oka = true;
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
        if (puerto != 25 && puerto != 587 && puerto != 465) {
            $('#port').html('Debe ingresar un puerto válido');
            ok = false;
            var element = document.getElementById("puerto");
            element.classList.add("is-invalid");
        } else {
            var element = document.getElementById("puerto");
            element.classList.remove("is-invalid");
            $('#port').html('');
        }
        if (!validaMail(remitente)) {
            $('#rem').html('Ingrese un correo válido');
            ok = false;
            var element = document.getElementById("remitente");
            element.classList.add("is-invalid");
        } else {
            var element = document.getElementById("remitente");
            element.classList.remove("is-invalid");
            $('#rem').html('');
        }
        if (autenticacion === 'NO' && ok) {
            ejecutaserver(serv, puerto, remitente, correousuario, correopassword, autenticacion);
        }
        if (autenticacion === 'SI') {
            var nuser = $.trim(correousuario);
            var npass = $.trim(correopassword);
            if (!nuser) {
                $('#user').html('Debe completar este campo');
                oka = false;
                var element = document.getElementById("usuario");
                element.classList.add("is-invalid");
            }
            if (!npass) {
                $('#pass').html('Debe completar este campo');
                oka = false;
                var element = document.getElementById("password");
                element.classList.add("is-invalid");
            }
            if (ok && oka) {
                ejecutaserver(serv, puerto, remitente, nuser, npass, autenticacion);
            }
        }
    }

    function validaMail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function ejecutaserver(servidor, puerto, remitente, correousuario, correopassword, autenticacion) {
        //alert('ALGO');
        $.ajax({
            url: "up_server.php",
            type: "POST",
            data: "servidor=" + servidor + "&puerto=" + puerto + "&remitente=" + remitente + "&switchtls=" + document.getElementById('switchtls').checked + "&autenticacion=" + autenticacion + "&correousuario=" + correousuario + "&correopassword=" + correopassword,
            success: function (resp) {
                alert(resp);
                if (resp === "Datos Actualizados") {
                    location.reload();
                }
            }
        });
    }
    function eliminar() {
        var respuesta = confirm("¿Desea Eliminar los Datos?");
        if (respuesta === true) {
            ejecutar();
        }
    }
    function ejecutar() {
        $.ajax({
            url: "del_servidor.php",
            success: function (resp) {
                alert(resp);
                //$('#resultado').html(resp)
                if (resp === "Datos Actualizados") {
                    location.reload();
                }
            }
        });

    }
    function destinatario(correo) {
        if (!validaMail(correo)) {
            $('#dest').html('Ingrese un correo válido');
            var element = document.getElementById("destinatario");
            element.classList.add("is-invalid");
        } else {
            var element = document.getElementById("destinatario");
            element.classList.remove("is-invalid");
            $('#dest').html('');
            $.ajax({
                url: "destinatario.php",
                type: "POST",
                data: "correo=" + correo,
                success: function (resp) {
                    alert(resp);
                    if (resp === "Datos Actualizados") {
                        location.reload();
                    }
                }
            });
        }
    }

    function elimina(destinatario) {
        alert(destinatario);
        $.ajax({
            url: "del_destinatario.php",
            type: "POST",
            data: "iddestinatario=" + destinatario,
            success: function (resp) {
                alert(resp);
                //$('#resultado').html(resp)
                if (resp === "Datos Actualizados") {
                    location.reload();
                }
            }
        });
    }
    function prueba(id){
        alert(id);
    }
</script>