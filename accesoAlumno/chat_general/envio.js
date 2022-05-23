$(document).ready(function() {

    $("#enviar").submit(function(){

         mensaje = $("#mensaje").val();
         $.ajax({
            url: "./sendMessage.php",
            type: "POST",
            data:{
                mensaje:mensaje
            },
            success:function(res){
                console.log(res);
            }
         }); 
    })

});
