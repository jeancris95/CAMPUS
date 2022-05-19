<?php

include "./database/conexion.php";
session_start();
if($_POST)
{
	$name=$_SESSION['usuario'];
    $msg=$_POST['msg'];
	$conexion=ConectaDB::singleton();
	$conexion->insertarMensaje($name,$msg);
	if($conexion)
	{
		header('Location: chatGeneral.php');
	}
	else
	{
		echo "Algo salió mal";
	}
	
}
?>