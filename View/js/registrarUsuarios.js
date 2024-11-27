function ConsultarNombre()
{
    let identificacion = $("#txtIdentificacion").val();    
    $("#txtNombre").val("");

    if (identificacion.length >= 9) {
        // llamado ajax , asincrono a un controlador
        $.ajax({
            method: "GET", // GET por que me devuelve informacion
            url: "https://apis.gometa.org/cedulas/" + identificacion,
            dataType : "json",
            success: function(data){
                $("#txtNombre").val(data.nombre);
            }
        });
    }
}