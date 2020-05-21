<?php $menu = 1; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Radio Monitoreo FM</title>
        <!-- Font Awesome Icons -->
        <link rel="icon" type="image/png" href="../../vendor/img/ramon2.ico">
        <link rel="stylesheet" href="../../vendor/plugins/fontawesome/css/all.min.css">
        <!-- IonIcons -->
        <link rel="stylesheet" href="../../vendor/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../vendor/css/adminlte.min.css">
        <link rel="stylesheet" type="text/css" href="../../vendor/dynameter/jquery.dynameter.css">
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="../main/" class="nav-link">Home</a>
                    </li>     
                </ul>
                <!-- notificaciones -->


            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php include '../menu/menu.php'; ?>
            <!-- /.control-sidebar -->
            <?php
            if ($submenu == 11){
                include './radio.php';
                }elseif ($submenu == 12){
                include './correo.php';
                }elseif ($submenu==13) {
                include './comando.php';
                }elseif($submenu==14){
                include './streaming.php';
            }
            ?>




            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2018-2020 <a href="#">Radio Monitoreo FM</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Versi&oacute;n</b> 2.0.
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->        
        <script src="../../vendor/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../../vendor/dynameter/jquery.dynameter.js"></script>

        <!-- Bootstrap -->
        <script src="../../vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE -->
        <script src="../../vendor/dist/js/adminlte.js"></script>

        <!-- OPTIONAL SCRIPTS -->

        <script src="../../vendor/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>   
        <script>
            $(function () {
                  $("input[data-bootstrap-switch]").each(function () {
                   $(this).bootstrapSwitch('state', $(this).prop('checked'));
                   });
            });
        </script> 
        <?php if ($submenu == 11) { ?>
            <script type="text/javascript">
                var $payloadMeter = null;
                $(function () {
                $payloadMeter = $('div#payloadMeterDiv').dynameter({
                label: 'Se&ntilde;al',
                        value: 0,
                        min: 0,
                        max: 70,
                        <?php if ($baja['estado'] == 1) { ?>
                        regions: {
                        0: 'error',
                        <?php echo $baja['valor'] + 1; ?>: 'normal'
                    }
                     <?php } ?>
                });
                });
                setInterval(function () {
                $.getJSON('senal.json', function (jd) {
                console.log(jd.senal);
                $payloadMeter.changeValue(jd.senal);
                })
                }, 1000);
            </script>
        <?php } ?>

    </body>
</html>