<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

// Sanitize & fetch inputs
$name = $_POST["name"] ?? '';
$email = $_POST["email"] ?? '';
$message = $_POST["message"] ?? '';

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = '4c8d9438390a43'; // Mailtrap username
    $mail->Password   = 'a3e7b0b0dbec6c'; // Mailtrap password
    $mail->Port       = 2525;

    // From/To
    $mail->setFrom('noreply@ctrl-alt-play.com', 'Website Form');
    $mail->addAddress('xdr.readend@gmail.com'); // Recipient

    // Email content
    $mail->isHTML(false);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body    = "Name: $name\nEmail: $email\nMessage:\n$message";

    $mail->send();
    echo 'Success';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Optional: Save to DB (if needed)
$host = "sql206.infinityfree.com";
$dbname = "if0_39224022_ctrlaltplay";
$username = "if0_39224022";
$password = "CtrlAltPlay";


// Only connect if all inputs are filled
if ($name && $email && $message) {
    $conn = new mysqli($host, $username, $password, $dbname);

    if (!$conn->connect_error) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>
