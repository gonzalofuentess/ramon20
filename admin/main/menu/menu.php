<?php 
if (isset($_GET["menu"])) {   
    if(strcmp(($_GET["menu"]),"radio")==0){
    $valor = 1;
    $menu = 11;    
    }
    if(strcmp(($_GET["menu"]),"correo")==0){
      $valor = 1;
      $menu = 12;   
    }  
    if(strcmp(($_GET["menu"]),"comando")==0){
      $valor = 1; 
      $menu = 13; 
    }
    if(strcmp(($_GET["menu"]),"streaming")==0){
      $valor = 1; 
      $menu = 14;
    }
    if(strcmp(($_GET["menu"]),"ramona")==0){
      $valor = 1;
      $menu = 15;
    }
    if(strcmp(($_GET["menu"]),"alertas")==0){
      $valor = 2;
      $menu = 21;
    }
    if(strcmp(($_GET["menu"]),"programacion")==0){
      $valor = 2;
      $menu = 22;
    }
}else{
    $valor=0;
    $menu=0;
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <!-- <img src="../../vendor/img/logo-ramon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8"> -->
        <span class="brand-text font-weight-light">RAMON</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->  

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="../main/" <?php if($valor==0){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle"></i>
                        </p>
                    </a>         
                </li>   
                <li class="nav-item has-treeview">        
                     <li <?php if($valor==1){echo 'class="nav-item has-treeview menu-open"';}else{echo 'class="nav-item has-treeview"';}?>>            
                        <a href="#" <?php if($valor==1){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Ajustes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../main/index.php?menu=radio" <?php if($menu==11){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Radio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../main/index.php?menu=correo" <?php if($menu==12){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Correo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../main/index.php?menu=comando" <?php if($menu==13){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comando</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../main/index.php?menu=streaming" <?php if($menu==14){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Streaming</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../main/index.php?menu=ramona" <?php if($menu==15){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ramona</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li <?php if($valor==2){echo 'class="nav-item has-treeview menu-open"';}else{echo 'class="nav-item has-treeview"';}?>>
                    <a href="#" <?php if($valor==2){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                   <!-- <a href="#" class="nav-link"> -->
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Reportes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../main/index.php?menu=alertas" <?php if($menu==21){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alertas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../main/index.php?menu=programacion" <?php if($menu==22){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Programaci&oacute;n</p>
                            </a>
                        </li>                 
                    </ul>
                </li>       

                <li class="nav-header">SESI&Oacute;N</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>Cambiar Contraseña</p>
                    </a>
                </li>  
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar Sesión</p>
                    </a>
                </li>               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Online Store Visitors</h3>
                                <a href="javascript:void(0);">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">820</span>
                                    <span>Visitors Over Time</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 12.5%
                                    </span>
                                    <span class="text-muted">Since last week</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="visitors-chart" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> This Week
                                </span>

                                <span>
                                    <i class="fas fa-square text-gray"></i> Last Week
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->           
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Sales</h3>
                                <a href="javascript:void(0);">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">$18,230.00</span>
                                    <span>Sales Over Time</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 33.1%
                                    </span>
                                    <span class="text-muted">Since last month</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="sales-chart" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> This year
                                </span>

                                <span>
                                    <i class="fas fa-square text-gray"></i> Last year
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>