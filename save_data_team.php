<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Competition";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$team_name = mysqli_real_escape_string($conn, $_POST['team_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

$check_query = "SELECT * FROM team WHERE Team_Name = '$team_name' OR Email = '$email'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    echo "<script>alert('Team name or email already exists. Please choose a different one.');</script>";
} else {
    $member_one = mysqli_real_escape_string($conn, $_POST['member_one']);
    $member_two = mysqli_real_escape_string($conn, $_POST['member_two']);
    $member_three = mysqli_real_escape_string($conn, $_POST['member_three']);
    $member_four = mysqli_real_escape_string($conn, $_POST['member_four']);
    $member_five = mysqli_real_escape_string($conn, $_POST['member_five']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO team (Team_Name, Member_one, Member_two, Member_three, Member_four, Member_five, Email, Password) 
    VALUES ('$team_name', '$member_one', '$member_two', '$member_three', '$member_four', '$member_five', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header('Location:teamgameshow.php');
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

mysqli_close($conn);
?>
