<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

print_r($_REQUEST); die("1");

/*
// extract($_REQUEST);
function getMailContent($_REQUEST) {
  extract($_REQUEST);
  return "Dear User,<p></p><p>Congratulations! You have successfully subscribed for 4am-worldwide newsletter. Your details are as under:</p>".
  "<p><table border=0 padding=5><tr><td>Name:</td><td>$name</td></tr><tr><td>Email:</td><td>$email</td></tr>".
  "<tr><td>Gender:</td><td>$gender</td></tr><tr><td>Date of Birth:</td><td>$dob</td></tr></table></p>".
  "<p></p><p>Regards,</p><p><strong>Team 4AM</strong></p>";

}

// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("./sendgrid-php.php");
// If not using Composer, uncomment the above line

define('SENDGRID_API_KEY','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');

$mail = new \SendGrid\Mail\Mail();
$mail->setFrom("webmobiletechie@gmail.com", "Web Mobile Techie");
// $mail->setFrom("test@example.com", "Example User");
$mail->setSubject("[4am] New User Signup");
$mail->addTo($_REQUEST["email"], $_REQUEST["name"]);
// $mail->addContent(
//     "text/plain", "and easy to do anywhere, even with PHP"
// );
$mail->addContent("text/html", getMailContent($_REQUEST));

$sendgrid = new \SendGrid(SENDGRID_API_KEY);
try {
    $response = $sendgrid->send($mail);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
*/

?>
