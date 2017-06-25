<?php //echo "<pre>";
//print_r($_POST);die;
require_once("../config.php");
require_once("../functions.php");
require_once("../new_functions.php");
function singleCustomerbyEmail($user_email){
	$SQL = "Select count(*) as usercount from opens_user where user_email ='".$user_email."'";
	$res =  MySQL::query($SQL,true);
	return $res;
}
function updateCustomerPassword($user_email,$user_password,$user_new_password) {
	$SQL = "update opens_user set user_password = '".$user_new_password."' where user_email ='".$user_email."' AND user_password ='".md5($user_password)."'";
	$res =  MySQL::query($SQL);
	//return $res;
}
//echo "<pre>";print_r($_POST);die;
if(isset($_POST['temail']) && $_POST['temail']!= "" &&  isset($_POST['check']) && $_POST['check'] == "email" &&  isset($_POST['email']) && $_POST['email'] != "" ){
	$user_email = trim($_POST['temail']);
	$res = singleCustomerbyEmail($user_email);
	//print_r($res);die;
	if($res['usercount']>0){
		echo "0";	
	}else{
		echo "1";	
	}
}else {
	echo "1";
}
?>