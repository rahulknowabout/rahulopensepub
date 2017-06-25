<?php //echo "<pre>";
//print_r($_POST);die;
require_once("../config.php");
require_once("../functions.php");
require_once("../new_functions.php");
function DeleteMemberShip($postArray) {
	$SQL = "DELETE from membership_rights where from_transfer_id = '".$postArray['email']."' AND approve = 0";
	$res =  MySQL::query($SQL);
	//return $res;
}
//echo "<pre>";print_r($_POST);die;
if(isset($_POST['email']) && $_POST['email'] != ""  ){
	$postArray['email'] = $_POST['email'];
	DeleteMemberShip($postArray);
}
echo 1;die;
?>