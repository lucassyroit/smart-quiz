<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="teams.css">
    <title>Smart Quiz | Teams</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="teams.php">Teams</a></li>
        <li><a href="../index.html">Uitloggen</a></li>
    </ul>
</nav>

<div class="team-button-container">
    <button class="team-green" data-form="../Team/teamtoevoegen.html">Team toevoegen</button>
    <button class="team-red" data-form="../Team/teamverwijderen.html">Team verwijderen</button>
</div>

<?php

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

// Perform a query to select all data from the teams table
$sql = "SELECT team_id, teamnaam FROM teams";
$result = $conn->query($sql);

// Check if query was successful
if ($result->num_rows > 0) {
    // Start the table
    echo "<table>";
    echo "<tr>";
    echo "<th>Teamnummer</th>";
    echo "<th>Teamnaam</th>";
    echo "</tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["team_id"] . "</td>";
        echo "<td>" . $row["teamnaam"] . "</td>";
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
    $text = "Er zijn momenteel geen teams beschikbaar.";
    echo "<div style='text-align: center;'>$text</div>";
}

$conn->close();
?>
<script src="../JavaScript/quiz.js"></script>
</body>
</html>
