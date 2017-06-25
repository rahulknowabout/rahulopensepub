<?php //echo "<pre>";
//print_r($_POST);die;
require_once("../config.php");
require_once("../functions.php");
require_once("../new_functions.php");
function singleCustomerbyEmailPassword($user_email,$user_password){
	$SQL = "Select count(*) as usercount from opens_user where user_email ='".$user_email."' AND user_password ='".md5($user_password)."'";
	$res =  MySQL::query($SQL,true);
	return $res;
	}
	function updateCustomerPassword($user_email,$user_password,$user_new_password) {
	$SQL = "update opens_user set user_password = '".$user_new_password."' where user_email ='".$user_email."' AND user_password ='".md5($user_password)."'";
	$res =  MySQL::query($SQL);
	//return $res;
	}
//echo "<pre>";print_r($_POST);die;
if(isset($_POST['email']) && $_POST['email']!= "" &&  isset($_POST['pwdos']) && $_POST['pwdos']!= "" &&  isset($_POST['pwds']) && $_POST['pwds']!= ""){
	$user_email = trim($_POST['email']);
	$user_password = $_POST['pwdos'];
	$user_new_password = md5($_POST['pwds']);
	$res = singleCustomerbyEmailPassword($user_email,$user_password);
	//print_r($res);die;
	if($res['usercount']>0){
		updateCustomerPassword($user_email,$user_password,$user_new_password);
		echo "0";	
	}else{
		echo "1";	
	}
}else {
	echo "1";
}
?>