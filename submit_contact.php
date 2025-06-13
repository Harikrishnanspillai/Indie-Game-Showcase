<?php
$host = "sql206.infinityfree.com";
$dbname = "if0_39224022_ctrlaltplay";
$username = "if0_39224022";
$password = "CtrlAltPlay";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
  echo "Success";
} else {
  echo "Error: " . $stmt->error;
}

if ($stmt->execute()) {
  $to = "xdr.readend@gmail.com";
  $subject = "New Contact Form Submission";
  $body = "You received a new message:\n\nName: $name\nEmail: $email\n\nMessage:\n$message";
  $headers = "From: noreply@ctrl-alt-play.42web.io";

  if (mail($to, $subject, $body, $headers)) {
    echo "Success";
  } else {
    echo "Saved to DB, but email failed.";
  }
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
