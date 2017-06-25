<?php
require_once("../../config.php");
require_once("../../functions.php");
require_once("../../new_functions.php");


function userRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_user` (`user_name`,`user_reg_date`,`user_email`, `user_password`, `user_country`,`api_user_id`,`api_user_password`,`api_user_name`)
               VALUES ( '".$postarray['user_name']."' , '".$postarray['user_reg_date']."', '".$postarray['user_email']."', '".$postarray['user_password']."', '".$postarray['user_country']."', '".$postarray['api_user_id']."', '".$postarray['api_user_password']."', '".$postarray['api_user_name']."');";
			  // echo $SQL;
        MySQL::query($SQL);
		//die;
}

function singleCustomerbyEmail($user_email){
	$SQL = "Select count(*) as usercount,user_password from opens_user where user_email ='".$user_email."' ";
	$res =  MySQL::query($SQL,true);
	return $res;
	}
	
	
	function singleCustomerbyEmailMD($user_email){
	$SQL = "Select count(*) as usercount,user_id,user_password,user_email from opens_user where MD5(user_email) ='".$user_email."'";
	$res =  MySQL::query($SQL,true);
	return $res;
	}
	function singleCustomerbyEmailMDPass($user_email,$user_password){
	$SQL = "Select count(*) as usercount,user_id,user_password,user_email from opens_user where MD5(user_email) ='".$user_email."' AND user_password = '".$user_password."'";
	$res =  MySQL::query($SQL,true);
	return $res;
	}
	function updateCustomer($user_id){
	$SQL = "update opens_user set email_verified = 1 where user_id = ".$user_id."";
	//$res =  
	MySQL::query($SQL);
	//return $res;
	}
	function updateCustomerPassword($key1,$key2,$user_password){
	$SQL = "update opens_user set user_password = '".$user_password."' where MD5(user_email) = '".$key1."' AND user_password='".$key2."'";
	//$res =  
	MySQL::query($SQL);
	//return $res;
	}

	

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