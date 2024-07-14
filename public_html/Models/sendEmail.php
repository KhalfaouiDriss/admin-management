<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if(isset($_GET['token'])){
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $token = $_GET['token'];

    // Set up PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'drisspaca4@gmail.com';
    $mail->Password = 'fgqhzecgfdvtsjjl';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';

    // Prepare email content
    $name = htmlentities($username);
    $email = htmlentities($email);
    $subject = "Code Verification";
    $message = "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Verification Email</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 5px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #333333;
            }
            p {
                color: #555555;
            }
            .button {
                display: inline-block;
                background-color: #4CAF50;
                color: #ffffff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Hello, $name!</h1>
            <p>Thank you for registering. Please use the verification code below to complete your registration:</p>
            <p><strong>Verification Code:</strong> $token</p>
            <p>If you did not register, please ignore this email.</p>
            <p>Best regards,<br><b>Admin Management</b></p>
        </div>
    </body>
    </html>";

    try {
        // Set email parameters
        $mail->setFrom('drisspaca4@gmail.com', "Admin Management");
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        $mail->send();

        // Redirect to verification page
        header("Location: ../Components/verify.php?email_send=true");
        // echo "success".$_SESSION['token'];
        exit;
    } catch (Exception $e) {
        // Handle exception, if any
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
// Mot de passe oublié
if(isset($_GET['fond_email'])){
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $email = $_SESSION['email'];
    //$token = $_SESSION['token_search'];

    // Mise en place de PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'drisspaca4@gmail.com';
    $mail->Password = 'fgqhzecgfdvtsjjl';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';

    // Préparation du contenu de l'email
    $name = htmlentities($username);
    $email = htmlentities($email);
    $subject = "Vérification du code";
    $message = "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Email de vérification</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 5px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #333333;
            }
            p {
                color: #555555;
            }
            .button {
                display: inline-block;
                background-color: #4CAF50;
                color: #ffffff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Bonjour, $name !</h1>
            <p><strong>nom d'utilisateur :</strong> $username</p>
            <p><strong>Mot de passe :</strong> $password</p>
            <p>Si vous ne vous êtes pas inscrit, veuillez ignorer cet e-mail.</p>
            <p>Cordialement,<br><b>Admin Management</b></p>
        </div>
    </body>
    </html>";

    try {
        // Paramètres de l'email
        $mail->setFrom('drisspaca4@gmail.com', "Gestionnaire Administratif");
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Envoi de l'email
        $mail->send();

        // Redirection vers la page de vérification
        header("Location: ../index.php?action=verify");
        // echo "success".$_SESSION['token'];
        exit;
    } catch (Exception $e) {
        // Gérer les exceptions, le cas échéant
        echo "L'email n'a pas pu être envoyé. Erreur du serveur d'envoi: {$mail->ErrorInfo}";
    }
}
?>
