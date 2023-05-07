<?php
$vraag_nummer = $_POST['vraag_nummer'];
$vraag = $_POST['vraag'];
$ronde_nummer = $_POST['ronde_nummer'];
$optie1 = $_POST['optie1'];
$optie2 = $_POST['optie2'];
$optie3 = $_POST['optie3'];
$optie4 = $_POST['optie4'];
$antwoord = $_POST['antwoord'];

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
$sql = "INSERT INTO smart_quiz.vragen (vraag_id, ronde_id, vraag, optie1, optie2, optie3, optie4, correct_antwoord) 
VALUES ('$vraag_nummer', '$ronde_nummer', '$vraag', '$optie1', '$optie2', '$optie3', '$optie4', '$antwoord')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Smart Quiz | Vraag toegevoegd</title>
</head>
<body>
<button data-form="../Quizmaster/quizvraag.php">Terug</button>
<script src="../JavaScript/quiz.js"></script>
</body>
</html>
