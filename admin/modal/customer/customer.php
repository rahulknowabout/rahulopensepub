<?php require_once("../../config.php");
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
/****** Customer Register *************/
function userRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_user` (`user_name`, `user_email`, `user_country`,`user_reg_date`)
               VALUES ( '".$postarray['user_name']."' , '".$postarray['user_email']."',  '".$postarray['user_country']."','".$postarray['user_reg_date']."');";
			  // echo $SQL;
        MySQL::query($SQL);
		//die;
}
/****** Customer List *************/
function customerList($limitstart,$limitend){
if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	
$SQL = "Select user_id, user_name,user_email,user_level,user_reg_date from opens_user  ORDER BY STR_TO_DATE(user_reg_date,'%Y-%m-%d') DESC LIMIT ".$limitstart.",".$limitend.";";
			  // echo $SQL; die;
      $res =  MySQL::query($SQL);
	  //echo "<pre>";
	  //print_r($res);die;
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
function singleCustomerbyEmail($user_email){
	$SQL = "Select * from opens_user where user_email ='".$user_email."'";
	$res =  MySQL::query($SQL,true);
	return $res;
}
/****** Customer Delete *************/
function deleteCustomer($user_id){
	$SQL = "Delete from opens_user where user_id =".$user_id."";
	$res =  MySQL::query($SQL,true);
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
								
								user_country ='".$postarray['user_country']."',
								user_company_name ='".$postarray['user_company_name']."',
								user_company_address ='".$postarray['user_company_address']."',
								user_company_phone ='".$postarray['user_company_phone']."'
								where user_id =".$user_id."";
	$res =  MySQL::query($SQL,true);
	return $res;
}
function updateCustomerFront($postarray=array(),$user_id){
	$SQL = "Update  opens_user set user_name ='".$postarray['user_name']."',
								
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
      $res =  MySQL::query($SQL);
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
function MemberShipRequestCount($from_transfer_id){
	$SQL = "Select count(*) as membershiprequest from  membership_rights where from_transfer_id = '".$from_transfer_id."' AND approve = 0 ";
	// echo $SQL;
      $res =  MySQL::query($SQL,true);
	  //echo "<pre>";
	  //print_r($res);die;
	  return $res;
}
function setToLevelF($toid){
	$SQL = "update opens_user set opens_mupdate = 0  where user_email  ='".$toid."'";
	$res =  MySQL::query($SQL);
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