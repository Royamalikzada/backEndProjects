<?php

// __DIR__ => restituisce il percorso alla cartella che contiene questo file
require __DIR__ . '/../vendor/autoload.php';

// echo "funziono";

//Per comprendere quedto percorso, apri il file
// - vendor/phpmailer/phpmailer/src/phpmailer.php
// Analizza il namespace: e PHPMailer\PHPMailer
// L'ultimo ripetezione (PHPMailer) e il nome della classe, che si trova
// Per l'appunto all'interno del namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.mailgun.org';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'postmaster@sandboxc813603b703d42959df4753c3a94a3e2.mailgun.org';                     //SMTP username
$mail->Password   = '207a3e70211042218f21841b69cac7b6-1b237f8b-1a0f5ea6';                               //SMTP password
$mail->SMTPSecure = "tls";                                          //Enable implicit TLS encryption
$mail->Port       = 587; 

$mail ->setFrom("royamelikzade@gmail.com");
$mail ->addAddress($_POST["to"]);
$mail->Subject = 'Here is the subject';
$mail->Body = $_POST["message"];

try{
    $mail -> send();
} catch(Exception $e) {
    var_dump($e);
}
