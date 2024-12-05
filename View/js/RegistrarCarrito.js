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
    $.ajax({
        method: "POST", // obtiene informacion
        url: "Controller/CarritoController.php" ,
        dataType : "text",
        data: {

        },
        success: function(data){
            
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