<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Tournaments</title>
    <!-- Include Bootstrap CSS link -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        /* Add custom styles here */
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Individual Tournaments</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Individual Tournament ID</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Subscribe</th>
                    <th scope="col">Score</th> 
                </tr>
            </thead>
            <tbody>
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
                $sql = "SELECT Individual_Tournament_ID, Event_Name, Description, Score FROM individual_tournaments";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Individual_Tournament_ID'] . "</td>";
                        echo "<td>" . $row['Event_Name'] . "</td>";
                        echo "<td>" . $row['Description'] . "</td>";
                        echo "<td><button class='btn btn-primary' onclick='subscribe(\"" . $row['Individual_Tournament_ID'] . "\", \"" . $row['Event_Name'] . "\", this)'>Subscribe</button></td>";
                        echo "<td id='score-" . $row['Individual_Tournament_ID'] . "'>" . $row['Score'] . "</td>"; // Score column
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data found</td></tr>";
                }


                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="index.html" class="btn btn-secondary">back</a>
    </div>

    <!-- JavaScript for the subscription action -->
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
