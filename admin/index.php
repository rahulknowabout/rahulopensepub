<?php session_start();
if(!isset($_SESSION['admin_login'])){
		header('Location:view/login/login.php');
}else{
	header('Location:view/customer/list.php');
}?>