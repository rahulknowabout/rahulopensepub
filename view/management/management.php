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
 
if (isset($_GET['type']) && $_GET['type']!=""  ) {
	$tabactive=$_GET['type'];
    
}else {
	$tabactive="certificate";
}
$api_key="TEST40aa-eb1a-441c-8161-89f99074a02d";
if (isset($user_info) && is_array($user_info) && count($user_info)>0) {
	if($user_info['api_user_id']!= "") {
		if (!isset($_SESSION['provider_id']) || $_SESSION['provider_id']== ""){
			
		$baseURL ="http://v2.opensdrm.net/epubdrmpackager/users/".$user_info['api_user_id']."/devices"; 
		$deviceresult = DeviceInfo($baseURL,$api_key);
		$deviceresultArray =json_decode($deviceresult,true);
		if (json_last_error() === 0) {
			if(isset($deviceresultArray['device_info'])) {
   			$deviceArray =$deviceresultArray['device_info'];
			}else {
				$deviceArray =array();
			}
		}else{
			$deviceArray =array();
		}
	$_SESSION['provider_id'] = $deviceresultArray['provider_id'];	
	}else{
		$deviceArray =array();
	}
}else{
	$deviceArray =array();
}

}
/** Statistics **/
if (isset($_GET['year']) && $_GET['year']!="" && isset($_GET['month']) && $_GET['month']!="" ) {
	$year=$_GET['year'];
    $month=$_GET['month'];
}else {
	$year="NA";
    $month="NA";
}
if ( !isset($_GET['year']) ){
	$_GET['year'] = date('Y');
}
if ( !isset($_GET['month'])) {
	$_GET['month'] = date('m');
}
$base_url ="http://v2.opensdrm.net/issuelicense/opensdrm/statistics";
$type="day";
$provider_id="NA";
$api_key="TEST40aa-eb1a-441c-8161-89f99074a02d";
$dayManagementStatistics = json_decode(managementStatistics($base_url,$api_key,$type,$year,$month,$provider_id),true);
//echo $year;
//print_r($dayManagementStatistics);die;
if(isset($dayManagementStatistics) && is_array($dayManagementStatistics) && count($dayManagementStatistics)>0 ){
ksort($dayManagementStatistics['licenses']);
ksort($dayManagementStatistics['certificates']);
$licenses = $dayManagementStatistics['licenses'];
$certificates = $dayManagementStatistics['certificates'];
$dayManagementStatisticsNew['licenses'] =$licenses;
$dayManagementStatisticsNew['certificates'] =$certificates;
}
else{
	$dayManagementStatisticsNew = "";
}
/** Statistics **/

/** Certificate **/
$base_urlc ="http://v2.opensdrm.net/issuelicense/opensdrm/certificates";
$provider_idc="NA";
$api_keyc="TEST40aa-eb1a-441c-8161-89f99074a02d";
$search_array =array();
$data_array = "";
if(isset($_GET['startdate']) && $_GET['startdate']!= "" && isset($_GET['enddate']) && $_GET['enddate']!= ""  ) {
	$search_array['startdate'] = $_GET['startdate'];
	$search_array['enddate'] = $_GET['enddate'];
	$search_array_implode['startdate'] = "startdate=".$_GET['startdate'];
	$search_array_implode['enddate'] = "enddate=".$_GET['enddate'];
}
if(isset($_GET['userid']) && $_GET['userid']!= "") {
	$search_array['userid'] = $_GET['userid'];
	$search_array_implode['userid'] = "userid=".$_GET['userid'];
	
}
if(isset($_GET['CertificateType']) && $_GET['CertificateType']!= "") {
	$search_array['CertificateType'] = $_GET['CertificateType'];
	$search_array_implode['CertificateType'] = "CertificateType=".$_GET['CertificateType'];
	
}
$search_array['type'] = "certificate";
$search_array_implode['type'] = "type=certificate";
/*if(isset($_GET['type']) && $_GET['type'] == "certificate") {
	$search_array['type'] = "certificate";
$search_array_implode['type'] = "type=certificate";
	
	
}*/
$search_array_implode['sortDate'] = "sortDate=aesc";
//$search_array['sortDate'] = "asec";
if(isset($_GET['sortDate']))
 {
	 if ($_GET['sortDate'] == "aesc") {
		 //echo $_GET['sortDate'];die; 
		$search_array['sortDate'] = "aesc";
		$search_array_implode['sortDate'] = "sortDate=desc";
 }
	
}
//print_r($search_array);die;
if(isset($_GET['type']) && $_GET['type'] == "certificate" ) {
if(isset($_GET['pageNumber']) && $_GET['pageNumber']!= "" ) {
	$offset = ($_REQUEST['pageNumber']-1)*30;
		$data_array['option']['offset']	= 	"".$offset."";
		
		
	}
}

if(isset($_GET['startdate']) && $_GET['startdate']!= "" && isset($_GET['enddate']) && $_GET['enddate']!= ""  ) {
		$newstartDate = date_create(str_replace('/','-',"".$_GET['startdate'].""));
		$newendDate = date_create(str_replace('/','-',"".$_GET['enddate'].""));
		$data_array['option']['startDate']	= 	date_format($newstartDate,"Ymd");
		$data_array['option']['endDate']	= 	date_format($newendDate,"Ymd");
	}else {
		$newstartDate = date_create(str_replace('/','-',date('d/m/Y', strtotime('-1 months'))));
		$newendDate = date_create(str_replace('/','-',date('d/m/Y')));
		$data_array['option']['startDate']	= 	date_format($newstartDate,"Ymd");
		$data_array['option']['endDate']	= 	date_format($newendDate,"Ymd");
	}
	
	if(isset($_GET['userid']) && $_GET['userid']!= "" ) {
		$data_array['search']['userId']	= 	$_GET['userid'];
	}
	if(isset($_GET['CertificateType']) && $_GET['CertificateType']!= "" ) {
		$data_array['search']['certType']	= 	$_GET['CertificateType'];
		
	}
	if(isset($_GET['sortDate']) && $_GET['sortDate'] != "") {
		$data_array['option']['sortDate']	= 	$_GET['sortDate'];
}
$data_array['search']['providerId']	= 	$_SESSION['provider_id'];
//$data_array = "";
//echo "<pre>";
//print_r($data_array);die;

$managementCertificate= json_decode(managementCertificate($base_urlc,$api_keyc,$data_array),true);
if (isset($managementCertificate) && is_array($managementCertificate) && count($managementCertificate)>0){
$managementCertificateList =$managementCertificate['list'];
}else {
	$managementCertificateList =array();
}
if (isset($managementCertificate['total']) ) {
	
		
	$_SESSION['CertificateTotal'] = $managementCertificate['total'];
	$count =$_SESSION['CertificateTotal']; 
	
}else {
	if (isset($_SESSION['CertificateTotal'])) {
		$count = $_SESSION['CertificateTotal'];
	}else{
		$count=0;
	}
		
}
//echo "<pre>";
//print_r($managementCertificate['total']);die;
if (count($search_array)>0) {
	  $pagination = pagination($count,'management.php?',$search_array);
	  $search_array_string = implode("&",$search_array_implode);
	  //echo  $pagination."<hr/>TESTAB";die;
 }else {
 $pagination = pagination($count,'management.php?');
 $search_array_string ="";
 //echo  $pagination."<hr/>TESTdn";die;
 }
 if(isset($_GET['pageNumber']) && $_GET['pageNumber']!= ""  && isset($_GET['type']) && $_GET['type'] == "certificate") {
		
		$icount = $count -(($_REQUEST['pageNumber']-1)*30);
		
	}else {
		if (isset($_SESSION['CertificateTotal'])) {
		$icount = $_SESSION['CertificateTotal'];
	}else{
		$icount=0;
	}
		
		
	}
	//echo  $pagination;die;
//print_r($managementCertificate['total']);die
//echo  $search_array_string;
//echo "<hr/>";
//echo "<pre>";
//print_r($managementCertificate);
//die;
/** Certificate **/
//print_r($dayManagementStatisticsNew);die;

/** License **/
$base_urll ="http://v2.opensdrm.net/issuelicense/opensdrm/licenses";
$provider_idl="NA";
$api_keyl="TEST40aa-eb1a-441c-8161-89f99074a02d";
$search_arrayl =array();
$data_arrayl = "";
if(isset($_GET['startdatel']) && $_GET['startdatel']!= "" && isset($_GET['enddatel']) && $_GET['enddatel']!= ""  ) {
	$search_arrayl['startdatel'] = $_GET['startdatel'];
	$search_arrayl['enddatel'] = $_GET['enddatel'];
	$search_array_implodel['startdatel'] = "startdatel=".$_GET['startdatel'];
	$search_array_implodel['enddatel'] = "enddatel=".$_GET['enddatel'];
}
if(isset($_GET['useridl']) && $_GET['useridl']!= "") {
	$search_arrayl['useridl'] = $_GET['useridl'];
	$search_array_implodel['useridl'] = "useridl=".$_GET['useridl'];
	
}
if(isset($_GET['CertificateTypel']) && $_GET['CertificateTypel']!= "") {
	$search_arrayl['CertificateTypel'] = $_GET['CertificateTypel'];
	$search_array_implodel['CertificateTypel'] = "CertificateType=".$_GET['CertificateTypel'];
	
}
$search_arrayl['type'] = "license";
$search_array_implodel['type'] = "type=license";
/*if(isset($_GET['type']) && $_GET['type']!= "") {
	$search_arrayl['type'] = $_GET['type'];
	
	
}*/
$search_array_implodel['sortDatel'] = "sortDatel=aesc";
//$search_array['sortDate'] = "asec";
if(isset($_GET['sortDatel']))
 {
	 if ($_GET['sortDatel'] == "aesc") {
		 //echo $_GET['sortDate'];die; 
		$search_arrayl['sortDatel'] = "aesc";
		$search_array_implodel['sortDatel'] = "sortDatel=desc";
 }
	
}
//print_r($search_array);die;

if(isset($_GET['pageNumberl']) && $_GET['pageNumberl']!= "" ) {
	$offsetl = ($_REQUEST['pageNumberl']-1)*30;
		$data_arrayl['option']['offset']	= 	"".$offsetl."";
		
		
	}


if(isset($_GET['startdatel']) && $_GET['startdatel']!= "" && isset($_GET['enddatel']) && $_GET['enddatel']!= ""  ) {
		$newstartDatel = date_create(str_replace('/','-',"".$_GET['startdatel'].""));
		$newendDatel = date_create(str_replace('/','-',"".$_GET['enddatel'].""));
		$data_arrayl['option']['startDate']	= 	date_format($newstartDatel,"Ymd");
		$data_arrayl['option']['endDate']	= 	date_format($newendDatel,"Ymd");
	}else {
		$newstartDatel = date_create(str_replace('/','-',date('d/m/Y', strtotime('-1 months'))));
		$newendDatel = date_create(str_replace('/','-',date('d/m/Y')));
		$data_arrayl['option']['startDate']	= 	date_format($newstartDatel,"Ymd");
		$data_arrayl['option']['endDate']	= 	date_format($newendDatel,"Ymd");
	}
	
	if(isset($_GET['useridl']) && $_GET['useridl']!= "" ) {
		$data_arrayl['search']['userId']	= 	$_GET['useridl'];
	}
	if(isset($_GET['CertificateTypel']) && $_GET['CertificateTypel']!= "" ) {
		$data_arrayl['search']['certType']	= 	$_GET['CertificateTypel'];
		
	}
	if(isset($_GET['sortDatel']) && $_GET['sortDatel'] == "aesc") {
		$data_arrayl['option']['sortDate']	= 	$_GET['sortDatel'];
}
$data_arrayl['search']['providerId']	= 	$_SESSION['provider_id'];
//$data_array = "";
$managementlicense= json_decode(managementCertificate($base_urll,$api_keyl,$data_arrayl),true);
if (isset($managementlicense) && is_array($managementlicense) && count($managementlicense)>0){
$managementlicenseList =$managementlicense['list'];
}else {
	$managementlicenseList =array();
}
if (isset($managementlicense['total']) ) {
	
		
	$_SESSION['LicenseTotal'] = $managementlicense['total'];
	$countl =$_SESSION['LicenseTotal']; 
	
}else {
	if (isset($_SESSION['LicenseTotal'])) {
		$countl = $_SESSION['LicenseTotal'];
	}else{
		$countl=0;
	}
		
}
if (count($search_arrayl)>0) {
	  $paginationl = paginationl($countl,'management.php?',$search_arrayl);
	  $search_array_stringl = implode("&",$search_array_implodel);
 }else {
 $paginationl = paginationl($countl,'management.php?');
 $search_array_stringl ="";
 }
 if(isset($_GET['pageNumberl']) && $_GET['pageNumberl']!= "" && isset($_GET['type']) && $_GET['type'] == "license" ) {
		
		$icountl = $countl -(($_REQUEST['pageNumberl']-1)*30);
		
	}else {
		if (isset($_SESSION['LicenseTotal'])) {
		$icountl = $_SESSION['LicenseTotal'];
	}else{
		$icountl=0;
	}
		
		
	}
	//echo $pagination;die;
	//echo $icountl ;
	//echo "<hr/>";
	//print_r($managementlicenseList);die;
/** License **/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, minimal-ui" />
    <title>Opens</title>
    <link href="../../images/favicon.ico" rel="icon" type="image/ico" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../../css/animate.css" type="text/css" rel="stylesheet" />
    <link href="../../css/style.css" type="text/css" rel="stylesheet" /> 
</head>
<!--<script type="text/javascript"> 
$(document).ready(function(){
  $("#top_part").load("inc/top_part.html");
  $("#main_header").load("inc/header.html"); 
  $("#main_footer").load("inc/footer.html"); 
});
</script>-->   
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
<ul class="nav nav-tabs">
    <li <?php if ($tabactive=="certificate") { ?>class="active" <?php } ?>>
        <a data-toggle="tab" href="#certificate_issuance_history">
            <h3>
			<span class="heading_icon certificate_icon"></span>
			Certificate Issuance History</h3> 
			</a>
    </li>
    <li <?php if ($tabactive=="license") { ?>class="active" <?php } ?>>
        <a data-toggle="tab" href="#license_issuance_history">
            <h3>
			<span class="heading_icon license_icon"></span>
			License Issuance History</h3> 
			</a>
    </li>
    <li <?php if ($tabactive=="statistics") { ?> class="active" <?php } ?> id="graphcall">
        <a data-toggle="tab" href="#statistics">
            <h3>
			<span class="heading_icon statistics_icon"></span>
			Statistics</h3>
			</a>
    </li>	
</ul>
<div class="tab-content">
	<div id="certificate_issuance_history" class="tab-pane fade in <?php if ($tabactive=="certificate") { ?>active<?php } ?>">
		<div class="member_page">
			<h1>Certificate Issuance History</h1>
			<div class="filter_box">
				<div class="filter_data">
					<form method="post" action="../../controller/management/certificateA.php" name="certificate_issuance_history_form">
						<div class="form-group row">
							<label class="col-sm-3">Period Search</label>
							<div class="col-md-9 col-sm-12">
								<div class="start_date">
									<label>Start Date</label>
									<input id="startdate" name="startdate" class="form-control" placeholder="21 / 02 / 2017"  required value="<?php if(isset($_GET['startdate']) && $_GET['startdate']!="") { echo $_GET['startdate']; }else{ echo date('d-m-Y', strtotime('-1 months')); } ?>"/>
									<i class="fa custom_icon"><img src="../../images/calendar_icon.png" alt=""title="" /></i>
								</div>
								<span class="ico_tr">~</span>
								<div class="end_date">
									<label>End Date</label>
									<input id="enddate" name="enddate" class="form-control" placeholder="DD/MM/YYYY" required value="<?php if(isset($_GET['enddate']) && $_GET['enddate']!="") { echo $_GET['enddate']; }else{ echo date('d-m-Y'); } ?>"/>
									<i class="fa custom_icon"><img src="../../images/calendar_icon.png" alt=""title="" /></i>
								</div>	
							 </div>	
						</div>
						<div class="form-group row">
							<label class="col-sm-3">Certificate Type</label>
							<div class="col-md-9 col-sm-12">
								<div class="row">
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										<input type="radio" value="All" name="CertificateType" id="All" <?php if(isset($_GET['CertificateType'])) {if(isset($_GET['CertificateType']) && $_GET['CertificateType']=="All") { echo "checked"; } }else { echo "checked";}?> />
										<label for="All" class="btn btn-outline">All</label>
									</div>
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										<input type="radio" value="User" name="CertificateType" id="UserType" <?php if(isset($_GET['CertificateType']) && $_GET['CertificateType']=="User") { echo "checked"; }?> />
										<label for="UserType" class="btn btn-outline">User Type</label>
									</div>
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										<input type="radio" value="Device" name="CertificateType" id="DeviceType" <?php if(isset($_GET['CertificateType']) && $_GET['CertificateType']=="Device") { echo "checked"; }?>/>
										<label for="DeviceType" class="btn btn-outline">Device Type</label>
									</div>									
								</div>
							 </div>	
						</div>
						<div class="form-group row last">
							<label class="col-sm-3">User ID</label>
							<div class="col-md-9 col-sm-12">
								<div class="row">
									<div class="col-sm-8 col-xs-7">
										<input class="form-control" id="inputName" name="userid" type="text" value="<?php if(isset($_GET['userid']) && $_GET['userid']!="") { echo $_GET['userid']; } ?>">
									</div>
									<div class="col-sm-4 col-xs-5">
										<button type="submit" name="certificatesubmit" class="btn btn-info btn-lg btn-block">Search</button>
									</div>
								</div>
							 </div>	
						</div>						
					</form>
				</div>
			</div>
			<div class="Form_Inside certificate_table">
            <div class="table-responsive">
			<table class="table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th><a href="management.php?<?php echo $search_array_string."#certificate_issuance_history"; ?>">Issue Date ▲▼</a><!--Issue Date ▲▼--></th>
                    <th>User ID</th>
                    <th>Certificate Type</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(isset($managementCertificateList) && is_array($managementCertificateList) && count($managementCertificateList)>0) { 
				
							foreach($managementCertificateList as $key => $value ) {
				
				?>
                  <tr>
                    <td><?php echo $icount;  ?></td>
                    <td><?php  echo $value['date']; ?></td>
                    <td><?php  echo $value['userId']; ?></td>
                    <td><?php  echo $value['targetType'] == 'device' ? "Device(".$value['deviceName'].")" : "User"; ?></td>
                  </tr>
                  <?php  
				  $icount--; } } ?>
                  <!--<tr>
                    <td>113</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>calendar8</td>
                    <td>Device(ios8.1)</td>
                  </tr>
                  <tr>
                    <td>112</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>99apple</td>
                    <td>User</td>
                  </tr>
                  <tr>
                    <td>111</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>book2go</td>
                    <td>User</td>
                  </tr>
                  <tr>
                    <td>110</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>khl8432</td>
                    <td>Device(android4.1.2)</td>
                  </tr>
                  <tr>
                    <td>109</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>hyeryun12</td>
                    <td>User</td>
                  </tr>
                  <tr>
                    <td>108</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>jtbc17</td>
                    <td>Device(android4.1.2)</td>
                  </tr>
                  <tr>
                    <td>107</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>live87521</td>
                    <td>Device(android4.1.2)</td>
                  </tr>
                  <tr>
                  <tr>
                    <td>106</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>khl8432</td>
                    <td>Device(android4.1.2)</td>
                  </tr>
                  <tr>
                    <td>105</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>hyeryun12</td>
                    <td>User</td>
                  </tr>
                  <tr>
                    <td>104</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>jtbc17</td>
                    <td>Device(android4.1.2)</td>
                  </tr>
                  <tr>
                    <td>103</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>live87521</td>
                    <td>Device(android4.1.2)</td>
                  </tr> -->                
                </tbody>
              </table>
			  </div>
            <nav aria-label="Page navigation example">
              <div class="text-center">
              <ul class="pagination">
               <!-- <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                  </a>
                </li>-->
                 <?php  echo  $pagination; ?>
              </ul>
                </div>
            </nav>			  
		</div> 
		</div> 
	</div>
	<div id="license_issuance_history" class="tab-pane fade in<?php if ($tabactive=="license") { ?> active <?php } ?>">
		<div class="member_page">
			<h1>License Issuance History</h1>
			<div class="filter_box">
				<div class="filter_data">
					<form method="post" action="../../controller/management/licenseA.php" name="license_issuance_history_form">
						<div class="form-group row">
							<label class="col-sm-3">Period Search</label>
							<div class="col-md-9 col-sm-12">
								<div class="start_date">
									<label>Start Date</label>
									<input id="licensestartdate" name="startdate" class="form-control" placeholder="21 / 02 / 2017"  required value="<?php if(isset($_GET['startdatel']) && $_GET['startdatel']!="") { echo $_GET['startdatel']; }else{ echo date('d-m-Y', strtotime('-1 months')); } ?>"/>
									<i class="fa custom_icon"><img src="../../images/calendar_icon.png" alt=""title="" /></i>
								</div>
								<span class="ico_tr">~</span>
								<div class="end_date">
									<label>End Date</label>
									<input id="licenseenddate" name="enddate" class="form-control" placeholder="DD/MM/YYYY" required value="<?php if(isset($_GET['enddatel']) && $_GET['enddatel']!="") { echo $_GET['enddatel']; }else{ echo date('d-m-Y'); } ?>" />
									<i class="fa custom_icon"><img src="../../images/calendar_icon.png" alt=""title="" /></i>
								</div>	
							 </div>	
						</div>
						<div class="form-group row">
							<label class="col-sm-3">Certificate Type</label>
							<div class="col-md-9 col-sm-12">
								<div class="row">
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										<input type="radio" value="All" name="CertificateType" id="LicenseAll" <?php if(isset($_GET['CertificateTypel'])) {if(isset($_GET['CertificateTypel']) && $_GET['CertificateTypel']=="All") { echo "checked"; } }else { echo "checked";}?> />
										<label for="LicenseAll" class="btn btn-outline">All</label>
									</div>
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										<input type="radio" value="User" name="CertificateType" id="LicenseUserType" <?php if(isset($_GET['CertificateTypel']) && $_GET['CertificateTypel']=="User") { echo "checked"; }?> />
										<label for="LicenseUserType" class="btn btn-outline">User Type</label>
									</div>
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										<input type="radio" value="Device" name="CertificateType" id="LicenseDeviceType" <?php if(isset($_GET['CertificateTypel']) && $_GET['CertificateTypel']=="Device") { echo "checked"; }?>/>
										<label for="LicenseDeviceType" class="btn btn-outline">Device Type</label>
									</div>									
								</div>
							 </div>	
						</div>
						<div class="form-group row last">
							<label class="col-sm-3">User ID</label>
							<div class="col-md-9 col-sm-12">
								<div class="row">
									<div class="col-sm-8 col-xs-7">
										<input class="form-control" id="inputName" type="text" name="userid" value="<?php if(isset($_GET['useridl']) && $_GET['useridl']!="") { echo $_GET['useridl']; } ?>">
									</div>
									<div class="col-sm-4 col-xs-5">
										<button type="submit" class="btn btn-info btn-lg btn-block">Search</button>
									</div>
								</div>
							 </div>	
						</div>						
					</form>
				</div>
			</div>
			<div class="Form_Inside license_table">
            <div class="table-responsive">
			<table class="table">
                <thead>
                  <tr >
                    <th>No.</th>
                    <th> <a href ="management.php?<?php echo $search_array_stringl."#license_issuance_history";?>">Issue Date ▲▼</a></th>
                    <th>User ID</th>
                    <th>Target Type</th>
                    <th>License ID</th>
                    <th>Book name</th>	
                    <th>Price (KRW)</th>						
                  </tr>
                </thead>
                <tbody>
                 <!-- <tr>
                    <td>114</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>golden74</td>
                    <td>Device</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>					
                  </tr>-->
                  <?php if(isset($managementlicenseList) && is_array($managementlicenseList) && count($managementlicenseList)>0) { 
				
							foreach($managementlicenseList as $key => $value ) {
				
				?>
                  <tr class='clickable-row' data-href='license_details.php?<?php echo $search_array_stringl;?>&id=<?php echo $value['licenseId']; ?>&pageNumberl=<?php if (isset($_GET['pageNumberl']) && $_GET['pageNumberl']>0) { echo $_GET['pageNumberl'];}else{echo '';} ?>&pagenamel=<?php echo basename($_SERVER['PHP_SELF']); ?>'>
                    <td><?php echo $icountl;  ?></td>
                    <td><?php  echo $value['date']; ?></td>
                    <td><?php  echo $value['userId']; ?></td>
                    <td><?php  echo $value['targetType'];?></td>
                    <td><?php  echo $value['licenseId']; ?></td>
                    <td><?php  if (isset($value['bookName'])) {echo $value['bookName'];} ?></td>
                    
                     <td><?php  echo $value['price']."(".$value['currency'].")";?></td>
                  </tr>
                  <?php  
				  $icountl--; } } ?>
                 <!-- <tr>
                    <td>113</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>calendar8</td>
                    <td>Device(ios8.1)</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                    <td>112</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>99apple</td>
                    <td>User</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                    <td>111</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>book2go</td>
                    <td>User</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                    <td>110</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>khl8432</td>
                    <td>Device(android4.1.2)</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                    <td>109</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>hyeryun12</td>
                    <td>User</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                    <td>108</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>jtbc17</td>
                    <td>Device(android4.1.2)</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                    <td>107</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>live87521</td>
                    <td>Device(android4.1.2)</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                  <tr>
                    <td>106</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>khl8432</td>
                    <td>Device(android4.1.2)</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                    <td>105</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>hyeryun12</td>
                    <td>User</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                    <td>104</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>jtbc17</td>
                    <td>Device(android4.1.2)</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr>
                  <tr>
                    <td>103</td>
                    <td>2015.08.15 00:00:00</td>
                    <td>live87521</td>
                    <td>Device(android4.1.2)</td>
                    <td>47eb0c81023safi38451de….</td>
                    <td>Snow on Christmas - name...</td>
                    <td>30,000,000</td>						
                  </tr> -->                
                </tbody>
              </table>
			  </div>
            <nav aria-label="Page navigation example">
              <div class="text-center">
              <ul class="pagination">
               <!-- <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                  </a>
                </li>-->
                <?php echo $paginationl; ?>
              </ul>
                </div>
            </nav>			  
		</div> 
		</div> 
	</div>
	<div id="statistics" class="tab-pane fade in <?php if ($tabactive=="statistics") { ?>active<?php } ?>">
			<div class="member_page">
			<h1>Statistics</h1>
			<div class="filter_box">
				<div class="filter_data">
					<form method="post" action="../../controller/management/daily.php" name="daily_statistics" >
						<div class="form-group row">
							<label class="col-sm-3">&nbsp;</label>
							<div class="col-md-9 col-sm-12">
								<div class="row">
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										<a href="management_statistics_mothly.php?type=statistics#statistics" class="btn btn-outline">Monthly Statistics</a>
									</div>
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										<a href="#statistics" class="btn btn-info">Daily Statistics</a>
									</div>
									<div class="col-sm-4 col-xs-4 Mobilebtn">&nbsp;</div>									
								</div>
							 </div>	
						</div>
						<div class="form-group row filter_data last">
							<label class="col-sm-3">&nbsp;</label>
							<div class="col-md-9 col-sm-12">
								<div class="row">
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										  <select class="form-control" name="daily_statistics_year" id="year">
										  <!--<script>
										  var myDate = new Date();
										  var year = myDate.getFullYear();
										  for(var i = 2016; i < year+1; i++){
											  document.write('<option value="'+i+'">'+i+'</option>');
										  }
										  </script>-->
                                          <?php $currentYear = date(Y);
										  		$currentMonth = date(m);
												$currentDay = date(d);
										  
										  for ($i = 2016;$i<$currentYear+1;$i++ ) { ?>
                                          <option value="<?php echo $i;?>" <?php if (isset($_GET['year']) && $_GET['year'] == $i  ) { echo "selected='selected'";} ?>><?php echo $i;?></option>
                                          <?php } ?>
										  </select>
									</div>
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										  <select class="form-control" id="year" name="month" >
											
											<option value='01' <?php if (isset($_GET['month']) && $_GET['month'] == 01  ) { echo "selected='selected'";} ?>>Janaury</option>
											<option value='02' <?php if (isset($_GET['month']) && $_GET['month'] == 02  ) { echo "selected='selected'";} ?>>February</option>
											<option value='03' <?php if (isset($_GET['month']) && $_GET['month'] == 03  ) { echo "selected='selected'";} ?>>March</option>
											<option value='04' <?php if (isset($_GET['month']) && $_GET['month'] == 04  ) { echo "selected='selected'";} ?>>April</option>
											<option value='05' <?php if (isset($_GET['month']) && $_GET['month'] == 05  ) { echo "selected='selected'";} ?>>May</option>
											<option value='06' <?php if (isset($_GET['month']) && $_GET['month'] == 06  ) { echo "selected='selected'";} ?>>June</option>
											<option value='07'<?php if (isset($_GET['month']) && $_GET['month'] == 07  ) { echo "selected='selected'";} ?>>July</option>
											<option value='08'<?php if (isset($_GET['month']) && $_GET['month'] == 08  ) { echo "selected='selected'";} ?>>August</option>
											<option value='09'<?php if (isset($_GET['month']) && $_GET['month'] == 09  ) { echo "selected='selected'";} ?>>September</option>
											<option value='10' <?php if (isset($_GET['month']) && $_GET['month'] == 10  ) { echo "selected='selected'";} ?>>October</option>
											<option value='11' <?php if (isset($_GET['month']) && $_GET['month'] == 11 ) { echo "selected='selected'";} ?>>November</option>
											<option value='12' <?php if (isset($_GET['month']) && $_GET['month'] == 12  ) { echo "selected='selected'";} ?>>December</option>
										  </select>
									</div>
									<div class="col-sm-4 col-xs-4 Mobilebtn">
										<button type="submit" name="daily_statistics_submit" class="btn btn-info btn-lg btn-block">Search</button>
									</div>									
								</div>
                                
							 </div>	
						</div>						
					</form>
					
				</div>
			</div>
			<div class="graph_row">
				<h2><b>Daily Statistics</b> of <?php if (isset($_GET['year']) && $_GET['year'] != ""  ) { echo $_GET['year'];}else{  echo "2016"; } ?></h2>
                <?php if (isset($dayManagementStatisticsNew) && is_array($dayManagementStatisticsNew) && count($dayManagementStatisticsNew)>0) {
					//$dataPointsAxais =array();
					//$dataPointsBxais =array();
					//$dataPointsABxais =array();
					for($idg=1;$idg<=count($dayManagementStatisticsNew['certificates']);$idg++) {
								$sumAB = 	$dayManagementStatisticsNew['certificates'][$idg]+$dayManagementStatisticsNew['licenses'][$idg];
								$xaxis =  (int)$dayManagementStatisticsNew['certificates'][$idg];
								$yaxis =  (int)$dayManagementStatisticsNew['licenses'][$idg];
								if (isset($_GET['year']) && $_GET['year'] == $currentYear && isset($_GET['month']) && $_GET['month'] == $currentMonth && $currentDay == $idg) {
									$dataPointsA[] = array(x => $idg, y => $xaxis,color => "#83BFD7");
									$dataPointsB[] = array(x => $idg, y => $yaxis,color => "#5992AD");
								}else {
						$dataPointsA[] = array(x => $idg, y => $xaxis);
						$dataPointsB[] = array(x => $idg, y => $yaxis);
								}
						$dataPointsAB[] = array(x => $idg,y => $sumAB);
				}
	
    				
					}else{
						$dataPointsA[] = array("x" => 0, "y" => 0);
						$dataPointsB[] = array("x" => 0, "y" => 0);
						$dataPointsAB[] = array("x" => 0, "y" => 0);
					}
					//echo json_encode($dataPointsAxais);
					//echo "<pre>";
					//print_r($dayManagementStatisticsNew);die;
					//echo "<pre>";
					//print_r($dataPointsAxais);
					//echo "<hr/>";
					//print_r($dataPointsBxais);
					//echo "<hr/>";
					//print_r($dataPointsABxais);
					//die;
					
				?>
                
				<div class="Main_graph_area" id="Main_graph_area" style="height: 300px; width: 100%;">
                
					
				</div>
                
                
                <div style="height: 100px; width: 100%;">
                <img src="../../images/signs_graph.jpg" alt="" title="" class="img-responsive"  style="float:right;"/>
                </div>
				<div class="Main_data_table">
				<div class="row">
					<div class="col-sm-6">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Date</th>
										<th>Certificate Issuance History</th>
										<th>License Issuance History</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
                                <?php
								if (isset($dayManagementStatisticsNew) && is_array($dayManagementStatisticsNew) && count($dayManagementStatisticsNew)>0) {
									for($i=1;$i<=15;$i++){ ?>
                                    <tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $dayManagementStatisticsNew['certificates'][$i]; ?></td>
										<td><?php echo $dayManagementStatisticsNew['licenses'][$i]; ?></td>
										<td><?php echo $dayManagementStatisticsNew['licenses'][$i]+$dayManagementStatisticsNew['certificates'][$i]; ?></td>
									</tr>
								<?php		
									}
								}
								?>
									
																		
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Date</th>
										<th>Certificate Issuance History</th>
										<th>License Issuance History</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
								if (isset($dayManagementStatisticsNew) && is_array($dayManagementStatisticsNew) && count($dayManagementStatisticsNew)>0) {
									for($i=16;$i<=count($dayManagementStatisticsNew['certificates']);$i++){ ?>
                                    <tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $dayManagementStatisticsNew['certificates'][$i]; ?></td>
										<td><?php echo $dayManagementStatisticsNew['licenses'][$i]; ?></td>
										<td><?php echo $dayManagementStatisticsNew['licenses'][$i]+$dayManagementStatisticsNew['certificates'][$i]; ?></td>
									</tr>
								<?php		
									}
								}
								?>
																	
								</tbody>
							</table>
						</div>
					</div>					
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</section>
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php'); ?></footer>
<link type="text/css" rel="stylesheet" href="../../css/jquery-ui.css">
<script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
	
		$("#startdate").datepicker({ dateFormat: 'dd/mm/yy' });
		$("#enddate").datepicker({ dateFormat: 'dd/mm/yy' });
		$("#licensestartdate").datepicker({ dateFormat: 'dd/mm/yy' });
		$("#licenseenddate").datepicker({ dateFormat: 'dd/mm/yy' });
		
		$('.fa-calendar').click(function(){
			//alert("d");
			//$(this).closest('.inline_form_date').find('.datepicker-custom').addClass('test');
			var datepickerID = $(this).parent().find('input').attr('id');
			$("#"+datepickerID).focus();
		});
		
	});
</script>  
<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php if (isset($_GET['type']) && $_GET['type'] == 'statistics' )  { ?>
<script>
 window.onload = function () {
	  CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#D6D6D6",
                "#A4A4A4",
                
                "#A2D49A"
                              
                ]);
    var chart = new CanvasJS.Chart("Main_graph_area",
    {
      
	  colorSet:  "greenShades",
	   
	    axisX: {
               
                interval: 1,
                intervalType: "day"

            },
      data: [{        
        type: "column",
        dataPoints: <?php echo json_encode($dataPointsA); ?> 
      },{        
        type: "column",
        dataPoints: <?php echo json_encode($dataPointsB); ?>
      },
              {        
        type: "line",
        dataPoints: <?php echo json_encode($dataPointsAB); ?>
      }
      ]
    });

    chart.render();
  }
</script>
<?php }else { ?>
<script>
$("#graphcall").click(function(){
	setTimeout(function(){
     CanvasJS.addColorSet("greenShades",
                [

                "#D6D6D6",
                "#A4A4A4",
                
                "#A2D49A"
                              
                ]);
    var chart = new CanvasJS.Chart("Main_graph_area",
    {
      
	  colorSet:  "greenShades",
	   
	    axisX: {
               
                interval: 1,
                intervalType: "day"

            },
      data: [{        
        type: "column",
        dataPoints: <?php echo json_encode($dataPointsA); ?> 
      },{        
        type: "column",
        dataPoints: <?php echo json_encode($dataPointsB); ?>
      },
              {        
        type: "line",
        dataPoints: <?php echo json_encode($dataPointsAB); ?>
      }
      ]
    });

    chart.render();
}, 500);
   
});
</script>
<?php } ?>
<script>
jQuery(document).ready(function($) {
			//alert("hello");
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
<script type="text/javascript">
 /* window.onload = function () {
	  CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#D6D6D6",
                "#A4A4A4",
                
                "#A2D49A"
                              
                ]);
    var chart = new CanvasJS.Chart("Main_graph_area",
    {
     
	  colorSet:  "greenShades",
	   
	    
      data: [{        
        type: "column",
        dataPoints: <?php echo json_encode($dataPointsAxais); ?>
      },{        
        type: "column",
        dataPoints: <?php echo json_encode($dataPointsBxais); ?>
      },
              {        
        type: "line",
        dataPoints: <?php echo json_encode($dataPointsABxais); ?>
			  }]
    });

    chart.render();
  }*/
/* $("#graphcall").click(function(){
    CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#D6D6D6",
                "#A4A4A4",
                
                "#A2D49A"
                              
                ]);
    var chart = new CanvasJS.Chart("Main_graph_area",
    {
      
	  colorSet:  "greenShades",
	   
	    axisX: {
               
                interval: 1,
                intervalType: "day"

            },
      data: [{        
        type: "column",
        dataPoints: <?php echo json_encode($dataPointsA); ?> 
      },{        
        type: "column",
        dataPoints: <?php echo json_encode($dataPointsB); ?>
      },
              {        
        type: "line",
        dataPoints: <?php echo json_encode($dataPointsAB); ?>
      }
      ]
    });

    chart.render();
});*/
  
  </script> 
</body>

</html>