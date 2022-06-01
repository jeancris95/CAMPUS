$(document).ready(function(){
$('#enviar').click(function(){
   var valor =$('#email-for-pass').val();
/*    alert(comprobarcampo(valor)); */
   if(comprobarcampo(valor)){
        $('#comprobacion').css('display','block');
   }else{
    $.ajax({
        url: "./conexiones/recuperarPass.php",
        type: "POST",
        data:{
            correo:valor
        },
        success: function(res){
            if(res==true){
                    
            }else{
                alert("no existe ese correo");
            }
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
});