function RegistrarCarritoJS(consecutivoProducto, unidades)
{
    let cantidadDeseada = $("#" + consecutivoProducto).val();

    if (cantidadDeseada > unidades) {
        MostrarMensaje("Debe ingresar una cantidad inferior al inventario disponible");
        return;
    }

    if (cantidadDeseada <=0) {
        MostrarMensaje("Debe ingresar una cantidad valida");
        return;
    }

    // llamaremos al controlador por medio de un ajax
    // nos permite no tener que recargar la pantalla es asincrono
    // el ajax nos llevara al controlador del carrito a traves d los tres parametros de data
    // llamado del ajax vuelve al mismo ajax
    $.ajax({
        method: "POST", // obtiene informacion
        url: "../../Controller/CarritoController.php" ,
        dataType : "text",
        data: {
            "btnRegistrarCarrito": "FUNCION",
            "ID_PRODUCTO": consecutivoProducto ,
            "CANTIDAD": cantidadDeseada 
        },
        success: function(data)
        {
            if (data == "OK") 
            {
                MostrarMensajeOK("El producto fue actualizado correctamente en su carrito");
            }
            else
            {
                MostrarMensaje("El producto no fue actualizado correctamente en su carrito")
            }
        }
    });
}

 // funcion para utilizar sweet alert , siempre se deben de incorporar los JS y los CSS
 // https://sweetalert2.github.io/

function MostrarMensaje(texto)
{
    Swal.fire({
        title: "Información",
        text: texto,
        icon: "info"
    });
}

// funcion de sweet alert que muestra 3 botones 
function MostrarMensajeOK(texto)
{
    Swal.fire({
        title: "Información",
        text: texto,
        icon: "success",
        confirmButtonText: "Aceptar",
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href="../Login/home.php"
            }
        });
}