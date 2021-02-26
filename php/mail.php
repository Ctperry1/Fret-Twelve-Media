<?php

$error = $name_error = $email_error = $subject_error = $message_error = "";
$name = $email = $subject = $message = "";

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$formcontent = "From: $name \n Subject: $subject";
$recipient = "ctperry1@yahoo.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");

if ($_POST['submit']) {

    if (!preg_match('/^[a-z ]+$/i', $name)) {
        $error .= $name_error .= 'Name missing or incorrect<br>';
    }

    if (empty($email)) {
        $error .= $email_error .= 'Missing email<br>';
    }

    if (empty($subject)) {
        $error .= $subject_error .= 'Missing title<br>';
    }

    if (empty($message)) {
        $error .= $message_error .= 'Missing comment<br>';
    }

    if ($error) {
        echo $error;
    } else {
        $to = "ctperry1@yahoo.com";

        $subject = "Contact Form Enquiry";

        $messages = "\r\n Name: $name \r\n Email: $email \r\n Subject: $subject \r\n Message: $message";
        $headers = "From:" . $name;
        $mailsent = mail($to, $subject, $messages, $headers);

        if ($mailsent) {

            $sent = true;

            $name = "";
            $email = "";
            $subjectTitle = "";
            $comment = "";
        }
    }
}
echo "Thank You!";
