
<?php
//bfe9fe7d7536e5:d922c313@us-cdbr-iron-east-02.cleardb.net/heroku_4a3b3456e356787?reconnect=true

$servername = "us-cdbr-iron-east-02.cleardb.net";
$username = "bfe9fe7d7536e5";
$password = "d922c313";
$dbname = "heroku_4a3b3456e356787";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
