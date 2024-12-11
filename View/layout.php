<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Controller/LoginController.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Controller/CarritoController.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // leer una variable de sesion VALIDAR 
    }

    if (isset($_SESSION["NombreUsuario"])) 
    {
        ConsultarResumenCarrito();
    }

    function MostrarMenu()
        {
            // el echo imprime cosas en pantalla
            echo '
            <aside class="left-sidebar">
                    <!-- Sidebar scroll-->
                    <div>
                        <div class="brand-logo d-flex align-items-center justify-content-between">
                            <a href="home.php" class="text-nowrap logo-img">
                                <img src="../images/logo-light.svg" alt="" />
                            </a>
                            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                                <i class="ti ti-x fs-8"></i>
                            </div>
                        </div>
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                            <ul id="sidebarnav">
                                <li class="nav-small-cap">
                                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                                    <span class="hide-menu">Home</span>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href=" ../Login/home.php" aria-expanded="false">
                                        <span>
                                            <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                                        </span>
                                        <span class="hide-menu">Inicio</span>
                                    </a>
                                </li>';

                                // muestra mantenimientos solo cuando me encuentro loggueado y el consecutivo de Rol sea de admnitrador
                                if (isset($_SESSION["NombreUsuario"]) && $_SESSION["ConsecutivoRolUsuario"] == "1") {
                                    echo '

                                <li class="nav-small-cap">
                                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                                    <span class="hide-menu">Mantenimientos</span>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href=" ../Usuario/consultarUsuarios.php" aria-expanded="false">
                                        <span>
                                            <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6">
                                            </iconify-icon>
                                        </span>
                                        <span class="hide-menu">Usuarios</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="../Producto/consultarProductos.php" aria-expanded="false">
                                        <span>
                                            <iconify-icon icon="solar:shop-minimalistic-bold" class="fs-6"></iconify-icon>
                                        </span>
                                        <span class="hide-menu">Productos</span>
                                    </a>
                                </li>';
                            }

                            if (isset($_SESSION["NombreUsuario"])) 
                            {
                                echo '
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href=" ../Carrito/consultarCarrito.php" aria-expanded="false">
                                            <span>
                                                <iconify-icon icon="solar:cart-large-2-bold" class="fs-6">
                                                </iconify-icon>
                                            </span>
                                            <span class="hide-menu">Mi Carrito</span>
                                        </a>
                                    </li>

                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href=" ../Carrito/consultarCompras.php" aria-expanded="false">
                                            <span>
                                                <iconify-icon icon="solar:cart-large-2-bold" class="fs-6">
                                                </iconify-icon>
                                            </span>
                                            <span class="hide-menu">Mis Compras</span>
                                        </a>
                                    </li>';
                            }

                            echo '
                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </aside>
            ';
        }
    function MostrarHeader()
        {
        // Condicional que evalua si se encuentra loggueado
        $usuario = "Invitado"; 
        if (isset($_SESSION["NombreUsuario"])) { // variable de sesion

            $usuario = $_SESSION["NombreUsuario"];
            $cantidad = $_SESSION["CantidadCarrito"];
            $total = $_SESSION["TotalCarrito"];
        }
            echo '            
                <header class="app-header">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <ul class="navbar-nav">
                            <li class="nav-item d-block d-xl-none">
                                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                    href="javascript:void(0)">                                
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                        </ul>

                        <i class="fa fa-tags" style="margin-right:10px;"></i>' . $cantidad . '
                        <i class="fa fa-credit-card" style="margin-left:10px; margin-right:10px;" ></i>¢ ' . number_format($total,2) . '

                        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end"> 
                                ' . $usuario . '
                                <li class="nav-item dropdown">

                                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="../images/user-1.jpg" alt="" width="35" height="35"
                                            class="rounded-circle">

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                        aria-labelledby="drop2">
                                        <div class="message-body">';

                                            if (isset($_SESSION["NombreUsuario"])) {
                                                // botones de tipo submit necesitan un formulario un id y un name para funcionar
                                                // muestra perfil, tareas y usuario solo cuando me encuentro loggueado
                                                echo '
                                                    <a href="../Usuario/consultarPerfil.php"
                                                        class="d-flex align-items-center gap-2 dropdown-item">
                                                        <i class="ti ti-user fs-6"></i>
                                                        <p class="mb-0 fs-3">Mi Perfil</p>
                                                    </a>
                                                    <a href="../Usuario/cambiarAcceso.php"
                                                        class="d-flex align-items-center gap-2 dropdown-item">
                                                        <i class="ti ti-list-check fs-6"></i>
                                                        <p class="mb-0 fs-3">Seguridad</p>
                                                    </a>
                                                    <form action="" method="POST"> 
                                                        <button type="submit" style="width:150px" id="btnCerrarSesion" name="btnCerrarSesion"
                                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Cerrar Sesión</button>
                                                    </form>';    
                                            }else{
                                                echo ' 
                                                    <a href=" inicioSesion.php" style="width:150px"
                                                        class="btn btn-outline-primary mx-3 mt-2 d-block">Iniciar Sesión</a>';
                                            }
                                            echo'
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
            ';
        }

    function ReferenciasCSS()
        {
        echo '
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Sistema Web Miércoles Noche</title>
                <link rel="shortcut icon" type="image/png" href="../images/seodashlogo.png" />
                <link rel="stylesheet" href="../css/styles.min.css" />
                <!--datatable-->
                <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
                <!--Icons font-awesome 4.7 free-->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" />
            </head>';
                
        }

    function ReferenciasJS()
        {
        echo'
            <script src="../js/jquery.min.js"></script>
            <script src="../js/bootstrap.bundle.min.js"></script>
            <script src="../js/simplebar.js"></script>
            <script src="../js/sidebarmenu.js"></script>
            <script src="../js/app.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
            <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
            <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js "></script>
        ';
        }

?>