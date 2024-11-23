<?php

require "../../../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($recipient, $subject, $body) {
    $config = require "../../../config/config.php";
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $config["smtp"]["host"];
        $mail->SMTPAuth = true;
        $mail->Username = $config["smtp"]["username"];
        $mail->Password = $config["smtp"]["password"];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $config["smtp"]["port"];

        // Set email details
        $mail->setFrom($config["smtp"]["username"], "Library");
        $mail->addAddress($recipient);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->CharSet = $config["smtp"]["charset"];

        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}