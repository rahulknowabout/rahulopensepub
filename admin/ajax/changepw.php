<?php //echo "<pre>";
//print_r($_POST);die;
require_once("../config.php");
require_once("../functions.php");
require_once("../new_functions.php");
function singleCustomerbyEmailPassword($user_id){
	$SQL = "Select count(*) as usercount from opens_user where user_id ='".$user_id."'";
	$res =  MySQL::query($SQL,true);
	return $res;
	}
	function updateCustomerPassword($user_id,$user_new_password) {
	$SQL = "update opens_user set user_password = '".$user_new_password."' where user_id ='".$user_id."'";
	$res =  MySQL::query($SQL);
	//return $res;
	}
//echo "<pre>";print_r($_POST);die;
if(isset($_POST['user_id']) && $_POST['user_id']!= "" &&  isset($_POST['pwds']) && $_POST['pwds']!= ""){
	$user_id = $_POST['user_id'];
	$user_new_password = md5($_POST['pwds']);
	$res = singleCustomerbyEmailPassword($user_id);
	//print_r($res);die;
	if($res['usercount']>0){
		updateCustomerPassword($user_email,$user_new_password);
		echo "0";	
	}else{
		echo "1";	
	}
}else {
	echo "1";
}
?>