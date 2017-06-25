<?php include('../../admin/modal/product/product.php');
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
 //include('../../admin/modal/product/product.php');
 //echo "<pre>";
 //print_r(productPackage());die;
 //print_r(productIos(7));die;
 // print_r(productClient());
 // print_r(productProgram());die;
 $productPackage = productPackage(); 
 $productClient = productClient();
 $productProgram = productProgram(); 
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

    <!--<script type="text/javascript">
        $(document).ready(function() {
            $("#top_part").load("inc/top_part.html");
            $("#main_header").load("inc/header.html");
            $("#main_footer").load("inc/footer.html");
        });
    </script>-->
</head>

<body class="page-banner">
    <section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php'); ?></header>
    <div class="advisor-banner-header">
        <div class="advisor-background-banner" style="background: url('../../images/page_bg_download.jpg') no-repeat center 100%; background-size: cover;">
            <div class="advisor-title-banner-header">
                <div class="container">
                    <div class="page_inside">
                        <ul class="breadcrumb">
                            <li><a href="../../index.php"><i class="fa fa-home"></i></a></li>
                            <li><a href="#">Download</a></li>
                        </ul>
                        <h1>Download</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="main-content">
        <div class="container">
            <div class="member_page">
                <h1>Download</b></h1>
                <p>You can download the software or program of your purchased product.</p>
                <div class="Form_Inside">
                    <div class="accordion_style">
                        <h3>SDK</h3>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#PackagerSDK" class="fm collapsed">
                                        <h4 class="panel-title"><span class="droparrow"></span> Packager SDK</h4>
                                    </a>
                                </div>

                                <div id="PackagerSDK" class="panel-body collapse">
                                    <div class="panel-inner">

                                        <!-- Here we insert another nested accordion -->

                                        <div class="panel-group inside_panel" id="accordion2">
                                        <?php if (isset($productPackage) && is_array($productPackage) && count($productPackage)>0 ) { 
											foreach($productPackage as $productPackageK => $productPackageV ) {
										?>
                                            <div class="panel panel-default">
                                            
                                                <div class="panel-heading">
                                                    <a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#PackagerSDKInner_<?php echo $productPackageV['product_id']; ?>">
                                                        <ul class="list_top">
                                                            <li>
                                                                <h5><?php echo $productPackageV['product_version']." (Release Date ".$productPackageV['product_reg_date'].")";?></h5></li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div id="PackagerSDKInner_<?php echo $productPackageV['product_id']; ?>" class="panel-body collapse">
                                                    <div class="panel-inner">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th class="gray">OS</th>
                                                                    <th>File (size)</th>
                                                                    <th>SHA1 Checksum</th>
                                                                </tr>
                                                                <?php if ($productPackageV['product_ios'] == 1 ) {
																$productIosP = array();
																$productIosP =	productIos($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productIosP) && is_array($productIosP) && count($productIosP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productIosP); ?>" class="gray">iOS</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productIosP[0]['product_file'];  ?>"><?php $pos = strpos($productIosP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productIosP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productIosP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productIosP as $productIosPK => $productIosPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productIosPV['product_file'];  ?>"><?php $pos = strpos($productIosPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productIosPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productIosPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																if ($productPackageV['product_android'] == 1 ) {
																$productAndroidP = array();
																$productAndroidP =	productAndroid($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productAndroidP) && is_array($productAndroidP) && count($productAndroidP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productAndroidP); ?>" class="gray">Android</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productAndroidP[0]['product_file'];  ?>"><?php $pos = strpos($productAndroidP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productAndroidP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productAndroidP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productAndroidP as $productAndroidPK => $productAndroidPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productAndroidPV['product_file'];  ?>"><?php $pos = strpos($productAndroidPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productAndroidPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productAndroidPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																
																if ($productPackageV['product_windows'] == 1 ) {
																$productWindowsP = array();
																$productWindowsP =	productwindows($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productWindowsP) && is_array($productWindowsP) && count($productWindowsP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productWindowsP); ?>" class="gray">Windows</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productWindowsP[0]['product_file'];  ?>"><?php $pos = strpos($productWindowsP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productWindowsP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productWindowsP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productWindowsP as $productWindowsPK => $productWindowsPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productWindowsPV['product_file'];  ?>"><?php $pos = strpos($productWindowsPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productWindowsPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productWindowsPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																if ($productPackageV['product_linux'] == 1 ) {
																$productLinuxP = array();
																$productLinuxP =	productLinux($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productLinuxP) && is_array($productLinuxP) && count($productLinuxP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productLinuxP); ?>" class="gray">Linux</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productLinuxP[0]['product_file'];  ?>"><?php $pos = strpos($productLinuxP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productWindowsP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productLinuxP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productLinuxP as $productLinuxPK => $productLinuxPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productLinuxPV['product_file'];  ?>"><?php $pos = strpos($productLinuxPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productLinuxPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productLinuxPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																if ($productPackageV['product_osx'] == 1 ) {
																$productOsxP = array();
																$productOsxP =	productOsx($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productOsxP) && is_array($productOsxP) && count($productOsxP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productOsxP); ?>" class="gray">OSX</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productOsxP[0]['product_file'];  ?>"><?php $pos = strpos($productOsxP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productOsxP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productOsxP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productOsxP as $productOsxPK => $productOsxPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productOsxPV['product_file'];  ?>"><?php $pos = strpos($productOsxPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productOsxPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productOsxPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																
																 ?>
                                                               <!-- <tr>
                                                                    <th rowspan="3" class="gray">Windows</th>
                                                                    <td><a href="#">C# (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">C++ (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th rowspan="2" class="gray">Linux</th>
                                                                    <td><a href="#">C++ (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>-->
                                                            </table>
                                                        </div>
                                                        <p><b>(Release Note)</b>
                                                            <br/><?php echo $productPackageV['product_release_note']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } } ?>
                                            <!--<div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#PackagerSDKInnerTwo">
                                                        <ul class="list_top">
                                                            <li>
                                                                <h5>1.10 (Release Date YYYY.MM.DD) </h5></li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div id="PackagerSDKInnerTwo" class="panel-body collapse">
                                                    <div class="panel-inner">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th class="gray">OS:</th>
                                                                    <th>File (size)</th>
                                                                    <th>SHA1 Checksum</th>
                                                                </tr>
                                                                <tr>
                                                                    <th rowspan="3" class="gray">Windows</th>
                                                                    <td><a href="#">C# (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">C++ (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <th rowspan="2" class="gray">Linux</th>
                                                                    <td><a href="#">C++ (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <p><b>(Release Note)</b>
                                                            <br/>The Java SE 8u121 Advanced Platform, available for Java SE Suite, Java SE Advanced, and Java SE Support customers, is based on the current Java SE 8u121 release. For more information on installation and licensing of Java SE Suite and Java SE Advanced, visit Java SE Products Overview. Find information about Java SE Support at Oracle Java SE Support.</p>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>

                                        <!-- Inner accordion ends here -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#ClientSDK" class="fm collapsed">
                                    <h4 class="panel-title"><span class="droparrow"></span> Client SDK</h4>
                                </a>
                            </div>

                            <div id="ClientSDK" class="panel-body collapse">
                                <div class="panel-inner">

                                    <!-- Here we insert another nested accordion -->

                                    <div class="panel-group inside_panel" id="accordion2">
                                    <?php if (isset($productClient) && is_array($productClient) && count($productClient)>0 ) { 
											foreach($productClient as $productPackageK => $productPackageV ) {
										?>
                                            <div class="panel panel-default">
                                            
                                                <div class="panel-heading">
                                                    <a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#PackagerSDKInner_<?php echo $productPackageV['product_id']; ?>">
                                                        <ul class="list_top">
                                                            <li>
                                                                <h5><?php echo $productPackageV['product_version']." (Release Date ".$productPackageV['product_reg_date'].")";?></h5></li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div id="PackagerSDKInner_<?php echo $productPackageV['product_id']; ?>" class="panel-body collapse">
                                                    <div class="panel-inner">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th class="gray">OS</th>
                                                                    <th>File (size)</th>
                                                                    <th>SHA1 Checksum</th>
                                                                </tr>
                                                                <?php if ($productPackageV['product_ios'] == 1 ) {
																$productIosP = array();
																$productIosP =	productIos($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productIosP) && is_array($productIosP) && count($productIosP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productIosP); ?>" class="gray">iOS</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productIosP[0]['product_file'];  ?>"><?php $pos = strpos($productIosP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productIosP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productIosP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productIosP as $productIosPK => $productIosPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productIosPV['product_file'];  ?>"><?php $pos = strpos($productIosPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productIosPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productIosPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																if ($productPackageV['product_android'] == 1 ) {
																$productAndroidP = array();
																$productAndroidP =	productAndroid($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productAndroidP) && is_array($productAndroidP) && count($productAndroidP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productAndroidP); ?>" class="gray">Android</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productAndroidP[0]['product_file'];  ?>"><?php $pos = strpos($productAndroidP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productAndroidP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productAndroidP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productAndroidP as $productAndroidPK => $productAndroidPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productAndroidPV['product_file'];  ?>"><?php $pos = strpos($productAndroidPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productAndroidPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productAndroidPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																
																if ($productPackageV['product_windows'] == 1 ) {
																$productWindowsP = array();
																$productWindowsP =	productwindows($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productWindowsP) && is_array($productWindowsP) && count($productWindowsP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productWindowsP); ?>" class="gray">Windows</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productWindowsP[0]['product_file'];  ?>"><?php $pos = strpos($productWindowsP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productWindowsP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productWindowsP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productWindowsP as $productWindowsPK => $productWindowsPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productWindowsPV['product_file'];  ?>"><?php $pos = strpos($productWindowsPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productWindowsPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productWindowsPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																if ($productPackageV['product_linux'] == 1 ) {
																$productLinuxP = array();
																$productLinuxP =	productLinux($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productLinuxP) && is_array($productLinuxP) && count($productLinuxP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productLinuxP); ?>" class="gray">Linux</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productLinuxP[0]['product_file'];  ?>"><?php $pos = strpos($productLinuxP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productLinuxP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productLinuxP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productLinuxP as $productLinuxPK => $productLinuxPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productLinuxPV['product_file'];  ?>"><?php $pos = strpos($productLinuxPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productLinuxPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productLinuxPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																if ($productPackageV['product_osx'] == 1 ) {
																$productOsxP = array();
																$productOsxP =	productOsx($productPackageV['product_id']);
																//print_r($productIosP);die;
																if( isset($productOsxP) && is_array($productOsxP) && count($productOsxP)>0) {
																	$istart = 0;
																?>
                                                                <tr>
                                                                    <th rowspan="<?php echo count($productOsxP); ?>" class="gray">OSX</th>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productOsxP[0]['product_file'];  ?>"><?php $pos = strpos($productOsxP[0]['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productOsxP[0]['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productOsxP[0]['product_sha1_checksum']; ?></td>
                                                                </tr>
                                                                <?php	
																	foreach($productOsxP as $productOsxPK => $productOsxPV ) {
																		$istart++;
																		if ($istart == 1 ) {
																			continue;
																		}
																		?>
                                                                      <tr>
                                                                    <td><a href="downloadproductsdk.php?file=<?php echo $productOsxPV['product_file'];  ?>"><?php $pos = strpos($productOsxPV['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($productOsxPV['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?></a></td>
                                                                    <td><?php echo $productOsxPV['product_sha1_checksum']; ?></td>
                                                                </tr>  
                                                                   <?php     
																	}
																			
																}
																}
																
																 ?>
                                                               <!-- <tr>
                                                                    <th rowspan="3" class="gray">Windows</th>
                                                                    <td><a href="#">C# (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">C++ (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th rowspan="2" class="gray">Linux</th>
                                                                    <td><a href="#">C++ (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>-->
                                                            </table>
                                                        </div>
                                                        <p><b>(Release Note)</b>
                                                            <br/><?php echo $productPackageV['product_release_note']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } } ?>
                                        <!--<div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerOne">
                                                    <ul class="list_top">
                                                        <li>
                                                            <h5>1.10 (Release Date YYYY.MM.DD) </h5></li>
                                                    </ul>
                                                </a>
                                            </div>
                                            <div id="collapseInnerOne" class="panel-body collapse">
                                                <div class="panel-inner">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th class="gray">OS:</th>
                                                                <th>File (size)</th>
                                                                <th>SHA1 Checksum</th>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="3" class="gray">Windows</th>
                                                                <td><a href="#">C# (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">C++ (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="2" class="gray">Linux</th>
                                                                <td><a href="#">C++ (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <p><b>(Release Note)</b>
                                                        <br/>The Java SE 8u121 Advanced Platform, available for Java SE Suite, Java SE Advanced, and Java SE Support customers, is based on the current Java SE 8u121 release. For more information on installation and licensing of Java SE Suite and Java SE Advanced, visit Java SE Products Overview. Find information about Java SE Support at Oracle Java SE Support.</p>
                                                </div>
                                            </div>
                                        </div> -->
                                     <!--   <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerTwo">
                                                    <ul class="list_top">
                                                        <li>
                                                            <h5>1.10 (Release Date YYYY.MM.DD) </h5></li>
                                                    </ul>
                                                </a>
                                            </div>
                                            <div id="collapseInnerTwo" class="panel-body collapse">
                                                <div class="panel-inner">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th class="gray">OS:</th>
                                                                <th>File (size)</th>
                                                                <th>SHA1 Checksum</th>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="3" class="gray">Windows</th>
                                                                <td><a href="#">C# (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">C++ (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="2" class="gray">Linux</th>
                                                                <td><a href="#">C++ (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <p><b>(Release Note)</b>
                                                        <br/>The Java SE 8u121 Advanced Platform, available for Java SE Suite, Java SE Advanced, and Java SE Support customers, is based on the current Java SE 8u121 release. For more information on installation and licensing of Java SE Suite and Java SE Advanced, visit Java SE Products Overview. Find information about Java SE Support at Oracle Java SE Support.</p>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                    <!-- Inner accordion ends here -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion_style">
                    <h3>Program</h3>
                    <div class="panel-group" id="accordionInside3_1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordionInside3_1" href="#accordionData3_1" class="fm collapsed">
                                    <h4 class="panel-title"><span class="droparrow"></span> OPENS Packager</h4>
                                </a>
                            </div>

                            <div id="accordionData3_1" class="panel-body collapse">
                                <div class="panel-inner">

                                    <!-- Here we insert another nested accordion -->

                                    <div class="panel-group inside_panel" id="accordion2">
                                      <?php if (isset($productProgram) && is_array($productProgram) && count($productProgram)>0 ) { 
											foreach($productProgram as $productPackageK => $productPackageV ) {
										?>
                                            <div class="panel panel-default">
                                            
                                                <div class="panel-heading">
                                                    <a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#PackagerSDKInner_<?php echo $productPackageV['product_id']; ?>">
                                                        <ul class="list_top">
                                                            <li>
                                                                <h5><?php echo $productPackageV['product_version']." (Release Date ".$productPackageV['product_reg_date'].")";?></h5></li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <div id="PackagerSDKInner_<?php echo $productPackageV['product_id']; ?>" class="panel-body collapse">
                                                    <div class="panel-inner">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th class="gray">OS</th>
                                                                    <th>File (size)</th>
                                                                    <!--<th>SHA1 Checksum</th>-->
                                                                </tr>
                                                                <tr>
                                                                    <th rowspan="1" class="gray">-</th>
                                                                    <td><a href="downloadproductprogram.php?file=<?php echo $productPackageV['product_file']; ?>"><?php echo $productPackageV['product_file']; ?></a></td>
                                                                   <!-- <td><?php echo $productPackageV['product_sha1_checksum']; ?></td>-->
                                                                </tr>
                                                               
                                                               <!-- <tr>
                                                                    <th rowspan="3" class="gray">Windows</th>
                                                                    <td><a href="#">C# (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">C++ (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th rowspan="2" class="gray">Linux</th>
                                                                    <td><a href="#">C++ (1.1MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                    <td>63fad123daa21</td>
                                                                </tr>-->
                                                            </table>
                                                        </div>
                                                        <p><b>(Release Note)</b>
                                                            <br/><?php echo $productPackageV['product_release_note']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } } ?>
                                        <!--<div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#ProgramInnerOne">
                                                    <ul class="list_top">
                                                        <li>
                                                            <h5>1.10 (Release Date YYYY.MM.DD) </h5></li>
                                                    </ul>
                                                </a>
                                            </div>
                                            <div id="ProgramInnerOne" class="panel-body collapse">
                                                <div class="panel-inner">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th class="gray">OS:</th>
                                                                <th>File (size)</th>
                                                                <th>SHA1 Checksum</th>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="3" class="gray">Windows</th>
                                                                <td><a href="#">C# (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">C++ (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="2" class="gray">Linux</th>
                                                                <td><a href="#">C++ (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <p><b>(Release Note)</b>
                                                        <br/>The Java SE 8u121 Advanced Platform, available for Java SE Suite, Java SE Advanced, and Java SE Support customers, is based on the current Java SE 8u121 release. For more information on installation and licensing of Java SE Suite and Java SE Advanced, visit Java SE Products Overview. Find information about Java SE Support at Oracle Java SE Support.</p>
                                                </div>
                                            </div>
                                        </div>-->
                                      <!--  <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#ProgramInnerTwo">
                                                    <ul class="list_top">
                                                        <li>
                                                            <h5>1.10 (Release Date YYYY.MM.DD) </h5></li>
                                                    </ul>
                                                </a>
                                            </div>
                                            <div id="ProgramInnerTwo" class="panel-body collapse">
                                                <div class="panel-inner">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th class="gray">OS:</th>
                                                                <th>File (size)</th>
                                                                <th>SHA1 Checksum</th>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="3" class="gray">Windows</th>
                                                                <td><a href="#">C# (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">C++ (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <th rowspan="2" class="gray">Linux</th>
                                                                <td><a href="#">C++ (1.1MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="#">JAVA (1.1.MB)</a></td>
                                                                <td>63fad123daa21</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <p><b>(Release Note)</b>
                                                        <br/>The Java SE 8u121 Advanced Platform, available for Java SE Suite, Java SE Advanced, and Java SE Support customers, is based on the current Java SE 8u121 release. For more information on installation and licensing of Java SE Suite and Java SE Advanced, visit Java SE Products Overview. Find information about Java SE Support at Oracle Java SE Support.</p>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>

                                    <!-- Inner accordion ends here -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>

    <footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php'); ?></footer>
</body>

</html>