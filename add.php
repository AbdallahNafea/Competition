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

// Insert operation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST['eventName'];   
    $description = $_POST['description'];

    $sql = "INSERT INTO individual_tournaments (Event_Name, Description) VALUES ('$eventName', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: usergame.php"); // Redirect back to main page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Tournament</title>
    <!-- Include Bootstrap CSS link here -->
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add New Tournament</h2>
        <form method="post" action="add.php">
            <div class="form-group">
                <label for="eventName">Event Name:</label>
                <input type="text" class="form-control" id="eventName" name="eventName" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
                Score<input type="text" class='form-control'><br>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
