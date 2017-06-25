<?php //echo "<pre>";print_r($_POST);die;
require_once("../../modal/register/user.php");
//echo SITE_BASE_URL;die;
function sendEmail($email,$user_password) {
$user_email=md5($email);
$link = "<a href='".SITE_BASE_URL."controller/register/newpassword.php?key1=".$user_email."&key2=".$user_password."'>Click To Change Password</a>";
$to   = trim($email);
//echo $to;die;
$from = 'rahulknowabout@gmail.com';
$subject = "Email Verfication"; 
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "CC: your_email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers.= 'X-Mailer: PHP/' . phpversion();
$headers = 'From: '. $from . '' . "\r\n" .
                                'Reply-To: '. $from . '' . "\r\n" .
							    'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
$message = '<html><body>';
//$message .= '<h1>Do you want to reset your password</h1>'; 
$message .= '<table width="100%"; style="border:1px solid grey;" cellpadding="15">';
$message .= "<tr><td><a href='".SITE_BASE_URL."'>Home Page</a><h4>Do you want to reset your password</h4></tr>";
$message .= "<tr><td colspan=3>Hello ".$email.",</td></tr>";
$message .= "<tr><td colspan=3>This email is for request for a password reset</td></tr>";
$message .= "<tr><td colspan=3>".$link."</td></tr>";
$message .= "<tr><td colspan=3>If you did not request a password reset,you do not need to respond to this email</td></tr>";
$message .= "<tr><td colspan=3>Thank you</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
 //echo $message ;die;
 $result = mail($to, $subject, $message, $headers);
 //print_r(error_get_last());die;
}
if(isset($_POST['email']) && $_POST['email']!= "" ){
	//print_r(singleCustomerbyEmail(trim($_POST['email'])));die;
$singleCustomerbyEmailResult = singleCustomerbyEmail(trim($_POST['email']));
$count	= $singleCustomerbyEmailResult['usercount'];
if($count == 0 ){
header("location: ../../view/login/findpw.php?errorCode=1");

}else{
	sendEmail(trim($_POST['email']),$singleCustomerbyEmailResult['user_password']);
	header("location: ../../view/login/findpw.php?success=1");
}

}else{
	header("location: ../../view/login/findpw.php?errorCode=1");
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