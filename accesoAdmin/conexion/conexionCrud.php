<?php
include_once("./conexion.php");
include_once("./password.php");
require './phpmailer/recursos/Exception.php';
require './phpmailer/recursos/PHPMailer.php';
require './phpmailer/recursos/SMTP.php';
include_once("./phpmailer/mail.php"); 
$conexion=ConectaDB::Singleton();
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:'';
$apellido=(isset($_POST['apellido']))?$_POST['apellido']:'';
$curso=(isset($_POST['curso']))?$_POST['curso']:'';
$correo=(isset($_POST['correo']))?$_POST['correo']:'';
$asignatura=(isset($_POST['asignatura']))?$_POST['asignatura']:'';
$password=(isset($_POST['password']))?$_POST['password']:'';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$usuario=$nombre.".".$apellido;
$hasheado=Password::hash($password);
switch($opcion){
    case 1:
        $conexion->insertarProfesor($nombre,$apellido,$curso,$asignatura,$correo,$password,$usuario);//password sin hashear
        $conexion->insertarUsuario($nombre,$usuario,$hasheado);
        $conexion->insertarAsignatura($curso,$asignatura);
        enviar_correo_profesor($correo,$usuario,$password);
        $datos=$conexion->tablaProfesores();
        break;
    case 2:
        $conexion->editar($nombre,$apellido,$curso,$asignatura,$correo,$password,$usuario,$id);
        $datos=$conexion->mostrarEditar($id);
        break;
    case 3:
        $conexion->borrar($id);
        $conexion->borrarUsuario($usuario);
        break;
    }
print json_encode($datos,JSON_UNESCAPED_UNICODE);//enviamos el array en formato json a nuestro ajax
$conexion=null;
?>