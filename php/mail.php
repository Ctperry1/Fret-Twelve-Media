<?php

include(__DIR__."../../index.php");

$error = $name_error = $email_error = $subject_error = $message_error = "";
$name = $email = $subject = $message = "";

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if ($_POST['submit']) {
    header("location: http://example.com");
    exit;
        
    if (!preg_match('/^[a-z ]+$/i', $name)) {
        $error .= $name_error .= 'Name missing or incorrect<br>';
    }

    if (empty($email)) {
        $error .= $email_error .= 'Missing email<br>';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format<br>";
    }

    if (empty($subject)) {
        $error .= $subject_error .= 'Missing subject<br>';
    }

    if (empty($message)) {
        $error .= $message_error .= 'Missing message<br>';
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
