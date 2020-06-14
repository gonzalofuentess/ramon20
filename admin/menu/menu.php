<?php
if ($menu == 1) {
    if (isset($_GET["menu"])) {
        if (strcmp(($_GET["menu"]), "correo") == 0) {
            $submenu = 12;
        }
        elseif (strcmp(($_GET["menu"]), "comando") == 0) {
            $submenu = 13;
        }
        elseif (strcmp(($_GET["menu"]), "streaming") == 0) {
            $submenu = 14;
        }
        elseif (strcmp(($_GET["menu"]), "ramona") == 0) {
            $submenu = 15;
        } 
        elseif (strcmp(($_GET["menu"]), "red") == 0) {
            $submenu = 16;
        }
        else {
            $submenu = 11;
        }
    }else{
         $submenu = 11;
    }
}
elseif ($menu == 2) {
    if (isset($_GET["menu"])) {
        if (strcmp(($_GET["menu"]), "alertas") == 0) {
            $submenu = 21;
        }
        if (strcmp(($_GET["menu"]), "programacion") == 0) {
            $submenu = 22;
        }
    }
}else{
    $submenu=0;
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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
                    <a href="../main/" <?php if ($menu == 0) {echo 'class="nav-link active"';} else {echo 'class="nav-link"';}?>>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle"></i>
                        </p>
                    </a>         
                </li>   
                <li class="nav-item has-treeview">        
                <li <?php if ($menu == 1) { echo 'class="nav-item has-treeview menu-open"'; } else { echo 'class="nav-item has-treeview"'; } ?>>            
                    <a href="#" <?php if ($menu == 1) { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?>>
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Ajustes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../config/" <?php if ($submenu == 11) { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; } ?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Radio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../config/index.php?menu=correo" <?php if ($submenu == 12) { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Correo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../config/index.php?menu=comando" <?php if ($submenu == 13) { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; } ?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comando</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../config/index.php?menu=streaming" <?php if ($submenu == 14) { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Streaming</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../config/index.php?menu=ramona" <?php if ($submenu == 15) { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ramona</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../config/index.php?menu=red" <?php if ($submenu == 16) { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; }?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Red</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li <?php if ($menu == 2) { echo 'class="nav-item has-treeview menu-open"'; } else { echo 'class="nav-item has-treeview"'; } ?>>
                    <a href="#" <?php if ($menu == 2) { echo 'class="nav-link active"'; } else { echo 'class="nav-link"'; } ?>>
                   
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Reportes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../main/index.php?menu=alertas" <?php if ($submenu == 21) { echo 'class="nav-link active"';} else {echo 'class="nav-link"';}?>>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alertas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../main/index.php?menu=programacion" <?php if ($submenu == 22) { echo 'class="nav-link active"';} else { echo 'class="nav-link"';}?>>
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
                    <a href="../cerrar-sesion.php" class="nav-link">
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

<!-- /.content-wrapper -->

<!-- Control Sidebar -->
