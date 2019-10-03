<?php 
		$userID =$_POST['username'];
    	$psw =$_POST['password'];
		
		require_once('conn.php');
        
        $sql_select = "SELECT user_name,password, purchased FROM customer WHERE user_name = '$userID' AND password = '$psw'";

        $result = mysqli_query($conn,$sql_select);
			$row = mysqli_fetch_array($result);
			if(!empty($userID)&&!empty($psw)){
				
					if($userID==$row['user_name']&&$psw==$row['password']) {


						session_start();

						$_SESSION['user']=$userID;
						
						$sqlTime = "SELECT order_date FROM treeorder WHERE user_name = '$userID' order by order_date desc ";

						$checkTime = mysqli_query($conn,$sqlTime);

						$row2 = mysqli_fetch_array($checkTime);
						
						$date1=date_create(date("Y-m-d"));
						$date2=date_create($row2['order_date']);
						$diff=date_diff($date1,$date2);
						$diffTime=$diff->format("%a");
						
						//no more than 12 months
						if($diffTime<366){
						$_SESSION['vip']= $row['purchased'];
						}
						
						$sqlType = "SELECT type FROM customer WHERE user_name = '$userID'";

						$type = mysqli_query($conn,$sqlType);

						$row3 = mysqli_fetch_array($type);
						
						//Wholesale customers such as other nurseries and certain landscaping companies get special prices 
						if($row3['type']=='wholesale'){
							$_SESSION['vip']=100;
						}

						 echo "
							<div class='col-sm-4'></div>
								<div class='alert alert-success col-sm text-center' role='alert'>
								  Login Successful ! <a href='index.php' class='alert-link stretched-link'>Click</a> to homepage.
								</div>
							<div class='col-sm-4'></div>
							";

						
					}else {
						echo "
							<div class='col-sm'></div>
								<div class='alert alert-danger col-sm text-center' role='alert'>
								  The Username or Password is wrong!
								</div>
							<div class='col-sm'></div>
							";
					}
			}else{
				echo "
					<div class='col-sm-4'></div>
						<div class='alert alert-danger col-sm text-center' role='alert'>
						  Please fill Username and Password!
						</div>
					<div class='col-sm-4'></div>
					";
			}
			mysqli_close($conn);
?>