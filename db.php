<?php
$servername = "localhost";
$username = "bryanoa";
$password = "comp4018";
$dbname = "db_BryanFranciscoEloi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>