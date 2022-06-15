$(document).ready(function(){
    $('#enviar').click(function(){
       var valor =$('#email-for-pass').val();
       var dni=$('#dni').val();
    /*    alert(comprobarcampo(valor)); */
       if(comprobarcampo(valor)){
            $('#comprobacion').css('display','block');
       }
       if(comprobarcampo(dni)){
             $('#comprobacion1').css('display','block');
        }
       if(comprobarcampo(valor)==false && comprobarcampo(dni)==false){
        $.ajax({
            url: "./conexiones/recuperarPass.php",
            type: "POST",
            data:{
                correo:valor,
                dni:dni
            },
            success: function(res){
                       alert(JSON.parse(res));
            }
        });
       }
    
    })
    function comprobarcampo(valor){
       var bandera=false;
    if(valor==''){
        bandera=true;
    }
    return bandera;
    }
    $('#btnRegresar').click(function(){
        $(location).attr('href','formulario.php');
    })
    });