<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Competition";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$email_check_query = "SELECT * FROM user WHERE Email='$email' LIMIT 1";
$result = mysqli_query($conn, $email_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { 
    echo '<script>alert("Email already exists");</script>';
} else { 
    $sql = "INSERT INTO user (Name, Email, Password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration successful!");</script>';
        echo '<script>document.getElementById("myForm").reset();</script>'; 
        echo '<script>window.location.href = "homeuser.php";</script>'; // Redirect after resetting form
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
