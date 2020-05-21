<?php $menu = 0; ?>
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
            include './dashboard/dashboard.php';
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

        <script src="../../vendor/dist/js/demo.js"></script>
        <script src="../../vendor/plugins/chart.js/Chart.min.js"></script> 
        <script src="../../vendor/dist/js/pages/dashboard3.js"></script>


    </body>
</html>