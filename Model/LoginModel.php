<?php

    include_once 'BaseDatos.php';

    function IniciarSesionModel($correo, $contrasenna)
    {
        $enlace = AbrirBD();
                
        //Ejecutamos el procedimiento almacenado

        CerrarBD($enlace);
    }

    function RegistrarUsuarioModel($identificacion,$nombre,$correo,$contrasenna)
    {
        // Llama a la función que abre la base de datos
        $enlace = AbrirBD();
        
        //Ejecutamos el procedimiento almacenado
        $sentencia = "CALL RegistrarUsuario('$identificacion','$nombre','$correo','$contrasenna')" ;
        // todo llamado a base de datos debe de devolver un resultado
        $result = $enlace -> query($sentencia);

        // llama a la funcion que cierra la base de datos
        CerrarBD($enlace);  
    }

    function RecuperarAccesoModel($correo)
    {
        $enlace = AbrirBD();
                
        //Ejecutamos el procedimiento almacenado

        CerrarBD($enlace);
    }
?>