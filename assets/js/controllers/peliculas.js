$(document).ready(fnInit);

function fnInit(){
   
    $("#btnGuardarPelicula").click(guardar);
    $("#btnEditarPelicula").click(editar);
    $("#alerta").hide();
}

function guardar(){
    
    datos = {'titulo':$('#titulo').val(),'sinopsis':$('#sinopsis').val(),'anio':$('#anio').val()};
    
    $.ajax({
        url: siteUrl+'/peliculas/guardar',
        data: datos,
        dataType: 'json',
        type:'post',
        beforeSend: function(){
            $("#alerta").show();
            $("#alerta").html("<span>Guardando...</span>"); 
        },
        success: function response(data){
            if(data.resp==true){
                $("#alerta").html("<span>Registro guardado con exito</span>");
            }else{
                $("#alerta").html("<span>Error Guardando el registro</span>");
            }
            $("#btnGuardarPelicula").attr('disabled', 'disabled');
        }
    });
}

function editar(){
    datos = {'id':$('#id').val(),'titulo':$('#titulo').val(),'sinopsis':$('#sinopsis').val(),'anio':$('#anio').val()};
    
    $.ajax({
        url: siteUrl+'/peliculas/guardar',
        data: datos,
        dataType: 'json',
        type:'post',
        beforeSend: function(){
           $("#alerta").show();
           $("#alerta").html("<span>Guardando...</span>");
        },
        success: function response(data){
            if(data.resp==true){
                $("#alerta").html("<span>Registro guardado con exito</span>");
            }else{
                $("#alerta").html("<span>Error Guardando el registro</span>");
            }
            $("#btnEditarPelicula").attr('disabled','disabled')
        }
    });
}