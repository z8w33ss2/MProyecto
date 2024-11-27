<?php
// ***************************En el controlador es donde aplico la logica de negocio******************

    //echo $_SERVER["DOCUMENT_ROOT"]; //muestra la ruta del origen
    
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/ProductoModel.php'; // llamado al modelo del usuario


    function ConsultarProductos()
    {
        return ConsultarProductosModel(); 
    }

?>