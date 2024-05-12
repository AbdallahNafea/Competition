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
$special_code = mysqli_real_escape_string($conn, $_POST['special_code']);


$sql = "INSERT INTO admingame (Name, Email, Password, special_code)
VALUES ('$name', '$email','$password','$special_code')";

if (mysqli_query($conn, $sql)) {
    header("Location: controlgame.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
