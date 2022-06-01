<?php
  require_once("./conexion/conexion.php");
  session_start();
            if($_SESSION['usuario']==null){
                header("location:../index.php"); 
            }
  $conecta=ConectaDB::singleton(); 
  $alumnosAlta=$conecta->dadosAlta();
  $totalProfes=$conecta->totalProfes();
  $pendientes=$conecta->pendientes();
  $alum=$alumnosAlta[0]["count(*)"];
  $prof=$totalProfes[0]["count(*)"];
  $pen=$pendientes[0]["count(*)"];
  $valoresX=array('Profesores','alumnos (alta)','alumnos (no alta)');
  $valoresY=array($prof,$alum,$pen);//fechas 
  $datosX=json_encode($valoresX);
  $datosY=json_encode($valoresY);
  ?>
 <div id="graficaBarras"></div>
 <script type="text/javascript">
    function crearCadena(json){
      var parsed=JSON.parse(json);
      var arr=[];
      for(var x in parsed){
        arr.push(parsed[x]);
      }
      return arr;
    }
 </script>

<script type="text/javascript">
  datosX=crearCadena('<?php echo $datosX ?>');
  datosY=crearCadena('<?php echo $datosY ?>');
    var data = [
      {
          x: datosX,
          y: datosY,
          type: 'bar'
        }
    ];

    Plotly.newPlot('graficaBarras', data);
</script>