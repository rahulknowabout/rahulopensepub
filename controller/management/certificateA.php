<?php // echo "<pre>";
//print_r($_POST);die;
if(isset($_POST['startdate']) && isset($_POST['enddate'])  && isset($_POST['CertificateType'])  && isset($_POST['userid'])   ) {
	header('location:../../view/management/management.php?startdate='.$_POST['startdate']."&enddate=".$_POST['enddate']."&CertificateType=".$_POST['CertificateType']."&userid=".$_POST['userid']."&type=certificate#certificate_issuance_history");
}else{
	//header('location:../../view/management/management_statistics_mothly.php');
}

?>