<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'C:\xampp\composer\vendor\autoload.php';

//require 'C:\Users\User\vendor\phpmailer\src\Exception.php';
//require 'C:\Users\User\vendor\phpmailersrc\PHPMailer.php';
//require 'C:\Users\User\vendor\phpmailer\src\SMTP.php';



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer;

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'softwareengineeringproject94@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'q1w2e3r4t5y6.';

//Set who the message is to be sent from
$mail->setFrom('softwareengineeringproject94@gmail.com', 'Online Car Rental');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
//$mail->addAddress('k173740@nu.edu.pk');
    $mail->addAddress($email);     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $altbody;

    // Content
    //$mail->isHTML(true);                                  // Set email format to HTML
    //$mail->Subject = $subject;
    //$mail->Body    = $body;
    //$mail->AltBody = $altbody;
    if (!$mail->send()) {
        echo 'Mailer Error: '. $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }

}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
