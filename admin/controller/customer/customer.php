<?php include('../../modal/customer/customer.php');
$cleanedPOST = clean($_POST);
$cleanedGET = clean($_GET);
//echo "<pre>";
//print_r($_REQUEST);die;
/* ***************** Customer AJAX***********************  */
		/** AJAX Change Password **/
if(isset($cleanedPOST['user_email']) && $cleanedPOST['user_email']!= "" &&isset($cleanedPOST['ajax'])  && $cleanedPOST['ajax'] == 'ajaxon' &&isset($cleanedPOST['change_password'])  && $cleanedPOST['change_password'] == 'email') {
	$customerinfo = singleCustomerbyEmail($cleanedPOST['user_email']);
//echo "1";
if (is_array($customerinfo) && count($customerinfo)>0) {
	$user_email=md5($customerinfo['user_email']);
    $user_password=md5($customerinfo['user_password']);
   $link = "<a href='www.samplewebsite.com/reset.php?key=".$user_email."&reset=".$user_password."'>Click To Reset password</a>";

$to   = trim($customerinfo['user_email']);
$from = 'opens.epubbook@gmail.com';

$subject = "Password Reset Email"; 

$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "CC: your_email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
$message = '<html><body>';
//$message .= '<h1>Do you want to reset your password</h1>'; 
$message .= '<table width="100%"; style="border:1px solid grey;" cellpadding="15">';
$message .= "<tr><td>Home Page</td><td><a href='http://talkerscode.com'></a></td><h1>Do you want to reset your password</h1></tr>";
$message .= "<tr><td colspan=3>Hello ".$customerinfo['user_password'].",</td></tr>";
$message .= "<tr><td colspan=3>This email is for request for a password reset</td></tr>";
$message .= "<tr><td colspan=3>".$link."</td></tr>";
$message .= "<tr><td colspan=3>If you did not request a password reset,you do not need to respond to this email</td></tr>";
$message .= "<tr><td colspan=3>Thank you</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
  
$result = mail($to, $subject, $message, $headers);
if ($result) {
	echo "1";die;
}else{
	echo "0";die;
}
}else{
	echo "1";die;
}
}

/* ***************** Customer AJAX***********************  */
/* ***************** Customer Add***********************  */
if(isset($cleanedPOST['user_name']) && isset($cleanedPOST['user_email'])  && isset($cleanedPOST['addsubmit'])) {
//echo "<pre>";
//print_r($cleaned);die;
$postarray['user_name'] = $cleanedPOST['user_name'];
$postarray['user_email'] = $cleanedPOST['user_email'];
$postarray['user_country'] = $cleanedPOST['user_country'];
$postarray['user_reg_date'] = $cleanedPOST['user_reg_date'];
userRegister($postarray);
header("location: ../../view/customer/add.php"); 
}
/* ***************** Customer Delete***********************  */
if(isset($cleanedGET['user_id']) && isset($cleanedGET['del']) && $cleanedGET['del']=='del') {
//echo "<pre>";
//print_r($cleaned);die;
deleteCustomer($cleanedGET['user_id']);
//userRegister($postarray);
header("location: ../../view/customer/list.php"); 
}
/* ***************** Customer Update***********************  */
if(isset($cleanedPOST['user_id']) && isset($cleanedPOST['change_level']) && $cleanedPOST['change_level']=='change_level' && isset($cleanedPOST['level_number']) && $cleanedPOST['level_number']>0) {
//echo "<pre>";
//print_r($cleaned);die;
updateCustomerLevel($cleanedPOST['user_id'],$cleanedPOST['level_number']);
//userRegister($postarray);
header("location: ../../view/customer/edit.php?user_id=".$cleanedPOST['user_id']."&msg='changelevel'"); 
}
if(isset($cleanedPOST['user_id']) && isset($cleanedPOST['editsubmit']) && $cleanedPOST['editsubmit']=='editsubmit') {
	if (isset($cleanedPOST['user_company_name']) && isset($cleanedPOST['user_company_address']) && isset($cleanedPOST['user_company_phone']) ) {
		$postarray['user_company_name'] = addslashes($cleanedPOST['user_company_name']);
		$postarray['user_company_address'] = addslashes($cleanedPOST['user_company_address']);
		$postarray['user_company_phone'] = addslashes($cleanedPOST['user_company_phone']);
	}else{
		$postarray['user_company_name'] = '';
		$postarray['user_company_address'] = '';
		$postarray['user_company_phone'] = '';
	}
$postarray['user_name'] = $cleanedPOST['user_name'];
$postarray['user_email'] = $cleanedPOST['user_email'];
$postarray['user_country'] = $cleanedPOST['user_country'];
updateCustomer($postarray,$cleanedPOST['user_id']);
//userRegister($postarray);
header("location: ../../view/customer/list.php?code='uc123'"); 
}
/* ***************** Customer Search***********************  */
if(isset($cleanedPOST['search_submit'])  && $cleanedPOST['search_submit']=='search_submit' && isset($cleanedPOST['searchinput_name'])) {
//echo "<pre>";
//print_r($cleaned);die;
if (isset($cleanedPOST['search_customer']) && $cleanedPOST['search_customer']=='email'){
//customerSearchEmail($cleanedPOST['searchinput_name']);
header("location: ../../view/customer/list.php?search_customer=email&searchinput_name=".$cleanedPOST['searchinput_name'].""); 
}
if (isset($cleanedPOST['search_customer']) && $cleanedPOST['search_customer'] == 'name') {
//customerSearchEmail($cleanedPOST['searchinput_name']);
header("location: ../../view/customer/list.php?search_customer=name&searchinput_name=".$cleanedPOST['searchinput_name'].""); 
}
}
//echo "<pre>"; print_r($clean);die;
?>