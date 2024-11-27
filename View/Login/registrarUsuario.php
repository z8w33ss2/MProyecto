<!--../ NOS DEVUELVE UNA CARPETA-->
<?php
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
                                <p class="text-center">Registro de usuarios</p>
                                <!--Mensaje en PHP que le indica al usuario por que no se pudo registrar-->
                                <?php
                                    // si la variable post esta seteada con un mensaje 
                                    if(isset($_POST["txtMensaje"]))
                                    {
                                        // Clase de bootstrap alert
                                        echo '<div class="alert alert-info Centrado ">' . $_POST["txtMensaje"] . '</div>';
                                    }
                                ?>
                                <!-- El form debe de llevar un action vacio y un method de tipo POST-->
                                <form action="" method="POST">
                                    <!---->

                                    <div class="mb-3">
                                        <label class="form-label">Identificación</label>
                                        <!--onkeyup busca sin perder el foco-->
                                        <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion"  
                                        onkeyup="ConsultarNombre();" required>
    
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nombre</label>
                                        <!---->
                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" readOnly="true"
                                        style="background-color:#f1f1f1" >
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Correo Electrónico</label>
                                        <!---->
                                        <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Contraseña</label>
                                        <!---->
                                        <input type="password" class="form-control" id="txtContrasenna"
                                            name="txtContrasenna" required>
                                    </div>

                                    <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4" value="Procesar"
                                        id=btnRegistrarUsuario name=btnRegistrarUsuario>
                                    <!---->

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
        <script src="../js/RegistrarUsuarios.js"></script>
</body>

</html>