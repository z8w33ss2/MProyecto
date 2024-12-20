<!--../ NOS DEVUELVE UNA CARPETA-->
<?php
        include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/View/layoutExterno.php';  // link que apunta a layout para poder llamar la funcion MostrarMenu()
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Controller/LoginController.php'; // vista llama al controlador
?>

<!doctype html>
<html lang="en">

<?php
    ReferenciasCSS();
?>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="home.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../images/logo-light.svg" alt="">
                                </a>
                                <p class="text-center">Recuperar el acceso</p>

                                <!--Formulario, debe de llevar un action"" para recargar la pantalla y un method="POST"
                                para realizar una petición al servidor-->
                                <form action="" method="POST">

                                    <div class="mb-3">
                                        <label class="form-label">Correo Electrónico</label>
                                        <!---->                                   
                                        <input type="email" class="form-control" id="txtCorreo" name="txtCorreo">
                                    </div>

                                    <!--Input de tipo submit-->
                                    <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4" value="Procesar"
                                        id=btnRecuperarAcceso name=btnRecuperarAcceso>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Ya tienes una cuenta?</p>
                                        <a class="text-primary fw-bold ms-2" href="InicioSesion.php">Inicia Sesión</a>
                                    </div>
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