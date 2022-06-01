<?php
session_start();
if($_SESSION['usuario']==null){
    header("location:../index.php"); 
}
include_once("./conexion/conexion.php");
$conexion=ConectaDB::singleton();
if(!empty($_POST['contenido'])){
   $conexion->insertarArchivos($_SESSION['usuario'],$_POST['contenido']);
}else{
    echo("error");
}

?>