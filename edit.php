<!DOCTYPE html>
<html>
<head>
    <title>Edit Tournament</title>
    <!-- Include Bootstrap CSS link here -->
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Edit Tournament</h2>
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

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch tournament data from database
        $sql = "SELECT * FROM individual_tournaments WHERE Individual_Tournament_ID = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['Individual_Tournament_ID']; ?>">
                <div class="form-group">
                    <label for="event_name">Event Name:</label>
                    <input type="text" class="form-control" id="event_name" name="event_name" value="<?php echo $row['Event_Name']; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"><?php echo $row['Description']; ?></textarea>
                </div><br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <?php
        } else {
            echo "Tournament not found.";
        }
    } else {
        echo "Invalid request.";
    }

    // Close connection
    $conn->close();
    ?>
</div>
</body>
</html>
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
    $id = $_POST['id'];
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];

    // Update tournament data in database
    $sql = "UPDATE individual_tournaments SET Event_Name='$event_name', Description='$description' WHERE Individual_Tournament_ID=$id";

    if ($conn->query($sql) === TRUE) {
        header("location: usergame.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
