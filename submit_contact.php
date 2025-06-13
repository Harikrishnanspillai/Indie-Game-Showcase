<?php
$host = "sql206.infinityfree.com";
$dbname = "if0_39224022_ctrlaltplay";
$username = "if0_39224022";
$password = "CtrlAltPlay";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize inputs
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// Insert into DB
$sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

$stmt->execute();

$stmt->close();
$conn->close();
?>
