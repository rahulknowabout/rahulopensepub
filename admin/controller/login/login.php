<?php include('../../modal/admng/admng.php');
$cleaned = clean($_POST);
//print_r($_POST);die;
if(isset($cleaned['login_id']) && isset($cleaned['login_password'])) {
	//print_r($_POST);die;
	$login = selectAdmin();
	if ($login['admin_id'] == $cleaned['login_id'] && $login['admin_password'] == "".md5($cleaned['login_password']."") ){
		$_SESSION['admin_login'] = $login['admin_id'];
		header("location: ../../index.php"); 
	}else{
		header("location: ../../view/login/login.php?error_code=L1"); 
	} 
}else{
	header("location: ../../view/login/login.php?error_code=L1"); 
}
?>