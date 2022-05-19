<?php
include_once("./conexionPendientes.php");
require './phpmailer/recursos/Exception.php';
require './phpmailer/recursos/PHPMailer.php';
require './phpmailer/recursos/SMTP.php';
include_once("./phpmailer/mail.php"); 
$conexion=ConectaDB::Singleton();
$alta=(isset($_POST['alta']))?$_POST['alta']:'';
$dni=(isset($_POST['dni']))?$_POST['dni']:'';
//me da todo los datos del alumno
$datos=$conexion->datoscorreo($dni); 
$conexion->darAlta($alta,$dni);
enviar_correo($datos[0]['correo'],$datos[0]['usuario']);
$rol="alumno";
$conexion->aniadirUsuario($datos[0]['nombre'],$datos[0]['usuario'],$datos[0]['password'],$rol);
?>