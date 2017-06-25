<form name="test" method="post" action="" enctype="multipart/form-data">
	<input type="file" name="test"/>
    <button type="submit">submit</button>
</form> 

<?php //echo phpinfo();die; 
if(isset($_FILES)) {
print_r($_FILES);
//die;
$api_key="TEST40aa-eb1a-441c-8161-89f99074a02d";
$headers = array("x-api-key:TEST40aa-eb1a-441c-8161-89f99074a02d","Content-Type:multipart/form-data"); // cURL headers for file uploading
    
    $ch = curl_init();
	$url="http://v2.opensdrm.net/epubdrmpackager/providers/devtest/masters";
	$args['file'] = new CurlFile("".$_FILES['test']['tmp_name']."");
	$args['fileName'] = "TESTEPUB45R.epub";
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_HEADER => true,
        CURLOPT_POST => 1,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $args,
        CURLOPT_INFILESIZE => "992KB",
        CURLOPT_RETURNTRANSFER => true,
		 
    ); // cURL options
    curl_setopt_array($ch, $options);
    $test = curl_exec($ch);
    if(!curl_errno($ch))
    {
        $info = curl_getinfo($ch);
        if ($info['http_code'] == 200)
            $errmsg = "File uploaded successfully";
    }
    else
    {
        $errmsg = curl_error($ch);
		print_r($errmsg);die;
    }
    curl_close($ch);
print_r($test);die;
/*define("Register_API_Key","TEST40aa-eb1a-441c-8161-89f99074a02d");
ob_start();

//echo "<pre>";
//echo "Loading ...";

ob_flush();
flush();

$postData = array(
    'file' => new CurlFile("".$_FILES['test']['tmp_name'].""),
	'fileName' => 'TESTNEW3_5_17.epub'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://v2.opensdrm.net/epubdrmpackager/providers/devtest/masters');
//curl_setopt($ch, CURLOPT_URL, "http://stackoverflow.com");
//curl_setopt($ch, CURLOPT_BUFFERSIZE,128);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'progress');
//curl_setopt($ch, CURLOPT_NOPROGRESS, false); // needed to make progress function work

curl_setopt($ch, CURLOPT_HEADER, array( 
	'x-api-key:TEST40aa-eb1a-441c-8161-89f99074a02d',                                                                         
    'Content-Type: multipart/form-data' ,
	'Accept:application/json; charset=UTF-8'                                                                     
));
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$html = curl_exec($ch);
curl_close($ch);
print_r($html);die;
*/


//die;
//echo "Done";

    
	
}
/*ob_start();

echo "<pre>";
echo "Loading ...";

ob_flush();
flush();

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://stackoverflow.com");
curl_setopt($ch, CURLOPT_BUFFERSIZE,128);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'progress');
curl_setopt($ch, CURLOPT_NOPROGRESS, false); // needed to make progress function work
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$html = curl_exec($ch);
curl_close($ch);


function progress($resource,$download_size, $downloaded, $upload_size, $uploaded)
{
    if($download_size > 0) {
	
	?>
        <div class="text-center"> <span class="progress_text"><?php echo round($downloaded / $download_size  * 100)."%";?></span></div>
		<div class="meter red">
			<span style="width: <?php echo round($downloaded / $download_size  * 100); ?>%"></span>
		</div>     
        <div style="height:40px;"></div> 
      <div class="btn_center"><a href="#" class="btn btn-info btn-outline">Cancel</a></div>
    </div>
    <?php    
		 
		 echo "<hr/>";
    ob_flush();
    flush();
    sleep(0.5); // just to see effect
	}
}
die;
echo "Done";
ob_flush();
flush();*/


//require_once("../../modal/register/user.php");
//echo SITE_BASE_URL;die;
//error_reporting(E_ALL);
/*define("Register_API_URL","http://v2.opensdrm.net/epubdrmpackager/users/test.ani@gmail.com/devices");
define("Register_API_Key","TEST40aa-eb1a-441c-8161-89f99074a02d");
function curlGETRequest($data_string,$base_url,$api_key) {
//$data = array("name" => "Hagrid", "age" => "36");                                                                    
//$data_string = json_encode($data);                                                                                   
$ch = curl_init($base_url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
	'x-api-key:'.$api_key,                                                                         
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
print_r($result = curl_exec($ch));
if(curl_errno($ch))
{
    echo 'Curl error: ' . curl_error($ch); die;
}
return $result;
}
curlGETRequest('',Register_API_URL,Register_API_Key);
die;*/

/*define("Register_API_URL","http://v2.opensdrm.net//epubdrmpackager/masters/repackage");
define("Register_API_Key","TEST40aa-eb1a-441c-8161-89f99074a02d");
$test = array();
$test['masterEpub'] = 'masters/accessible_epub_3.epub';
$test['drmType'] = 'opens';
$test['rights']['startDate'] = '20170501';
$test['rights']['endDate'] = '20170601';
$test['packageType'] = 'download';
$test['target']['type'] = 'device';
$test['target']['userId'] = 'test.ani@gmail.com';
$test['target']['deviceId'] = '677AA14853ACCEFA7CFE34E9D89D34C0F84E776081FE87CF33FC729C06DC66A0';
$test['target']['deviceIdType'] = 'internal';
$data_string = json_encode($test);

echo $data_string;die;




//TEST40aa-eb1a-441c-8161-89f99074a02d
//curlGETRequest('',Register_API_URL,Register_API_Key);
//die;
function curlEPUBRequest($data_string,$base_url,$api_key) {
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
                                                                                                                     
print_r($result = curl_exec($ch));
if(curl_errno($ch))
{
    echo 'Curl error: ' . curl_error($ch); die;
}
return $result;
}

curlEPUBRequest($data_string ,Register_API_URL,Register_API_Key)*/
/*define("Register_API_URL","http://v2.opensdrm.net/epubdrmpackager/providers/devtest/masters");
define("Register_API_Key","TEST40aa-eb1a-441c-8161-89f99074a02d");
$test = array();
$test['fileName'] = 'accessible_epub_3test.epub';
$test['file'] = 'opens';
$data_string = json_encode($test);

//echo $data_string;die; 


//TEST40aa-eb1a-441c-8161-89f99074a02d
//curlGETRequest('',Register_API_URL,Register_API_Key);
//die;
function curlEPUBURequest($data_string,$base_url,$api_key) {
//$data = array("name" => "Hagrid", "age" => "36");                                                                    
//$data_string = json_encode($data);                                                                                   
$ch = curl_init($base_url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
	'x-api-key:'.$api_key,                                                                         
    'multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW',
	'Accept:application/json; charset=UTF-8'                                                                             
    )                                                                       
);                                                                                                                   
                                                                                                                     
print_r($result = curl_exec($ch));
if(curl_errno($ch))
{
    echo 'Curl error: ' . curl_error($ch); die;
}
return $result;
}

curlEPUBURequest($data_string ,Register_API_URL,Register_API_Key)*/

	

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