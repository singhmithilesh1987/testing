<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'singh.mithilesh1987@gmail.com';                     // SMTP username
    $mail->Password   = 'aBcD0123456789';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('singh.mithilesh1987@gmail.com', 'Mailer');
    $mail->addAddress('mithics.singh@gmail.com', 'Mithilesh');     // Add a recipient
    //$mail->addAddress('mithics.singh@gmail.com');               // Name is optional
    //$mail->addReplyTo('test@example.com', 'Information');
    $mail->addCC('mithics.singh@gmail.com');
    //$mail->addBCC('test@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Mail';
    $mail->Body    = '<table>
                        <tr>
                            <td><bold>Title</bold></td>
                            <td><bold>Description</bold></td>
                        </tr>
                        <tr>
                            <td>NA</td>
                            <td>NA</td>
                        </tr>
                    </table>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //print_r('test');exit;
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}