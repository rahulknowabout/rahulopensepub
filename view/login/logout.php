<?php session_start();
 if(isset($_COOKIE['member_login']) && $_COOKIE['member_login']!= "" && isset($_COOKIE['member_password']) && $_COOKIE['member_password']!= ""){
	 setcookie('member_login', '', time()-(86400*30),'/'); 
     setcookie('member_password', '', time()-(86400*30),'/');
}
else if( isset($_SESSION['member_login']) && $_SESSION['member_login']!= "" && isset($_SESSION['member_password']) && $_SESSION['member_password']!= "" ) {
		unset($_SESSION['member_login']);
		unset($_SESSION['member_password']);
	} 
header('location:../../index.php');	