<?php require_once("../../modal/register/user.php");
if(isset($_GET['key1']) && $_GET['key1']!= "" && isset($_GET['key2']) &&  $_GET['key2']!= ""){
	$user_exist = singleCustomerbyEmailMDPass($_GET['key1'],$_GET['key2']);
	//echo "<pre>";print_r($user_exist);die;
	if( is_array($user_exist) && count($user_exist)>0 ) {
			
		header("location: ../../view/login/createnewpw.php?key1=".$_GET['key1']."&key2=".$_GET['key2']."");
	}else{
		header("location: ../../view/login/findpw.php?errorCode=1");
	}
}
?>