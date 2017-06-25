<?php require_once("../../modal/register/user.php");
//echo SITE_BASE_URL;die;
define("Register_API_URL","http://v2.opensdrm.net/opens-ra/opensdrm/providers");
define("Register_API_Key","TEST40aa-eb1a-441c-8161-89f99074a02d");
function curlPostRequest($data_string,$base_url,$api_key) {
//$data = array("name" => "Hagrid", "age" => "36");                                                                    
//$data_string = json_encode($data);                                                                                   
$ch = curl_init($base_url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
	'x-api-key:'.$api_key,                                                                         
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
$result = curl_exec($ch);
if(curl_errno($ch))
{
    echo 'Curl error: ' . curl_error($ch); die;
}
return $result;
}
function sendEmail($email) {
$user_email=md5($email);
$link = "<a href='".SITE_BASE_URL."controller/register/register.php?key=".$user_email."'>Click To Verify Email</a>";
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
$message .= "<tr><td><h1>OPENS</h1></td></tr>";
//$message .= "<tr><td colspan=3>Hello ".$customerinfo['user_password'].",</td></tr>";
$message .= "<tr><td colspan=3>You're one click away ...</td></tr>";
$message .= "<tr><td colspan=3>".$link."</td></tr>";
$message .= "<tr><td colspan=3>Thank you</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
 //echo $message ;die;
 $result = mail($to, $subject, $message, $headers);
 //print_r(error_get_last());die;
}



if(isset($_POST['name']) && isset($_POST['pwd']) &&  isset($_POST['email']) ){
$count	= singleCustomerbyEmail(trim($_POST['email']))['usercount'];
if($count == 0 ){
$postarray['user_name'] = trim($_POST['name']);
$postarray['user_email'] = trim($_POST['email']);
$postarray['user_password'] = md5($_POST['pwd']);
$postarray['user_country'] = trim($_POST['country']);
$postarray['user_reg_date'] = date('Y-m-d h:i:s');
$json_array['email'] = trim($_POST['email']);
$json_array['name'] = trim($_POST['name']);
$json_array['password'] = trim($_POST['pwd']);
$data_string = json_encode($json_array); 
$api_response = curlPostRequest($data_string,Register_API_URL,Register_API_Key);
$response_array =json_decode($api_response,true);
$postarray['api_user_id'] = $response_array['opensreader']['userid'];
$postarray['api_user_password'] = $response_array['opensreader']['password'];
$postarray['api_user_name'] = $response_array['opensreader']['username'];
userRegister($postarray);
sendEmail(trim($_POST['email']));
}
//userRegister($postarray);
header("location: ../../view/register/register2.php");
}else{
	
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