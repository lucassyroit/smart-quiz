<?php
$ronde_number = $_POST['ronde_number'];
$ronde_name = $_POST['ronde_name'];

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
//Insert the data into the database
$sql = "INSERT INTO smart_quiz.ronde (ronde_id,ronde_naam) VALUES ('$ronde_number','$ronde_name')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Quiz | Ronde toegevoegd</title>
</head>
<body>
<button data-form="../Quizmaster/rondes.php">Terug</button>
<script src="../JavaScript/quiz.js"></script>
</body>
</html>
