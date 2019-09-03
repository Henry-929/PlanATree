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
<div class="container">
			<div class="row mt-1"></div>
			<div class="row mt-2"></div>
			<div class="row mt-3"></div>
			<div class="row mt-4"></div>
			<div class="row mt-5"></div>
			<div class="row mt-6"></div>
			<div class="row mt-7"></div>
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
    include ('conn.php');
	if(!empty($_SESSION["gwc"])){
		
    foreach ($arr as $v)
    {
        global $db;
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