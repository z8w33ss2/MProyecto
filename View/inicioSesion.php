<!--../ NOS DEVUELVE UNA CARPETA-->
<!--Un punto en php concatena cosas -->
<!--include_once $_SERVER["DOCUMENT_ROOT"] . '/Proyecto_Clase/Controller/LoginController.php' -->
<?php
    include_once '../Controller/LoginController.php'; // vista llama al controlador
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto Web Miércoles</title>
    <link rel="shortcut icon" type="image/png" href="images/seodashlogo.png" />
    <link rel="stylesheet" href="css/styles.min.css" />
</head>

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
                                    <img src="images/logo-light.svg" alt="">
                                </a>
                                <p class="text-center">Inicio de Sesión</p>

                                <!--Formulario, debe de llevar un action"" para recargar la pantalla y un method="POST"
                                    para realizar una petición al servidor-->
                                <form action="" method="POST" >
                                    <div class="mb-3">
                                        <label class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="txtCorreo" name="txtCorreo">
                                    </div>
                                    <div class="mb-4">
                                        <!--Las cajitas de texto deben de llevar un id y un name, el id me sirve para 
                                            programar funciones en JavaScript y el name para programar funciones en PHP-->
                                        <label class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id=txtContrasenna name=txtContrasenna>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">

                                        </div>
                                        <a class="text-primary fw-bold" href="recuperarAcceso.php">Recuperar acceso
                                            ?</a>
                                    </div>

                                    <!--Input de tipo submit-->
                                    <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4" value = "Procesar"
                                    id=btnIniciarSesion name=btnIniciarSesion>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">No tienes una cuenta</p>
                                        <a class="text-primary fw-bold ms-2" href="registrarUsuario.php">Registrarse</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>