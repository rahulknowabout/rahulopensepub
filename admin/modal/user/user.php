<?php
require_once("../../config.php");
require_once("../functions.php");
require_once("../new_functions.php");

//$cleaned = clean($_GET);
//dump($cleaned);die;
//$Users = Users::getUserByEmailId($cleaned['email']);
//dump($Users);//die;
$postarray =array("user_name"=>'Rahul',"user_email"=>'rahulss123@gmail.com',"user_password"=>'123',"user_country"=>'IND',"email_verified "=>'0');
//echo "<pre>";
//print_r($postarray);
//die;
function userRegister($postarray=array()){
	
$SQL = "INSERT INTO `opens_user` (`user_name`, `user_email`, `user_password`, `user_country`)
               VALUES ( '".$postarray['user_name']."' , '".$postarray['user_email']."', '".$postarray['user_password']."', '".$postarray['user_country']."');";
			  // echo $SQL;
        MySQL::query($SQL);
		//die;
}

userRegister($postarray);		

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