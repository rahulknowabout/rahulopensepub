<?php //echo "<pre>";print_r($_POST);die;
 require_once("../config.php");
require_once("../functions.php");
require_once("../new_functions.php");
function updateCustomerLevel($user_id,$new_level){
	$SQL = "Update  opens_user set user_level =".$new_level.",opens_mupdate=1 where user_id =".$user_id."";
	$res =  MySQL::query($SQL);
	//return $res;
}
 if (isset($_POST['userid']) && $_POST['userid']!="" && isset($_POST['level_number']) && $_POST['level_number']!="")	{
	updateCustomerLevel($_POST['userid'],$_POST['level_number']);
	echo 1;die; 
 }else{
	echo 0;die;  
 }


?>