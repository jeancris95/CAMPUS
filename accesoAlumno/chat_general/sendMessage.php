<?php

include "./database/conexion.php";
session_start();
if($_POST)
{
	$name=$_SESSION['usuario'];
    $msg=$_POST['mensaje'];
	$conexion=ConectaDB::singleton();
	$conexion->insertarMensaje($name,$msg);
}
?>