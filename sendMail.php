<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);                          
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "moslemuddin6991@gmail.com";
    $mail->Password = "moslem1234";
    $mail->setFrom($email, $name);
    $mail->addAddress('istiyakaminsanto@gmail.com', 'Istiyak Amin');
    $mail->isHTML(true);                                  
    $mail->Subject = 'Got one new messege from your website';
    $mail->Body    = '<b>name: </b>' . $name . '<br>' . '<b>Email: </b>' . $email . '<br>' . '<b>Message: </b>' . $message;
    $mail->send();

    header('Location: ' . $_SERVER['HTTP_REFERER']);


} 

else header('location: http://istiyak.xyz/#contact');


