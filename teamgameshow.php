<!DOCTYPE html>
<html>
<head>
<title>Team Tournaments</title>
<!-- Include Bootstrap CSS and JS links here -->
<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Team Tournaments</h2>
    <table class="table">
        <tr>
            <th>Team Tournament ID</th>
            <th>Event Name</th>
            <th>Description</th>
            <th>Subscribe</th>
            <th scope="col">Score</th> 
        </tr>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Competition";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Read operation
        $sql = "SELECT * FROM Team_tournaments";
        $result = $conn->query($sql);

        $subscribed_teams_count = 0; // Initialize count

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Team_Tournament_ID'] . "</td>";
                echo "<td>" . $row['Event_Name'] . "</td>";
                echo "<td>" . $row['Description'] . "</td>";
                echo "<td><button class='btn btn-primary' onclick='subscribe(\"" . $row['Team_Tournament_ID'] . "\", \"" . $row['Event_Name'] . "\", this)'>Subscribe</button></td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        ?>
    </table>
    <a href="index.html" class="btn btn-secondary">back</a>

</div>

<script>
        var subscriptionCount = 0;

        function subscribe(tournamentId, eventName, button) {
            if (subscriptionCount < 5) {
                subscriptionCount++;
                button.textContent = "Subscribed";
                button.disabled = true;
                alert("Subscribed to event: " + eventName);
                
                // Update the score column
                var scoreCell = document.getElementById('score-' + tournamentId);
                if (scoreCell) {
                    scoreCell.textContent = parseInt(scoreCell.textContent) + 1;
                }
            } else {
                alert("You can only subscribe to a maximum of 5 events.");
            }
        }
    </script>

</body>
</html>
