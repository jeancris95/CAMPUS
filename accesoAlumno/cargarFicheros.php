<?php
session_start();
if($_SESSION['usuario']==null){
    header("location:../index.php"); 
}
include_once("./conexion/conexion.php");
$conexion=ConectaDB::singleton();
if(isset($_FILES['archivo']) && $_POST['titulo']!=''){  
    $archivo =$_FILES["archivo"]["name"];//nombre del archivo
    $carpeta="./archivosSubidos/";
    if(move_uploaded_file($_FILES['archivo']['tmp_name'],$carpeta.$archivo)){
        $conexion->insertarArchivo($_SESSION["usuario"],$_POST['titulo'],$archivo);
        echo"archivo subido con exito";
    }else{
        echo"error al cargar el archivo";
    } 
}else{
    echo("no se ha subido ningun archivo");
}

?>