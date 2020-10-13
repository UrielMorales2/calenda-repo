<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$Telefono = $_POST["Telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br> Correo: " . $correo . "<br> Telefono: " . $Telefono . "<br> mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'calendasnuyoo@gmail.com';                     // SMTP username
    $mail->Password   = 'monosdecalenda2020';                               // SMTP password
    $mail->SMTPSecure = 'tls';// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('calendasnuyoo@gmail.com', $nombre);
    $mail->addAddress('calendasnuyoo@gmail.com');     // Add a recipient
    $mail->Subject = 'PHPMailer GMail SMTP test';
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'asunto muy importante';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8'; 
    $mail->send();
    echo '<scrip>
      alert("El Mensaje se Envío correctamente");
      window.history.go(-1);
      </scrip>
    ';
} catch (Exception $e) {
    echo "Hubo un herror al enviar el mensaje : {$mail->ErrorInfo}";
}
