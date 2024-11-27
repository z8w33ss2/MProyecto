<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/BaseDatos.php';

    // permite consultar los usuarios registrados
    function ConsultarProductosModel()
    {
        try {
            // Llama a la función que abre la base de datos
            $enlace = AbrirBD();
        
            //Ejecutamos el procedimiento almacenado (Select me devuelve un objeto y se retorna null)
            $sentencia = "CALL ConsultarProductos()" ; // SELECT devuelve un objeto
            // todo llamado a base de datos debe de devolver un resultado
            $result = $enlace -> query($sentencia);

            // llama a la funcion que cierra la base de datos
            CerrarBD($enlace); 
            return $result; 

        } catch (Exception $ex) {
            return null; // SELECT devuelve un objeto
        }
    }

    

    
?>