<?php

function MostrarMenu()
{
    // el echo imprime cosas en pantalla
    echo '
    <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="home.php" class="text-nowrap logo-img">
                        <img src="images/logo-light.svg" alt="" />
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
                            <a class="sidebar-link" href="./index.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Mantenimientos</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="consultaUsuarios.php" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6">
                                    </iconify-icon>
                                </span>
                                <span class="hide-menu">Usuarios</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Alerts</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
    ';
}

?>