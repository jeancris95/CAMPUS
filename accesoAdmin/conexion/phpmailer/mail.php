<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function enviar_correo_profesor($correo,$usuario,$password){
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'areadetrabajoinformatico@yahoo.com';                     //SMTP username
    $mail->Password   = 'zjrmeehagejuezpc';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setFrom('areadetrabajoinformatico@yahoo.com');
    $mail->addAddress($correo);     //Add a recipient
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Dado de alta correctamente';
    $mail->Body    = " has sido dado de alta correctamente muchas gracias por registrarte su nombre de usuario es $usuario y su contraseña es $password";
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
function enviar_correo_alumno($correo,$usuario){
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.mail.yahoo.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'areadetrabajoinformatico@yahoo.com';                     //SMTP username
        $mail->Password   = 'zjrmeehagejuezpc';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('areadetrabajoinformatico@yahoo.com');
        $mail->addAddress($correo);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Dado de alta correctamente';
        $mail->Body    = " has sido dado de alta correctamente muchas gracias por registrarte su nombre de usuario es $usuario ";
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }
?>

