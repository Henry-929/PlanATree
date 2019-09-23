<?php
require_once("conn.php");
	
	$password=$_POST['password'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$type=$_POST['type'];
	$username=$_POST['username'];
	
	
		$q="INSERT INTO `customer` (`id`,`password`,`first_name`,`last_name`,`gender`, `email`, `phone`, `address`, `purchased`, `type`, `user_name`)
		VALUES ('','".$password."','".$first_name."', '".$last_name."', '".$gender."', '".$email."','".$phone."','".$address."','','".$type."','".$username."')";
		
		if(mysqli_query($conn,$q)){
			
			header("location:login.php?err=3");
			
		}else{
			echo $q;
			
		}
		

?>