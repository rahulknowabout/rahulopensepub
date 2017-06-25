<?php //echo "<pre>";
//print_r($_POST);die;
include('../../modal/contract_history/contract_history.php');
$cleanedPOST = clean($_POST);
$cleanedGET = clean($_GET);
if(isset($cleanedPOST['search_submit'])) {
	$contract_start_date = $cleanedPOST['contract_start_date'];
	$contract_end_date = $cleanedPOST['contract_end_date'];
	$search_category = $cleanedPOST['search_category'];
	$serach_name = $cleanedPOST['serach_name'];
	$status = $cleanedPOST['status'];

header("location: ../../view/contract_history/list.php?contract_start_date=".$contract_start_date."&contract_end_date=".$contract_end_date."&search_category=".$search_category."&serach_name=".$serach_name."&status=".$status.""); 

}else {
	header("location: ../../view/contract_history/list.php");
}

//echo "<pre>"; print_r($clean);die;
?>