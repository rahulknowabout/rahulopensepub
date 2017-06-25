<?php  
include('../../modal/notice/notice.php');
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['first_form']) && $_POST['first_form'] == 'first_form' ) {
	//echo "1";die;
	$cleaned = clean($_POST);
	$today = date('Y-m-d H:i');
	$duplicate_notice = noticeReadByTitle($cleaned['notice_title']);
	if (is_array($duplicate_notice) && count($duplicate_notice)>0) {
	echo "Error_Code=dup";die; 
}else {
	if (isset($_FILES['notice_file']) && is_array($_FILES['notice_file']) && isset($_FILES['notice_file']['name']) && $_FILES['notice_file']['name'] != "" && isset($_FILES['notice_file']['size']) && $_FILES['notice_file']['size']>0) {
	$notice_file = time()."_".$_FILES['notice_file']['name'];
	move_uploaded_file($_FILES['notice_file']['tmp_name'],'../../storage/noticefile/'.$notice_file);
	
}else {
   $notice_file = "";
}
$cleaned = clean($_POST);
//echo "<pre>";
//print_r($_REQUEST);
//echo "<hr/>";
//print_r($_FILES);
$postarray['notice_date'] = $cleaned['notice_date'];
$postarray['notice_title'] = $cleaned['notice_title'];
$postarray['notice_file'] = $notice_file;
$postarray['notice_sort_date'] = $today;	
$last_insert_id = noticeRegister($postarray);
echo $last_insert_id;die;
}
}elseif(isset($_POST['update_id']) && $_POST['update_id']!= "" ){
	//print_r($_POST);die;
$cleaned = clean($_POST);
$postarray['notice_content'] = $cleaned['notice_content'];
$postarray['notice_content_html'] = $cleaned['notice_content_html'];
$noticeContentA = $postarray['notice_content'];

$noticeContentADecode = json_decode(stripslashes(utf8_encode($noticeContentA)),true);
if (isset($noticeContentADecode['ops']) && is_array($noticeContentADecode['ops']) && count($noticeContentADecode['ops'])>0 ){
		foreach($noticeContentADecode['ops'] as $key=>$value) {
			if (isset($value['insert']) && is_array($value['insert']) && count($value['insert'])>0) {
					if (isset($value['insert']['image']) && $value['insert']['image']!= "" ){
						//$noticeContentADecode['ops'][$key]['insert']['image'] = "hello";
						$imgStr = $value['insert']['image'];
						//echo $imgStr;
						$new_data = explode(";",$imgStr);
						if (isset($new_data) && is_array($new_data) && count($new_data)>1 ){
						//print_r($new_data);	
						$type = $new_data[0];
						$data = explode(",",$new_data[1]);
						header("Content-type:".$type);
						if ($type == 'data:image/jpeg') {
							$imagename ="editor_".time();
							$type = "jpg";
						}elseif($type == 'data:image/png'){
							$imagename ="editor_".time();
							$type = "png";
						}else {
							$imagename ="editor_".time();
							$type = "jpg";
						}
						//echo $data[1];
						//header("Content-type:".$type);
						//echo base64_decode($data[1]); die;
						$file = fopen("../../../storage/image/".$imagename.".".$type."","w");
						
					    fwrite($file,base64_decode($data[1]));
						fclose($file);
						$noticeContentADecode['ops'][$key]['insert']['image'] = editor_BASE_URL."image/".$imagename.".".$type."";
						}
					}
			}
		}
	
}
$postarray['notice_content'] = json_encode($noticeContentADecode);
//echo "<pre>";
//print_r($postarray['notice_content']);
//die;
setNoticeContent($cleaned['update_id'],$postarray['notice_content'],addslashes($postarray['notice_content_html']));
echo "1";die;
}


/*echo "<pre>";
print_r($_FILES);
print_r($_POST); die;
$cleaned = clean($_POST);
$postarray['notice_content'] = $cleaned['notice_content'];
$noticeContentA = $postarray['notice_content'];
echo "<pre>";
print_r($cleaned);
die;


$noticeContentADecode = json_decode(stripslashes(utf8_encode($noticeContentA)),true);
//echo "<pre>"
echo json_last_error_msg();
//die;



if (isset($noticeContentADecode['ops']) && is_array($noticeContentADecode['ops']) && count($noticeContentADecode['ops'])>0 ){
		foreach($noticeContentADecode['ops'] as $key=>$value) {
			if (isset($value['insert']) && is_array($value['insert']) && count($value['insert'])>0) {
					if (isset($value['insert']['image']) && $value['insert']['image']!= "" ){
						//$noticeContentADecode['ops'][$key]['insert']['image'] = "hello";
						$imgStr = $value['insert']['image'];
						//echo $imgStr;
						$new_data = explode(";",$imgStr);
						if (isset($new_data) && is_array($new_data) && count($new_data)>1 ){
						//print_r($new_data);	
						$type = $new_data[0];
						$data = explode(",",$new_data[1]);
						header("Content-type:".$type);
						if ($type == 'data:image/jpeg') {
							$imagename ="editor_".time();
							$type = "jpg";
						}elseif($type == 'data:image/png'){
							$imagename ="editor_".time();
							$type = "png";
						}else {
							$imagename ="editor_".time();
							$type = "jpg";
						}
						//echo $data[1];
						//header("Content-type:".$type);
						//echo base64_decode($data[1]); die;
						$file = fopen("../../storage/image/".$imagename.".".$type."","w");
						
					    fwrite($file,base64_decode($data[1]));
						fclose($file);
						$noticeContentADecode['ops'][$key]['insert']['image'] = "../../storage/image/".$imagename.".".$type."";
						}
					}
			}
		}
	
}

//echo "<pre>";
//print_r($noticeContentADecode);
//die;
//echo json_encode($noticeContentADecode);
//die;
$postarray['notice_content'] = json_encode($noticeContentADecode);
//echo $postarray['notice_content'];
//die;
//print_r(htmlentities($postarray['notice_content']));
noticeRegister($postarray);
//echo "<pre>";
//print_r($_POST);
//die; */
?>