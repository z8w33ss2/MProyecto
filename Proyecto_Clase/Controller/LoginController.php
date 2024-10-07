<?php

    // isset pregunta si hay una peticion hecha a $_POST["btnIniciarSesion"]
    // $_POST["name"] es el conjunto de datos que estan viajando desde la vista hasta el controlador
    // dentro del $_POST["name"] vienen todos los datos que estan dentro del formulario
    if(isset($_POST["btnIniciarSesion"]))
    {
        //Código de acción
        $correo = $_POST["txtCorreo"]; // En php se utiliza el name
        $contrasenna = $_POST["txtContrasenna"];

    }

?>