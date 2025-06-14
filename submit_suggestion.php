<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

$gameName = $_POST["gameName"] ?? '';
$genre = $_POST["genre"] ?? '';
$reason = $_POST["reason"] ?? '';

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
      $body = "You received a new game suggestion:\n\nGame: $gameName\nGenre: $genre\n\nReason:\n$reason";

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
        $sql = "INSERT INTO suggestions (game_name, genre, reason) VALUES (?, ?, ?)";
        $stmt->bind_param("sss", $gameName, $genre, $reason);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>
