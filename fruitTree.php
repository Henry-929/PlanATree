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
<script>
function showTree(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            
            xmlhttp = new XMLHttpRequest();
        } else {
            
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","selectTree.php?c="+str,true);
        xmlhttp.send();
    }
}
</script>
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
			<h1><a href="homepage.php">PlantATree</a> <span> </span></h1>
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
			$vip = $_SESSION['vip'];
			//buy more than 20 tree beacome VIP
				if($vip>=20){
					echo ", You are our VIP, You can get 10% discount!";
				};
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

	   <table border="1" cellpadding="0" cellspacing="0" width="100%" >
    <tr>
        <td>Tree Name</td>
		<td>Tree Stock</td>
        <td></td>
    </tr>
	<?php
    
	
	
    include ("conn.php");
    $sql = "select tree_id, tree_name,tree_stock from tree WHERE tree_category = 'fruit'";
    $result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
    
        echo " <tr>
        <td>".$row['tree_name']."</td>
		<td>".$row['tree_stock']."</td>
        <td>
        <a href='fruitCart.php?id={$row["tree_id"]}'>Add to Cart</a>
        
</td>
    </tr>";
    }

    $ann=array();
    if(!empty($_SESSION["gwc"]))
    {
        $ann=$_SESSION["gwc"];
    }
    $Quantity = count($ann);

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
	if($vip>=20){
		$aa= $aa*0.9;
    echo "<br/>Tree Category：{$Quantity}<br/>
		Total:$".$aa."";
	}else{
		echo "<br/>Tree Category：{$Quantity}<br/>
		Total:$".$aa."";
	}
    ?>
	<br>
	   
		<a href="viewCart.php">View Cart</a>

	     <div class="pic">
			<div class="div-inline" >
				<input type="radio" name="tree" value="1" onchange='showTree(this.value)'> Apple Tree<br>
				<img src="https://i.ebayimg.com/images/g/C5oAAOSwU91aVxee/s-l300.jpg" alt="apple tree" width="300" height="300">
			</div>
		  
			<div class="div-inline">
				<input type="radio" name="tree" value="2" onchange='showTree(this.value)'> Lemon Tree<br>
				<img src="https://images-na.ssl-images-amazon.com/images/I/71zinrf5WwL._SY355_.jpg" alt="lemon tree" width="300" height="300">
			</div>

		 </div>
				<div id="txtHint"><b></b></div>
	   </div>
	  </main>
	</div>


</body>
</html>