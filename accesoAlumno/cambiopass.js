$(document).ready(function(){
$('#mostrar_contrasena').click(function () {
    if ($('#mostrar_contrasena').is(':checked')) {
      $('#passNueva').attr('type', 'text');
    } else {
      $('#passNueva').attr('type', 'password');
    }
});
$('#guardar').click(function () {
    var antigua=$('#passAntigua').val();
    var nueva=$('#passNueva').val();
    $.ajax({
        url: "./conexion/conexion_password.php",
        type: "POST",
        data:{
            antigua:antigua,
            nueva:nueva
        },
        success: function(res){
            alert(res);
 }
    });
    $("#formP").trigger("reset");
    $("#exampleModal").modal("hide");   
});

});
