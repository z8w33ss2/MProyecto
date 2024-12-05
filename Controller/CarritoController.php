<?php

include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/CarritoModel.php'; // llamado al modelo del usuario

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Crear o leer una variable de sesion VALIDAR 
}

if(isset($_POST["btnRegistrarCarrito"]))
{
    //Código de acción
    $ConsecutivoProducto = $_POST["ID_PRODUCTO"];
    $cantidad = $_POST["CANTIDAD"];

    $result = RegistrarCarritoModel($_SESSION["ConsecutivoUsuario"],$ConsecutivoProducto,$cantidad);

    if($result == true)
    {
        header('location: ../../View/Producto/consultarProductos.php');
    }
    else
    {
        $_POST["txtMensaje"]= "El producto no se ha registrado correctamente";
    }
}

?>