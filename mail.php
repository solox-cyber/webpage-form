<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPage Form</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $select = $_POST['select'];
    $msg = $_POST['msg'];
          

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

require_once "vendor/autoload.php";             

$mail = new PHPMailer(true);

$mail->isSMTP();
//Enable SMTP debugging.
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.


try {
//Server settings
$mail->SMTPDebug = 3; // Enable verbose debug output
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'mail.osadiayesolomon.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = ''; // SMTP username
$mail->Password = ''; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
$mail->Port = 587; // TCP port to connect to

//Recipients
$mail->setFrom($email, 'WebPage Form');
$mail->addAddress('osadiayesolomon@gmail.com', 'Osadiaye Solomon'); // Add a recipient
$mail->addAddress('osadiayesolomon@gmail.com'); // Name is optional
$mail->addReplyTo($email, $name);
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

// Attachments


// Content
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = "Application for the info class";
$mail->Body = "FullName:$fullname<br>Email:$email<br>I want to Post :$select<br>Message:$msg";
$mail->AltBody = '';

$mail->send();
  echo '<div class="form" style="    margin-left: -900px;
    margin-right: 200px;">
      
        <div class="title">Message has been sent!</div>
        </div>';
  

} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}". "<a href='./' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
}
 

}
   ?>
</body>
</html>