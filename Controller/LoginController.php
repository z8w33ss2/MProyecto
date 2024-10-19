<?php

include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/LoginModel.php'; // Controlador llama al modelo

    //echo $_SERVER["DOCUMENT_ROOT"]; //muestra la ruta del origen

    // isset pregunta si hay una peticion hecha a $_POST["btnIniciarSesion"]
    // $_POST["name"] es el conjunto de datos que estan viajando desde la vista hasta el controlador
    // dentro del $_POST["name"] vienen todos los datos que estan dentro del formulario
    
    if(isset($_POST["btnIniciarSesion"]))
    {
        
        //Código de acción
        $correo = $_POST["txtCorreo"]; // En php se utiliza el name
        $contrasenna = $_POST["txtContrasenna"];

        IniciarSesionModel($correo, $contrasenna);

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
            header('location: ../Login/inicioSesion.php');
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