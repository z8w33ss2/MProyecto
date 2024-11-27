<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/View/layout.php';  // link que apunta a layout para poder llamar la funcion MostrarMenu()
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Controller/UsuarioController.php';  
?>


<!doctype html>
<html lang="en">

<?php
    ReferenciasCSS();
?>

<body class="page-wrapper">
    <!--  Body Wrapper -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">


        <?php
            MostrarMenu(); // funcion que replica el menu en todas las vistas
        ?>

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php
            MostrarHeader(); // funcion que replica el header en todas las vistas
        ?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="row">
                    <!--  Formulario para cambiar contraseña-->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Actualizar Contraseña</h5>
                            <div class="card">
                                <div class="card-body">

                                    <!--Mensaje en PHP que le indica al usuario por que no se pudo registrar-->
                                    <?php
                                    // si la variable post esta seteada con un mensaje 
                                    if(isset($_POST["txtMensaje"]))
                                    {
                                        // Clase de bootstrap alert
                                        echo '<div class="alert alert-info Centrado ">' . $_POST["txtMensaje"] . '</div>';
                                    }
                                ?>

                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Contraseña Actual</label>
                                            <input type="password" class="form-control" id="txtContrasennaActual" name="txtContrasennaActual">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nueva Contraseña</label>
                                            <input type="password" class="form-control" id="txtContrasennaNueva" name="txtContrasennaNueva">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirmar Contraseña</label>
                                            <input type="password" class="form-control" id="txtContrasennaConfirmar" name="txtContrasennaConfirmar">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Procesar"
                                            id="btnActualizarAcceso" name="btnActualizarAcceso">
                                        <!--  ID para javaScrip - NAME para PHP-->
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        ReferenciasJS();
    ?>
</body>

</html>