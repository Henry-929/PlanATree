<!doctype html>
<html>
<head>
<title>Chat List</title>

</head>
<body> 

<?php

session_start();
$user=$_SESSION['user'];
if(isset($_SESSION['user'])){
echo '<h1> Welcome Admin '.$_SESSION['user'].'</h1><br>';
echo '<a href="logout.php"> Logout</a><br><br>';
}else{
	header("location: login.php");
}
?>
<div id="main">
<?php
include_once('conn.php');
$q4='SELECT `id` FROM `customer`';
$r2= mysqli_query($conn,$q4);
$array=array();
$id=array();
$username1=array();
while($rows=mysqli_fetch_assoc($r2)){
	$array[]=$rows['id'];
	
}
$q1='SELECT * FROM `personal_message` ';
$r1= mysqli_query($conn,$q1);

while($row=mysqli_fetch_assoc($r1)){
	$id[]=$row['user_id'];
	
	$username1[]=$row['user_name1'];
	}

for($i=0;$i<count($array);$i++){
	

	if(!empty(count($id)) AND  !empty($id[$i])){
	if($id[$i]===$array[$i]){
		$name=$username1[$i];
	
	echo '<a href="personal.php?id='.$name.'">'.$username1[$i].'</a><br>';
	
	}}
	else if(empty(count($id))){
		echo "No new Message";
	}
	

}

//This is for the notification bell
echo '<a href="#" class="inbox">
			<span class="image"> <img src="img/YouTube-Bell-Icon-PNG-Transparent-Image.png"></span>
			<span class="bell"> '.count($listed).' </span>
	</a>';


?>

</div>

</body>




</html>