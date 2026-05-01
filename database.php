<?php
// Database connection parameters
$db_server = "localhost";
$db_user = "root";  
$db_pass = "";  
$db_name = "discover_saudi";

// creating a connection object
$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else
{
    echo "Connected successfully";
}

