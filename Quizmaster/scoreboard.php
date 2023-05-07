<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="scoreboard.css">
    <title>Smart Quiz | Scoreboard</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="rondes.php">Rondes</a></li>
        <li><a href="quizvraag.php">Quizvragen</a></li>
        <li><a href="#">Scoreboard</a></li>
        <li><a href="../index.html">Uitloggen</a></li>
    </ul>
</nav>

<div class="scoreboard-button-container">
    <button class="scoreboard-vernieuwen" data-form="scoreboard.php">Scoreboard vernieuwen</button>
</div>

<script src="../JavaScript/quiz.js"></script>
</body>
</html>

<?php
$servername = "192.168.255.119:3306";
$username = "root";
$password = "1234";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select database
mysqli_select_db($conn, "smart_quiz");

// Update "is_correct" to true when "gegeven_antwoord" matches "correct_antwoord"
$update_query = "UPDATE antwoorden
                 SET is_correct = true
                 WHERE gegeven_antwoord = (
                   SELECT correct_antwoord
                   FROM vragen
                   WHERE vragen.vraag_id = antwoorden.vraag_id
                 )";
mysqli_query($conn, $update_query);

// Get team names and number of correct answers
$result = mysqli_query($conn, "SELECT teams.teamnaam, COUNT(antwoorden.is_correct) AS correct_answers
FROM antwoorden
INNER JOIN teams ON antwoorden.team_id = teams.team_id
WHERE antwoorden.is_correct = true
GROUP BY teams.teamnaam");

echo "<table>";
echo "<tr>";
echo "<th>Teamnaam</th>";
echo "<th>Totaal punten</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['teamnaam'] . "</td>";
    echo "<td>" . $row['correct_answers'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>