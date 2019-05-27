$(document).ready(fnInit);

/** 
 * Para validar el nickname /^[a-zA-Z0-9_]{3,20}$/
 * Para validar la contraseña /(?=^.{3,15}$)((?!.*\s)(?=.*[A-Z])(?=.*[a-z])(?=(.*\d){1,}))((?!.*[",;&|'])|(?=(.*\W){1,}))(?!.*[",;&|'])^.*$/
 * 
 * 
 */

let duplicado = false;

function fnInit(){
    $("#btnGuardarUsuario").click(guardar);
    $("#btnEditarUsuario").click(editar);
    $("#nickname").change(fnDuplicado); 
    $("#alerta").hide();

}

function guardar(){
    $("#alerta").hide();
    $("#alerta").html("");
    nombre = $('#nombre');
    //validar las reglas para el nombre
    if(nombre.val()==""){
        $("#alerta").show();
        $("#alerta").html("<span>El campo nombre es obligatorio</span>");
        nombre.focus();
        return;
    }
    if(nombre.val().length < 5){
        $("#alerta").show();
        $("#alerta").html("<span>El campo nombre debe ser mayor a 5 caracteres</span>");
        nombre.focus();
        return;
    }
    nickname = $("#nickname");
    //Validar las reglas para el nickname
    var str = nickname.val();
    var patt = new RegExp("^.[a-zA-Z0-9_]{3,20}$");
    var res = patt.test(str); 
    
    if(!res){
        $("#alerta").show();
        $("#alerta").html("<span>El campo nickname puede contener al menos una letra mayuscula o minuscula, un numero y _ </span>");
        nickname.focus();
        return;
    }
    if(nickname.val() == ""){
        $("#alerta").show();
        $("#alerta").html("<span>El campo nombre debe ser mayor a 5 caracteres</span>");
        nickname.focus();
        return;
    }
    if(duplicado){
        $("#alerta").show();
        $("#alerta").html("<span>El nickname ya existe en la base de datos</span>");
        nickname.focus();
        return;
    }

    password = $('#password');
    //VAlidar las reglas para el password
    var patt = new RegExp(password.attr("pattern"));
    var res = patt.test(password.val()); 
    
    if(!res){
        $("#alerta").show();
        $("#alerta").html("<span> La contraseña debe terner al menos una letra mayuscula, al menos una letra minuscula, al menos un numero y al menos un caracter especial </span>");
        password.focus();
        return;
    }
    
    datos = {'nombre':$('#nombre').val(),'nickname':$('#nickname').val(),'password':$('#password').val()};
    
    $.ajax({
        url: siteUrl+'/usuarios/guardar',
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
            $("#btnGuardarUsuario").attr('disabled', 'disabled');
        }
    });
}

function editar(){
    $("#alerta").hide();
    $("#alerta").html("");
    nombre = $('#nombre');
    //validar las reglas para el nombre
    if(nombre.val()==""){
        $("#alerta").show();
        $("#alerta").html("<span>El campo nombre es obligatorio</span>");
        nombre.focus();
        return;
    }
    if(nombre.val().length < 5){
        $("#alerta").show();
        $("#alerta").html("<span>El campo nombre debe ser mayor a 5 caracteres</span>");
        nombre.focus();
        return;
    }

    nickname = $("#nickname");
    //Validar las reglas para el nickname
    var str = nickname.val();
    var patt = new RegExp("^.[a-zA-Z0-9_]{3,20}$");
    var res = patt.test(str); 
    
    if(!res){
        $("#alerta").show();
        $("#alerta").html("<span>El campo nickname puede contener al menos una letra mayuscula o minuscula, un numero y _ </span>");
        nickname.focus();
        return;
    }
    if(nickname.val() == ""){
        $("#alerta").show();
        $("#alerta").html("<span>El campo nombre debe ser mayor a 5 caracteres</span>");
        nickname.focus();
        return;
    }
    if(duplicado){
        $("#alerta").show();
        $("#alerta").html("<span>El nickname ya existe en la base de datos</span>");
        nickname.focus();
        return;
    }

    datos = {'nombre':$('#nombre').val(),'nickname':$('#nickname').val(),'id':$('#id').val()};
    $.ajax({
        url: siteUrl+'/usuarios/guardar',
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
            $("#btnEditarUsuario").attr('disabled','disabled')
        }
    });
}

function fnDuplicado(){
    
    $("#alerta").hide();
    $("#alerta").html("");

    if($("#nickname").val()!==$("#id").val()){
        $.ajax({
            url: siteUrl+'/usuarios/duplicado',
            data: {'nickname':$("#nickname").val()},
            dataType: 'json',
            type:'post',
            async: 'false',
            beforeSend: function(){
                $("#alerta").show();
                $("#alerta").html("<span>Buscando duplicado</span>"); 
            },
            success: function(res){
                if(res.duplicado){
                    $("#alerta").html("<span>El nickname ya existe en la base de datos</span>");
                    duplicado = true;
                }else{
                    $("#alerta").hide();
                    $("#alerta").html("");
                    duplicado = false;
                }
            }
        });
    }else{
        duplicado = false;
    }
    
}