<?php

$servername = "localhost";
$username = "iot";
$password = "Gfxb@ndits2012";
$dbname = "bustracking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>