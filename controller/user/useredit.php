<?php include('../../admin/modal/customer/customer.php');
//print_r($_POST);
//echo $GLOBALS['dblink'];

//die;
$cleanedPOST = clean($_POST);
//echo "<pre>";print_r($cleanedPOST);die;
//$cleanedGET = clean($GLOBALS['dblink'],$_GET);
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

$postarray['user_country'] = $cleanedPOST['user_country'];
updateCustomerFront($postarray,$cleanedPOST['user_id']);

}

header("location: ../../index.php")
?>