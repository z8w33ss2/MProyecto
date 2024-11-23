// Evento que genera una accion automaticamente al cargar la pagina

$(document).ready(function(){

    //encontrar un elemnto en la pantalla
    // data table en español , buscar data table language spanish
    $("#example").DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/es-ES.json',
        },
        //Definicion de columnas como campos string
        columnDefs: [{type:"string", target: [0,1,2,3,4,5]}]
    });
});
