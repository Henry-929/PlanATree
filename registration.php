<!doctype html>
<html>
<head>
<style>
*{
margin:0px; padding:0px;}
#main{width:200px; margin:26px auto}

	

</style>
</head>
<body>
<?php
require_once("conn.php");
if(isset($_POST['register'])){
	$first=$_POST['First_name'];
	$last=$_POST['last_name'];
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	if($first!="" && $last!=""&& $user!=""&&$pass!=""){
		$q="INSERT INTO `user` (`id`,`first_name`,`last_name`,`user_name`,`password`)
		VALUES ('','".$first."','".$last."','".$user."','".$pass."')";
		
		if(mysqli_query($conn,$q)){
			header("location:login.php");
			echo "User Successfully Registered";
		}else{
			echo $q;
			
		}
		
	}else{
		echo "Please fill all the boxes";
} 
}

?>
<div id="main">
<h2 align="center">Registration</h2><br><br>
<form method="post">
First Name: <br>
<input type="text" name="First_name"  placeholder="First Name" />
<br><br>
Last Name: <br>
<input type="text" name="last_name"  placeholder="Last Name" /><br><br>
Username<br> <input type="text" name="username" placeholder="username"/> <br><br>
Password<br> <input type="password" name="password" placeholder="Password"/><br><br>
<input type="submit" name="register" value="Register"/></form><br><br>
</form>
</div>
</body>
</html>