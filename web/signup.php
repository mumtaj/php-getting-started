<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// extract($_REQUEST);
function getMailContent() {return "HELLO";
/*
  extract($_REQUEST);
  return "Dear User,<p></p><p>Congratulations! You have successfully subscribed for 4am-worldwide newsletter. Your details are as under:</p>".
  "<p><table border=0 padding=5><tr><td>Name:</td><td>$name</td></tr><tr><td>Email:</td><td>$email</td></tr>".
  "<tr><td>Gender:</td><td>$gender</td></tr><tr><td>Date of Birth:</td><td>$dob</td></tr></table></p>".
  "<p></p><p>Regards,</p><p><strong>Team 4AM</strong></p>";
*/
}

require '../packages/PHPMailer-master/src/Exception.php';
require '../packages/PHPMailer-master/src/PHPMailer.php';
require '../packages/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = "webmobiletechiemailer@gmail.com";
$mail->Password = "send@123";

$mail->setFrom($mail->Username, "Mumtaj Pathan");
$mail->addAddress($_REQUEST["email"], $_REQUEST["name"]);
$mail->Subject = "[4am] New User Signup";
$mail->msgHTML(getMailContent($_REQUEST)); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported';
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}

?>
