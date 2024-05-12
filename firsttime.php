<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Competition";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($database);

// Create tables
// User table
$sql = "CREATE TABLE IF NOT EXISTS `user` (
    `User_ID` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(50) NOT NULL,
    `Email` VARCHAR(50) NOT NULL,
    `Password` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`User_ID`)
)";

if ($conn->query($sql) === TRUE) {
    echo "User table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Team table
$sql = "CREATE TABLE IF NOT EXISTS `team` (
    `Team_ID` INT NOT NULL AUTO_INCREMENT,
    `Team_Name` VARCHAR(50) NOT NULL,
    `Member_One` VARCHAR(50) NOT NULL,
    `Member_Two` VARCHAR(50) NOT NULL,
    `Member_Three` VARCHAR(50) NOT NULL,
    `Member_Four` VARCHAR(50) NOT NULL,
    `Member_Five` VARCHAR(50) NOT NULL,
    `Email` VARCHAR(50) NOT NULL,
    `Password` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`Team_ID`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Team table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Individual tournaments table
$sql = "CREATE TABLE IF NOT EXISTS `individual_tournaments` (
    `Individual_Tournament_ID` INT NOT NULL AUTO_INCREMENT,
    `Event_Name` VARCHAR(50) NOT NULL,
    `Description` VARCHAR(50) NOT NULL,
    `Score` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`Individual_Tournament_ID`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Individual tournaments table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Team tournaments table
$sql = "CREATE TABLE IF NOT EXISTS `team_tournaments` (
    `Team_Tournament_ID` INT NOT NULL AUTO_INCREMENT,
    `Event_Name` VARCHAR(50) NOT NULL,
    `Description` VARCHAR(50) NOT NULL,
    `Score` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`Team_Tournament_ID`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Team tournaments table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Admin table
$sql = "CREATE TABLE IF NOT EXISTS `admingame` (
    `Admin_ID` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(50) NOT NULL,
    `Email` VARCHAR(50) NOT NULL,
    `Password` VARCHAR(50) NOT NULL,
    `Special_Code` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`Admin_ID`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Admin table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
