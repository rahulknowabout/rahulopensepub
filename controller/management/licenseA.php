<?php // echo "<pre>";
//print_r($_POST);die;
if(isset($_POST['startdate']) && isset($_POST['enddate'])  && isset($_POST['CertificateType'])  && isset($_POST['userid'])   ) {
	header('location:../../view/management/management.php?startdatel='.$_POST['startdate']."&enddatel=".$_POST['enddate']."&CertificateTypel=".$_POST['CertificateType']."&useridl=".$_POST['userid']."&type=license#license_issuance_history");
}else{
	//header('location:../../view/management/management_statistics_mothly.php');
}

?>