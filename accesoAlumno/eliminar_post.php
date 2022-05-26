<?php
    include_once("./conexion/conexion.php");
    $conexion=ConectaDB::singleton();
    $id=$_POST['id'];
    $conexion->eliminarArchivos($id);
?>