<?php
include_once("conexion.php");
include_once("../recursos/phpmailer/mail.php");
include_once('../recursos/phpmailer/recursos/Exception.php');
include_once('../recursos/phpmailer/recursos/PHPMailer.php');
include_once('../recursos/phpmailer/recursos/SMTP.php');
include_once("../conexiones/password_hasheado.php");
$conexion=ConectaDB::singleton();
$correo=$_POST['correo'];
$dni=$_POST['dni'];
$datos=$conexion->recuperarPass($correo,$dni);
/* $variable="abc"; */
function generar(){
    $l=10;
    $c = 'abcdefghijklmnopqrstuvwxyz1234567890';
    for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
    return $s;
}
 $nuevaP=generar();
 if($datos==true){
    enviar_pass($correo,$nuevaP);
    $nuevaPhasheada=Password::hash($nuevaP);
   $conexion->passwordAleatorio($nuevaPhasheada,$dni);
   $cod=json_encode($array['correcto']="nueva password enviada");
   echo $cod;
}else{
    $cod=json_encode($array['error']="error en las credenciales");
    echo $cod;
}
?>