<?php include('../../modal/admng/admng.php');
$cleaned = clean($_POST);
if(isset($cleaned['admin_id']) && isset($cleaned['admin_password'])) {
//echo "<pre>";
//print_r($_REQUEST);die;
$postarray['admin_id'] = $cleaned['admin_id'];
$postarray['admin_password'] = md5($cleaned['admin_password']);
updateAdmin($postarray);
header("location: ../../view/admng/admng.php"); 
}?>