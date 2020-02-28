<?php
$servername = "localhost";
$username = "root";
$password = "@Newayw123";
$dbname = "bill_format";

// Create connection);
$conn = new mysqli($servername, $username, $password, $dbname );
mysqli_query($conn,"SET character_set_results=utf8");
mysqli_query($conn,"SET character_set_client=utf8");
mysqli_query($conn,"SET character_set_connection=utf8");
// mysqli_query($conn, "SET NAMES UTF8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";
?>