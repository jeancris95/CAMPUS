$(document).ready(function(){
    tablaUsuarios = $("#tablaUsuariosAlta").DataTable({
        "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-danger btnBaja'>Dar de baja</button></div></div>"  
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
    tablaUsuarios = $("#tablaUsuarios").DataTable({
        "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnAlta'>Dar de Alta</button></div></div>"  
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
    $(document).on("click", ".btnAlta", function(){
      fila=$(this).closest("tr");
      dni=fila.find('td:eq(3)').text();
      alta='si';
      $.ajax({
            url:"./conexion/daralta.php",
            type: "POST",
            dataType: "json",
            data: {
                dni:dni,
                alta:alta
            },
      });
    });
    $(document).on("click", ".btnBaja", function(){
        fila=$(this).closest("tr");
        dni=fila.find('td:eq(3)').text();
        $.ajax({
            url:"./conexion/darbaja.php",
            type:"POST",
            dataType:"json",
            data:{
                dni:dni
            },
        });
    });
});