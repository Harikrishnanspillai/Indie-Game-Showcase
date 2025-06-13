<?php
$host = "sql206.infinityfree.com";
$dbname = "if0_39224022_ctrlaltplay";
$username = "if0_39224022";
$password = "CtrlAltPlay";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$gameName = $_POST["gameName"];
$genre = $_POST["genre"];
$reason = $_POST["reason"];

$sql = "INSERT INTO suggestions (game_name, genre, reason) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $gameName, $genre, $reason);

if ($stmt->execute()) {
  echo "Success";
} else {
  echo "Error: " . $stmt->error;
}


if ($stmt->execute()) {
  $to = "xdr.readend@gmail.com";
  $subject = "New Game Suggestion Submitted";
  $body = "You received a new game suggestion:\n\nGame: $gameName\nGenre: $genre\n\nReason:\n$reason";
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
