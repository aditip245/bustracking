<?php

//$conn = mysql_connect("localhost","iot","Gfxb@ndits2012") or die("my sql not connected!");

//mysql_select_db("iot",$conn) or die(" db not connected");

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