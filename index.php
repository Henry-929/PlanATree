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
	<link rel="stylesheet" type="text/css" href="css/default.css">
  	<link rel="stylesheet" href="css/style.min.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<style>
.div-inline
{
	float:left;
	margin: 0.5%;
};
.auto{
	object-fit: cover;
};
</style>
<body>
	<div id="wrapper" class="wrapper">
	  <header class="header htmleaf-header">
			<h1>PlantATree <span> </span></h1>
		</header>
	  <main>
	   <div class="container">

			<?php
		$userID=isset($_SESSION['user'])?$_SESSION['user']:"";

		if(!empty($userID)){
        ?>
            <h2>Welcome back!!</h2>
        <?php
            echo $userID;    
        ?>
            <br/>
            <a href="logout.php">Sign Out</a>
        <?php

            }else {

        ?>
            <h1>Illegal Access!</h1>
        <?php   
            }
        ?> 	

                
<br><br>
	<form action="searchProcess.php" method="post" >
	<p>Search Tree</p>
	   <input type="text" name="search" required="required" value="apple tree"> <br>
	   <input type="submit" name="searchButton" value="Search">
	</form>   
	<br><br>
		<a href="viewCart.php">View Cart</a>

	     <div class="pic">
			<div class="div-inline" >
				<h3>Fruit tree</h3>
                <a href="fruitTree.php"><img src="img/1.png" alt="Fruit plants" width="300" height="300"></a>
			</div>
		  
			<div class="div-inline">
				<h3>Hedge</h3>
                <a href="hedge.php"><img src="img/2.png" alt="Foliage plants" width="300" height="300"></a>
			</div>

		 </div>
				
	   </div>
	  </main>
	</div>


</body>
</html>