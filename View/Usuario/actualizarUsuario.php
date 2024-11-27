<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/View/layout.php';  // link que apunta a layout para poder llamar la funcion MostrarMenu()
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Controller/UsuarioController.php';  

    // captura el id que viaja por el queryString y lo pasa como parametro a la función
    $id = $_GET ["id"];
    $datos = ConsultarUsuario($id);
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
                            <h5 class="card-title fw-semibold mb-4">Actualizar Usuario</h5>
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

                                        <!--cajita de text oculpa para enviar el id de sesion-->
                                        <input type="hidden" id="txtConsecutivo" name="txtConsecutivo" value="<?php echo $datos["Consecutivo"]?>">

                                        <div class="mb-3">
                                            <label class="form-label">Identificación</label>
                                            <input type="text" class="form-control" id="txtIdentificacion"
                                                name="txtIdentificacion" value="<?php echo $datos["Identificacion"]?>"
                                                onkeyup="ConsultarNombre();">
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
                                            <label class="form-label">Rol</label>
                                            <select id="ddlRoles" name="ddlRoles" class="form-control">
                                                <?php
                                                    $roles = ConsultarRoles(); // llama al controlador 
                                                    echo "<option value=''>Seleccione</option>"; 
                                                    While ($fila = mysqli_fetch_array($roles)) 
                                                        {
                                                            //si el consecutivoRol es igual al consecutivo con la propiedad selected muestra el rol actual
                                                            if($fila["Consecutivo"] == $datos["ConsecutivoRol"])
                                                            {
                                                                echo "<option selected value=" . $fila["Consecutivo"] . ">" . $fila["NombreRol"] ."</option>"; 
                                                            }
                                                            else
                                                            {
                                                                echo "<option value=" . $fila["Consecutivo"] . ">" . $fila["NombreRol"] ."</option>"; 
                                                            }
                                                        }
                                                ?>
                                            </select>
                                        </div>

                                        <input type="submit" class="btn btn-primary" value="Procesar"
                                            id="btnActualizarUsuario" name="btnActualizarUsuario">
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