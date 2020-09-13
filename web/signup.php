<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

function getMailContent() {
    extract($_REQUEST);
    return "<p></p><p>Congratulations! You have successfully subscribed for 4am-worldwide newsletter on ".
        (new \DateTime())->format('d-M-Y H:i:s A') . ".</p><p>Your details are as under:</p>".
        "<p><table class=center border=0 padding=10><tr><td>Name:</td><td>$name</td></tr><tr><td>Email:</td><td>$email</td></tr>".
        "<tr><td>Gender:</td><td>$gender</td></tr><tr><td>Date of Birth:</td><td>".
        (new \DateTime($dob))->format('d F, Y')."</td></tr></table></p><p></p><p></p>";        
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
$message = getMailContent($_REQUEST);
$bodyHtml = "Dear <strong>".$_REQUEST["name"]."</strong>, $message <p>Regards,<br/><strong>Team 4AM</strong></p>";
$mail->msgHTML($bodyHtml); 
// $mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = $bodyHtml;
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if (! $mail->send()) {
    echo "<div class=center><p>Unfortunately, you failed to subscribe to 4am newsletter. Please try again.</p>".
        "<p>Kindly share below error message with Administrator (".$mail->Username."): </p>".
        "<p><code>" . $mail->ErrorInfo . "</code></p><p></p></div>";
} else {
    echo $message;
}

?>
