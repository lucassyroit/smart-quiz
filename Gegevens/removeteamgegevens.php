<?php
$team_id = $_POST['team_id'];

// Connect to the database
$servername = "192.168.255.119:3306";
$username = "root";
$password = "1234";
$dbname = "smart_quiz";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Delete the data from the database
$sql = "DELETE FROM smart_quiz.antwoorden WHERE team_id = '$team_id'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Smart Quiz | Gegevens verwijderd</title>
</head>
<body>
<button data-form="../Jury/scoreboard.php">Terug</button>
<script src="../JavaScript/quiz.js"></script>
</body>
</html>

