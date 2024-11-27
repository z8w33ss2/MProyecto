<?php
// ***************************En el controlador es donde aplico la logica de negocio******************

    //echo $_SERVER["DOCUMENT_ROOT"]; //muestra la ruta del origen
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/LoginModel.php'; // Controlador llama al modelo
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/UsuarioModel.php'; // llamado al modelo del usuario

    // Variable de sesion en servidor con PHP  (guardar cosas importantes)
    // variable de sesion en el navedor con javascript (guardar cosas poco importantes es visible)
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Crear o leer una variable de sesion VALIDAR 
    }

    // cuando se preciona un boton
    if(isset($_POST["btnActualizarAcceso"]))
    {
        //Código de acción
        $contrasennaActual = $_POST["txtContrasennaActual"]; // En php se utiliza el name
        $contrasennaNueva = $_POST["txtContrasennaNueva"];
        $contrasennaConfirmar = $_POST["txtContrasennaConfirmar"];

        if ($contrasennaActual == $contrasennaNueva)
        {
            $_POST["txtMensaje"]= "Debe de ingresar una contraseña diferente a la actual";
        }
        elseif($contrasennaNueva != $contrasennaConfirmar)
        {
            $_POST["txtMensaje"]= "Las contraseñas no coinciden";
        }
        else
        {
            $result = ActualizarContrasennaModel( $_SESSION["ConsecutivoUsuario"], $contrasennaNueva);

            if($result == true)
            {
                header('location: ../../View/Login/home.php');
            }
            else
            {
                $_POST["txtMensaje"]= "Su contraseña no se ha registrado correctamente";
            }
        }
    }

    // si no hay boton de por medio se llama a la funcion
    // se pasa como parametro el consecutivo ya sea de sesion o de ID
    function ConsultarUsuario($consecutivo)
    {
        $result = ConsultarUsuarioModel($consecutivo); // consecutivo como variable de sesion o id

        // result.num_rows para saber si encontro registros
        if($result != null && $result -> num_rows > 0)
        {
            // guarda los datos en la variable datos para manipular el array
            return mysqli_fetch_array($result);
        }
        else
        {
            $_POST["txtMensaje"]= "No se ha podido obtener información correctamente";
            header('location: ../../View/Login/home.php');
        }
    }

    if(isset($_POST["btnActualizarPerfil"]))
    {
        //Código de acción
        $identificacion = $_POST["txtIdentificacion"]; // En php se utiliza el name
        $nombre = $_POST["txtNombre"];
        $correo = $_POST["txtCorreo"];
        
        $result = ActualizarPerfilModel( $_SESSION["ConsecutivoUsuario"], $identificacion, $nombre, $correo, 0);

        if($result == true)
        {
            // Sobre escribe la variable de sesion
            $_SESSION ["NombreUsuario"] = $nombre;
            header('location: ../../View/Login/home.php');
        }
        else
        {
            $_POST["txtMensaje"]= "Su información no se ha actualizado correctamente";
        }
    }

    if(isset($_POST["btnActualizarUsuario"]))
    {
        //Código de acción
        $consecutivo = $_POST["txtConsecutivo"];
        $identificacion = $_POST["txtIdentificacion"]; // En php se utiliza el name
        $nombre = $_POST["txtNombre"];
        $correo = $_POST["txtCorreo"];
        $rol = $_POST["ddlRoles"];
        
        $result = ActualizarPerfilModel( $consecutivo , $identificacion, $nombre, $correo, $rol);

        if($result == true)
        {
            // Sobre escribe la variable de sesion
            $_SESSION ["NombreUsuario"] = $nombre;
            header('location: ../../View/Usuario/consultarUsuarios.php');
        }
        else
        {
            $_POST["txtMensaje"]= "No fue posible actualizar la información del usuario";
        }
    }
    
    function ConsultarUsuarios()
    {
        $result = ConsultarUsuariosModel($_SESSION["ConsecutivoUsuario"]); // consecutivo como variable de sesion para que solo muestre la informacion de otros usuarios

        // result.num_rows para saber si encontro registros
        if($result != null && $result -> num_rows > 0)
        {
            // devuelve los resultados
            return $result;
        }
    }

    if(isset($_POST["btnCambiarEstadoUsuario"]))
    {
        //Código de acción
        $consecutivo = $_POST["txtConsecutivo"]; // En php se utiliza el name

        $result = CambiarEstadoUsuarioModel($consecutivo);

        if($result == true)
        {
            // Sobre escribe la variable de sesion
            header('location: ../../View/Usuario/consultarUsuarios.php');
        }
        else
        {
            $_POST["txtMensaje"]= "No fue posible actualizar el estado del usuario";
        }
    }

    function ConsultarRoles()
    {
        $result = ConsultarRolesModel(); 

        // result.num_rows para saber si encontro registros
        if($result != null && $result -> num_rows > 0)
        {
            // devuelve los resultados
            return $result;
        }
    }
    
?>