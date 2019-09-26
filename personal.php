<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PlantATree</title>
	<!-----bootstrap css ----->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<!-----bootstrap Jquery ----->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	 <script>
	window.onload=function () {
     var objDiv = document.getElementById("overflow");
     objDiv.scrollTop = objDiv.scrollHeight;
	}
	 </script>
	
</head>

<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">PlantATree</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Fruit Tree
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
				require_once ("conn.php");
				$sql = "select tree_id, tree_name from tree WHERE tree_category = 'fruit'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
				echo "<a class='dropdown-item' href='tree.php?id=".$row['tree_id']."'>" .$row['tree_name']. "</a>";
				}
		  ?>		 
        </div>
      </li>
	  
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hedge
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
				$sql = "select tree_id, tree_name from tree WHERE tree_category = 'hedge'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
				echo "<a class='dropdown-item' href='tree.php?id=".$row['tree_id']."'>" .$row['tree_name']. "</a>";
				}
		  ?>
        </div>
      </li>
	  
	  <li class="nav-item ">    
		  <a class='nav-link text-decoration-none' href='ChatCheck.php' >Chat</a>
      </li>
    </ul>
	<ul class="navbar-nav">
		<li class="nav-item active">
			<?php
			if(isset($_SESSION['user'])){
				$session=$_SESSION['user'];
				if($session=="cool"){
					$n='SELECT COUNT(`message`)as total FROM `personal_message` WHERE user_name2="'.$_SESSION["user"].'" AND `Seen_Status`!="seen" AND `Reply`!="YES"';
				}else{
					$n='SELECT COUNT(`message`)as total FROM `personal_message` WHERE user_name1="'.$_SESSION["user"].'" AND `Seen_Status`!="seen" AND `Reply`="YES"';
				}
				$num=mysqli_query($conn,$n);
				$rown=mysqli_fetch_assoc($num);
				$num=$rown['total'];
				$notification=$num;
				echo "<a href='ChatCheck.php' class='nav-link' >
				<button type='button' class='btn btn-primary btn-sm'>
				".$_SESSION['user']." <span class='badge badge-light'>$notification</span>
				<span class='sr-only'>unread messages</span>
				</button>			
				</a>";
				echo "</li>";
				echo "<li class='nav-item'>";
				echo "<a class='nav-link text-decoration-none' href='logout.php' >Log Out</a>";
				echo "</li>";
			}else{
				echo "<a class='nav-link' href='login.php'>Login</span></a>
				</li>";
			}
			?>
		
	</ul>
	&nbsp;&nbsp;
    <form class="form-inline my-2 my-lg-0" action="searchProcess.php" method="post" >
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="apple">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
	
  </div>
</nav>

			<div class="row mt-1"></div>
			<div class="row mt-2"></div>
			<div class="row mt-3"></div>
			<div class="row mt-4"></div>
			<div class="row mt-5"></div>
			<div class="row mt-6"></div>
			<div class="row mt-7"></div>


<div class="container">
<div class="d-flex flex-column shadow p-3 mb-5 bg-white rounded"  >
<div class="overflow-auto" id="overflow" style="height: 32em;">
<?php

	if((isset($_GET['username'])) && (isset( $_GET['seen']))){
	$names=$_GET['username'];
	$seen=$_GET['seen'];
	}
	
	$user=$_SESSION['user'];
	$q1='SELECT * FROM `personal_message` WHERE `user_name1`="'.$names.'" AND `user_name2`="'.$user.'" ';
	$r1= mysqli_query($conn,$q1);
	while($row=mysqli_fetch_assoc($r1)){
	$id=$row['user_id'];
	$message=$row['message'];
	$username1=$row['user_name1'];
	$username2=$row['user_name2'];
	$reply=$row['Reply'];
	
	if($reply!="YES"){
	echo "<div class='d-flex flex-row'>
	
	<h3>".$username1."</h3>
	
	</div>";
	
	echo "
	<div class='d-flex flex-row'>
	
	<p>".$message."</p>
	
	</div>";
	$qSeen="UPDATE `personal_message` SET `Seen_Status`='".$seen."' WHERE `user_name1`='".$names."' AND `Reply` !='YES'";
	mysqli_query($conn,$qSeen);	
	}else {
		echo "
		<div class='d-flex flex-row-reverse'>
		
		<h3>".$username2."</h3>
		
		</div>";
		echo "
		<div class='d-flex flex-row-reverse'>
		
		<p>".$message."</p>
		
		</div>";
	}
	
	
}

if(isset($_POST['submit'])){
	$message=$_POST['message'];
	$user=$_SESSION['user'];
		
	$f='SELECT `id` FROM `customer` WHERE `user_name`="'.$names.'"';
	$x=mysqli_query($conn,$f);
	$row=mysqli_fetch_assoc($x);

		$q="INSERT INTO `personal_message` (`Roomid`,`message`,`user_id`,`user_name1`,`user_name2`,`Reply`,`Seen_Status`)
		VALUES ('','".$message."','".$row['id']."','".$names."','".$user."','YES','')";

	 if(mysqli_query($conn,$q)){
		echo("<meta http-equiv='refresh' content='1'>");
		
	}
}
?>

</div>
	<div class="col">
		<form method="post">
		<div class="form-group">
			<textarea class="form-control"  name="message" rows="3"></textarea>
		</div>
		<div class="form-group">
		<button type="submit" class="col-sm-12 btn btn-primary" name="submit">Send</button>
		</div>
		</form>
	</div>

</div>
</div>
</body>

</html>