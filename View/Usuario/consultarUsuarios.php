<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/View/layout.php';  // link que apunta a layout para poder llamar la funcion MostrarMenu()
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Controller/UsuarioController.php';
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Web Miércoles Noche</title>
    <link rel="shortcut icon" type="image/png" href="../images/seodashlogo.png" />
    <link rel="stylesheet" href="../css/styles.min.css" />
    <!--datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
    <!--Icons font-awesome 4.7 free-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />" />
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
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Consulta de Usuarios</h5>
                                    <div class="table-responsive">
                                        <!--la table debe de tener un id que se enlaza con el evento-->
                                        <table id="example" class="table text-nowrap align-middle mb-0">
                                            <thead>
                                                <tr class="border-2 border-bottom border-primary border-0">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Identificación</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Correo</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Rol</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                <?php
                                                    //Captura los datos de la tabla en una variable
                                                    $datos = ConsultarUsuarios();
                                                    // Iteramos con un while
                                                    While($fila = mysqli_fetch_array($datos))
                                                    {
                                                         // tr table rows y td table data
                                                        echo "<tr>";  
                                                        echo "<td>" . $fila["Consecutivo"]. "</td>";
                                                        echo "<td>" . $fila["Identificacion"]. "</td>";
                                                        echo "<td>" . $fila["Nombre"]. "</td>";
                                                        echo "<td>" . $fila["CorreoElectronico"]. "</td>";
                                                        echo "<td>" . $fila["DescripcionActivo"]. "</td>";
                                                        echo "<td>" . $fila["NombreRol"]. "</td>";
                                                        // Button trigger modal
                                                        // id del modal = #staticBackdrop
                                                        // data-id='.$datos["Consecutivo"].' le pasa el consecutivo al modal
                                                        // ' data-name='.$datos["Nombre"].' le pasa el nombre al modal
                                                        // queryString paso de parametros entre pantallas href="actualizarUsuario.php?id="'.$fila["Consecutivo"].'
                                                        echo '<td>
                                                            
                                                            <a href="actualizarUsuario.php?id=' . $fila["Consecutivo"] . '" class="btn">
                                                                <i class="fa fa-edit" style="color:blue; font-size: 1.4em"></i>
                                                            </a> 

                                                            <button id="btnOpenModal" type="button" class="btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                            data-id=' . $fila["Consecutivo"] . ' data-name="' . $fila["Nombre"] . '">
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
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/simplebar.js"></script>
        <script src="../js/sidebarmenu.js"></script>
        <script src="../js/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
        <!--js de datatable-->
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <!--js de datatable-->
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
        <!--js de datatable-->
        <script src="../js/ConsultarUsuarios.js"></script>
        <!--js de datatable-->

        <!-- Modal , se coloca en esta parte para que quede oculto-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">

                        <div class="modal-body">
                            <!--Input que captura el consecutivo de tipo oculto o hidden-->
                            <input type="hidden" id="txtConsecutivo" name="txtConsecutivo">
                            ¿Desea cambiar el estado del usuario <label id="lblNombre"></label>?
                        </div>
                        <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Procesar"
                            id="btnCambiarEstadoUsuario" name="btnCambiarEstadoUsuario">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>