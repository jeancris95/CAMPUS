$(document).ready(function(){
    $('#addBtn').click(function(){
        contenido1=$('#addTxt').val();
        contenido2=contenido1.trim();
      
         $.ajax({
            url: "./notas_tomadas.php",
            type:"POST",
            //duda con el tipo JSON
            data:{
                contenido:contenido2
            },
            success:function(res){
                location.reload(); 
            }
        }) 
    })
    var botones=document.getElementsByClassName("btn-danger").length;
   /*  console.log (document.getElementsByClassName("btn-danger")[1].id);  */
    for (let index = 1; index < botones+1; index++) {
        $('#boton'+index).click(function(){  
        console.log( $('#nota'+index).val());
          id=$('#nota'+index).val();
            $.ajax({
                url: "./eliminar_post.php",
                type:"POST",
                //duda con el tipo JSON
                data:{
                    id:id
                },
                success:function(res){
                      location.reload();   
                }
            }) 
        })
   }  
}); 