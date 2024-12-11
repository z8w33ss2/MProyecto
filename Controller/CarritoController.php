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
        echo'OK';
    }
    else
    {
        echo'ERROR';
    }
}

function ConsultarCarrito()
{
    return ConsultarCarritoModel($_SESSION["ConsecutivoUsuario"]); 
}

function ConsultarResumenCarrito()
{
    $result = ConsultarResumenCarritoModel($_SESSION["ConsecutivoUsuario"]); 

    // result.num_rows para saber si encontro registros
    if($result != null && $result -> num_rows > 0)
    {
        // guarda los datos en la variable datos para manipular el array
        $datos = mysqli_fetch_array($result);
        $_SESSION["CantidadCarrito"]= $datos["CantidadArticulos"];
        $_SESSION["TotalCarrito"]= $datos["Total"];
    }
    else
    {
        $_SESSION["CantidadCarrito"] = "0";
        $_SESSION["TotalCarrito"] = "0";
    }
}

if(isset($_POST["btnRemoverProductoCarrito"]))
{
    //Código de acción
    $consecutivoProducto = $_POST["txtConsecutivoProducto"]; // En php se utiliza el name

    $result = RemoverProductoCarritoModel($_SESSION["ConsecutivoUsuario"],$consecutivoProducto);

    if($result == true)
    {
        // Sobre escribe la variable de sesion
        header('location: ../../View/Carrito/consultarCarrito.php');
    }
    else
    {
        $_POST["txtMensaje"]= "No fue posible remover el producto de su carrito";
    }
}


?>