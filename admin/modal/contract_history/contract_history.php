<?php
require_once("../../config.php");
require_once("../../functions.php");
require_once("../../new_functions.php");
date_default_timezone_set('Asia/Kolkata');


//$cleaned = clean($_GET);
//dump($cleaned);die;
//$Users = Users::getUserByEmailId($cleaned['email']);
//dump($Users);//die;
//$postarray =array("user_name"=>'Rahul',"user_email"=>'rahulss123@gmail.com',"user_country"=>'IND',"user_reg_date "=>'now()');
//echo "<pre>";
//print_r($postarray);
//die;
/****** Customer Register *************/
function contractHistoryRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_contract_history` (`company_name`, `company_category`, `contract_date`,`contract_period_start_date`,`contract_period_end_date`, `country_info`, `company_address`,`company_phone`,`contact_person`, `contact_information`, `contact_email_address`,`remark`,`business_registration`, `company_regtration_number`, `company_ceo`,contract_status,contract_history_created)
               VALUES ( '".$postarray['company_name']."' , '".$postarray['company_category']."',  '".$postarray['contract_date']."','".$postarray['contract_period_start_date']."','".$postarray['contract_period_end_date']."','".$postarray['country_info']."' , '".$postarray['company_address']."',  '".$postarray['company_phone']."','".$postarray['contact_person']."','".$postarray['contact_information']."','".$postarray['contact_email_address']."' , '".$postarray['remark']."',  '".$postarray['business_registration']."','".$postarray['company_regtration_number']."','".$postarray['company_ceo']."','available','".date('Y-m-d h:i:s')."');";
			  // echo $SQL;
        MySQL::query($SQL);
		//die;
}
/** Contact History Update **/
function contractHistoryUpdate($postarray=array()){
$SQL = "update `opens_contract_history` SET
				`company_name` ='".$postarray['company_name']."',
				`company_category` ='".$postarray['company_category']."',
				`contract_date` ='".$postarray['contract_date']."',
				`contract_period_start_date` ='".$postarray['contract_period_start_date']."',
				`contract_period_end_date` ='".$postarray['contract_period_end_date']."',
				`country_info` ='".$postarray['country_info']."',
				`company_address` ='".$postarray['company_address']."',
				`company_phone` ='".$postarray['company_phone']."',
				`contact_person` ='".$postarray['contact_person']."',
				`contact_information` ='".$postarray['contact_information']."',
				`contact_email_address` ='".$postarray['contact_email_address']."',
				`remark` ='".$postarray['remark']."',
				`business_registration` ='".$postarray['business_registration']."',
				`company_regtration_number` ='".$postarray['company_regtration_number']."',
				`company_ceo` ='".$postarray['company_ceo']."',
				`contract_status` ='".$postarray['contract_status']."'
				
				 where contract_history_id =".$postarray['contract_history_id'].";";
				// echo $SQL;
				 //die;
 
        MySQL::query($SQL);
		//die;
}
/** Contract Product Register **/
function ContractproductRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_contract_product` (`contract_id`, `contract_product_type`, `contract_product_name`,`contract_product_os`)
               VALUES ( '".$postarray['contract_id']."' , '".$postarray['contract_product_type']."',  '".$postarray['contract_product_name']."','".$postarray['contract_product_os']."');";
			  // echo $SQL;
        MySQL::query($SQL);
		//die;
}
/** Contract Product Register **/

/** UPDATE Contract History Product **/

function ContractproductUpdate($postarray=array()){
$SQL = "update `opens_contract_product` SET
				
				`contract_product_type` = '".$postarray['contract_product_type']."',
				`contract_product_name` = '".$postarray['contract_product_name']."',
				`contract_product_os` = '".$postarray['contract_product_os']."'
				 where contract_product_id = ".$postarray['contract_product_id'].";";
// echo $SQL;die;
        MySQL::query($SQL);

}
/** UPDATE Contract History Product **/
/** Delete Contract Product **/
function ContractproductDelete($contract_product_id) {
	$SQL = "Delete from opens_contract_product where contract_product_id =".$contract_product_id."";
	$res =  MySQL::query($SQL);
	//return $res;
	
}



/** Delete Contract Product **/
/****** Contract History List *************/
function contractHistoryList($limitstart,$limitend){
if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	
$SQL = "Select * from opens_contract_history  ORDER BY UNIX_TIMESTAMP(contract_history_created) DESC LIMIT ".$limitstart.",".$limitend.";";
			  // echo $SQL; die;
      $res =  MySQL::query($SQL);
	  //echo "<pre>";
	  //print_r($res);die;
	  return $res;
}


function countContractHistory(){
	$SQL = "Select count(*) as total_Contract_history from opens_contract_history  ";
	$res =  MySQL::query($SQL,true);
	return $res;
}


/****** Contract Product  by Contract ID*************/
function productContract($contract_id){
	$SQL = "Select * from opens_contract_product where contract_id =".$contract_id."";
	$res =  MySQL::query($SQL);
	return $res;
}

/**  Serach Contract History **/
function contractHistorySearch($contract_start_date,$contract_end_date,$search_category,$serach_name,$status,$limitstart,$limitend){
	if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	if ($status == 'all') {
			if ($search_category == 'company_name') {
					if ($serach_name != "" ){
				$SQL = "Select * from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND company_name like '%".$serach_name."%'  ORDER BY UNIX_TIMESTAMP(contract_history_created) DESC Limit ".$limitstart.",".$limitend." ;";
					}else {
						$SQL = "Select * from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."'   ORDER BY UNIX_TIMESTAMP(contract_history_created) DESC Limit ".$limitstart.",".$limitend." ;";

					}
			}else {
				if ($serach_name != "" ){
			$SQL = "Select * from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND contact_person like '%".$serach_name."%'  ORDER BY UNIX_TIMESTAMP(contract_history_created) DESC Limit ".$limitstart.",".$limitend." ;";
				}else {
					$SQL = "Select * from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."'   ORDER BY UNIX_TIMESTAMP(contract_history_created) DESC Limit ".$limitstart.",".$limitend." ;";
				}
			}
			}else {
				if ($search_category == 'company_name') {
					if ($serach_name != "" ){
			$SQL = "Select * from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND company_name like '%".$serach_name."%' AND contract_status = '".$status."'  ORDER BY UNIX_TIMESTAMP(contract_history_created) DESC Limit ".$limitstart.",".$limitend." ;";
					}else {
						$SQL = "Select * from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND contract_status = '".$status."'  ORDER BY UNIX_TIMESTAMP(contract_history_created) DESC Limit ".$limitstart.",".$limitend." ;";
					}
			}else {
				if ($serach_name != "" ){
			$SQL = "Select * from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND contact_person like '%".$serach_name."%' AND contract_status = '".$status."'    ORDER BY UNIX_TIMESTAMP(contract_history_created) DESC Limit ".$limitstart.",".$limitend." ;";
				}else {
					$SQL = "Select * from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND contract_status = '".$status."'    ORDER BY UNIX_TIMESTAMP(contract_history_created) DESC Limit ".$limitstart.",".$limitend." ;";

				}
			}
}
		$res =  MySQL::query($SQL);
		return $res;

			}
			
			
function contractHistorySearchCount($contract_start_date,$contract_end_date,$search_category,$serach_name,$status,$limitstart,$limitend){
	if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	if ($status == 'all') {
			if ($search_category == 'company_name') {
					if ($serach_name != "" ){
				$SQL = "Select count(*) as total_Contract_history from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND company_name like '%".$serach_name."%';";
					}else {
						$SQL = "Select count(*) as total_Contract_history  from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."';";

					}
			}else {
				if ($serach_name != "" ){
			$SQL = "Select count(*) as total_Contract_history  from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND contact_person like '%".$serach_name."%' ;";
				}else {
					$SQL = "Select * from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' ;";
				}
			}
			}else {
				if ($search_category == 'company_name') {
					if ($serach_name != "" ){
			$SQL = "Select count(*) as total_Contract_history  from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND company_name like '%".$serach_name."%' AND contract_status = '".$status."' ;";
					}else {
						$SQL = "Select count(*) as total_Contract_history from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND contract_status = '".$status."' ;";
					}
			}else {
				if ($serach_name != "" ){
			$SQL = "Select count(*) as total_Contract_history  from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND contact_person like '%".$serach_name."%' AND contract_status = '".$status."' ;";
				}else {
					$SQL = "Select count(*) as total_Contract_history  from opens_contract_history where STR_TO_DATE(`contract_date`, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(`contract_date`, '%Y-%m-%d') <= '".$contract_end_date."' AND contract_status = '".$status."' ; ";

				}
			}
}
		$res =  MySQL::query($SQL,true);
		return $res;

			}
/****** single Contract History by Contract ID*************/
function singleContractHistory($contract_history_id){
	$SQL = "Select * from opens_contract_history where contract_history_id =".$contract_history_id."";
	$res =  MySQL::query($SQL,true);
	return $res;
}

/****** single Customer by User ID*************/
function countCustomer(){
	$SQL = "Select count(*) as totalcustomer from opens_user";
	$res =  MySQL::query($SQL,true);
	return $res;
}
/****** single Customer by User ID*************/
function singleCustomer($user_id){
	$SQL = "Select * from opens_user where user_id =".$user_id."";
	$res =  MySQL::query($SQL,true);
	return $res;
}
/****** single Customer by Email ID*************/
function singleContractHistoryByCompanyName($company_name){
	$SQL = "Select * from opens_contract_history where company_name ='".$company_name."'";
	//echo $SQL;die;
	$res =  MySQL::query($SQL,true);
	return $res;
}
function singleContractHistoryByCompanyNameExcept($company_name,$contract_history_id){
	$SQL = "Select * from opens_contract_history where company_name ='".$company_name."' AND contract_history_id <> ".$contract_history_id." ";
	//echo $SQL;die;
	$res =  MySQL::query($SQL,true);
	return $res;
}
/****** Customer Delete *************/
function deleteCustomer($user_id){
	$SQL = "Delete from opens_user where user_id =".$user_id."";
	$res =  MySQL::query($SQL);
	return $res;
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
/****** Customer Search by Email  *************/
function customerSearchEmail($email,$limitstart,$limitend){
	if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	
$SQL = "Select user_id, user_name,user_email,user_level,user_reg_date from opens_user where user_email like '%".$email."%' ORDER BY STR_TO_DATE(user_reg_date,'%Y-%m-%d') DESC Limit ".$limitstart.",".$limitend." ;";
			  // echo $SQL; die;
      $res =  MySQL::query($SQL,true);
	  //echo "<pre>";
	  //print_r($res);die;
	  return $res;
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
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	
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
//customerList();

//userRegister($postarray);		

/*if(empty($Users))
    {
        $getNewDocumentAndritz = Users::getSystemUsers();//for global
        $website_users=count($getNewDocumentAndritz)+1;
        $new_password = encryptPassword($cleaned['user_password'],$website_users);
        $user_role=serialize($cleaned['user_role']);
        $SQL = "INSERT INTO `users` (`user_email`, `user_password`, `user_name`, `user_surname`, `user_address`, `user_dob`, `user_mobile`, `user_status`, `user_role`)
               VALUES ( '" . $cleaned['email'] . "','" . $new_password . "', '" . $cleaned['user_name'] . "', '" . $cleaned['user_surname'] . "', '" . $cleaned['user_address'] . "', '" . $cleaned['date'] . "', '" . $cleaned['user_mobile'] . "', '" . $cleaned['user_status'] . "', '" . $user_role . "');";
        MySQL::query($SQL);
    
    }
    else
    {
      
 $new_password = encryptPassword($cleaned['user_password'],$Users['user_id']);
 $user_role=serialize($cleaned['user_role']);
 if(isset($cleaned['user_password']) && $cleaned['user_password']!='')
            { 
                       $SQL = "UPDATE `users` 
                               SET user_email = '" . $cleaned['email'] . "',
                               user_password = '" . $new_password . "',
                               user_name = '" . $cleaned['user_name'] . "',
                               user_surname = '" . $cleaned['user_surname'] . "',
                               user_address = '" . $cleaned['user_address'] . "',
                               user_dob = '" . $cleaned['date'] . "',
                               user_mobile = '" . $cleaned['user_mobile'] . "',
                               user_status = '" . $cleaned['user_status'] . "',
                               user_role = '" . $user_role . "'
                               WHERE user_id = '" . $Users['user_id'] . "' LIMIT 1";
                       MySQL::query($SQL);
            }
else
            {
             $SQL = "UPDATE `users` 
                                SET user_email = '" . $cleaned['email'] . "',
                                user_name = '" . $cleaned['user_name'] . "',
                                user_surname = '" . $cleaned['user_surname'] . "',
                                user_address = '" . $cleaned['user_address'] . "',
                                user_dob = '" . $cleaned['date'] . "',
                                user_mobile = '" . $cleaned['user_mobile'] . "',
                                user_status = '" . $cleaned['user_status'] . "',
                                user_role = '" . $user_role . "'
                                WHERE user_id = '" . $Users['user_id'] . "' LIMIT 1";
                        MySQL::query($SQL);
            }

                

       
    }


//die;
header("location: ../../../../user.php")*/

?>