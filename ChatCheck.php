<?php
session_start();
require_once('conn.php');

$user=$_SESSION['user'];
if(isset($_SESSION['user'])){
if($user=="cool"){
	header ("location: ChatList.php");
	
}else{
	header("location: custperschat.php");
	
}}else{
	header("location: login.php");
}






?>