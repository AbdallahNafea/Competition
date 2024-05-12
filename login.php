<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "Competition";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM user WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if ($password == $user['Password']) {
            $_SESSION['email'] = $email;
            header("Location: homeuser.php");
            exit();
        } else {
            echo '<script>alert("Invalid password!");</script>';
        }
    } else {
        echo '<script>alert("Invalid email!");</script>';
    }
}

mysqli_close($conn);
?>
