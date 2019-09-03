<?php
session_start();
//
$id = $_GET["id"];
if(empty($_SESSION["gwc"]))
{



    $arr = array(
        array($id,1)

    );
    $_SESSION["gwc"]=$arr;

}
else

{

    $arr = $_SESSION["gwc"];


    $chuxian = false;

    foreach ($arr as $v) {
       
        if ($v[0] == $id) 
        {
            $chuxian = true;
            

        }
    }
    if($chuxian)
    {
      
        for($i=0;$i<count($arr);$i++)
        {
            if($arr[$i][0] == $id)
            {
               
                $arr[$i][1] += 1;
            }
        }
        $_SESSION["gwc"] = $arr;

    }
        else
            {
              
                $asg = array($id,1);
               
                $arr[] = $asg;
                $_SESSION["gwc"]=$arr;
            }

}
header("location:fruitTree.php")


?>