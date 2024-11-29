<?php
// ***************************En el controlador es donde aplico la logica de negocio******************

    //echo $_SERVER["DOCUMENT_ROOT"]; //muestra la ruta del origen
    
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/ProductoModel.php'; // llamado al modelo del usuario


    function ConsultarProductos()
    {
        return ConsultarProductosModel(); 
    }

    if(isset($_POST["btnRegistrarProducto"]))
    {
        //Código de acción
        $nombre = $_POST["txtNombre"]; // En php se utiliza el name
        $descripcion = $_POST["txtDescripcion"];
        $precio = $_POST["txtPrecio"];
        $cantidad = $_POST["txtCantidad"];
        $imagen = '/Proyecto_Clase/View/products_images/' . $_FILES["txtImagen"]["name"]; // guarda la imagen en esa carpeta

        // para poder escribirla se debe de tener un origen y un destino
        $origen = $_FILES["txtImagen"]["tmp_name"]; //origen
        $destino = $_SERVER["DOCUMENT_ROOT"] . '/Proyecto_Clase/View/products_images/' . $_FILES["txtImagen"]["name"]; // destino
        copy($origen,$destino);

        $result = RegistrarProductoModel($nombre,$descripcion,$precio,$cantidad,$imagen);

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