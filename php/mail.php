<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPmailer\SMTP;

//Get input from contact form
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Create a new PHPMailer instance
$mail = new PHPMailer(true);
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->CharSet = PHPMailer::CHARSET_UTF8;

//Set SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.dreamhost.com';
$mail->SMTPAuth = true;
$mail->Username = 'tylerperry@frettwelvemedia.com';
$mail->Password = 'MHPCTP2o15!';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

//Set email/name for send and recipient.
$mail->setFrom('tylerperry@frettwelvemedia.com', $name);
$mail->addAddress('tylerperry@frettwelvemedia.com');
//$mail->addReplyTo($email, $name);
//$mail->isHTML(true);

//Build email subject and body
$mail->Name = $name;
$mail->Subject = 'Contact form: ' . $subject;
$mail->Body    = "Contact form submission\n\n" . $email . "\n\n". $message;
$mail->AltBody = '';

//Validate google recaptcha
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("Location: https://frettwelvemedia.com");
    echo 'Message sent!';
}
