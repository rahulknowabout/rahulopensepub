<?php
require_once("../../config.php");
require_once("../../functions.php");
require_once("../../new_functions.php");

//$cleaned = clean($_GET);
//dump($cleaned);die;
//$Users = Users::getUserByEmailId($cleaned['email']);
//dump($Users);//die;
//$postarray =array("user_name"=>'Rahul',"user_email"=>'rahulss123@gmail.com',"user_country"=>'IND',"user_reg_date "=>'now()');
//echo "<pre>";
//print_r($postarray);
//die;
/****** Product History Register *************/
function productHistoryRegister($postarray=array()){
$SQL = "INSERT INTO `opens_product` (`parent_product_id`,`product_reg_date`, `product_type`, `product_name`,`product_ios`,`product_android`, `product_windows`, `product_linux`,`product_osx`,`product_file`, 
	`product_release_note`, `product_version`,`product_uploaded_time`,`product_user_synchronization`,`product_file_size`)
               VALUES ('".$postarray['parent_product_id']."' , '".$postarray['product_reg_date']."' , '".$postarray['product_type']."',  '".$postarray['product_name']."','".$postarray['product_ios']."','".$postarray['product_android']."' , '".$postarray['product_windows']."',  '".$postarray['product_linux']."','".$postarray['product_osx']."', '".$postarray['product_file']."',  '".$postarray['product_release_note']."','".$postarray['product_version']."','".$postarray['product_uploaded_time']."','".$postarray['product_user_synchronization']."','".$postarray['product_file_size']."');";
			  //echo $SQL;die;
        MySQL::query($SQL);
		//die;
}

/****** Product History Update *************/
function productHistoryUpdate($postarray=array()){
$SQL = "update `opens_product` SET
				`product_type` ='".$postarray['product_type']."',
				`product_name` ='".$postarray['product_name']."',
				`product_ios` ='".$postarray['product_ios']."',
				`product_android` ='".$postarray['product_android']."',
				`product_windows` ='".$postarray['product_windows']."',
				`product_linux` ='".$postarray['product_linux']."',
				`product_osx` ='".$postarray['product_osx']."',
				`product_file` ='".$postarray['product_file']."',
				`product_release_note` ='".$postarray['product_release_note']."',
				`product_version` ='".$postarray['product_version']."'
				 where product_id =".$postarray['product_id'].";";
 
        MySQL::query($SQL);
		//die;
}




/****** Product History Update *************/
/****** Product IOS Register *************/
function productIosRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_product_ios` (`product_id`, `product_language`, `product_file`,`product_sha1_checksum`,`product_file_size`)
               VALUES ( '".$postarray['product_id']."' , '".$postarray['product_language']."',  '".$postarray['product_file']."','".$postarray['product_sha1_checksum']."','".$postarray['product_file_size']."');";
			 // echo $SQL; 
			  //echo "<hr/>";
       MySQL::query($SQL);
		//die;
}
//update
function productIosUpdate($postarray=array()){
	
$SQL = "Update `opens_product_ios`
							SET 
							product_id ='".$postarray['product_id']."',
							product_language ='".$postarray['product_language']."',
							product_file ='".$postarray['product_file']."',
							product_sha1_checksum ='".$postarray['product_sha1_checksum']."'
							where product_ios_id =".$postarray['product_ios_id']." LIMIT 1;";
							//echo $SQL;
							//die;

 
        MySQL::query($SQL);
		//die;
}

// DELETE
function productIosDelete($product_ios_id) {
$SQL = "Delete from opens_product_ios where product_ios_id =".$product_ios_id." LIMIT 1;";
$res =  MySQL::query($SQL);
}
/****** Product Android Register *************/
function productAndroidRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_product_android` (`product_id`, `product_language`, `product_file`,`product_sha1_checksum`,`product_file_size`)
               VALUES ( '".$postarray['product_id']."' , '".$postarray['product_language']."',  '".$postarray['product_file']."','".$postarray['product_sha1_checksum']."','".$postarray['product_file_size']."');";
			  // echo $SQL;
        MySQL::query($SQL);
		//die;
}
//update
function productAndroidUpdate($postarray=array()){
	
$SQL = "Update `opens_product_android`
							SET 
							product_id ='".$postarray['product_id']."',
							product_language ='".$postarray['product_language']."',
							product_file ='".$postarray['product_file']."',
							product_sha1_checksum ='".$postarray['product_sha1_checksum']."'
							where product_android_id =".$postarray['product_android_id']." LIMIT 1;";

 
        MySQL::query($SQL);
		//die;
}

// DELETE
function productAndroidDelete($product_android_id) {
$SQL = "Delete from opens_product_android where product_android_id =".$product_android_id." LIMIT 1;";
$res =  MySQL::query($SQL);
}

/****** Product Linux Register *************/
function productLinuxRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_product_linux` (`product_id`, `product_language`, `product_file`,`product_sha1_checksum`,`product_file_size`)
               VALUES ( '".$postarray['product_id']."' , '".$postarray['product_language']."',  '".$postarray['product_file']."','".$postarray['product_sha1_checksum']."','".$postarray['product_file_size']."');";
			  // echo $SQL;
        MySQL::query($SQL);
		//die;
}
//update
function productLinuxUpdate($postarray=array()){
	
$SQL = "Update `opens_product_linux`
							SET 
							product_id ='".$postarray['product_id']."',
							product_language ='".$postarray['product_language']."',
							product_file ='".$postarray['product_file']."',
							product_sha1_checksum ='".$postarray['product_sha1_checksum']."'
							where product_linux_id =".$postarray['product_linux_id']." LIMIT 1;";

 
        MySQL::query($SQL);
		//die;
}

// DELETE
function productLinuxDelete($product_linux_id) {
$SQL = "Delete from opens_product_linux where product_linux_id =".$product_linux_id." LIMIT 1;";
$res =  MySQL::query($SQL);
}
/****** Product Windows Register *************/
function productWindowsRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_product_windows` (`product_id`, `product_language`, `product_file`,`product_sha1_checksum`,`product_file_size`)
               VALUES ( '".$postarray['product_id']."' , '".$postarray['product_language']."',  '".$postarray['product_file']."','".$postarray['product_sha1_checksum']."','".$postarray['product_file_size']."');";
			  // echo $SQL;
        MySQL::query($SQL);
		//die;
}
//update
function productWindowsUpdate($postarray=array()){
	
$SQL = "Update `opens_product_windows`
							SET 
							product_id ='".$postarray['product_id']."',
							product_language ='".$postarray['product_language']."',
							product_file ='".$postarray['product_file']."',
							product_sha1_checksum ='".$postarray['product_sha1_checksum']."'
							where product_windows_id =".$postarray['product_windows_id']." LIMIT 1;";

 
        MySQL::query($SQL);
		//die;
}

// DELETE
function productWindowsDelete($product_windows_id) {
$SQL = "Delete from opens_product_windows where product_windows_id =".$product_windows_id." LIMIT 1;";
$res =  MySQL::query($SQL);
}
/****** Product OSX Register *************/
function productOsxRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_product_osx` (`product_id`, `product_language`, `product_file`,`product_sha1_checksum`,`product_file_size`)
               VALUES ( '".$postarray['product_id']."' , '".$postarray['product_language']."',  '".$postarray['product_file']."','".$postarray['product_sha1_checksum']."','".$postarray['product_file_size']."');";
			   //echo $SQL;
        MySQL::query($SQL);
		//die;
}
//update
function productOsxUpdate($postarray=array()){
	
$SQL = "Update `opens_product_osx`
							SET 
							product_id ='".$postarray['product_id']."',
							product_language ='".$postarray['product_language']."',
							product_file ='".$postarray['product_file']."',
							product_sha1_checksum ='".$postarray['product_sha1_checksum']."'
							where product_osx_id =".$postarray['product_osx_id']." LIMIT 1;";

 
        MySQL::query($SQL);
		//die;
}

// DELETE
function productOsxDelete($product_osx_id) {
$SQL = "Delete from opens_product_osx where product_osx_id =".$product_osx_id." LIMIT 1;";
$res =  MySQL::query($SQL);
}
/****** Customer List *************/
function productList($limitstart,$limitend){
if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	
//$SQL = "Select * from opens_product  ORDER BY STR_TO_DATE(product_reg_date,'%Y-%m-%d') DESC LIMIT ".$limitstart.",".$limitend.";";UNIX_TIMESTAMP(columnname) DESC
$SQL = "Select * from opens_product where parent_product_id = 0  ORDER BY UNIX_TIMESTAMP(product_uploaded_time) DESC LIMIT ".$limitstart.",".$limitend.";";
			  // echo $SQL; die;
      $res =  MySQL::query($SQL);
	  //echo "<pre>";
	 // print_r($res);die;
	  return $res;
}
//productList();
/****** Product Count*************/
function countProduct(){
	$SQL = "Select count(*) as total_product from opens_product";
	$res =  MySQL::query($SQL,true);
	return $res;
}
/****** single product by Product ID*************/
function singleProduct($product_id){
	$SQL = "Select * from opens_product where product_id =".$product_id."";
	$res =  MySQL::query($SQL,true);
	return $res;
}
function singleProductByVersion($dup_array){
	$SQL = "Select * from opens_product where product_version ='".$dup_array['product_version']."' AND product_type ='".$dup_array['product_type']."' AND  product_name ='".$dup_array['product_name']."' Limit 1;";
	echo $SQL;
	$res =  MySQL::query($SQL,true);
	return $res;
}

function singleProductByVersionExcept($dup_array,$product_id){
	$SQL = "Select * from opens_product where product_version ='".$dup_array['product_version']."' AND product_type ='".$dup_array['product_type']."' AND  product_name ='".$dup_array['product_name']."' AND product_id <> ".$product_id."  AND parent_product_id = 0 Limit 1;";
	$res =  MySQL::query($SQL,true);
	return $res;
}
/****** Product Ios by Product ID*************/
function productIos($product_id){
	$SQL = "Select * from opens_product_ios where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	return $res;
}
/****** Product Android by Product ID *************/
function productAndroid($product_id){
	$SQL = "Select * from opens_product_android where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	return $res;
}
/****** Product Windows by Product ID *************/
function productwindows($product_id){
	$SQL = "Select * from opens_product_windows where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	return $res;
}
/****** Product Linux by Product ID*************/
function productLinux($product_id){
	$SQL = "Select * from opens_product_linux where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	return $res;
}
/****** Product OSX by Product ID*************/
function productOsx($product_id){
	$SQL = "Select * from opens_product_osx where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	return $res;
}

/****** product Delete *************/
function deleteProduct($product_id){
	$SQL = "Delete from opens_product where product_id =".$product_id." LIMIT 1;";
	$res =  MySQL::query($SQL);
	//return $res;
}
/****** product Ios Delete *************/
function deleteIosProduct($product_id){
	$SQL = "Delete from opens_product_ios where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	//return $res;
}
/****** product Android Delete *************/
function deleteAndroidProduct($product_id){
	$SQL = "Delete from opens_product_android where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	//return $res;
}
/****** product Windows Delete *************/
function deleteWindowsProduct($product_id){
	$SQL = "Delete from opens_product_windows where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	//return $res;
}
/****** product Linux Delete *************/
function deleteLinuxProduct($product_id){
	$SQL = "Delete from opens_product_linux where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	//return $res;
}
/****** product OSX Delete *************/
function deleteOsxProduct($product_id){
	$SQL = "Delete from opens_product_osx where product_id =".$product_id."";
	$res =  MySQL::query($SQL);
	//return $res;
}
/****** Customer Update Level *************/
function updateCustomerLevel($user_id,$new_level){
	$SQL = "Update  opens_user set user_level =".$new_level." where user_id =".$user_id."";
	$res =  MySQL::query($SQL,true);
	return $res;
}
/****** Customer Update  *************/
function updateCustomer($postarray=array(),$user_id){
	$SQL = "Update  opens_user set user_name ='".$postarray['user_name']."',
								user_email ='".$postarray['user_email']."',
								user_country ='".$postarray['user_country']."',
								user_company_name ='".$postarray['user_company_name']."',
								user_company_address ='".$postarray['user_company_address']."',
								user_company_phone ='".$postarray['user_company_phone']."'
								where user_id =".$user_id."";
	$res =  MySQL::query($SQL,true);
	return $res;
}
/****** Product Search Search by Email  *************/
function productSearch($productType,$productName,$limitstart,$limitend){
	if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	if ($productType == 'all') {
		$SQL = "Select * from opens_product where parent_product_id = 0  ORDER BY UNIX_TIMESTAMP(product_uploaded_time) DESC Limit ".$limitstart.",".$limitend." ;";
	}elseif($productName == 'all') {
		$SQL = "Select * from opens_product where product_type = '".$productType."' AND parent_product_id = 0 ORDER BY UNIX_TIMESTAMP(product_uploaded_time) DESC Limit ".$limitstart.",".$limitend." ;";
	}else {
		$SQL = "Select * from opens_product where product_type = '".$productType."'  AND product_name = '".$productName."' AND  parent_product_id = 0 ORDER BY UNIX_TIMESTAMP(product_uploaded_time) DESC Limit ".$limitstart.",".$limitend." ;";
	}
			  // echo $SQL; die;
      $res =  MySQL::query($SQL);
	  //echo "<pre>";
	  //print_r($res);die;
	  return $res;
}
/**      Product Search    Count         **/
function productSearchCount($productType,$productName){
	
	if ($productType == 'all') {
		$SQL = "Select count(*) as total_product from opens_product;";
	}elseif($productName == 'all') {
		$SQL = "Select count(*) as total_product from opens_product where product_type = '".$productType."';";
	}else {
		$SQL = "Select count(*) as total_product from opens_product where product_type = '".$productType."'  AND product_name = '".$productName."' ;";
	}
			   //echo $SQL; die;
      $res =  MySQL::query($SQL,true);
	  //echo "<pre>";
	  //print_r($res);die;
	  return $res;
}

/****** Check Product parent *************/
function CheckProductParent($product_id){
	$SQL = "Select *  from  opens_product where parent_product_id = ".$product_id." LIMIT 1;";
			  //echo $SQL; die;
      $res =  MySQL::query($SQL,true);
	  //echo "<pre>";
	  //print_r($res);die;
	  return $res;
}
function DeleteParentProduct($parent_product_id){
	$SQL = "Delete from opens_product where parent_product_id  = ".$parent_product_id." LIMIT 1;";
			  //echo $SQL; die;
      $res =  MySQL::query($SQL);
	  //echo "<pre>";
	  //print_r($res);die;
	 // return $res;
}
function UpdateProductSynchronization($product_id,$synValue){
	$SQL = "update  opens_product set product_user_synchronization = ".$synValue." where product_id = ".$product_id.";";
			  //echo $SQL; die;
      $res =  MySQL::query($SQL);
	  //echo "<pre>";
	  //print_r($res);die;
	 // return $res;
}

/****** Customer Search by Email Count *************/
function customerSearchEmailCount($email){
	$SQL = "Select count(*) as totalcustomer from  opens_user where user_email like '%".$email."%';";
			  //echo $SQL; die;
      $res =  MySQL::query($SQL,true);
	  //echo "<pre>";
	  //print_r($res);die;
	  return $res;
}
/****** Customer Search by Name  *************/
function customerSearchName($name,$limitstart,$limitend){
	if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=10; }
	
$SQL = "Select user_id, user_name,user_email,user_level,user_reg_date from opens_user where user_name like '%".$name."%' ORDER BY STR_TO_DATE(user_reg_date,'%Y-%m-%d') DESC Limit ".$limitstart.",".$limitend." ;";
			  // echo $SQL;
      $res =  MySQL::query($SQL);
	  //echo "<pre>";
	  //print_r($res);die;
	  return $res;
}
/****** Customer Search by Name Count  *************/
function customerSearchNameCount($name){
	$SQL = "Select count(*) as totalcustomer from  opens_user where user_name like '%".$name."%';";
			  // echo $SQL;
      $res =  MySQL::query($SQL,true);
	  //echo "<pre>";
	  //print_r($res);die;
	  return $res;
}

function productPackage(){
	$SQL = "Select * from opens_product where product_name  ='P_sdk' AND product_type ='SDK' AND parent_product_id = 0";
	$res =  MySQL::query($SQL);
	return $res;
}
function productClient(){
	$SQL = "Select * from opens_product where product_name  ='c_sdk' AND product_type ='SDK' AND parent_product_id = 0 ";
	$res =  MySQL::query($SQL);
	return $res;
}
function productProgram(){
	$SQL = "Select * from opens_product where product_name  ='opens_packager' AND product_type ='program' AND parent_product_id = 0";
	$res =  MySQL::query($SQL);
	return $res;
}



?>