<?php 
		$userID =$_POST['username'];
    	$psw =$_POST['password'];
		
		require_once('conn.php');
        
        $sql_select = "SELECT user_name,password, purchased FROM customer WHERE user_name = '$userID' AND password = '$psw'";

        $ret = mysqli_query($conn,$sql_select);

        $row = mysqli_fetch_array($ret);

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

						header("Location:index.php");

						mysqli_close($conn);
					}else {
						header("Location:login.php?err=1");
					}
			}else{
				header("Location:login.php?err=2");
			}
?>