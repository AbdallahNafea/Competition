<!DOCTYPE html>
<html>
<head>
<title>Product CRUD</title>
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
            <th>Action</th>
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

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Team_Tournament_ID'] . "</td>";
                echo "<td>" . $row['Event_Name'] . "</td>";
                echo "<td>" . $row['Description'] . "</td>";
                echo "<td><a class='btn btn-secondary' href='teamedit.php?id=" . $row['Team_Tournament_ID'] . "'>Edit</a> | <a class='btn btn-danger' href='teamdelete.php?id=" . $row['Team_Tournament_ID'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        ?>
    </table>
    <a href="teamadd.php" class="btn btn-primary">Add New Tournament</a><br><br>
    <a href="controlgame.html" class="btn btn-secondary">back</a>

</div>
</body>
</html>