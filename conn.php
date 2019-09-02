
<?php

$servername = "localhost";
$username = "tfs5503";
$password = "qq40458689";
$dbname = "se";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
