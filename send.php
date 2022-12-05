<?php
require 'PHPMailer/PHPMailerAutoload.php';
//Client email address
$client = 'aracrooz@gmail.com';
// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer; 
 
// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 's1.ct8.pl';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'aracrooz@aracrooz.ct8.pl';       // SMTP username 
$mail->Password = 'Adrianzalewski1';         // SMTP password 
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                          // TCP port to connect to 
 
// Sender info 
$mail->setFrom('aracrooz@aracrooz.ct8.pl', 'Image Store'); 
$mail->addReplyTo('aracrooz@aracrooz.ct8.pl', 'Image Store'); 
 
// Add a recipient 
$mail->addAddress($client); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Image Store Order Confirmation'; 
 
// Mail body content 
$bodyContent = '<h1>We\'ve recieved your order</h1>'; 
$bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>'; 
$mail->Body    = $bodyContent; 
 
//Send email 

if(!$mail->send()) { 
    //echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
}
