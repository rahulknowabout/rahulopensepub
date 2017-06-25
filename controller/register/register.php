<?php require_once("../../modal/register/user.php");
if(isset($_GET['key']) && $_GET['key']!= "" ){
	$user_exist = singleCustomerbyEmailMD($_GET['key']);
	if( is_array($user_exist) && count($user_exist)>0 ) {
		updateCustomer($user_exist['user_id']);	
	}
}
header("location: ../../view/register/register3.php");
?>