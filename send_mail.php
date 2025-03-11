<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = nl2br(htmlspecialchars($_POST["message"]));

    $to = "gaston.krabansky@gmail.com";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $fullMessage = "<html><body>";
    $fullMessage .= "<p><strong>Nom:</strong> $name</p>";
    $fullMessage .= "<p><strong>Email:</strong> $email</p>";
    $fullMessage .= "<p><strong>Message:</strong><br>$message</p>";
    $fullMessage .= "</body></html>";

    if (mail($to, $subject, $fullMessage, $headers)) {
        header("Location: index.html?status=success");
    } else {
        header("Location: index.html?status=error");
    }
    exit();
} else {
    header("Location: index.html?status=error");
    exit();
}
