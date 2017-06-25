<?php //session_start();
include_once("../../managementfunction.php");
function singleCustomerbyEmail($user_email){
	$SQL = "Select * from opens_user where user_email ='".$user_email."'";
	$res =  MySQL::query($SQL,true);
	return $res;
}
if(isset($_COOKIE['member_login']) && $_COOKIE['member_login']!= "" && isset($_COOKIE['member_password']) && $_COOKIE['member_password']!= "" ) {
	$user_info = singleCustomerbyEmail($_COOKIE['member_login']);
	
	
} else if(isset($_SESSION['member_login']) && $_SESSION['member_login']!= "" && isset($_SESSION['member_password']) && $_SESSION['member_password']!= "") {
	$user_info = singleCustomerbyEmail($_SESSION['member_login']);
	
}if(isset($user_info) && is_array($user_info) && count($user_info)>0){
	if ($user_info['user_level'] == 2 || $user_info['user_level'] == 3 ) {
		
	}else{
		header('location:../../index.php');
	}
}else{
	header('location:../../index.php');
}

$api_key="TEST40aa-eb1a-441c-8161-89f99074a02d";
$baseURL ="http://v2.opensdrm.net/issuelicense/opensdrm/licenses/".$_GET['id'];
$deviceresult = DeviceInfo($baseURL,$api_key);
$license_detail = json_decode($deviceresult,true);
//echo "<pre>";
//print_r($_GET);
//die; 
if (isset($license_detail) && is_array($license_detail) && count($license_detail)>0 ) {
	if (isset($license_detail['date']) && $license_detail['date']!= "") {
		$date =  $license_detail['date'];
	}else{
		$date =  "";
	}
	if (isset($license_detail['deviceIdType']) && $license_detail['deviceIdType']!= "") {
		$deviceIdType =  ucfirst($license_detail['deviceIdType']);
	}else{
		$deviceIdType =  "";
	}
	if (isset($license_detail['price']) && $license_detail['price']!= "") {
		$price =  $license_detail['price'];
	}else{
		$price =  "";
	}
	if (isset($license_detail['isbn']) && $license_detail['isbn']!= "") {
		$isbn =  $license_detail['isbn'];
	}else{
		$isbn =  "Not Available";
	}
	if (isset($license_detail['targetType']) && $license_detail['targetType']!= "") {
		$targetType =  $license_detail['targetType'];
	}else{
		$targetType =  "";
	}
	if (isset($license_detail['currency']) && $license_detail['currency']!= "") {
		$currency =  $license_detail['currency'];
	}else{
		$currency =  "";
	}
	if (isset($license_detail['licenseId']) && $license_detail['licenseId']!= "") {
		$licenseId =  $license_detail['licenseId'];
	}else{
		$licenseId =  "";
	}
	if (isset($license_detail['userId']) && $license_detail['userId']!= "") {
		$userId =  $license_detail['userId'];
	}else{
		$userId =  "";
	}
	if (isset($license_detail['deviceId']) && $license_detail['deviceId']!= "") {
		$deviceId =  $license_detail['deviceId'];
	}else{
		$deviceId =  "";
	}
	if (isset($license_detail['bookName']) && $license_detail['bookName']!= "") {
		$bookName =  $license_detail['bookName'];
	}else{
		$bookName =  "";
	}
}
if (isset($_GET['startdatel']) && $_GET['startdatel']!= "") {
		$array_string[] =  "startdatel=".$_GET['startdatel'];
	}
	if (isset($_GET['enddatel']) && $_GET['enddatel']!= "") {
		$array_string[] =  "enddatel=".$_GET['enddatel'];
	}
	if (isset($_GET['sortDatel']) && $_GET['sortDatel']!= "") {
		$array_string[] =  "sortDatel=".$_GET['sortDatel'];
	}
	if (isset($_GET['pageNumberl']) && $_GET['pageNumberl']!= "") {
		$array_string[] =  "pageNumberl=".$_GET['pageNumberl'];
	}
	if (isset($_GET['useridl']) && $_GET['useridl']!= "") {
		$array_string[] =  "useridl=".$_GET['useridl'];
	}
	if (isset($array_string) && is_array($array_string) && count($array_string)>0) {
		$array_string =implode("&",$array_string);
	}else{
		$array_string="";
	}
	//echo $array_string;die;
 ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, minimal-ui" />
    <title>Opens</title>
    <link href="images/favicon.ico" rel="icon" type="image/ico" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../../css/animate.css" type="text/css" rel="stylesheet" />
    <link href="../../css/style.css" type="text/css" rel="stylesheet" /> </head>
<!--<script type="text/javascript"> 
$(document).ready(function(){
  $("#top_part").load("inc/top_part.html");
  $("#main_header").load("inc/header.html"); 
  $("#main_footer").load("inc/footer.html"); 
});
</script> --> 
</head>
<body class="page-banner">
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php'); ?></header>
<div class="advisor-banner-header">
<div class="advisor-background-banner" style="background: url('../../images/page_bg_management.jpg') no-repeat center 100%; background-size: cover;">
<div class="advisor-title-banner-header">
    <div class="container">
        <div class="page_inside">
            <ul class="breadcrumb">
                <li><a href="../../index.php"><i class="fa fa-home"></i></a></li>
                <li>Management</li>
            </ul>
            <h1>Management</h1> </div>
    </div>
</div>
</div>
</div>
<section class="main-content">
<div class="Form_Inside management_page">
<div class="container">
<div class="member_page accordion_style">
	<h1>License Issuance History</h1>
	<div class="top_space_details">
	<div class="table-responsive">
	  <table class="table">
	  <tr>
		<th class="gray">Issue Date:</th>
		<th><?php echo $date; ?></th>
	  </tr>
	  <tr>
		<th class="gray">User ID</th>
		<td><?php echo $userId; ?></td>
	  </tr>
	  <tr>
		<th class="gray">Target Type</th>
		<td><?php echo $targetType; ?></td>
	  </tr>	
	  <tr>
		<th class="gray">License ID</th>
		<td><?php echo $licenseId; ?></td>
	  </tr>
      <?php if ($targetType == "" || $targetType == 'user' ) {} else { ?>	
	  <tr>
		<th class="gray">Device ID</th>
		<td><?php echo $deviceId; ?></td>
	  </tr>	
	  <tr>
		<th class="gray">Device ID Type</th>
		<td><?php echo $deviceIdType; ?></td>
	  </tr>	
      <?php } ?>
	  <tr>
		<th class="gray p0" rowspan="4">
			<table width="100%">
				<tr>
					<td class="pr0">Book Info </td>
					<td class="p0">
						<table width="100%">
							<tr>
								<td class="p20">ISBN</td>
							</tr>
							<tr>
								<td class="p20">Book Title</td>
							</tr>
							<tr>
								<td class="p20">Price</td>
							</tr>
							<tr>
								<td class="p20">Currency</td>
							</tr>							
						</table>
					</td>
				</tr>
			</table>
		</th>
        
		<td><?php echo $isbn; ?></td>
	  </tr>	
	  <tr>
		<td><?php echo $bookName; ?></td>
	  </tr>	
	  <tr>
		<td><?php echo $price; ?></td>
	  </tr>	
	  <tr>
		<td><?php echo $currency; ?></td>
	  </tr>		  
	</table>
	</div>
	</div>
	<div class="Encrypt_eBook_btn Back_notice_list">
		<a href="<?php echo trim($_GET['pagenamel']); ?>?type=license&<?php echo $array_string; ?>#license_issuance_history" class="btn btn-info btn-lg btn-block">Back to List</a>
	</div>	
</div>	
</div>
</div>
</section>
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php'); ?></footer>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#startdate").datepicker({ dateFormat: 'dd-mm-yy' });
      $("#enddate").datepicker({ dateFormat: 'dd-mm-yy' });
  });
  </script>     
</body>

</html>