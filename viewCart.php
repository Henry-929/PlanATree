<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PlantATree</title>
	<link rel="stylesheet" type="text/css" href="css/default.css">
  	<link rel="stylesheet" href="css/style.min.css">
</head>
<body>
	<div id="wrapper" class="wrapper">
	  <header class="header htmleaf-header">
			<h1>View Cart <span> </span></h1>
		</header>
	  <main>
	   <div class="container">
	<?php
		session_start();
		$userID=isset($_SESSION['user'])?$_SESSION['user']:"";

		if(!empty($userID)){
        
            echo "<h2>$userID</h2>";   
			$vip = $_SESSION['vip'];
				if($vip>=20){
					echo " You are our VIP, You can get 10% discount!";
				};			
        ?><br>
            <a href="logout.php">Sign Out</a>
        <br>

            
<table width="100%" border="1"cellspacing="0" cellpadding="0">
    <tr>
        <td>Tree Name</td>
        <td>Unit Price</td>
        <td>Quantity</td>
        <td></td>
    </tr>

   <?php
    
    if(!empty($_SESSION["gwc"]))
    {
        $arr = array();
        $arr = $_SESSION["gwc"];
     
    }
	else{
		$arr = 0;
	}
    include ('conn.php');
	if(!empty($_SESSION["gwc"])){
		
    foreach ($arr as $v)
    {
        global $db;
        $sql = "select * from tree WHERE tree_id = '{$v[0]}'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
            echo "<tr>
        <td>{$row['tree_name']}</td>
        <td>$". $row['tree_price']. "</td>
        <td>{$v[1]}</td>
        <td><a href='delectCart.php?id={$row['tree_id']}'>Remove from Cart</a> </td>
    </tr> ";
        }
    }
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
	if($vip>=20){
		$aa = $aa*0.9;
		echo "<br/>
		Total:<mark>$".$aa."";
	}else{
    echo "<br/>
		Total:<mark>$".$aa."";
	}
	}
    ?>

</table>

<a href="homepage.php">Continue shopping</a>     
<a href="delivery.php">Proceed to Checkout</a>


</body>
<?php
}else {
?>
        
            <h1>Illegal Access!</h1>
        <?php   
            }
        ?> 