<!DOCTYPE html>
<html>
<head>
<link href="pm.css" type="text/css" rel="stylesheet">

</head>
<body>

<?php
session_start();
$user=$_SESSION['username'];
if(isset($_SESSION['username'])){
echo '<h1> Welcome Admin '.$_SESSION['username'].'</h1><br>';
echo '<a href="logout.php"> Logout</a>';
}else{
	header("location: login.php");
}
?>
<div id="main">
<?php
include_once('conn.php');

	
	
$q1='SELECT * FROM `personal_message`WHERE `user_name1`="hk1" AND `user_name2`="'.$user.'" ';
$r1= mysqli_query($conn,$q1);
while($row=mysqli_fetch_assoc($r1)){
	$message=$row['message'];
	$username1=$row['user_name1'];
	$username2=$row['user_name2'];
	echo '<h3 >'.$username1.'</h3>';
	echo '<h4>'.$username2.'</h4>';
	echo '<p>'.$message.'</p>';
}

if(isset($_POST['submit'])){
	$message=$_POST['message'];
	$user=$_SESSION['username'];
	/*  $c1='SELECT `user_name1`,`user_id` FROM `personal_message` WHERE `user_name2`="'.$user.'"';
		//$c2='SELECT `user_id` FROM `personal_message` WHERE `user_name2`="'.$user.'"';
		$r2=mysqli_query($conn,$c1);
		//$r3=mysqli_query($conn,$c2);
		while($row=mysqli_fetch_assoc($r2) /* && $row2=mysqli_fetch_assoc($r3 ){
		echo $username1=$row['user_name1'];
		
		$room=$row['user_id'];
		if($room==0){
			$room=$room+1;
		
		} else{
			$room++;
				$q="INSERT INTO `personal_message` (`Roomid`,`message`,`user_id`,`user_name1`,`user_name2`)
		VALUES ('','".$message."','".$room."','','".$user."')";
		 
		 */
	
	
		
		global $room;
		$q="INSERT INTO `personal_message` (`Roomid`,`message`,`user_id`,`user_name1`,`user_name2`)
		VALUES ('','".$message."','".$room."','','".$user."')";

	
	
	
	
	 if(mysqli_query($conn,$q)){
		echo '<h5 >'.$_SESSION['username'].'</h5>';
		echo '<p>'.$message.'</p>';
		
	}; 
	
}





?>

<form method="post">
<textarea name="message" style="width:400px; height:50px" placeholder="Type Your Message" class="form-control"></textarea>
<input type="submit" name="submit" style="width:90px; height:50px" value="SEND"/>
</form>
</div>


</body>




</html>