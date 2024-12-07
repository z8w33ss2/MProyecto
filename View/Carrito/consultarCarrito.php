<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/View/layout.php';  // link que apunta a layout para poder llamar la funcion MostrarMenu()
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Controller/CarritoController.php';
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
                                    <h5 class="card-title">Mi Carrito</h5>

                                    <div class="table-responsive">
                                        <!--la table debe de tener un id que se enlaza con el evento-->
                                        <table id="example" class="table text-nowrap align-middle mb-0">
                                            <thead>
                                                <tr class="border-2 border-bottom border-primary border-0">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Producto</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Precio Unitario</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                <?php
                                                    //Captura los datos de la tabla en una variable
                                                    $datos = ConsultarCarrito();
                                                    // Iteramos con un while
                                                    While($fila = mysqli_fetch_array($datos))
                                                    {
                                                         // tr table rows y td table data
                                                        echo "<tr>";  
                                                        echo "<td>" . $fila["ConsecutivoProducto"]. "</td>";
                                                        echo "<td>" . $fila["Nombre"]. "</td>";
                                                        echo "<td>" . $fila["CantidadDeseada"]. "</td>";
                                                        echo "<td>" . number_format($fila["PrecioUnitario"],2). "</td>";
                                                        echo "<td>" . number_format($fila["Total"],2). "</td>";                                      
                                                        echo '<td>
                                                            
                                                            <button id="btnOpenModal" type="button" class="btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                                data-id=' . $fila["ConsecutivoProducto"] . ' data-name="' . $fila["Nombre"] . '">
                                                                <i class="fa fa-trash" style="color:red; font-size: 1.4em"></i>
                                                            </button>

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
        <script src="../js/ConsultarCarrito.js"></script>

    </div>

</body>

</html>