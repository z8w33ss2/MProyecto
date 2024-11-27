<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/View/layout.php';  // link que apunta a layout para poder llamar la funcion MostrarMenu()
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
                    
                </div>
            </div>
        </div>
        <?php
            ReferenciasJS();
        ?>
</body>

</html>