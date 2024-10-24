<?php

    //echo $_SERVER["DOCUMENT_ROOT"]; //muestra la ruta del origen
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/LoginModel.php'; // Controlador llama al modelo

    // Variable de sesion en servidor con PHP  (guardar cosas importantes)
    // variable de sesion en el navedor con javascript (guardar cosas poco importantes es visible)
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Crear o leer una variable de sesion VALIDAR 
    }

    // isset pregunta si hay una peticion hecha a $_POST["btnIniciarSesion"]
    // $_POST["name"] es el conjunto de datos que estan viajando desde la vista hasta el controlador
    // dentro del $_POST["name"] vienen todos los datos que estan dentro del formulario
    
    if(isset($_POST["btnIniciarSesion"]))
    {
        //Código de acción
        $correo = $_POST["txtCorreo"]; // En php se utiliza el name
        $contrasenna = $_POST["txtContrasenna"];

        $result = IniciarSesionModel($correo, $contrasenna);

        // result.num_rows para saber si encontro registros
        if($result != null && $result -> num_rows > 0)
        {
            // guarda los datos en la variable datos para manipular el array
            $datos = mysqli_fetch_array($result);

            $_SESSION["NombreUsuario"]= $datos["Nombre"]; // variable de sesion en el servidor
            header('location: ../../View/home.php');
        }
        else
        {
            // Limpiar variables de sesion 
            session_destroy();
            $_POST["txtMensaje"]= "Su información no se ha validado correctamente";
        }
    }
    
    // php tomamos el name - Condicional para cerrar sesion
    if (isset($_POST["btnCerrarSesion"])) {
        session_destroy();
        header('location: ../View/home.php');
    }

    if(isset($_POST["btnRegistrarUsuario"]))
    {
        //Código de acción
        $identificacion = $_POST["txtIdentificacion"]; // En php se utiliza el name
        $nombre = $_POST["txtNombre"];
        $correo = $_POST["txtCorreo"];
        $contrasenna = $_POST["txtContrasenna"];

        $result = RegistrarUsuarioModel($identificacion,$nombre,$correo,$contrasenna);

        if($result == true)
        {
            header('location: ../../View/Login/inicioSesion.php');
        }
        else
        {
            $_POST["txtMensaje"]= "Su información no se ha registrado correctamente";
        }
    }

    if(isset($_POST["btnRecuperarAcceso"]))
    {
        //Código de acción
        $correo = $_POST["txtCorreo"];

        RecuperarAccesoModel($correo);

    }
?>