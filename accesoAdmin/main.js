$(document).ready(function(){
  tablaUsuarios = $("#tablaUsuarios").DataTable({
     "columnDefs":[{
      "targets": -1,
      "data":null,
      "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
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

  $("#btnNuevo").click(function(){
      $("#formUsuarios").trigger("reset");
      $(".modal-header").css("background-color", "#28a745");
      $(".modal-header").css("color", "white");
      $(".modal-title").text("Nueva Persona");            
      $("#modalCRUD").modal("show");        
      id=null;
      opcion = 1; //alta
  });    
   $('#mostrar_contrasena').click(function () {
      if ($('#mostrar_contrasena').is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
  });
  
var fila;
$(document).on("click", ".btnEditar", function(){
  fila = $(this).closest("tr");
  id = parseInt(fila.find('td:eq(0)').text());
  nombre = fila.find('td:eq(1)').text();
  apellido = fila.find('td:eq(2)').text();
  curso = fila.find('td:eq(3)').text();
  asignatura = fila.find('td:eq(4)').text();
  correo = fila.find('td:eq(5)').text();
  password = fila.find('td:eq(6)').text();
  
  $("#nombre").val(nombre);
  $("#apellido").val(apellido);
  $("#curso").val(curso); 
  $("#asignatura").val(asignatura);
  $("#correo").val(correo);
  $("#password").val(password);

  opcion = 2; //editar
  
  $(".modal-header").css("background-color", "#007bff");
  $(".modal-header").css("color", "white");
  $(".modal-title").text("Editar Profesor");            
  $("#modalCRUD").modal("show");  
}); 

$(document).on("click", ".btnBorrar", function(){    
  fila = $(this);
  id = parseInt($(this).closest("tr").find('td:eq(0)').text());
  opcion = 3 //borrar
  var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
  if(respuesta){
      $.ajax({
          url: "./conexion/conexionCrud.php",
          type: "POST",
          dataType: "json",
          data: {opcion:opcion, id:id},
          success: function(){
              tablaUsuarios.row(fila.parents('tr')).remove().draw();
          }
      });
  }   
});

$("#formUsuarios").submit(function(e){
  e.preventDefault();    
  nombre = $.trim($("#nombre").val());
  apellido = $.trim($("#apellido").val());
  curso = $.trim($("#curso").val());
  asignatura = $.trim($("#asignatura").val());
  correo= $.trim($("#correo").val());   
  password = $.trim($("#password").val());
  $.ajax({
      url: "./conexion/conexionCrud.php",
      type: "POST",
      dataType: "json",
      data: {nombre:nombre,
             apellido:apellido,
             curso:curso,
            asignatura:asignatura,
             correo:correo,
             password:password,
             id:id,
             opcion:opcion},
      success: function(data){  
          id = data[0].id;            
          nombre = data[0].nombre;
          apellido = data[0].apellido; 
          curso = data[0].curso_imparte;
          asignatura = data[0].asignatura;
          correo= data[0].correo;
          password = data[0].password;
          if(opcion == 1){tablaUsuarios.row.add([id,nombre,apellido,curso,asignatura,correo,password]).draw();}
          else{tablaUsuarios.row(fila).data([id,nombre,apellido,curso,asignatura,correo,password]).draw();}            
      }        
  });
  $("#modalCRUD").modal("hide");    
});  

}); 