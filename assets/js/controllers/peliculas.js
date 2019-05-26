$(document).ready(fnInit);

function fnInit(){
   
    $("#btnGuardarPelicula").click(guardar);
}

function guardar(){
    
    datos = {'titulo':$('#titulo').val(),'sinopsis':$('#sinopsis').val(),'anio':$('#anio').val()};
    console.log(datos);
    $.ajax({
        url: siteUrl+'/peliculas/guardar',
        dataType: 'json',
        type:'post',
        beforeSend: function(){
            $("#loading").dialog('open').html("<p>Please Wait...</p>");
        },
        success: function response(data){

        }
    });
}