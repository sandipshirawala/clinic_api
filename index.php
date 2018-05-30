<?php
include_once('connect.php');
$con=new connect();
//$con->family_master("view");
$url_array=explode("/", $_SERVER['REQUEST_URI']);

$function_name = $url_array[2];
$action =$url_array[3];

if($function_name=="family_master")
{
    if($action=="view")
    {
      $con->family_master("view");
    }
    if($action=="add")
    {
      $con->family_master("add",$_POST["data"]);
    }
    if($action=="delete")
    {
      $con->family_master("delete",$_POST["data"]);
    }
    if($action=="edit")
    {
      $con->family_master("edit",$_POST["data"]);
    }
    if($action=="do_update")
    {
      $con->family_master("do_update",$_POST["data"]);
    }
    if($action=="search")
    {
      $con->family_master("search",$_POST["data"]);
    }
}



?>
