<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/View/layout.php';  // link que apunta a layout para poder llamar la funcion MostrarMenu()
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Controller/ProductoController.php';  

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
                            <h5 class="card-title fw-semibold mb-4">Registrar Producto</h5>
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
                                            <label class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="txNombre" name="txtNombre">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Descripción</label>
                                            <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Precio</label>
                                            <input type="text" class="form-control" id="txtPrecio" name="txtPrecio">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Cantidad</label>
                                            <input type="text" class="form-control" id="txtCantidad" name="txtCantidad">
                                        </div>

                                        

                                        <input type="submit" class="btn btn-primary" value="Procesar"
                                            id="btnRegistrarProducto" name="btnRegistrarProducto">
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
    <script src="../js/RegistrarUsuarios.js"></script>
</body>

</html>