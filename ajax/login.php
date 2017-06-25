<?php require_once("../config.php");
require_once("../functions.php");
require_once("../new_functions.php");
function singleCustomerbyEmailPassword($user_email,$user_password){
	$SQL = "Select count(*) as usercount,email_verified from opens_user where user_email ='".$user_email."' AND user_password = '".$user_password."'";
	$res =  MySQL::query($SQL,true);
	return $res;
	}
//echo "<pre>";print_r($_POST);die;
if(isset($_POST['email']) && $_POST['email']!= "" && isset($_POST['pwd']) && $_POST['pwd']!= "" ){
	$user_email = trim($_POST['email']);
	$res = singleCustomerbyEmailPassword($user_email,md5($_POST['pwd']));
	//print_r($res);die;
	if($res['usercount']>0){
		if($res['email_verified'] == 1 ){ 
		if (isset($_POST['checkValue']) && $_POST['checkValue'] == '1') {
		ob_start();
		setcookie ("member_login",$_POST['email'],time()+ (86400*30),"/");
		setcookie ("member_password",$_POST['pwd'],time()+ (86400*30),"/");
		ob_end_flush();
		echo "1";
		}else {
			$_SESSION['member_login'] = $_POST['email'];
			$_SESSION['member_password'] = $_POST['pwd'];
			echo "1";

		}
		   
		}else {
			 echo "2";
		}
	}else{
		echo "0";	
	}
}else {
	echo "0";
}
?>