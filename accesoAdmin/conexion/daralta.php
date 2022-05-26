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
$nombre=$datos[0]['nombre'];
$apellido=$datos[0]['apellido'];
$nombreApellido=$nombre." ".$apellido;
$nombreCurso=$datos[0]['curso'];
$nombre_profesor=$conexion->consultaCurso($nombreCurso);
$nombre_completo=$nombre_profesor[0]['nombre']." ".$nombre_profesor[0]['apellido'];
$conexion->darAlta($alta,$dni);
enviar_correo_alumno($datos[0]['correo'],$datos[0]['usuario']);
$rol="alumno";
$conexion->aniadirUsuario($datos[0]['nombre'],$datos[0]['usuario'],$datos[0]['dni'],$datos[0]['password'],$rol);
$conexion->insertarAlumno($nombreCurso,$nombre_completo,$nombreApellido);
?>