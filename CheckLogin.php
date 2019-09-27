<?php
session_start();
$user=$_SESSION['user'];
$check=$_GET['check'];
if(isset($_SESSION['user'])){
	if($user=="cool"){
		if($check==NULL){
			header ("location: ChatList.php");	
		}
		else{
			//For Sprint 2
			if($check=='true'){
				header ("location: index.php");
			}else{
				header("location: login.php");
			}
		}
	}else{
		if($check==NULL){
			header("location: custperschat.php");	
		}else{
			if($check=='true'){
				header ("location: index.php");
			}else{
				header("location: login.php");
			}
		}
	}
}else{
	header("location: login.php");
}
?>