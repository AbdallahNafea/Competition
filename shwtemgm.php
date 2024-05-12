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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle form submission
        $tournamentId = $_POST["tournament_id"];
        $eventName = $_POST["event_name"];

        // Insert subscription data into database
        $sql = "INSERT INTO Subscriptions (Tournament_ID, Event_Name) VALUES ('$tournamentId', '$eventName')";

        if ($conn->query($sql) === TRUE) {
            // Subscription saved successfully
            echo "<script>alert('Subscribed to event: $eventName');</script>";
        } else {
            // Error handling
            echo "<script>alert('Error subscribing to event: $eventName');</script>";
        }
    }
?>