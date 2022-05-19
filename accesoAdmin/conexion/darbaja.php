<?php
include_once("./conexionPendientes.php");
$conexion=ConectaDB::Singleton();
$dni=(isset($_POST['dni']))?$_POST['dni']:'';
$conexion->darBaja($dni);
//añadir mas adelante que si se da de baja de esta tabla tambien tiene que ser retirada de la tabla de usuarios
?>