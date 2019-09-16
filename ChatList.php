<!doctype html>
<html>
<head>
<title>Chat List</title>

</head>
<body> 

<?php

session_start();
$user=$_SESSION['username'];
if(isset($_SESSION['username'])){
echo '<h1> Welcome Admin '.$_SESSION['username'].'</h1><br>';
echo '<a href="logout.php"> Logout</a><br><br>';
}else{
	header("location: login.php");
}
?>
<div id="main">
<?php
include_once('conn.php');
$q1='SELECT * FROM `personal_message` ';
$r1= mysqli_query($conn,$q1);

while($row=mysqli_fetch_assoc($r1)){
	$message=$row['message'];
	$username1=$row['user_name1'];
	$username2=$row['user_name2'];
	
	if($username1!="cool" && $username1!=''){
	
	
	echo '<a href="personal.php">'.$username1.'</a><br>';
	
	}else{
		echo "No new Message";
	}
}




?>

</div>

</body>




</html>