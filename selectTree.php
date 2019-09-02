<?php
require_once("conn.php");
$id = $_GET['c'];


$sql = "SELECT * FROM tree WHERE tree_id = '$id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
	echo "<p>Infomation: " . $row['tree_des'] . "</p>";
	echo "<p>Tree Category: " . $row['tree_category'] . "</p>";
	echo "<p>Soil Drainage: " . $row['tree_soilDrainage'] . "</p>";
	echo "<p>Sun : ". $row['tree_sun'] ."</p>";
	echo "<p>Maintenance requirements Level: " . $row['tree_mainRequireLv'] . "</p>";
	echo "<p>Max height of mature tree: " . $row['tree_maxHeight'] . "</p>";
	echo "<p>Growth rate: " . $row['tree_growthRate'] . "</p>";
	echo "<p><Mark>Price: " . $row['tree_price'] . "</p>";

?>