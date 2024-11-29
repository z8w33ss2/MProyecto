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
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Consulta de Productos</h5>
                                    <br/>
                                    
                                        <a href="registrarProducto.php" class="btn btn-primary">
                                            <i class="fa fa-plus" style="margin-right:5px;"></i>
                                            Registrar Producto
                                        </a>
                                        <br/>
                                    <br/>
                                    <div class="table-responsive">
                                        <!--la table debe de tener un id que se enlaza con el evento-->
                                        <table id="example" class="table text-nowrap align-middle mb-0">
                                            <thead>
                                                <tr class="border-2 border-bottom border-primary border-0">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Precio</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Imagen</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                <?php
                                                    //Captura los datos de la tabla en una variable
                                                    $datos = ConsultarProductos();
                                                    // Iteramos con un while
                                                    While($fila = mysqli_fetch_array($datos))
                                                    {
                                                         // tr table rows y td table data
                                                        echo "<tr>";  
                                                        echo "<td>" . $fila["Consecutivo"]. "</td>";
                                                        echo "<td title='" . $fila["Descripcion"] . "'>" . $fila["Nombre"]. "</td>";
                                                        echo "<td>" . $fila["Precio"]. "</td>";
                                                        echo "<td>" . $fila["Cantidad"]. "</td>";
                                                        echo "<td><img width='100' height='85' src='" . $fila["Imagen"]. "'></img></td>";
                                                        
                                                        echo '<td>
                                                            
                                                            <a href="actualizarProducto.php?id=' . $fila["Consecutivo"] . '" class="btn">
                                                                <i class="fa fa-edit" style="color:blue; font-size: 1.4em"></i>
                                                            </a> 

                                                            </td>';
                                                        echo "</tr>";
                                                    }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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
        <script src="../js/ConsultarProductos.js"></script>
        
    </div>
    
</body>

</html>