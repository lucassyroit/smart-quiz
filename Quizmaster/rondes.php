<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="rondes.css">
    <title>Smart Quiz | Rondes</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="#">Rondes</a></li>
        <li><a href="quizvraag.php">Quizvragen</a></li>
        <li><a href="scoreboard.php">Scoreboard</a></li>
        <li><a href="../index.html">Uitloggen</a></li>
    </ul>
</nav>
<main>
    <div class="quiz-button-container">
        <button class="quiz-green" data-form="../Ronde/rondetoevoegenquizmaster.html">Ronde toevoegen</button>
        <button class="quiz-red" data-form="../Ronde/rondeverwijderenquizmaster.html">Ronde verwijderen</button>
    </div>

    <?php
    // Connect to the database
    $servername = "192.168.255.119:3306";
    $username = "root";
    $password = "1234";
    $dbname = "smart_quiz";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve data from the 'ronde' table
    $sql = "SELECT ronde_id, ronde_naam FROM ronde";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if (mysqli_num_rows($result) > 0) {
        // Output data in an HTML table
        echo "<table>";
        echo "<tr>";
        echo "<th>Ronde Nummer</th>";
        echo "<th>Ronde Naam</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["ronde_id"] . "</td>";
            echo "<td>" . $row["ronde_naam"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        $text = "Er zijn momenteel geen rondes beschikbaar.";
        echo "<div style='text-align: center;'>$text</div>";
    }

    // Close the connection
    mysqli_close($conn);
    ?>
</main>

<script src="../JavaScript/quiz.js"></script>
</body>
</html>
