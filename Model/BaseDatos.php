<?php

// Abre una conexion a la base de datos
function AbrirBD()
{
    return mysqli_connect("127.0.0.1:3307", "root", "", "cursobd");
}

// Cierra la conexion a la base de datos
function CerrarBD($enlace)
{
    mysqli_close($enlace);
}

?>