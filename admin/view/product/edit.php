<?php include_once('../../check_login.php'); 
include('../../modal/product/product.php');
 $cleaned = clean($_GET);
 $user_synchronus = 0;
 $previousProduct_id = $cleaned['product_id'];

if (isset($cleaned['product_id']) && $cleaned['product_id']!=""){
    $singleProduct = singleProduct($cleaned['product_id']);
 }
 if (isset($singleProduct) && is_array($singleProduct) && count($singleProduct)>0) {
  }else {
	  $singleProduct['product_reg_date'] ="";
	  $singleProduct['product_type'] ="";
	  $singleProduct['product_name'] ="";
	  $singleProduct['product_ios'] ="";
	  $singleProduct['product_android'] ="";
	  $singleProduct['product_windows'] ="";
	  $singleProduct['product_linux'] ="";
	  $singleProduct['product_osx'] ="";
	  $singleProduct['product_file'] ="";
	  $singleProduct['product_release_note'] ="";
	  $singleProduct['product_version'] ="";
	  
  }
  $reg_date = $singleProduct['product_reg_date'];
  //echo "<pre>";
 //print_r($singleProduct);die;
  if (isset($singleProduct['product_user_synchronization']) && $singleProduct['product_user_synchronization'] == 1 ) {
	  $user_synchronus = $singleProduct['product_user_synchronization'];
	  $singleProduct  = CheckProductParent($cleaned['product_id']);
	 // echo "<pre>";
	  //print_r($singleProduct);
	  //die;
	  $previousProduct_id = $cleaned['product_id'];
	  $cleaned['product_id'] = $singleProduct['product_id']; 
  }
  $iosArray =array();
  $androidArray =array();
  $windowsArray =array();
  $linuxArray =array();
  $osxArray =array();
 unset($os_array);
 $os_array =array();
 if ($singleProduct['product_ios'] == 1) { $os_array[] = 'iOS';
    $iosArray = productIos($cleaned['product_id']);
	$iosCheck ="checked='checked'";
	$iosStyle ="style='display:block;'";
	if (is_array($iosArray) && count($iosArray)>0){
    	$ios_language_first =$iosArray[0]['product_language'];
		$ios_product_file_first =$iosArray[0]['product_file'];
		$ios_product_sha1_checksum_first =$iosArray[0]['product_sha1_checksum'];
     } else {
		$ios_language_first ="";
		$ios_product_file_first ="";
		$ios_product_sha1_checksum_first ="";
	 }
	//echo "<pre>";
	//print_r($iosArray);
	//die;
 }else {
	 $iosCheck ="";
	 $iosStyle ="style='display:none;'";
	 $ios_language_first ="";
	 $ios_product_file_first ="";
	 $ios_product_sha1_checksum_first ="";
 }
 if ($singleProduct['product_android'] == 1) { 
 $os_array[] = 'Android';
 $androidArray = productAndroid($cleaned['product_id']);
 $androidCheck ="checked='checked'";
 $androidStyle ="style='display:block;'";
 if (is_array($androidArray) && count($androidArray)>0){
    	$android_language_first =$androidArray[0]['product_language'];
		$android_product_file_first =$androidArray[0]['product_file'];
		$android_product_sha1_checksum_first =$androidArray[0]['product_sha1_checksum'];
     } else {
		$android_language_first ="";
		$android_product_file_first ="";
		$android_product_sha1_checksum_first ="";
	 }
 }else {
	 $androidCheck ='';
	 $androidStyle ="style='display:none;'";
	 $android_language_first ="";
	 $android_product_file_first ="";
	 $android_product_sha1_checksum_first ="";
 }
 if ($singleProduct['product_windows'] == 1) { 
 $os_array[] = 'Windows';
 $windowsArray =productwindows($cleaned['product_id']);
 $windowsCheck ="checked='checked'";
 $windowsStyle ="style='display:block;'";
  if (is_array($windowsArray) && count($windowsArray)>0){
    	$windows_language_first =$windowsArray[0]['product_language'];
		$windows_product_file_first =$windowsArray[0]['product_file'];
		$windows_product_sha1_checksum_first =$windowsArray[0]['product_sha1_checksum'];
     } else {
		$windows_language_first ="";
		$windows_product_file_first ="";
		$windows_product_sha1_checksum_first ="";
	 }
 
 }else {
	 $windowsCheck ='';
	 $windowsStyle ="style='display:none;'";
	 $windows_language_first ="";
	 $windows_product_file_first ="";
	 $windows_product_sha1_checksum_first ="";
 }
 if ($singleProduct['product_linux'] == 1) { 
 $os_array[] = 'Linux';
 $linuxArray =productLinux($cleaned['product_id']);
 $linuxCheck ="checked='checked'";
 $linuxStyle ="style='display:block;'";
  if (is_array($linuxArray) && count($linuxArray)>0){
    	$linux_language_first =$linuxArray[0]['product_language'];
		$linux_product_file_first =$linuxArray[0]['product_file'];
		$linux_product_sha1_checksum_first =$linuxArray[0]['product_sha1_checksum'];
     } else {
		$linux_language_first ="";
		$linux_product_file_first ="";
		$linux_product_sha1_checksum_first ="";
	 }
 }else {
	 $linuxCheck ="";
	 $linuxStyle ="style='display:none;'";
	 $linux_language_first ="";
	 $linux_product_file_first ="";
	 $linux_product_sha1_checksum_first ="";
 }
 if ($singleProduct['product_osx'] == 1) { 
 $os_array[] = 'OSX';
  $osxArray =productOsx($cleaned['product_id']);
  //echo "<pre>";
  //print_r($osxArray);
  //die;
  $osxCheck ="checked='checked'";
  $osxStyle ="style='display:block;'";
  if (is_array($osxArray) && count($osxArray)>0){
    	$osx_language_first =$osxArray[0]['product_language'];
		$osx_product_file_first =$osxArray[0]['product_file'];
		$osx_product_sha1_checksum_first =$osxArray[0]['product_sha1_checksum'];
     } else {
		$osx_language_first ="";
		$osx_product_file_first ="";
		$osx_product_sha1_checksum_first ="";
	 }
 }else {
	 $osxCheck ="";
	 $osxStyle ="style='display:none;'";
	 $osx_language_first ="";
	 $osx_product_file_first ="";
	 $osx_product_sha1_checksum_first ="";
	  
 }
 $os_string =implode(",",$os_array);
 if ($singleProduct['product_name'] == 'c_sdk') { $singleProduct['product_name'] = 'Client'; $csdk = "selected='selected'";}else{ $csdk =''; }
 if ($singleProduct['product_name'] == 'p_sdk') { $singleProduct['product_name'] = 'Packager SDK'; $psdk = "selected='selected'";}else{ $psdk =''; }
 if ($singleProduct['product_name'] == 'opens_packager') { $singleProduct['product_name'] = 'OPENS Packager'; $opensPackager = "selected='selected'"; }else{ $opensPackager ='';}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Edit your Product History SDK</title>
<link href="../../dist/img/favicon.ico" rel="icon" type="/ico" />
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.css">
<!-- Main style -->
<link rel="stylesheet" href="../../dist/css/style.css">
<link rel="stylesheet" href="../../dist/css/skins/_all-skins.css">
<!-- iCheck -->
<link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
<!-- jqueryUI -->
<link type="text/css" rel="stylesheet" href="../../dist/css/jquery-ui.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="../../plugins/iCheck/all.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper"> 
  <!-- Header -->
  <header id="main_header" class="main-header"><?php include_once('../header/headert.php') ?></header>
  <!-- Left Sidebar -->
  <aside id="main_sidebar" class="main-sidebar"><?php include_once('../header/LeftSidebar.php') ?></aside>
  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <div class="width_define"> 
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> <b>Edit</b> your Product History </h1>
      </section>
      
      <!-- Main content -->
      <section class="content member_page">
        <div class="Form_Inside edit_data">
          <form  id="jvalidate" role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="../../controller/product/productedit.php">
          <input type='hidden' name ="product_id" value="<?php echo $previousProduct_id; ?>" />
          <input type='hidden' name ="draft_product_id" value="<?php echo $singleProduct['product_id']; ?>" />
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3">Register Date</label>
              <div class="col-md-5 col-sm-8">
                <p><?php echo $singleProduct['product_reg_date']; ?><input type="hidden" name="product_reg_date" value="<?php echo $reg_date; ?>"/></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="type_choose">Type</label>
              <div class="col-md-5 col-sm-8">
                <div class="select-style">
                  
                  <select name="product_type" id="product_type" class="form-control" onChange="productTypeChange(this.value)"><option value="SDK" <?php if($singleProduct['product_type'] == 'SDK') { ?> selected ='selected' <?php  } ?>>SDK</option><option value="program" <?php if($singleProduct['product_type'] == 'program') { ?> selected ='selected' <?php  } ?>>Program</option></select><input type="hidden" name="program_file_hidden" value="<?php echo $singleProduct['product_file']; ?>"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="product_choose">Product</label>
              <div class="col-md-5 col-sm-8">
                <div class="select-style">
                 
                  <span  id="product_name_sdk_span" <?php if($singleProduct['product_type'] == 'SDK') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php } ?>  > <select name="product_name_sdk" id="product_name_sdk" class="form-control"><option value="c_sdk" <?php echo $csdk; ?>>Client SDK</option><option value="p_sdk" <?php echo $psdk; ?> >Packager SDK</option></select></span><span id="product_name_program_span" <?php if($singleProduct['product_type'] == 'program') { ?>  style="display:block;"  <?php }else { ?>  style="display:none;" <?php } ?> > <select name="product_name_program" id="product_name_program" class="form-control"><option value="opens_packager" <?php echo $opensPackager; ?> >OPENS Packager</option></select></span>
                </div>
              </div>
            </div>
            
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3 col-lg-3">Version</label>
              <div class="col-md-5 col-sm-8">
               <!-- <input class="form-control" id="version" placeholder="1.0.0" type="text">-->
               <input type="text" class="form-control" name="product_version" id="product_version" value="<?php echo $singleProduct['product_version']; ?>"/>
              </div>
            </div>
            <span id="row_file" <?php if( $singleProduct['product_type'] == 'program') { echo ''; } else { ?> style="display:none;" <?php  } ?>>
            <div class="form-group upload ">
              <label class="col-sm-4 col-md-3 col-lg-3">File</label>
             
              <div class="col-md-5 col-sm-8" id="row_file_td" <?php if( $singleProduct['product_type'] == 'program') { echo ''; } else { ?> style="display:none;" <?php  } ?>>
                <input type="file" name="program_file_first" id="program_file_first" class="inputfile inputfile-1" style="display:none;" onChange="programsetfilename(this.value,'first')"/>
               <!-- <label for="file-1" class="btn btn-default btn-block file-btn"> Upload <span class="File_name_view">abcdefg.exe (1.1MB)</span>-->
               <span  class="btn btn-default btn-block file-btn" name="program_button_first" onclick="document.getElementById('program_file_first').click();">Upload </span>
                 <span id="program_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"><?php if( $singleProduct['product_type'] == 'program') {$pos = strpos($singleProduct['product_file'],'_'); if($pos) { $singleProduct['product_file'] = substr_replace($singleProduct['product_file'],'',0,$pos+1);}   ?><span style="padding-left:2px;padding-right:2px;"><?php echo $singleProduct['product_file']; ?><span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick="clearSpan('program_file_span_first','program_file_first');"></i></span></span><?php }?></span> 
                
              </div>
            </div>
            
            </span>
            <span id="row_os" <?php if( $singleProduct['product_type'] == 'SDK') { echo ''; }else { ?> style="display:none;" <?php  } ?>>
            <div class="form-group upload ">
              <label class="col-sm-4 col-md-3 col-lg-3">OS</label>
              <div class="col-md-9 col-sm-12"> <span class="checkbox_design">
                <input type="checkbox" name="ios_check" id="ios_check" <?php echo $iosCheck; ?>/>
                <label for="ios_check"><span></span>iOS</label>
                </span> <span class="checkbox_design">
                <input type="checkbox" name="android_check" id="android_check" <?php echo $androidCheck; ?>/>
                <label for="android_check"><span></span>Android</label>
                </span> <span class="checkbox_design">
                <input type="checkbox" name="windows_check" id="windows_check" <?php echo $windowsCheck; ?> />
                <label for="windows_check"><span></span>Windows</label>
                </span> <span class="checkbox_design">
                <input type="checkbox" name="linux_check" id="linux_check" <?php echo $linuxCheck; ?> />
                <label for="linux_check"><span></span>Linux</label>
                </span> <span class="checkbox_design">
                <input type="checkbox" name="osx_check" id="osx_check" <?php echo $osxCheck; ?>/>
                <label for="osx_check"><span></span>OSX</label>
                </span>
            
                <!--       iOS Table --->
            
                <div class="table-responsive" id="ios_table" <?php echo $iosStyle; ?> >
                  <table class="table rocking_table" id="data_table_ios">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
                    <?php   if (is_array($iosArray) && count($iosArray)>0){
			   			$i = 0;
			   			foreach($iosArray as $key=>$value) { 	
						$i++;		   
			?>
                    <tr id='row_ios_E_<?php echo $value['product_ios_id'];?>'>
                    <?php if($i == 1 ) {  ?>
                      <td rowspan="<?php echo count($iosArray); ?>" style="vertical-align:middle" id="ios_rowspan">iOS</td>
                      <?php } ?>
                      <td>
                        <select class="form-control" name="language_ios_E[<?php echo  $value['product_ios_id'];?>]"><option value="cpp" <?php if ($value['product_language'] == 'cpp'){ echo "selected ='selected'";} ?> >C++</option><option value="java" <?php if ($value['product_language'] == 'java' ){ echo "selected ='selected'";} ?> >Java</option></select></td>
                      
                      <td><!--<input class="form-control" id="upload1" placeholder="" type="text">--><input type="file" name="ios_file_E[<?php echo  $value['product_ios_id'];?>]" id="ios_file_E_<?php echo  $value['product_ios_id'];?>" class="form-control" style="display:none;" onChange="iossetfilename(this.value,'E_<?php echo  $value['product_ios_id'];?>')"/><input type="button" value="Upload" name="ios_button_E_<?php echo  $value['product_ios_id'];?>" onclick="document.getElementById('ios_file_E_<?php echo  $value['product_ios_id'];?>').click();" /><span id="ios_file_span_E_<?php echo  $value['product_ios_id'];?>" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?><?php if($value['product_file']!="") { ?><span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick="clearSpan('ios_file_span_E_<?php echo  $value['product_ios_id'];?>','ios_file_E_<?php echo  $value['product_ios_id'];?>')"></i></span><!--<img src="../../img/deleteicon.png" onClick="clearSpan('ios_file_span_E_<?php echo  $value['product_ios_id'];?>','ios_file_E_<?php echo  $value['product_ios_id'];?>')"/>--><?php } ?></span></td>
                      <td><input type="text" name="ios_checksum_E[<?php echo  $value['product_ios_id'];?>]" class="form-control checkSum" value="<?php echo $value['product_sha1_checksum']; ?>"/></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRowIosbutton_<?php echo  $value['product_ios_id'];?>" onClick="addRowIos()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowIosbutton_<?php echo  $value['product_ios_id'];?>" onClick='deleteRows("row_ios_","E_<?php echo $value['product_ios_id'];?>");'><i class="fa fa-minus-circle" aria-hidden="true" ></i></button>
                        </div><input type="hidden" name="ios_file_hidden[<?php echo $value['product_ios_id'];?>]" value="<?php echo $value['product_file'];?>"/></td>
                    </tr>
                     <?php
						}
		   }else { ?> 
                    <tr>
                    <td id="ios_rowspan" rowspan="1" style="vertical-align:middle">iOS</td>
                      <td><select class="form-control" name="language_ios_first"><option value="cpp">C++</option><option value="java">Java</option></select>
                        </td>
                      <td><input type="file" name="ios_file_first" id="ios_file_first"  style="display:none;" onChange="iossetfilename(this.value,'first')"/><input type="button" value="[Upload]" name="ios_button_first" onclick="document.getElementById('ios_file_first').click();" /><span id="ios_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"></span><!--<a href="#"></a>--></td>
                      <td><input type="text" name="ios_checksum_first" class="form-control"/></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRowIosbutton" onClick="addRowIos()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowIosbutton"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                        </div></td>
                    </tr>
                    <?php }
		  ?>
                  </table>
                </div>
                <!--- IOS TABLE --->
                <!-- Android Table -->
                
                
                
                <div class="table-responsive" id="android_table" <?php echo $androidStyle; ?> >
                  <table class="table rocking_table" id="data_table_android">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
                     <?php   if (is_array($androidArray) && count($androidArray)>0){
				 			$i = 0;
			   			foreach($androidArray as $key=>$value) { 	
							$i++;		   
			?>
                    <tr id='row_android_E_<?php echo $value['product_android_id'];?>'>
                    <?php if($i == 1 ) {  ?>
                      <td rowspan="<?php echo count($androidArray); ?>" style="vertical-align:middle" id="android_rowspan">Android</td>
                      <?php } ?>
                      <td>
                       <select class="form-control"  style="width:110px;" name="language_android_E[<?php echo  $value['product_android_id'];?>]"><option value="cpp" <?php if ($value['product_language'] == 'cpp'){ echo "selected ='selected'";} ?>>C++</option><option value="java" <?php if ($value['product_language'] == 'java' ){ echo "selected ='selected'";} ?>>Java</option></select></td>
                      
                      <td><input type="file" name="android_file_E[<?php echo  $value['product_android_id'];?>]" id="android_file_E_<?php echo  $value['product_android_id'];?>" class="form-control" style="display:none;" onChange="androidsetfilename(this.value,'E_<?php echo  $value['product_android_id'];?>')"/><input type="button" value="Upload" name="android_button_E_<?php echo $value['product_android_id'];?>" onclick="document.getElementById('android_file_E_<?php echo  $value['product_android_id'];?>').click();" /><span id="android_file_span_E_<?php echo  $value['product_android_id'];?>" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?><?php if($value['product_file']!="") { ?><!--<img src="../../img/deleteicon.png" onClick="clearSpan('android_file_span_E_<?php echo  $value['product_android_id'];?>','android_file_E_<?php echo  $value['product_android_id'];?>')"/>--><span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick="clearSpan('android_file_span_E_<?php echo  $value['product_android_id'];?>','android_file_E_<?php echo  $value['product_android_id'];?>')"></i></span><?php } ?></span><!--<input class="form-control" id="upload1" placeholder="" type="text">--></td>
                      <td><input type="text" name="android_checksum_E[<?php echo  $value['product_android_id'];?>]" class="form-control checkSum" value="<?php echo $value['product_sha1_checksum']; ?>"/></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRowAndroiadbutton_<?php echo  $value['product_android_id'];?>" onClick="addRowAndroid()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowAndroiadbutton_<?php echo  $value['product_android_id'];?>" onClick='deleteRows("row_android_","E_<?php echo $value['product_android_id'];?>");'><i class="fa fa-minus-circle" aria-hidden="true" ></i></button>
                        </div><input type="hidden" name="android_file_hidden[<?php echo $value['product_android_id'];?>]" value="<?php echo $value['product_file'];?>"/></td>
                    </tr>
                     <?php
						}
		   }else { ?> 
                    <tr>
                      <td id="android_rowspan" rowspan="1" style="vertical-align:middle">Android</td>
                      <td><div class="select-style">
                         
                        <select class="form-control"  style="width:110px;" name="language_android_first"><option value="cpp">C++</option><option value="java">Java</option></select></td>
                      <td><input type="file" name="android_file_first" id="android_file_first"  style="display:none;" onChange="androidsetfilename(this.value,'first')"/><input type="button" value="Upload" name="android_button_first" onclick="document.getElementById('android_file_first').click();" /><span id="android_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"></span><!--<a href="#">[Upload]</a>--></td>
                      <td><input type="text" name="android_checksum_first" class="form-control"/></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRowAndroiadbutton" onClick="addRowAndroid()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowAndroiadbutton"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                        </div></td>
                    </tr>
                    <?php }
		  ?>
                  </table>
                </div>
                
                <!---Android Table --> 
                <!-- Windows Table -->
                
                
                
                
                <div class="table-responsive" id="windows_table" <?php echo $windowsStyle; ?> >
                  <table class="table rocking_table" id="data_table_windows">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
                   <?php   if (is_array($windowsArray) && count($windowsArray)>0){
					$i = 0;
			   			foreach($windowsArray as $key=>$value) { 
							$i++;			   
			?>
                    <tr id='row_windows_E_<?php echo $value['product_windows_id'];?>'>
                    <?php if($i == 1 ) {  ?>
                      <td rowspan="<?php echo count($windowsArray); ?>" style="vertical-align:middle" id="windows_rowspan">Windows</td>
                      <?php } ?>
                      <td>
                       <select class="form-control" name="language_windows_E[<?php echo $value['product_windows_id'];?>]"><option value="cpp" <?php if ($value['product_language'] == 'cpp'){ echo "selected ='selected'";} ?>>C++</option><option value="java" <?php if ($value['product_language'] == 'java' ){ echo "selected ='selected'";} ?>>Java</option></select></td>
                      
                      <td><input type="file" name="windows_file_E[<?php echo $value['product_windows_id'];?>]" id="windows_file_E_<?php echo $value['product_windows_id'];?>" class="form-control" style="display:none;" onChange="windowssetfilename(this.value,'E_<?php echo $value['product_windows_id'];?>')"/><input type="button" value="Upload" name="windows_button_E_<?php echo $value['product_windows_id'];?>" onclick="document.getElementById('windows_file_E_<?php echo $value['product_windows_id'];?>').click();" /><span id="windows_file_span_E_<?php echo $value['product_windows_id'];?>" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?><?php if($value['product_file']!="") { ?><span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick="clearSpan('windows_file_span_E_<?php echo  $value['product_windows_id'];?>','windows_file_E_<?php echo  $value['product_windows_id'];?>')"></i></span><!--<img src="../../img/deleteicon.png" onClick="clearSpan('windows_file_span_E_<?php echo  $value['product_windows_id'];?>','windows_file_E_<?php echo  $value['product_windows_id'];?>')"/>--><?php } ?></span><!--<input class="form-control" id="upload1" placeholder="" type="text">--></td>
                      <td><input type="text" name="windows_checksum_E[<?php echo $value['product_windows_id'];?>]" value="<?php echo $value['product_sha1_checksum']; ?>" class="form-control checkSum"/></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRoWindowsbutton_<?php echo $value['product_windows_id'];?>" onClick="addRowWindows()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowWindowsbutton_<?php echo $value['product_windows_id'];?>" onClick='deleteRows("row_windows_","E_<?php echo $value['product_windows_id'];?>");'><i class="fa fa-minus-circle" aria-hidden="true" ></i></button>
                        </div><input type="hidden" name="windows_file_hidden[<?php echo $value['product_windows_id'];?>]" value="<?php echo $value['product_file'];?>"/></td>
                    </tr>
                     <?php
						}
		   }else { ?> 
                    <tr>
                      <td  id="windows_rowspan" rowspan="1"  style="vertical-align:middle">Windows</td>
                      <td><div class="select-style">
                         <select class="form-control" name="language_windows_first"><option value="cpp">C++</option><option value="java">Java</option></select>
                        </div></td>
                      <td><input type="file" name="windows_file_first" id="windows_file_first"  style="display:none;" onChange="windowssetfilename(this.value,'first')"/><input type="button" value="Upload" name="windows_button_first" onclick="document.getElementById('windows_file_first').click();" /><span id="windows_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"></span><!--<a href="#">[Upload]</a>--></td>
                      <td><input type="text" name="windows_checksum_first" class="form-control"/></td><!--<td class="text-center"><input class="form-control" id="SHA1Checksum3" placeholder="" type="text"></td>-->
                      <td><div class="row_btn">
                         <button type="button" name="addRowWindowsbutton" onClick="addRowWindows()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowWindowsbutton"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                        </div></td>
                    </tr>
                    <?php }
		  ?>
                  </table>
                </div>
                <!-- Windows Table -->
                
                
                <!-- Linux Table -->
                
                <div class="table-responsive" id="linux_table" <?php echo $linuxStyle; ?> >
                  <table class="table rocking_table" id="data_table_linux">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
                   <?php   if (is_array($linuxArray) && count($linuxArray)>0){
				$i = 0;
			   			foreach($linuxArray as $key=>$value) { 	
							$i++;		   
			?>
                    <tr id='row_linux_E_<?php echo $value['product_linux_id'];?>'>
                    <?php if($i == 1 ) {  ?>
                      <td rowspan="<?php echo count($linuxArray); ?>" style="vertical-align:middle" id="linux_rowspan">Linux</td>
                      <?php } ?>
                      <td>
                        <select class="form-control" name="language_linux_E[<?php echo $value['product_linux_id'];?>]"><option value="cpp" <?php if ($value['product_language'] == 'cpp'){ echo "selected ='selected'";} ?> >C++</option><option value="java" <?php if ($value['product_language'] == 'java' ){ echo "selected ='selected'";} ?>>Java</option></select></td>
                      
                      <td><input type="file" name="linux_file_E[<?php echo $value['product_linux_id'];?>]" id="linux_file_E_<?php echo $value['product_linux_id'];?>" class="form-control" style="display:none;" onChange="linuxsetfilename(this.value,'E_<?php echo $value['product_linux_id'];?>')"/><input type="button" value="Upload" name="linux_button_E_<?php echo $value['product_linux_id'];?>" onclick="document.getElementById('linux_file_E_<?php echo $value['product_linux_id'];?>').click();" /><span id="linux_file_span_E_<?php echo $value['product_linux_id'];?>" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?><?php if($value['product_file']!="") { ?><span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick="clearSpan('linux_file_span_E_<?php echo  $value['product_linux_id'];?>','linux_file_E_<?php echo  $value['product_linux_id'];?>')"></i></span><!--<img src="../../img/deleteicon.png" onClick="clearSpan('linux_file_span_E_<?php echo  $value['product_linux_id'];?>','linux_file_E_<?php echo  $value['product_linux_id'];?>')"/>--><?php } ?></span>
                      <!--<input class="form-control" id="upload1" placeholder="" type="text">--></td>
                      <td><input type="text" name="linux_checksum_E[<?php echo $value['product_linux_id'];?>]" class="form-control checkSum" value="<?php echo $value['product_sha1_checksum']; ?>" /></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRowLinuxbutton_<?php echo $value['product_linux_id'];?>" onClick="addRowLinux()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowLinuxbutton_<?php echo $value['product_linux_id'];?>" onClick='deleteRows("row_linux_","E_<?php echo $value['product_linux_id'];?>");'><i class="fa fa-minus-circle" aria-hidden="true" ></i></button>
                        </div><input type="hidden" name="linux_file_hidden[<?php echo $value['product_linux_id'];?>]" value="<?php echo $value['product_file'];?>"/></td>
                    </tr>
                     <?php
						}
		   }else { ?> 
                    <tr>
                      <td id="linux_rowspan" rowspan="1" style="vertical-align:middle">Linux</td>
                      <td><div class="select-style">
                          
                          <select class="form-control" name="language_linux_first"><option value="cpp">C++</option><option value="java">Java</option></select>
                        </div></td>
                      <td><input type="file" name="linux_file_first" id="linux_file_first"  style="display:none;" onChange="linuxsetfilename(this.value,'first')"/><input type="button" value="Upload" name="linux_button_first" onclick="document.getElementById('linux_file_first').click();" /><span id="linux_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"></span><!--<a href="#">[Upload]</a>--></td>
                      <td><!--<input class="form-control" id="SHA1Checksum3" placeholder="" type="text">--><input type="text" name="linux_checksum_first" class="form-control"/></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRowLinuxbutton" onClick="addRowLinux()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowLinuxbutton"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                        </div></td>
                    </tr>
                    <?php }
		  ?>
                  </table>
                </div>
                <!-- Linux Table --->
                
                <!-- OSXTable -->
                
                <div class="table-responsive" id="osx_table" <?php echo $osxStyle; ?> >
                  <table class="table rocking_table" id="data_table_osx">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
                    <?php   if (is_array($osxArray) && count($osxArray)>0){
			$i = 0;
			   			foreach($osxArray as $key=>$value) { 
						$i++;			   
?>
                    <tr id='row_osx_E_<?php echo $value['product_osx_id'];?>'>
                    <?php if($i == 1 ) {  ?>
                      <td rowspan="<?php echo count($osxArray); ?>" style="vertical-align:middle" id="osx_rowspan">OSX</td>
                      <?php } ?>
                      <td>
                        <select class="form-control" name="language_osx_E[<?php echo $value['product_osx_id'];?>]"><option value="cpp" <?php if ($value['product_language'] == 'cpp' ){ echo "selected ='selected'";} ?>>C++</option><option value="java" <?php if ($value['product_language'] == 'java' ){ echo "selected ='selected'";} ?>>Java</option></select></td>
                      
                      <td><input type="file" name="osx_file_E[<?php echo $value['product_osx_id'];?>]" id="osx_file_E_<?php echo $value['product_osx_id'];?>" class="form-control" style="display:none;" onChange="osxsetfilename(this.value,'E_<?php echo $value['product_osx_id'];?>')"/><input type="button" value="Upload" name="osx_button_E_<?php echo $value['product_osx_id'];?>"  onclick="document.getElementById('osx_file_E_<?php echo $value['product_osx_id'];?>').click();" /><span id="osx_file_span_E_<?php echo $value['product_osx_id'];?>" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file_dup'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file_dup']; ?><?php if($value['product_file']!="") { ?><span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick="clearSpan('osx_file_span_E_<?php echo  $value['product_osx_id'];?>','osx_file_E_<?php echo  $value['product_osx_id'];?>')"></i></span><!--<img src="../../img/deleteicon.png" onClick="clearSpan('osx_file_span_E_<?php echo  $value['product_osx_id'];?>','osx_file_E_<?php echo  $value['product_osx_id'];?>')"/>--><?php } ?></span><!--<input class="form-control" id="upload1" placeholder="" type="text">--></td>
                      <td><input type="text" name="osx_checksum_E[<?php echo $value['product_osx_id'];?>]" class="form-control checkSum" value="<?php echo $value['product_sha1_checksum']; ?>"/></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRowOSXbutton_<?php echo $value['product_osx_id'];?>" onClick="addRowOsx()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowOSXbutton_<?php echo $value['product_osx_id'];?>" onClick='deleteRows("row_osx_","E_<?php echo $value['product_osx_id'];?>");'><i class="fa fa-minus-circle" aria-hidden="true" ></i></button>
                        </div><input type="hidden" name="osx_file_hidden[<?php echo $value['product_osx_id'];?>]" value="<?php echo $value['product_file'];?>"/></td>
                    </tr>
                     <?php
						}
		   }else { ?> 
                    <tr>
                      <td id="osx_rowspan" rowspan="1" style="vertical-align:middle">OSX</td>
                      <td><div class="select-style">
                          
                          <select class="select text-center" name="language_osx_first"><option value="cpp">C++</option><option value="java">Java</option></select>
                        </div></td>
                      <td><input type="file" name="osx_file_first" id="osx_file_first"  style="display:none;" onChange="osxsetfilename(this.value,'first')"/><input type="button" value="Upload" name="osx_button_first"  onclick="document.getElementById('osx_file_first').click();" /><span id="osx_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"></span><!--<a href="#">[Upload]</a>--></td>
                      <td><input type="text" name="osx_checksum_first" class="form-control"/><!--<input class="form-control" id="SHA1Checksum3" placeholder="" type="text">--></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRowOsxbutton" onClick="addRowOsx()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowOsxbutton"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                        </div></td>
                    </tr>
                    <?php }
		  ?>
                  </table>
                </div>
                <!-- OSX Table --->
                
              
                -->
              </div>
            </div>
            </span>
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3 col-lg-3" for="level">Release Note</label>
              <div class="col-md-9 col-sm-8">
                <textarea class="form-control" name="product_release_note"><?php echo $singleProduct['product_release_note']; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="User_Synchronization">User Synchronization</label>
              <div class="col-md-5 col-sm-8">
                <div class="form-group">
                  <label class="list_radio">
                    <input type="radio" name="product_user_synchronization" class="minimal" <?php if ($user_synchronus == 0) {  ?> checked <?php } ?>  value="0">
                    <span class="label_radio">Apply</span> </label>
                  <label class="list_radio">
                    <input type="radio" name="product_user_synchronization" class="minimal" <?php if ($user_synchronus == 1) {  ?> checked <?php } ?>  value="1">
                    <span class="label_radio">Do not apply</span> </label>
                </div>
              </div>
            </div>
            <div class="row footer_btn">
              <div class="col-sm-4">
                <div class="pull-left"> <a href="list.php" class="btn btn-outline">Back to List</a> </div>
              </div>
              <div class="col-sm-8">
                <div class="pull-right"><button class="btn btn-info" type="submit" name="editsubmit" value="editsubmit">Done</button></div>
              </div>
            </div>
          </form>
        </div>
      </section>
      <!-- /.content --> 
    </div>
    <div class="modal fade in" id="Email_sucess_transfer" role="dialog"  style="display:none;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg" id="transfer_confirmation_message_box">Do you really want to delete it?</p>
        </div>
        <div style="height:20px;"></div>
        
    <button type="button" class="btn-info btn-lg" style="margin-right:5px;" onClick="tranferMemberShipfun('yes')">Yes</button>
   
    <button type="button" class="btn-info btn-lg" onClick="tranferMemberShipfun('no')">No</button>
  
                   
                               
                 
      <!--<button class="btn btn-info" onClick="hideModal()">OK</button>-->
    </div>
  </div>
</div>
</div>
<div class="modal fade in" id="Email_sucess" role="dialog"  style="display:none;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg" id="message_box">Email sent.</p>
        </div>
        <div style="height:20px;"></div> 
      <button class="btn btn-info" onClick="hideModal()">OK</button>
    </div>
  </div>
</div>
</div>
  </div>
  <!-- /.content-wrapper -->
  
  <footer id="main_footer" class="main-footer"><?php include_once('../footer/footert.php') ?></footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.2.3 --> 
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="../../bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
var global_table_prefix = "";
var global_table_row_id = "";
$(document).ready(function() {
	
	
	$(".sidebar-menu > li").removeClass("active");
	  // add class to the one we clicked
	  $("#plist").addClass("active");
	
	$('select:focus').prev().css('background-color', '#eee');
	
	// Date function
	$("#startdate").datepicker({
		dateFormat: 'dd/mm/yy'
	});
	$("#enddate").datepicker({
		dateFormat: 'dd/mm/yy'
	});
	$("#licensestartdate").datepicker({
		dateFormat: 'dd/mm/yy'
	});
	$("#licenseenddate").datepicker({
		dateFormat: 'dd/mm/yy'
	});	
	
	// Calender function
	$('.fa-calendar').click(function() {
		var datepickerID = $(this).parent().find('input').attr('id');
		$("#" + datepickerID).focus();
	});	
	
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
	
// Input file function
	
'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));	
});
</script> 

<!-- AdminLTE App --> 
<script src="../../dist/js/app.min.js"></script> 

<!-- SlimScroll 1.3.0 --> 
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script> 
<!-- iCheck 1.0.1 --> 
<script src="../../plugins/iCheck/icheck.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="../../dist/js/demo.js"></script> 
<script src="../../dist/js/jquery-ui.min.js" type="text/javascript"></script>
 <script type='text/javascript' src='../../js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
 <script type='text/javascript' src='../../js/plugins/validationengine/jquery.validationEngine.js'></script>  
 <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.js'></script>
 <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.hooks.js'></script> 
 <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 <script>
 
 
 $(function() {
	
	 $.validator.addMethod("numericdot", function(value, element) {
        return this.optional(element) || /^[0-9.]+$/i.test(value);
    }, "Add Correct Version.");
	 	
			
 $("#jvalidate").validate({
  rules: {
    product_version: {
		
      required: true,
	  numericdot:true
      
    },
	product_release_note: {
      required: true
      },
	  
	 osx_checksum_first: {
	   required: true
	   
  },
   linux_checksum_first: {
	   required: true
	   
  },
   windows_checksum_first: {
	   required: true
	   
  },
   android_checksum_first: {
	   required: true
	   
  },
   ios_checksum_first: {
	   required: true
	   
  },
  'ios_checksum[]': {
                required: true
            },
'android_checksum[]': {
                required: true
            },
'windows_checksum[]': {
                required: true
            },
'linux_checksum[]': {
                required: true
            },
 'osx_checksum[]': {
                required: true
            },
			
"ios_checksum_E[]": {
                required: true
            },
"android_checksum_E[]": {
                required: true
            },
"windows_checksum_E[]": {
                required: true
            },
"linux_checksum_E[]": {
                required: true
            },
 "osx_checksum_E[]": {
                required: true
            }
  }
 
	});
	});
	
 function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Byte';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
};
// var data ="hello";
 

   function iossetfilename(val,idprefix)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
	var filesize = $("#ios_file_"+idprefix)[0].files[0].size;
	//alert(filesize);
	var filesize = bytesToSize(filesize);
    document.getElementById("ios_file_span_"+idprefix).innerHTML  = '<span style="padding-left:2px;padding-right:2px;">'+fileName+'('+filesize+')<span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick="clearSpan(\'ios_file_span_'+idprefix+'\',\'ios_file_'+idprefix+'\');"></i></span></span>';
  }
  function androidsetfilename(val,idprefix)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
	var filesize = $("#android_file_"+idprefix)[0].files[0].size;
	//alert(filesize);
	var filesize = bytesToSize(filesize);
    document.getElementById("android_file_span_"+idprefix).innerHTML  = '<span style="padding-left:2px;padding-right:2px;">'+fileName+'('+filesize+')<span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick=\"clearSpan(\'android_file_span_'+idprefix+'\',\'android_file_'+idprefix+'\')\"></i></span></span>';
  }
  function windowssetfilename(val,idprefix)
  {
	  
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
	var filesize = $("#windows_file_"+idprefix)[0].files[0].size;
	//alert(filesize);
	var filesize = bytesToSize(filesize);
    document.getElementById("windows_file_span_"+idprefix).innerHTML  = '<span style="padding-left:2px;padding-right:2px;">'+fileName+'('+filesize+')<span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick=\"clearSpan(\'windows_file_span_'+idprefix+'\',\'windows_file_'+idprefix+'\')\"</i></span></span>';
  }
  function linuxsetfilename(val,idprefix)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
	var filesize = $("#linux_file_"+idprefix)[0].files[0].size;
	//alert(filesize);
	var filesize = bytesToSize(filesize);
    document.getElementById("linux_file_span_"+idprefix).innerHTML  = '<span style="padding-left:2px;padding-right:2px;">'+fileName+'('+filesize+')<span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick=\"clearSpan(\'linux_file_span_'+idprefix+'\',\'linux_file_'+idprefix+'\')\"></i></span></span>';
  }
  function osxsetfilename(val,idprefix)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
	var filesize = $("#osx_file_"+idprefix)[0].files[0].size;
	//alert(filesize);
	var filesize = bytesToSize(filesize);
    document.getElementById("osx_file_span_"+idprefix).innerHTML  = '<span style="padding-left:2px;padding-right:2px;">'+fileName+'('+filesize+')<span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick=\"clearSpan(\'osx_file_span_'+idprefix+'\',\'osx_file_'+idprefix+'\')\"></i></span></span>';
  }
  function clearSpan(id,fileid) {
	 /* con = confirm("Are you sure!");
	  if(con) {
	 		document.getElementById(id).innerHTML ="";
	 		$("#"+fileid).val('');
	  }*/
	  document.getElementById(id).innerHTML ="";
	 		$("#"+fileid).val('');
  } function programsetfilename(val,idprefix)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
	var filesize = $("#program_file_first")[0].files[0].size;
	//alert(filesize);
	var filesize = bytesToSize(filesize);
	//alert(filesize);
    document.getElementById("program_file_span_"+idprefix).innerHTML  = '<span style="padding-left:2px;padding-right:2px;">'+fileName+' ( '+filesize+' )<span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick=\"clearSpan(\'program_file_span_'+idprefix+'\',\'program_file_'+idprefix+'\')\"></i></span></span>';
  }
  
  function addRowIos() {
	  
	 /* $.ajax({
				url: "../../ajax/product.php",
				type: "POST",
				data:'product_ios=product_ios',
				success: function(data){
                                  alert(data);   
                                if(data)
                                   {} 
                                   
				}        
		   });*/
	 var table=document.getElementById("data_table_ios");
     var table_len=(table.rows.length);
	 document.getElementById("ios_rowspan").rowSpan = ""+(table_len)+"";
	 //alert(table_len);
	 var tablerowId = Math.floor((Math.random() * 10000) + 1);
	 var row = table.insertRow(table_len).outerHTML="<tr id='row_ios_"+tablerowId+"'>\n\
									<td><div class='select-style'><select class='form-control' name='language_ios[]'><option value='cpp'>C++</option><option value='java'>Java</option></select></div></td>\n\
									<td><input type='file' name='ios_file[]' id='ios_file_"+tablerowId+"' class='form-control multi' style='display:none;' onChange='iossetfilename(this.value,"+tablerowId+");'/><input type='button' name='ios_button[]' value='Upload' onclick='document.getElementById(\"ios_file_"+tablerowId+"\").click();' /><span id='ios_file_span_"+tablerowId+"' style='margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;'></span></td>\n\<td><input type='text' name='ios_checksum[]' class='form-control checkSum'/></td>\n\<td class='text-center'><div class='row_btn'> <button type='button' name='addRowIosbutton_"+tablerowId+"' onClick='addRowIos()'><i class='fa fa-plus-circle' aria-hidden='true'></i></button><button type='button' name='minusRowIosbutton_"+tablerowId+"'><i class='fa fa-minus-circle' aria-hidden='true' onClick='deleteRows(\"row_ios_\",\""+tablerowId+"\");'></i></button></div></td>\n</tr>"; 
									//$('.select').selectpicker('refresh'); 
								   
  }

  function addRowAndroid() {
	 var table=document.getElementById("data_table_android");
     var table_len=(table.rows.length);
	 document.getElementById("android_rowspan").rowSpan = ""+(table_len)+"";
	 var tablerowId = Math.floor((Math.random() * 10000) + 1);
	 var row = table.insertRow(table_len).outerHTML="<tr id='row_android_"+tablerowId+"'>\n\
									<td><div class='select-style'><select class='form-control' name='language_android[]'><option value='cpp'>C++</option><option value='java'>Java</option></select></div></td>\n\
									<td><input type='file' name='android_file[]' id='android_file_"+tablerowId+"' class='form-control multi' style='display:none;' onChange='androidsetfilename(this.value,"+tablerowId+");'/><input type='button' name='android_button[]' value='Upload' onclick='document.getElementById(\"android_file_"+tablerowId+"\").click();' /><span id='android_file_span_"+tablerowId+"' style='margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;'></span></td>\n\<td><input type='text' name='android_checksum[]' class='form-control checkSum'/></td>\n\<td class='text-center'><div class='row_btn'> <button type='button' name='addRowAndroidbutton_"+tablerowId+"' onClick='addRowAndroid()'><i class='fa fa-plus-circle' aria-hidden='true'></i></button><button type='button' name='minusRowAndroidbutton_"+tablerowId+"'><i class='fa fa-minus-circle' aria-hidden='true' onClick='deleteRows(\"row_android_\",\""+tablerowId+"\");'></i></button></div></td>\n</tr>"; 
									//$('.select').selectpicker('refresh'); 
								   
  }
 
  
  function addRowWindows() {
	 var table=document.getElementById("data_table_windows");
     var table_len=(table.rows.length);
	  document.getElementById("windows_rowspan").rowSpan = ""+(table_len)+"";
	  var tablerowId = Math.floor((Math.random() * 10000) + 1);
	 var row = table.insertRow(table_len).outerHTML="<tr id='row_windows_"+tablerowId+"'>\n\
									<td><div class='select-style'><select class='form-control' name='language_windows[]'><option value='cpp'>C++</option><option value='java'>Java</option></select></div></td>\n\
									<td><input type='file' name='windows_file[]' id='windows_file_"+tablerowId+"' class='form-control multi' style='display:none;' onChange='windowssetfilename(this.value,"+tablerowId+");'/><input type='button' name='windows_button[]' value='Upload' onclick='document.getElementById(\"windows_file_"+tablerowId+"\").click();' /><span id='windows_file_span_"+tablerowId+"' style='margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;'></span></td>\n\<td><input type='text' name='windows_checksum[]' class='form-control checkSum'/></td>\n\<td class='text-center'><div class='row_btn'> <button type='button' name='addRowWindowsbutton_"+tablerowId+"' onClick='addRowWindows()'><i class='fa fa-plus-circle' aria-hidden='true'></i></button><button type='button' name='minusRowWindowsbutton_"+tablerowId+"'><i class='fa fa-minus-circle' aria-hidden='true' onClick='deleteRows(\"row_windows_\",\""+tablerowId+"\");'></i></button></div></td>\n</tr>"; 
									//$('.select').selectpicker('refresh'); 
								   
  }
  
  
   function addRowLinux() {
	 var table=document.getElementById("data_table_linux");
     var table_len=(table.rows.length);
	  document.getElementById("linux_rowspan").rowSpan = ""+(table_len)+"";
	  var tablerowId = Math.floor((Math.random() * 10000) + 1);
	 var row = table.insertRow(table_len).outerHTML="<tr id='row_linux_"+tablerowId+"'>\n\
									<td><div class='select-style'><select class='form-control' name='language_linux[]'><option value='cpp'>C++</option><option value='java'>Java</option></select></div></td>\n\
									<td><input type='file' name='linux_file[]' id='linux_file_"+tablerowId+"' class='form-control multi' style='display:none;' onChange='linuxsetfilename(this.value,"+tablerowId+");'/><input type='button' name='linux_button[]' value='Upload' onclick='document.getElementById(\"linux_file_"+tablerowId+"\").click();' /><span id='linux_file_span_"+tablerowId+"' style='margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;'></span></td>\n\<td><input type='text' name='linux_checksum[]' class='form-control checkSum'/></td>\n\<td class='text-center'><div class='row_btn'> <button type='button' name='addRowLinuxbutton_"+tablerowId+"' onClick='addRowLinux()'><i class='fa fa-plus-circle' aria-hidden='true'></i></button><button type='button' name='minusRowLinuxbutton_"+tablerowId+"'><i class='fa fa-minus-circle' aria-hidden='true' onClick='deleteRows(\"row_linux_\",\""+tablerowId+"\");'></i></button></div></td>\n</tr>"; 
									//$('.select').selectpicker('refresh'); 
								   
  }
   
   function addRowOsx() {
	 var table=document.getElementById("data_table_osx");
     var table_len=(table.rows.length);
	 document.getElementById("osx_rowspan").rowSpan = ""+(table_len)+"";
	 var tablerowId = Math.floor((Math.random() * 10000) + 1);
	 var row = table.insertRow(table_len).outerHTML="<tr id='row_osx_"+tablerowId+"'>\n\
									<td><div class='select-style'><select class='form-control' name='language_osx[]'><option value='cpp'>C++</option><option value='java'>Java</option></select></div></td>\n\
									<td><input type='file' name='osx_file[]' id='osx_file_"+tablerowId+"' class='form-control multi' style='display:none;' onChange='osxsetfilename(this.value,"+tablerowId+");'/><input type='button' name='osx_button[]' value='Upload' onclick='document.getElementById(\"osx_file_"+tablerowId+"\").click();' /><span id='osx_file_span_"+tablerowId+"' style='margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;'></span></td>\n\<td><input type='text' name='osx_checksum[]' class='form-control checkSum'/></td>\n\<td class='text-center'><div class='row_btn'> <button type='button' name='addRowOsxbutton_"+tablerowId+"' onClick='addRowOsx()'><i class='fa fa-plus-circle' aria-hidden='true'></i></button><button type='button' name='minusRowOsxbutton_"+tablerowId+"'><i class='fa fa-minus-circle' aria-hidden='true' onClick='deleteRows(\"row_osx_\",\""+tablerowId+"\");'></i></button></div></td>\n</tr>"; 
									//$('.select').selectpicker('refresh'); 
								   
  }
  
  
  $(document).ready(function () {
	  //alert("hello");
    //var ckbox = $('#ios_check');
$('#ios_check').change(function() {
   if($(this).is(":checked")) {
       $("#ios_table").css("display", "block");
	   
   }else {
             $("#ios_table").css("display", "none");
       }
   //'unchecked' event code
});
$('#android_check').change(function() {
   if($(this).is(":checked")) {
	  // document.getElementById('android_table').style.display='block';
       $("#android_table").css("display", "block");
   }else {
	   //document.getElementById('android_table').style.display='none';
           $("#android_table").css("display", "none");
			
       }
   //'unchecked' event code
});
$('#windows_check').change(function() {
   if($(this).is(":checked")) {
       $("#windows_table").css("display", "block");
   }else {
             $("#windows_table").css("display", "none");
       }
   //'unchecked' event code
});
$('#linux_check').change(function() {
   if($(this).is(":checked")) {
       $("#linux_table").css("display", "block");
   }else {
             $("#linux_table").css("display", "none");
       }
   //'unchecked' event code
});
$('#osx_check').change(function() {
   if($(this).is(":checked")) {
       $("#osx_table").css("display", "block");
   }else {
             $("#osx_table").css("display", "none");
       }
   //'unchecked' event code
});


   /*$('#ios_check').on('click',function () {
        if (ckbox.is(':checked')) {
            alert('You have Checked it');
        } else {
            alert('You Un-Checked it');
        }
    });*/
});


function productTypeChange(ptype) {
	//alert(ptype);	
	if (ptype == 'program') {
		

		$("#product_name_sdk_span").css("display", "none");
		$("#row_os").css("display", "none");
		$("#row_os_td").css("display", "none");
		$("#product_name_program_span").css("display", "block");
		$("#row_file").css("display", "block");
		$("#row_file_td").css("display", "block");
	}else {
		$("#product_name_sdk_span").css("display", "block");
		$("#row_os").css("display", "block");
		$("#row_os_td").css("display", "block");
		$("#product_name_program_span").css("display", "none");
		$("#row_file").css("display", "none");
		$("#row_file_td").css("display", "none");
	}
}
function alertDisappear() {
	$("#included_error_tour").css("display", "none");
}
function validateCheckSumName() {
    $check = true;
    $(".checkSum").each(function(){
       var files = $(this).val(); 

        if(files=='') { 
           //alert("Please Fill Checksum");
		   $("#message_box").text("Fill checksum");
				//changePasswordError = 1; 
				$('#Email_sucess').show();
           $check = false;
           return false; // You don't want to loop, so exit each loop
        }
    });

    return $check;
}

$(document).ready(function(){
			$('#jvalidate').submit(function() {
				 var productTypeValidation  = $('#product_type :selected').text();
				 //alert(productTypeValidation);
        	 amIChecked = false;
			if (productTypeValidation == 'SDK') {
            $('input[type="checkbox"]').each(function() {
            if (this.checked) {
                amIChecked = true;
            }
         });
         if (amIChecked) {
           // alert('atleast one box is checked');
        }
        else {
            alert('please check one checkbox!');
			 return false;
        }
       var ChkValidate = validateCheckSumName();
		if (ChkValidate) {
		}else {
			return false;
		}
		}else {
			var ext = $('#program_file_first').val();
			//if(ext == "") {
    		//alert('Select a File');
			//return false;
//}
			
		}
    });
});
function deleteRows(table_prifix,tablerowId) {
	  $('#Email_sucess_transfer').show();
	  global_table_prefix = table_prifix;
      global_table_row_id = tablerowId;
	  
	 
  }
  function tranferMemberShipfun(inquiry) {
		$('#Email_sucess_transfer').hide();
		if(inquiry == 'no') {
			 
		}else {
			 table_prifix = global_table_prefix ;
             tablerowId = global_table_row_id ;
			document.getElementById(""+table_prifix+""+tablerowId+"").outerHTML ="";
			if (table_prifix == "row_ios_") {
		  //alert(table_prifix);
	     		 var table=document.getElementById("data_table_ios");
        		 var table_len=(table.rows.length);
	     		 document.getElementById("ios_rowspan").rowSpan = ""+(table_len-1)+"";
	      }else if (table_prifix == "row_android_") {
			   var table=document.getElementById("data_table_android");
        	   var table_len=(table.rows.length);
	     	   document.getElementById("android_rowspan").rowSpan = ""+(table_len-1)+"";
		  } else if (table_prifix == "row_linux_") {
			   var table=document.getElementById("data_table_linux");
        	   var table_len=(table.rows.length);
	     	   document.getElementById("linux_rowspan").rowSpan = ""+(table_len-1)+"";
		  } else if (table_prifix == "row_windows_") {
			   var table=document.getElementById("data_table_windows");
        	   var table_len=(table.rows.length);
	     	   document.getElementById("windows_rowspan").rowSpan = ""+(table_len-1)+"";
		  }
		  else if (table_prifix == "row_osx_") {
			   var table=document.getElementById("data_table_osx");
        	   var table_len=(table.rows.length);
	     	   document.getElementById("osx_rowspan").rowSpan = ""+(table_len-1)+"";
		  }
		}
	}
	
	function hideModal() {
	$('#Email_sucess').hide();
	//location.reload();
	//$('#ChangePassword').hide();
}
</script>
</body>
</html>
