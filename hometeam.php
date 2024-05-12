<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Tournaments</title>
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
        <h2 class="text-center mb-4">Team Tournaments</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Team Tournament ID</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Subscribe</th>
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
                $sql = "SELECT Team_Tournament_ID, Event_Name, Description FROM team_tournaments";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Team_Tournament_ID'] . "</td>";
                        echo "<td>" . $row['Event_Name'] . "</td>";
                        echo "<td>" . $row['Description'] . "</td>";
                        echo "<td><button class='btn btn-primary' onclick='subscribe(\"" . $row['Team_Tournament_ID'] . "\", \"" . $row['Event_Name'] . "\")'>Subscribe</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data found</td></tr>";
                }

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- JavaScript for the subscription action -->
    <script>
        function subscribe(tournamentId, eventName) {
            // Perform subscription action here
            alert("Subscribed to event: " + eventName);
        }
    </script>
</body>
</html>
