<?php require_once('../../admin/modal/customer/customer.php'); 
if(isset($_COOKIE['member_login']) && $_COOKIE['member_login']!= "" && isset($_COOKIE['member_password']) && $_COOKIE['member_password']!= "" ) {
	$user_info = singleCustomerbyEmail($_COOKIE['member_login']);
	$MemberShipRequestCount = MemberShipRequestCount($_COOKIE['member_login'])['membershiprequest'];
	
} else if(isset($_SESSION['member_login']) && $_SESSION['member_login']!= "" && isset($_SESSION['member_password']) && $_SESSION['member_password']!= "") {
	$user_info = singleCustomerbyEmail($_SESSION['member_login']);
	$MemberShipRequestCount = MemberShipRequestCount($_SESSION['member_login'])['membershiprequest'];
}if(isset($user_info) && is_array($user_info) && count($user_info)>0){
	if ($user_info['user_level'] == 2 || $user_info['user_level'] == 3 ) {
		
	}else{
		header('location:../../index.php');
	}
}else{
	header('location:../../index.php');
}
function download($path)
{
	$pathinfo = pathinfo($path);
	//print_r($pathinfo);
	// if file is not readable or not exists
	if (!is_readable($path))
		die('File does not exist or it is not readable!');

	// get file's pathinfo
	$pathinfo = pathinfo($path);
	//print_r($pathinfo);
	// set file name
	$file_name = $pathinfo['basename'];
	$pos = strpos($file_name,'_'); if($pos) { $file_name = substr_replace($file_name,'',0,$pos+1);} 

	// guess mime type by extension
	//$mimes = require 'mimes.php';
	//$mime = isset($mimes[$pathinfo['extension']]) ? $mimes[$ext] : 'application/octet-stream';

	// set headers
	header('Pragma: public');
	header('Expires: -1');
	header('Cache-Control: public, must-revalidate, post-check=0, pre-check=0');
	header('Content-Transfer-Encoding: binary');
	header("Content-Disposition: attachment; filename=\"$file_name\"");
	header('Content-Length: ' . filesize($path));
	header("Content-Type: $mime");

	// read file as chunk to reduce memory usages
	if ( $fp = fopen($path, 'rb') ) {
		ob_end_clean();

		while( !feof($fp) and (connection_status()==0) ) {
			print(fread($fp, 8192));
			flush();
		}

		@fclose($fp);
		//$_SESSION['filedownload'] = 1;
		exit;
	}
}
$file = $_GET['file'];
//$file = 'd1_testani.epub';
download('../../admin/storage/product/program/'. $file);

?>