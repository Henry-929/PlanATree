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

if(isset($_GET['id'])){
$names=$_GET['id'];
}
	
	
$q1='SELECT * FROM `personal_message` WHERE `user_name1`="'.$names.'" AND `user_name2`="'.$user.'" ';
$r1= mysqli_query($conn,$q1);
while($row=mysqli_fetch_assoc($r1)){
	$message=$row['message'];
	$username1=$row['user_name1'];
	$username2=$row['user_name2'];
	$reply=$row['Reply'];
	
	if($reply!="YES"){
	echo '<h3>'.$username1.'</h3>';
	echo '<p style="text-align:left;">'.$message.'</p>';
	}else {
		echo '<h4>'.$username2.'</h4>';
		echo '<p style="text-align:right;">'.$message.'</p>';
	}
	

}

if(isset($_POST['submit'])){
	$message=$_POST['message'];
	$user=$_SESSION['username'];
		
	$f='SELECT `id` FROM `user` WHERE `user_name`="'.$names.'"';
	$x=mysqli_query($conn,$f);
	$row=mysqli_fetch_assoc($x);
	
		
	
	$q="INSERT INTO `personal_message` (`Roomid`,`message`,`user_id`,`user_name1`,`user_name2`,`Reply`)
		VALUES ('','".$message."','".$row['id']."','".$names."','".$user."','YES')";

	
	
	
	
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