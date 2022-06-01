<?php
include_once("conexion.php");
$conexion=ConectaDB::singleton();
$correo=$_POST['correo'];
$datos=$conexion->recuperarPass($correo);
echo $datos;
?>