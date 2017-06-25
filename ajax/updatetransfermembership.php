<?php //echo "<pre>";
//print_r($_POST);die;
require_once("../config.php");
require_once("../functions.php");
require_once("../new_functions.php");
function addMemberShip($postArray) {
	$SQL = "insert into membership_rights(from_transfer_id,to_transfer_id,to_transfer_name,transfer_level)values('".$postArray['from_transfer_id']."','".$postArray['to_transfer_id']."','".$postArray['to_transfer_name']."',".$postArray['transfer_level'].") ";
	$res =  MySQL::query($SQL);
	//return $res;
}
//echo "<pre>";print_r($_POST);die;
if(isset($_POST['temail']) && $_POST['temail']!= "" &&  isset($_POST['tname']) && $_POST['tname'] != "" &&  isset($_POST['email']) && $_POST['email'] != "" &&  isset($_POST['tlevel']) && $_POST['tlevel'] != "" ){
	$postArray['from_transfer_id'] = $_POST['email'];
	$postArray['to_transfer_id'] = $_POST['temail'];
	$postArray['to_transfer_name'] = $_POST['tname'];
	$postArray['transfer_level'] = $_POST['tlevel']; 
	addMemberShip($postArray);
}
echo 1;die;
?>