<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ramon</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="../vendor/plugins/fontawesome/css/all.min.css">

        <link rel="stylesheet" href="../vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

        <link rel="stylesheet" href="../vendor/css/adminlte.css">

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Ingrese Datos</p>

                    <form role="form" action="return false" onsubmit="return false">
                        <div class="input-group mb-3">
                            <input id="user" type="usuario" class="form-control" placeholder="Usuario" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="pass" type="password" class="form-control" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="resultado"></div>
                        <div class="row">    
                            <div class="col-6">
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block" onclick="Validar(document.getElementById('user').value, document.getElementById('pass').value);">Iniciar Sesión</button>
                            </div>        
                        </div>
                    </form>
                </div>

            </div>
        </div>


        <script src="../vendor/plugins/jquery/jquery.min.js"></script>
        <script src="../vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/ramon/login.js">
                                  
        </script>
    </body>
</html>
