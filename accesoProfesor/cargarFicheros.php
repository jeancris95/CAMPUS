<?php
session_start();
include_once("./conexion/conexion.php");
$conexion=ConectaDB::singleton();
if(isset($_FILES['archivo']) && $_POST['titulo']!=''){  
    $archivo =$_FILES["archivo"]["name"];//nombre del archivo
    $carpeta="./archivosSubidosProfesor/";
    if(move_uploaded_file($_FILES['archivo']['tmp_name'],$carpeta.$archivo)){
        $porciones = explode(".", $_SESSION["usuario"]);
        $arraCurso=$conexion->consultarCurso($porciones[0],$porciones[1]);
        $curso=$arraCurso[0]["curso_imparte"];
        $conexion->insertarArchivosProfesor($curso,$_POST['titulo'],$archivo);
        echo"archivo subido con exito";
    }else{
        echo"error al cargar el archivo";
    } 
}else{
    echo("no se ha subido ningun archivo");
}

?>