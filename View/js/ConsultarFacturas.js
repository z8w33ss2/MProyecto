// $(document) cuando se carga el documento y este listo lanze el Evento que genera una accion automaticamente al cargar la pagina
    //encontrar un elemento en la pantalla
    // data table en español , buscar data table language spanish

    $(document).ready(function() {
        $("#example").DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/es-ES.json',
            },
            columnDefs: [{type:"string", target:[0,1,2,3,4]}]
        });
    
    });