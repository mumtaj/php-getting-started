<?php

print_r($_REQUEST);
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("./sendgrid-php.php");
// If not using Composer, uncomment the above line
$email = new \SendGrid\Mail\Mail();
$email->setFrom("mumtaj@gmail.com", "Mumtaj Pathan");
// $email->setFrom("test@example.com", "Example User");
$email->setSubject("[4am] New User Signup");
$email->addTo("mumtaj@gmail.com", "Mumtaj Pathan");
// $email->addContent(
//     "text/plain", "and easy to do anywhere, even with PHP"
// );
extract($_REQUEST);
$email->addContent(
  "text/html", 
  "Dear User,<p>Congratulations! New user has signed up. The details are as under:</p>".
  "<p><table border=0 padding=5><tr><td>Name:</td><td>$name</td></tr><tr><td>Email:</td><td>$email</td></tr>".
  "<tr><td>Gender:</td><td>$gender</td></tr><tr><td>Date of Birth:</td><td>$dob</td></tr></table></p>".
  "<p></p><p>Regards,</p><p><strong>Team 4AM</strong></p>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
