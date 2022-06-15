<?php
 include_once("./conexion.php");
 include_once("./password_hasheado.php");
 $conexion=ConectaDB::singleton();
session_start();
$antigua=$_POST['antigua'];
$nueva=$_POST['nueva'];
$pass=$conexion ->comprobarpass($_SESSION['usuario']);
$nueva_hash=Password::hash($nueva);
if(Password::verify($antigua,$pass[0]['password'])){
    if($_POST['nueva']!=''){
        $conexion->actualizarPass($nueva_hash,$_SESSION['usuario']);
        echo("contraseña actualizada correctamente");
    }else{
        echo("el campo nuevo passwod no puede estar vacio");
    }
}else{
    echo("contraseña antigua incorrecta");
}
?>