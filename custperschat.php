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
$q1='SELECT * FROM `personal_message` ';
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
	/* $q="INSERT INTO `personal_message` (`Roomid`,`message`,`user_id`,`user_name1`,`user_name2`)
		VALUES ('','".$message."','".$user."','')"; AND `user_id`="0"*/
		
		//$c1='SELECT `user_name1`,`user_id` FROM `personal_message` WHERE `user_name2`="'.$user.'"';
		$c1='SELECT `user_name1` FROM `personal_message` ';
		$c2='SELECT `user_id` FROM `personal_message` ';
		$c3='SELECT `user_id` FROM `personal_message` WHERE `user_name1`="'.$user.'" ';
		$c4='SELECT `Num_count`, `user_name1` FROM `personal_message`  ';
		$c5='SELECT `Roomid`, `Num_count` FROM `personal_message` ';
		
		$r2=mysqli_query($conn,$c1);
		$r3=mysqli_query($conn,$c2);
		$r4=mysqli_query($conn,$c3);
		$r5=mysqli_query($conn,$c4);
		$r6=mysqli_query($conn,$c5);
		/* while($rows=mysqli_fetch_assoc($r2) && $rows2=mysqli_fetch_assoc($r3)){
		$username1=$rows['user_name1'];
		$room=$rows2['user_id'];
		
		echo $username1;
		echo $room;
		} */
		//$result=array();
	
		//while($row=mysqli_fetch_assoc($r2) ){
		// $result[]=$row;
		// echo result[0];
		//}
			

	//$resultset=array();
	//$name[]=array();
	//$res[]=array();
	
	$i=0;
	
	$c=0;
	 $k=0;
	$done=true;
	$row=mysqli_fetch_array($r2,MYSQLI_NUM );
	$count=mysqli_fetch_array($r5,MYSQLI_ASSOC);
	$room=mysqli_fetch_array($r6,MYSQLI_ASSOC);
	//$check=mysqli_fetch_array($r4,MYSQLI_ASSOC );
	if($rows=mysqli_fetch_array($r3,MYSQLI_NUM )==0 ){
		$i=1;
		$c=1;
		
		
	}else{
		/* while($row=mysqli_fetch_array($r2,MYSQLI_NUM )){
		echo "great";
			
		} */
		
	
		
		$result=array();
		$e=array();
		 do{
			
			//for($x=0;$x<=$room['r'];$x++){
		
				
			//if($rows=mysqli_fetch_array($r3,MYSQLI_NUM ) ){
				//echo $row[0].'<br>'.$rows[0];
				//$k=$k+1;
				//if(strpos($row[$room],$user )==true){
					//print ($row[$k]);
				
					//if($i<=0){
						//if(!empty($check)){
							print ("it is not empty");
						while($check=mysqli_fetch_array($r4,MYSQLI_ASSOC )){
							$e[]=$check['user_id'];
							$count['Num_count'];
							
						
							print ("hareem ".$check['user_id']."<br>");
							//$k=$k+1;
						 	if($check['user_id']>0 ){
								
								print("fine then");
								/* print( $check[$x]);
								$i=$check[$x];
								echo "haha".$x;
								$c=$count[$x]; */
									//$k=$k+1;
									$done=false;
							}else{
								//$c=1;
								while ($count=mysqli_fetch_array($r5,MYSQLI_ASSOC)){
									$result[]=$count['user_name1'];
								}
								if(in_array($user,$result)){
									echo "OKAY";
								if(in_array(0,$e)){
								echo "ok";
								$i=$count['Num_count']+1;
								$c=$i+1;
								print($count['Num_count']);
								
								}else{
									print("nope");
								}
								}
								
								
								
								//echo "nana".$k." ".$x;
								//echo $room['r'];
								//$k=$room['r'];
								
								//echo "Bnana".$count[$x];
								//$i=$count[$x]++;
								//echo "Anana".$count[$x];
								//$count[$k]++;
								//$c=$count[$x]++;
								
								//print("blah blah <br>");
									//$k=$k+1;
									$done=false;
							} 
						}
						$i=$room['Roomid']+1;
						$c=$room['Num_count']+1;
						echo "why aren't you printing anything ";
							
							echo"What ????";
						//$i=$count[$k]+1;
						//$c=$count[$k]+$i;
						//print("welcome welcome<br>");
									//$k=$k+1;
						//echo "great<br>";
						/* }else{

						} */
					
/* 					}else{
				print("annoying<br>");	
					} */
				
			//}}
			//mysqli_free_result($r2);
			//mysqli_free_result($r3);
			//$resultset[]=$row;
			//$name=$row['user_name1'];
			//$res=$rows['user_id'];
			//echo $row[0].'<br>';
			//printf ($row[0]);
		//$k++;	
		}while($room=mysqli_fetch_array($r6,MYSQLI_ASSOC) );
		//echo"DEAD";
	} 
		/*  for($x=0; $x<count($resultset);$x++){
		//$f=implode(" ",$resultset[$x]);
			 foreach ($resultset as $aa) {
				 if($aa==$user){
					 
			echo "true <br/>\n"; 
			}else{
				//echo "false";
			}
			//echo $aa." <br/>\n"; */
			//}   
		
		
			/* if(result[$x]==0){
				
			} */
		// }
 	

	
	
	$q="INSERT INTO `personal_message` (`Roomid`,`message`,`user_id`,`user_name1`,`user_name2`,`Num_count`)
		VALUES ('','".$message."','".$i."','".$user."','cool','".$c."')";
	
	
	
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
<div id="test">
<?php
include ('connection.php');
$c1='SELECT `user_name1`,`user_id` FROM `personal_message` WHERE `user_name2`="'.$user.'"';
$r2=mysqli_query($conn,$c1);
$result=array();
	
		while($row=mysqli_fetch_assoc($r2) ){
		 $result[]=$row;
		 print_r($result);
		 /* for($x=0; $x<=$result; $x++){
			 
		 echo res['user_name1'];
		 } */
		}

?>
</div>
</body>
</html>