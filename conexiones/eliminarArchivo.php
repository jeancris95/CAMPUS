<?php
    include_once("./conexion.php");
    $conexion=ConectaDB::singleton();
    if(isset($_POST['nombre'])&& isset($_POST['titulo'])&&isset($_POST['archivo'])){
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:'';
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:'';
    $archivo=(isset($_POST['archivo']))?$_POST['archivo']:'';
    $cons=$conexion->consultarID($nombre,$titulo,$archivo);
    $id=$cons[0]['user_id'];
    $conexion->eliminarFichero($id); 
    }
    if(isset($_GET['archivo_desc'])){
        $ruta="../archivosSubidos/";
        $path=$ruta.$_GET['archivo_desc'];
        $type="";
        $archivo=$_GET['archivo_desc'];

    }
?>