<?php //echo "<pre>";print_r($_POST);die;
 require_once("../config.php");
require_once("../functions.php");
require_once("../new_functions.php");
function sendEmailFrom($email,$username,$usernamep,$useremailp) {
$user_email=md5($email);
$link = "<a href='".SITE_BASE_URL."'>Click To Verify Email</a>";
$to   = trim($email);
//echo $to;die;
$from = 'rahulknowabout@gmail.com';
$subject = "Opens Membership Transfer"; 
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "CC: your_email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers.= 'X-Mailer: PHP/' . phpversion();
$headers = 'From: '. $from . '' . "\r\n" .
                                'Reply-To: '. $from . '' . "\r\n" .
							    'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
$message = '<html><body>';
//$message .= '<h1>Do you want to reset your password</h1>'; 
$message .= '<table width="100%"; style="border:1px solid grey;" cellpadding="15">';
$message .= "<tr><td><h1><a href='".SITE_BASE_URL."'>Opens Homepage</a></h1></td></tr>";
//$message .= "<tr><td colspan=3>Hello ".$customerinfo['user_password'].",</td></tr>";
$message .= "<tr><td colspan=3>Hello ".$username."</td></tr>";
$message .= "<tr><td colspan=3>Your request for transfer of membership has been processed.</td></tr>";
$message .= "<tr><td colspan=3>Previous account user: ".$usernamep." (".$useremailp.").</td></tr>";
$message .= "<tr><td colspan=3>Thank you</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
 //echo $message ;die;
 $result = mail($to, $subject, $message, $headers);
 //print_r(error_get_last());die;
}
function sendEmailTo($email,$username,$usernamep,$useremailp) {
$user_email=md5($email);
$link = "<a href='".SITE_BASE_URL."'>Click To Verify Email</a>";
$to   = trim($email);
//echo $to;die;
$from = 'rahulknowabout@gmail.com';
$subject = "Opens Membership Transfer"; 
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "CC: your_email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers.= 'X-Mailer: PHP/' . phpversion();
$headers = 'From: '. $from . '' . "\r\n" .
                                'Reply-To: '. $from . '' . "\r\n" .
							    'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
$message = '<html><body>';
//$message .= '<h1>Do you want to reset your password</h1>'; 
$message .= '<table width="100%"; style="border:1px solid grey;" cellpadding="15">';
$message .= "<tr><td><h1><a href='".SITE_BASE_URL."'>Opens Homepage</a></h1></td></tr>";
//$message .= "<tr><td colspan=3>Hello ".$customerinfo['user_password'].",</td></tr>";
$message .= "<tr><td colspan=3>Hello ".$username."</td></tr>";
$message .= "<tr><td colspan=3>Your request for transfer of membership has been cancelled.</td></tr>";
$message .= "<tr><td colspan=3>Previous account user: ".$usernamep." (".$useremailp.").</td></tr>";
$message .= "<tr><td colspan=3>Thank you</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
 //echo $message ;die;
 $result = mail($to, $subject, $message, $headers);
 //print_r(error_get_last());die;
}
function getFromLevel($fromid) {
	$SQL = "Select user_name,user_level  from opens_user where 
user_email  ='".$fromid."' LIMIT 1";
	$res =  MySQL::query($SQL,true);
	return $res;
}
function getToLevel($toid) {
	$SQL = "Select user_name,user_level  from opens_user where 
user_email  ='".$toid."' LIMIT 1";
	$res =  MySQL::query($SQL,true);
	return $res;
}
function setToLevel($toid,$level){
	$SQL = "update opens_user set user_level = ".$level." ,opens_mupdate = 1  where user_email  ='".$toid."'";
	$res =  MySQL::query($SQL);
}
function setFromLevel($fromid,$level){
	$SQL = "update opens_user set user_level = ".$level.", opens_mupdate = 1  where user_email  ='".$fromid."'";
	
	$res =  MySQL::query($SQL);
}
function updateMemberShip($toid){
	$SQL = "delete from membership_rights  where id  ='".$toid."'";
	$res =  MySQL::query($SQL);
}
 //echo "<pre>";print_r($_REQUEST);die;
 if (isset($_POST['from']) && $_POST['from']!= "" && isset($_POST['to']) && $_POST['to']!= ""  && isset($_POST['tlevel']) && $_POST['tlevel']!= ""  && isset($_POST['action']) && $_POST['action'] == 1 ) {
	 $getFromLevel = getFromLevel($_POST['from'])['user_level'];
	 $gettoLevel = getToLevel($_POST['to'])['user_level'];
	 setToLevel($_POST['to'],$_POST['tlevel']);
	 setFromLevel($_POST['from'],$gettoLevel);
	 updateMemberShip($_POST['reviewid']);
	 sendEmailFrom($_POST['from'],getFromLevel($_POST['from'])['user_name'],getToLevel($_POST['to'])['user_name'],$_POST['to']);
	 sendEmailFrom($_POST['to'],getToLevel($_POST['to'])['user_name'],getFromLevel($_POST['from'])['user_name'],$_POST['from']);
	 echo 0;die;
 }else if(isset($_POST['from']) && $_POST['from']!= "" && isset($_POST['to']) && $_POST['to']!= ""  && isset($_POST['tlevel']) && $_POST['tlevel']!= ""  && isset($_POST['action']) && $_POST['action'] == 0 ) {
	  //$getFromLevel = getFromLevel($_POST['from'])['user_level'];
	 //$gettoLevel = getToLevel($_POST['to'])['user_level'];
	 //setToLevel($_POST['to'],$getFromLevel);
	 //setFromLevel($_POST['from'],$gettoLevel);
	  updateMemberShip($_POST['reviewid']);
	 sendEmailTo($_POST['from'],getFromLevel($_POST['from'])['user_name'],getToLevel($_POST['to'])['user_name'],$_POST['to']);
	 sendEmailTo($_POST['to'],getToLevel($_POST['to'])['user_name'],getFromLevel($_POST['from'])['user_name'],$_POST['from']);
	  echo 1;die;
 } else {
	 echo 2;die;
 }
		


?>