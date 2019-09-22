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
	  
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Chat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.php">Community</a>
          <a class="dropdown-item" href="login.php">Admin</a>
        </div>
      </li>
    </ul>
	<ul class="navbar-nav">
		<li class="nav-item active">
			<?php
			if(isset($_SESSION['user'])){
				echo "<a class='nav-link' >Welcome, ".$_SESSION['user']."</a>";
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
	<div class="row">
	<div class="col-sm-12">
   <?php
    
    if(!empty($_SESSION["gwc"]))
    {
        $arr = array();
        $arr = $_SESSION["gwc"];
		?>	
	<table class="table table-hover">
	  <thead>
		<tr>
		  <th scope="col">Tree Name</th>
		  <th scope="col">Unit Price</th>
		  <th scope="col">Quantity</th>
		  <th scope="col"> </th>
		</tr>
	  </thead>
	  <tbody>
    <?php
	}
	else{
		$arr = 0;
		echo "<div class='col'>
		<div class='card text-center'>
		<div class='card-body'>
			<h5 class='card-title'>You don't have anything in Cart!</h5>
			<a href='index.php' class='btn btn-primary'>Continue shopping</a>
		</div>
		</div>
		</div>";
	}

	if(!empty($_SESSION["gwc"])){
		
    foreach ($arr as $v)
    {
 
        $sql = "select * from tree WHERE tree_id = '{$v[0]}'";
		$result = $conn->query($sql);
		
		
		while($row = $result->fetch_assoc()){
            
				echo "
		<tr>
      <td>{$row['tree_name']}</td>
      <td>$". $row['tree_price']. "</td>
      <td>{$v[1]}</td>
	  <td><a class='btn btn-primary btn-sm' href='delectCart.php?id={$row['tree_id']}'>Remove</a> </td>
    </tr>";
			
		}
		
    }
	echo"</tbody>";
		echo"</table></div>";
		echo "<div class='col-sm-12'>";
		echo "<a class='btn btn-primary btn-lg btn-block' href='index.php'>Continue Shopping</a>";
		echo "<a class='btn btn-primary btn-lg btn-block' href='#'>Proceed to Checkout</a>";
		
	$aa=0;
	foreach($arr as $k)
    {
        $k[0];
        $k[1];
        $sql1="select tree_price from tree where tree_id='{$k[0]}'";

        $price=$conn->query($sql1);
		while($row = $price->fetch_assoc())
        {
            $aa=$aa + $row['tree_price'] * $k[1];
        }
    }
		
		echo "<p class='text-center'>Total:$".$aa."</p>";
		echo "</div>";
	    
		}
    ?>
	


     

</div>
</div>
</body>
</html>