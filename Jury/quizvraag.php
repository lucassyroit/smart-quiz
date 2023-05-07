<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="quizvraag.css">
    <title>Smart Quiz | Quizvragen</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="ronde.php">Rondes</a></li>
        <li><a href="#">Quizvragen</a></li>
        <li><a href="scoreboard.php">Scoreboard</a></li>
        <li><a href="../index.html">Uitloggen</a></li>
    </ul>
</nav>
<main>
    <div class="quiz-button-container">
        <button class="quiz-red" data-form="../Quizvraag/quizvraagverwijderenjury.html">Quizvraag verwijderen</button>
    </div>
</main>
<script src="../JavaScript/quiz.js"></script>
</body>
</html>
<?php
$servername = "192.168.255.119:3306";
$username = "root";
$password = "1234";
$dbname = "smart_quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT vraag_id, ronde_id, vraag, optie1, optie2, optie3, optie4, correct_antwoord FROM vragen";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Vraag ID</th><th>Ronde ID</th><th class='vraag'>Vraag</th><th>A</th><th>B</th><th>C</th><th>D</th><th>Juiste Antwoord</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["vraag_id"]. "</td><td>" . $row["ronde_id"]. "</td><td class='vraag'>" . $row["vraag"]. "</td><td>" . $row["optie1"]. "</td><td>" . $row["optie2"]. "</td><td>" . $row["optie3"]. "</td><td>" . $row["optie4"]. "</td><td>" . $row["correct_antwoord"]. "</td></tr>";
    }
    echo "</table>";
} else {
    $text = "Er zijn momenteel geen vragen beschikbaar.";
    echo "<div style='text-align: center;'>$text</div>";
}

$conn->close();
?>