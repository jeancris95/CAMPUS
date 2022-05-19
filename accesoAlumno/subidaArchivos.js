$(document).ready(function(){
    tablaUsuarios = $("#tablaArchivos").DataTable({
        "columnDefs":[{
         "targets": -1,
         "data":null,
         "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-success btnDescargar'><i class='bi bi-cloud-arrow-down'></i></button><button class='btn btn-danger btnBorrar'><i class='bi bi-trash3'></i></button></div></div>"  
        }],
         
         //Para cambiar el lenguaje a español
     "language": {
             "lengthMenu": "Mostrar _MENU_ registros",
             "zeroRecords": "No se encontraron resultados",
             "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
             "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
             "infoFiltered": "(filtrado de un total de _MAX_ registros)",
             "sSearch": "Buscar:",
             "oPaginate": {
                 "sFirst": "Primero",
                 "sLast":"Último",
                 "sNext":"Siguiente",
                 "sPrevious": "Anterior"
              },
              "sProcessing":"Procesando...",
         }
     });
//abre el modal 
    $("#btnAniadir").click(function(){
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css("background-color", "#28a745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nueva Persona");            
        $("#modal").modal("show");        
    }); 
//una vez que se le da al submit
$("#btnAniadir").click(function(){
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modal").modal("show");        
}); 

$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    nombre = $(this).closest("tr").find('td:eq(0)').text();
    titulo = $(this).closest("tr").find('td:eq(1)').text();
    archivo = $(this).closest("tr").find('td:eq(2)').text();
    var respuesta = confirm("¿Está seguro de eliminar el fichero: "+archivo+"?");
     if(respuesta){
        $.ajax({
            url: "../conexiones/eliminarArchivo.php",
            type: "POST",
            dataType: "json",
            data: {nombre:nombre,
                   titulo:titulo,
                   archivo:archivo},
            success: function(){
                tablaArchivos.row(fila.parents('tr')).remove().draw();
            }
        });
    }    
  });


  $(document).on("click", ".btnDescargar", function(e){ 
    e.preventDefault(); 
    fila = $(this);
    archivo = $(this).closest("tr").find('td:eq(2)').text(); 
    ruta="./archivosSubidos/";
    window.location.href = ruta+archivo;
  });

//una vez que se le da al submit
$("#formUsuarios").submit(function(e){
e.preventDefault();    
var formData=new FormData($("#formUsuarios")[0]);
$.ajax({
    url: "./CargarFicheros.php",
    type: "POST",
    contentType: false,
    processData: false,
    cache:false,
    data:formData,
    success: function(res){
      alert(res);
    }
 });
$("#modal").modal("hide");    
});   
});  
