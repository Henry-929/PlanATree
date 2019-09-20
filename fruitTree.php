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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">PlantATree</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Fruit Tree
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
				include ("conn.php");
				$sql = "select tree_name from tree WHERE tree_category = 'fruit'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
				echo "<a class='dropdown-item' href='fruitTree.php'>" .$row['tree_name']. "</a>";
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
				include ("conn.php");
				$sql = "select tree_name from tree WHERE tree_category = 'hedge'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
				echo "<a class='dropdown-item' href='hedge.php'>" .$row['tree_name']. "</a>";
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
    <form class="form-inline my-2 my-lg-0" action="searchProcess.php" method="post" >
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value="apple tree">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="container">
	<div class="row">
			<div class="row mt-1"></div>
			<div class="row mt-2"></div>
			<div class="row mt-3"></div>
			<div class="row mt-4"></div>
	
	<div class="card-deck shadow p-3 mb-5 bg-white rounded">
		
	<?php
    include ("conn.php");
    $sql = "select * from tree WHERE tree_category = 'fruit'";
    $result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
	echo "
	
	<div class='card'>
    <img class='card-img-top' src='".$row['pic']."' alt='" .$row['tree_name']. "' >
    <div class='card-body'>
      <h5 class='card-title'>" .$row['tree_name']. "</h5>
      <p class='card-text'>
	  
	<p>Infomation: " . $row['tree_des'] . "</p>
	<p>Tree Category: " . $row['tree_category'] . "</p>
	<p>Soil Drainage: " . $row['tree_soilDrainage'] . "</p>
	<p>Sun : ". $row['tree_sun'] ."</p>
	<p>Maintenance requirements Level: " . $row['tree_mainRequireLv'] . "</p>
	<p>Max height of mature tree: " . $row['tree_maxHeight'] . "</p>
	<p>Growth rate: " . $row['tree_growthRate'] . "</p>
	<p><Mark>Price: " . $row['tree_price'] . "</p>  
	</p>
    </div>
    <div class='card-footer'>
	<div class='d-flex bd-highlight mb-2'>
	<div class='p-2 bd-highlight'>
      <small class='text-muted'>Tree Stock:". $row['tree_stock'] ."</small>
	  </div>
	<div class='ml-auto p-2 bd-highlight'>  
	<a class='btn btn-primary btn-sm' href='fruitCart.php?id={$row["tree_id"]}'>Add to Cart</a>
	</div>
	</div>
	</div>
	</div>
	
	";
	}
	echo "</div>";
    ?>
	

	<nav class="navbar fixed-bottom navbar-light bg-light">
	<?php
	$ann=array();
    if(!empty($_SESSION["gwc"]))
    {
        $ann=$_SESSION["gwc"];
    }

    $aa=0;
    foreach($ann as $k)
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

		echo "Total:$".$aa."";
	?>
	
	<a class="btn btn-primary" href="viewCart.php" role="button">
	<svg id="i-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M6 6 L30 6 27 19 9 19 M27 23 L10 23 5 2 2 2" /><circle cx="25" cy="27" r="2" /><circle cx="12" cy="27" r="2" /></svg> View Cart</a>
	</nav>
</div>

</div>

</main>



</body>
</html>