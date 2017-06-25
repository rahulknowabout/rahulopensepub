<?php //echo "<pre>";
//print_r($_POST);die;
include('../../modal/contract_history/contract_history.php');
$cleanedPOST = clean($_POST);
$cleanedGET = clean($_GET);

/* ***************** Customer AJAX***********************  */
/* ***************** Customer Add***********************  */
if(isset($cleanedPOST['company_name']) && $cleanedPOST['company_name']!= ""  && isset($cleanedPOST['addsubmit'])) {
	
	$duplicate_contract = singleContractHistoryByCompanyName(addslashes($cleanedPOST['company_name']));
	//echo "<pre>";
	//print_r($duplicate_contract);
	//die;
if (is_array($duplicate_contract) && count($duplicate_contract)>0) {
	header("location: ../../view/contract_history/add.php?Error_Code=dup");die; 
}else {
//echo "<pre>";
//print_r($cleanedPOST);die;
$postarray['company_name'] = addslashes($cleanedPOST['company_name']);
$postarray['company_category'] = addslashes($cleanedPOST['company_category']);
$date = date_create(str_replace('/','-',"".$cleanedPOST['contract_date'].""));
$postarray['contract_date'] = addslashes(date_format($date,"Y-m-d"));
$date = date_create(str_replace('/','-',"".$cleanedPOST['contract_period_start_date'].""));
$postarray['contract_period_start_date'] = addslashes(date_format($date,"Y-m-d"));
$date = date_create(str_replace('/','-',"".$cleanedPOST['contract_period_end_date'].""));
$postarray['contract_period_end_date'] = addslashes(date_format($date,"Y-m-d"));
$postarray['country_info'] = addslashes($cleanedPOST['country_info']);
$postarray['company_address'] = addslashes($cleanedPOST['company_address']);
$postarray['company_phone'] = addslashes($cleanedPOST['company_phone']);
$postarray['contact_person'] = addslashes($cleanedPOST['contact_person']);
$postarray['contact_information'] = addslashes($cleanedPOST['contact_information']);
$postarray['contact_email_address'] = addslashes($cleanedPOST['contact_email_address']);
$postarray['remark'] = addslashes($cleanedPOST['remark']);

$postarray['company_regtration_number'] = addslashes($cleanedPOST['company_regtration_number']);
$postarray['company_ceo'] = addslashes($cleanedPOST['company_ceo']);
if (isset($_FILES['program_file_first']) && is_array($_FILES['program_file_first']) && isset($_FILES['program_file_first']['name']) && $_FILES['program_file_first']['name'] != "" && isset($_FILES['program_file_first']['size']) && $_FILES['program_file_first']['size']>0) {
	$postarray['business_registration'] = time()."_".$_FILES['program_file_first']['name'];
	$programFileSize =$_FILES['program_file_first']['size'];
	move_uploaded_file($_FILES['program_file_first']['tmp_name'],'../../storage/contractHistory/'.$postarray['business_registration']);
	
}else {
   $postarray['business_registration'] ="";
   $programFileSize =0;
}
contractHistoryRegister($postarray);
$contract_id = mysqli_insert_id($GLOBALS['dblink']);
$postarray = array();
$postarray['contract_id'] = $contract_id;

$postarray['contract_product_type'] = $cleanedPOST['type_first'];
	if ($cleanedPOST['type_first'] == 'SDK') {
		$postarray['contract_product_name'] = $cleanedPOST['sdk_first'];
		$postarray['contract_product_os'] = $cleanedPOST['sdk_os_first'];
	}else {
		$postarray['contract_product_name'] = $cleanedPOST['program_first'];
		$postarray['contract_product_os'] = "";

	}
	if (isset($cleanedPOST['ios_check'])) {
		//echo "<pre>";
//print_r($cleanedPOST);die;
	ContractproductRegister($postarray);
	}
	
if (isset($cleanedPOST['type_product']) && is_array($cleanedPOST['type_product']) && count($cleanedPOST['type_product'])>0 && isset($cleanedPOST['program_name']) && is_array($cleanedPOST['program_name']) && count($cleanedPOST['program_name'])>0 && isset($cleanedPOST['sdk_name']) && is_array($cleanedPOST['sdk_name']) && count($cleanedPOST['sdk_name'])>0 && isset($cleanedPOST['sdk_os']) && is_array($cleanedPOST['sdk_os']) && count($cleanedPOST['sdk_os'])>0 && count($cleanedPOST['sdk_os']) ==  count($cleanedPOST['sdk_name']) && count($cleanedPOST['sdk_name']) == count($cleanedPOST['type_product']) )	 {
	
	$length = count($cleanedPOST['type_product']);
	for ($i = 0; $i<$length;$i++) {
		$postarray = array();
		$postarray['contract_id'] = $contract_id;
		$postarray['contract_product_type'] = $cleanedPOST['type_product'][$i];
		if ($cleanedPOST['type_product'][$i] == 'SDK') {
		$postarray['contract_product_name'] = $cleanedPOST['sdk_name'][$i];
		$postarray['contract_product_os'] = $cleanedPOST['sdk_os'][$i];
	}else {
		$postarray['contract_product_name'] = $cleanedPOST['program_name'][$i];
		$postarray['contract_product_os'] = "";

	}
	if (isset($cleanedPOST['ios_check'])) {
	ContractproductRegister($postarray);
	}
	}
	
}
header("location: ../../view/contract_history/list.php"); 
}
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