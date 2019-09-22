<!DOCTYPE html>
<html>
<head>
<link href="Chat.css" type="text/css" rel="stylesheet">

</head>
<body>

<?php
session_start();
$user=$_SESSION['username'];
if(isset($_SESSION['username'])){
echo '<h1> Welcome Customer '.$_SESSION['username'].'</h1><br>';
echo '<a href="logout.php"> Logout</a>';
}else{
	header("location: login.php");
}
?>
<div id="main">
<div id="message_area">
<?php
include ('conn.php');
$user=$_SESSION['username'];

$q1='SELECT * FROM `personal_message` WHERE `user_name1`="'.$user.'" AND `user_name2`="cool"  ';
$r1= mysqli_query($conn,$q1);

while($row=mysqli_fetch_assoc($r1)){
	$message=$row['message'];
	$username1=$row['user_name1'];
	$username2=$row['user_name2'];
	echo '<h3 >'.$username1.'</h3>';
	echo '<h3>'.$username2.'</h3>';
	echo '<p>'.$message.'</p>';
}

if(isset($_POST['submit'])){
	$message=$_POST['message'];
	$user=$_SESSION['username'];
	
	$f='SELECT `id` FROM `customer` WHERE `user_name`="'.$user.'"';
	$x=mysqli_query($conn,$f);
	$row=mysqli_fetch_assoc($x);
	
	$q="INSERT INTO `personal_message` (`Roomid`,`message`,`user_id`,`user_name1`,`user_name2`)
		VALUES ('','".$message."','".$row['id']."','".$user."','cool')";
	
	
	
	if(mysqli_query($conn,$q)){
		echo '<h4 >'.$_SESSION['username'].'</h4>';
		echo '<p>'.$message.'</p>';
		
	};
	
}





?>
</div>
<form method="post">
<textarea name="message" style="width:400px; height:50px" placeholder="Type Your Message" class="form-control"></textarea>
<input type="submit" name="submit" style="width:90px; height:50px" value="SEND"/>
</form>
</div>

</body>
</html>