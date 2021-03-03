<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require(__DIR__."../../vendor/autoload.php");

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

if (!empty($_POST['g-recaptcha-response'])) {
    $secret = '6LcCxW4aAAAAAC2lQx65DW1hZ_sg8r3JG8YqTxxS';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if ($responseData->success) {
        $message = "g-recaptcha varified successfully";
    } else {
        $message = "Some error in vrifying g-recaptcha";
    }
    echo $message;



    try {
        //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.dreamhost.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'tylerperry@frettwelvemedia.com';                     // SMTP username
    $mail->Password   = 'MHPCTP2o15!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.dreamhost.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tylerperry@frettwelvemedia.com';                     //SMTP username
    $mail->Password   = 'MHPCTP2o15!';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom('tylerperry@frettwelvemedia.com', $name);
        $mail->addAddress('tylerperry@frettwelvemedia.com', 'Tyler Perry');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($email, $subject);
        // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
        $mail->From = $email;
        $mail->From = $name;
        $mail->Body    = $message;
        $mail->AltBody = $message;
        $mail->send();
        header("Location: https://frettwelvemedia.com");
        echo "Thank you, we'll be in touch!.";
        die();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
