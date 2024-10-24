<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/BaseDatos.php';

    function IniciarSesionModel($correo, $contrasenna)
    {
        try {
            // Llama a la función que abre la base de datos
            $enlace = AbrirBD();
        
            //Ejecutamos el procedimiento almacenado (Select me devuelve un objeto y se retorna null)
            $sentencia = "CALL IniciarSesion('$correo','$contrasenna')" ; // SELECT devuelve un objeto
            // todo llamado a base de datos debe de devolver un resultado
            $result = $enlace -> query($sentencia);

            // llama a la funcion que cierra la base de datos
            CerrarBD($enlace); 
            return $result; 

        } catch (Exception $ex) {
            return null; // 
        }  
    }

    function RegistrarUsuarioModel($identificacion,$nombre,$correo,$contrasenna)
    {
        try {
            // Llama a la función que abre la base de datos
            $enlace = AbrirBD();
        
            //Ejecutamos el procedimiento almacenado (Insert, update y delete deviuelve una sentencia)
            $sentencia = "CALL RegistrarUsuario('$identificacion','$nombre','$correo','$contrasenna')" ; // CREATE, UPDATE, DELETE devuelve true or false
            // todo llamado a base de datos debe de devolver un resultado
            $result = $enlace -> query($sentencia);

            // llama a la funcion que cierra la base de datos
            CerrarBD($enlace); 
            return $result; 

        } catch (Exception $ex) {
            return false;
        }               
    }

    function RecuperarAccesoModel($correo)
    {
        $enlace = AbrirBD();
                
        //Ejecutamos el procedimiento almacenado

        CerrarBD($enlace);
    }
?>