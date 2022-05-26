$(document).ready(function(){
    tablaUsuarios = $("#tablaArchivos").DataTable({
        "columnDefs":[{
         "targets": -1,
         "data":null,
         "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-success btnDescargar'><i class='bi bi-cloud-arrow-down'></i></div></div>"  
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
     $(document).on("click", ".btnDescargar", function(e){ 
        e.preventDefault(); 
        fila = $(this);
        archivo = $(this).closest("tr").find('td:eq(2)').text(); 
        ruta="../accesoProfesor/archivosSubidosProfesor/";
        window.location.href = ruta+archivo;
      });
    });