function RegistrarCarritoJS(consecutivoProducto, unidades)
{
    let cantidadDeseada = $("#" + consecutivoProducto).val();

    if (cantidadDeseada > unidades) {
        alert("Debe ingresar una cantidad inferior al inventario disponible");
        return;
    }

    if (cantidadDeseada <=0) {
        alert("Debe ingresar una cantidad valida");
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