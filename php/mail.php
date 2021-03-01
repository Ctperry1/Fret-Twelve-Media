<?php

require(__DIR__."../../index.php");
require(__DIR__."../vendor/autoload");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($subject)) {
        $errors[] = 'Subject is empty';
    }


    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (empty($errors)) {
        $toEmail = 'ctperry1@yahoo.com';
        $emailSubject = 'New email from your contact form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: __DIR__."../../index.php"');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    
        if (!empty($errors)) {
            $allErrors = join('<br/>', $errors);
            $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
        } else {
            $mail = new PHPMailer();

            // specify SMTP credentials
            $mail->isSMTP();
            $mail->Host = 'smtp.mail.yahoo.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ctperry1@yahoo.com';
            $mail->Password = 'MHPCTP2015!';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->Host = 'pop.mail.yahoo.com';
            $mail->Port = 995;
            $mail->Username = 'ctperry1@yahoo.com';
            $mail->Password = 'MHPCTP2015!';
            $mail->POPSecure = 'ssl';

            $mail->setFrom($email, $name);
            $mail->addAddress('ctperry1@yahoo.com', 'Me');
            $mail->Subject = 'New message from your website';

            // Enable HTML if needed
            $mail->isHTML(true);

            $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
            $body = join('<br />', $bodyParagraphs);
            $mail->Body = $body;

            echo $body;
            if ($mail->send()) {
                header('Location: __DIR__."../../index.php"'); // redirect to 'thank you' page
            } else {
                $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
            }
        }
    }
}
