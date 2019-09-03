<?php
session_start();
$id = $_GET["id"];
$arr = $_SESSION["gwc"];

foreach ($arr as $key=>$v)
{
    if($v[0]==$id)
    {
        if($v[1]>1){
            
           $arr[$key][1]-=1;
        }
        else{
         
            unset($arr[$key]);
        }
    }

}

$_SESSION["gwc"] = $arr;

header("location:viewCart.php");
