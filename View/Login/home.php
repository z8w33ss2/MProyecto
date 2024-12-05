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

                    <!--Mensaje en PHP que le indica al usuario por que no se pudo registrar-->
                    <?php
                    // si la variable post esta seteada con un mensaje 
                        if(isset($_POST["txtMensaje"]))
                        {
                        // Clase de bootstrap alert
                            echo '<div class="alert alert-info Centrado ">' . $_POST["txtMensaje"] . '</div>';
                        }
                    ?>

                    <?php
                        // Row mide 12
                        //Captura los datos de la tabla en una variable y muestra todos los productos
                        $datos = ConsultarProductos();
                        // Iteramos con un while
                        While($fila = mysqli_fetch_array($datos))
                        {
                            echo '
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div style="text-align:center">
                                            <img class="card-img-top" src="' . $fila["Imagen"] . '" style="width:175px; height: 150px;" margin-top:20px>
                                        </div>       
                                        <div class="card-body">
                                            <h5 class="card-title">' . $fila["Nombre"] . '</h5>

                                            Unidades: ' . $fila["Cantidad"] .' </br>
                                            Precio: ¢' . number_format($fila["Precio"],2) . '

                                            </br></br>
                                            <textarea class= "form-control" style="resize:none; border:0px; text-align:justify; padding:0px,10px,0px" rows="5" readonly="true">' . $fila["Descripcion"] . '</textarea>
                                            </br>';

                                            if (isset($_SESSION["NombreUsuario"]))
                                            {
                                                echo '
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input id=' . $fila["Consecutivo"] . ' type="number" class="form-control" style="text-align:center"
                                                        onkeypress="return SoloNumeros(event)" value= "0" min="1" max=' . $fila["Cantidad"] . '>
                                                    </div>
                                                    <div class="col-6">
                                                    <a onclick="RegistrarCarritoJS(' . $fila["Consecutivo"] . ', ' . $fila["Cantidad"]  . ');" style="width:100%" class="btn btn-primary">+ Añadir</a>
                                                    </div>
                                                </div>';
                                            }
                                            echo '
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    ?>

                </div>
            </div>
        </div>
        <?php
            ReferenciasJS();
        ?>
        <script src="../js/Comunes.js"></script>
        <script src="../js/RegistrarCarrito.js"></script>
</body>

</html>