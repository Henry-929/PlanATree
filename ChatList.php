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
$q4='SELECT `id` FROM `user`';
$r2= mysqli_query($conn,$q4);
$array=array();
$id=array();
$username1=array();
$listed=array();
while($rows=mysqli_fetch_assoc($r2)){
	$array[]=$rows['id'];
	
}
$q1='SELECT * FROM `personal_message` ';
$r1= mysqli_query($conn,$q1);

while($row=mysqli_fetch_assoc($r1)){
	$id[]=$row['user_id'];
	
	$username1[]=$row['user_name1'];
	}

for($i=0;$i<count($username1);$i++){
	

	if(!empty(count($id)) AND  !empty($id[$i])){
	if(in_array($id[$i],$array)){
	if(!(in_array($username1[$i],$listed))){
		$name=$username1[$i];
	
	echo '<a href="personal.php?id='.$name.'">'.$username1[$i].'</a><br>';
	$listed[]=$name;}
	}}
	else if(empty(count($id))){
		echo "No new Message";
	}
	

}



?>

</div>

</body>




</html>