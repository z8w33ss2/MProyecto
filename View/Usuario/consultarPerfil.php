<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/View/layout.php';  // link que apunta a layout para poder llamar la funcion MostrarMenu()
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Controller/UsuarioController.php';  

    // captura el id de la sesion 
    $id = $_SESSION["ConsecutivoUsuario"];
    $datos = ConsultarUsuario($id);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Web Miércoles Noche</title>
    <link rel="shortcut icon" type="image/png" href="../images/seodashlogo.png" />
    <link rel="stylesheet" href="../css/styles.min.css" />
</head>

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
                            <h5 class="card-title fw-semibold mb-4">Mi Perfil</h5>
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
                                            <label class="form-label">Identificación</label>
                                            <input type="text" class="form-control" id="txtIdentificacion"
                                                name="txtIdentificacion" value="<?php echo $datos["Identificacion"]?>">
                                                <!--value= obtiene los valores de la base de datos -->
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                                                value="<?php echo $datos["Nombre"]?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="txtCorreo" name="txtCorreo"
                                                value="<?php echo $datos["CorreoElectronico"]?>">
                                        </div>

                                        <div class="mb-3">
                                            <!--readOnly="true" caracteristica no modificable-->
                                            <label class="form-label">Rol</label>
                                            <input type="text" class="form-control" id="txtRol" name="txtRol" readOnly="true"
                                                style="background-color:#f1f1f1" value="<?php echo $datos["NombreRol"]?>">
                                        </div>

                                        <input type="submit" class="btn btn-primary" value="Procesar"
                                            id="btnActualizarPerfil" name="btnActualizarPerfil">
                                        <!--  ID para javaScrip - NAME para PHP-->
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/simplebar.js"></script>
        <script src="../js/sidebarmenu.js"></script>
        <script src="../js/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>