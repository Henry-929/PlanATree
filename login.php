<!doctype html>
<html>

<style>
*{margin:0px; padding:0px;}
#main{width:200px; margin:20px auto;}
</style>
<body>
<div id="main">
<?php
session_start();
require_once('conn.php');

if(isset($_POST['login'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	if($user!=""&&$pass!=""){
		
		$q='SELECT * FROM `user` WHERE `user_name`="'.$user.'" AND `password`="'.$pass.'"';
		$R=mysqli_query($conn,$q);
		if(mysqli_num_rows($R)>0){
			$_SESSION['username']=$user;
			if($user=="cool"){
			header("location:ChatList.php");
			}else{
				header("location:custperschat.php");
			}
			echo "Successfully logged in";
		}else{
			echo "Incoorect Password or User Name";
		} 
		
	}
}

?>
<h2 style="text-align:center">Login</h2>
<form method="post">
Username: <br> <input type="text" name="username" placeholder="username"/> <br><br>
Password<br> <input type="password" name="password" placeholder="Password"/><br><br>
<input type="submit" name="login" value="Login"/>     
<a href="registration.php">Register</a>
</form>
</div>
</body>


</html>