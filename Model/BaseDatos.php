<?php

function AbrirBD()
{
    $enlace = mysqli_connect("127.0.0.1:3307", "root", "", "cursodb");
}

function CerrarBD()
{
    mysqli_close($enlace);
}

?>