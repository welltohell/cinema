<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
// $dbPassword = "root";
$dbName = "cinema";

//Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}