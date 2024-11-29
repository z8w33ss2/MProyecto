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
    <div  id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
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
                    <div class="row">
                        <?php
                        // Row mide 12
                        //Captura los datos de la tabla en una variable
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
                                            <p class="card-text">' . $fila["Descripcion"] . '</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                            
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
            ReferenciasJS();
        ?>
</body>

</html>