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
		  <a class='nav-link text-decoration-none' href='CheckLogin.php' >Chat</a>
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
			
				echo "<a href='CheckLogin.php' class='nav-link' >
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
			<div class="row mt-8"></div>
			<div class="row mt-9"></div>


<div class="container">
<div class="row">
<div class="col-sm-3"></div>
<?php
$q4='SELECT `id` FROM `customer`';
$r2= mysqli_query($conn,$q4);
$array=array();
$id=array();
$username1=array();
$listed=array();
$message=array();
$count=0;
$notification=0;
while($rows=mysqli_fetch_assoc($r2)){
	$array[]=$rows['id'];
}
$q1='SELECT user_id, user_name1 FROM `personal_message` ';
$r1= mysqli_query($conn,$q1);


if ($r1->num_rows >0){
	while($row=mysqli_fetch_assoc($r1)){
		$id[]=$row['user_id'];
		$username1[]=$row['user_name1'];
		}

	echo "<div class='col-sm-6'>
			<ul class='list-group'>";
		for($i=0;$i<count($username1);$i++){
			
			if(!empty(count($id)) AND  !empty($id[$i])){

			if(in_array($id[$i],$array)){

			if(!(in_array($id[$i],$listed))){
				$name=$username1[$i];
				$seen="seen";
				$q='SELECT COUNT(`message`)as total, `message` FROM `personal_message` WHERE  `user_name1`="'.$name.'" AND `Seen_Status`!="seen" AND `Reply`!="YES"';
				$rs= mysqli_query($conn,$q);
				
				while($row=mysqli_fetch_assoc($rs)){
				if(!(in_array($row['message'],$message))){
				$message[]=$row['message'];
				$count=$row['total']; 	 		
				}
				}
				echo "
				  <li class='list-group-item d-flex justify-content-between align-items-center'>
					<h4><a class='stretched-link text-decoration-none' href='personal.php?username=".$name."&seen=".$seen."'>".$name."</a></h4><br>
					<span class='badge badge-primary badge-pill'>".$count."</span>
				  </li>";
				$message=array();
				$listed[$i]=$id[$i];
				
			}
			}
			}
					
			
		}
		
}
	else{
		echo "<div class='col-sm-6'>
		<div class='card text-center'>
		<div class='card-body'>
			<h5 class='card-title'>No message!</h5>
			<a href='index.php' class='btn btn-primary'>Continue shopping</a>
		</div>
		</div>
		</div>";
	}
	
	
	
	echo "</ul>
		</div>";


?>
<div class="col-sm-3"></div>

</div>
</div>
</body>




</html>