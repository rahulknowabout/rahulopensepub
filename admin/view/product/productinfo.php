<?php include_once('../../check_login.php');
include('../../modal/product/product.php');
 $cleaned = clean($_GET);
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
  $iosArray =array();
  $androidArray =array();
  $windowsArray =array();
  $linuxArray =array();
  $osxArray =array();
 unset($os_array);
 $os_array =array();
 if ($singleProduct['product_ios'] == 1) { $os_array[] = 'iOS';
    $iosArray = productIos($cleaned['product_id']);
	//echo "<pre>";
	//print_r($iosArray);
	//die;
 }
 if ($singleProduct['product_android'] == 1) { 
 $os_array[] = 'Android';
 $androidArray = productAndroid($cleaned['product_id']);
 }
 if ($singleProduct['product_windows'] == 1) { 
 $os_array[] = 'Windows';
 $windowsArray =productwindows($cleaned['product_id']);
 
 }
 if ($singleProduct['product_linux'] == 1) { 
 $os_array[] = 'Linux';
 $linuxArray =productLinux($cleaned['product_id']);
 }
 if ($singleProduct['product_osx'] == 1) { 
 $os_array[] = 'OSX';
  $osxArray =productOsx($cleaned['product_id']);
 }
 $os_string =implode(",",$os_array);
 if ($singleProduct['product_name'] == 'c_sdk') { $singleProduct['product_name'] = 'Client';}
 if ($singleProduct['product_name'] == 'p_sdk') { $singleProduct['product_name'] = 'Packager SDK';}
 if ($singleProduct['product_name'] == 'opens_packager') { $singleProduct['product_name'] = 'OPENS Packager';}



 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Product Management View</title>
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
        <h1> <b>Product</b> Management </h1>
      </section>
      
      <!-- Main content -->
      <section class="content member_page">
        <div class="Form_Inside edit_data product_management_view_details">
          <form role="form" class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3">Register Date</label>
              <div class="col-md-5 col-sm-7">
                <p><?php echo $singleProduct['product_reg_date']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="type_choose">Type</label>
              <div class="col-md-5 col-sm-7">
                <p><?php echo ucfirst($singleProduct['product_type']); ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="product_choose">Product</label>
              <div class="col-md-5 col-sm-7">
                <p><?php echo $singleProduct['product_name']; ?></p>
              </div>
            </div>
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3 col-lg-3">Version</label>
              <div class="col-md-5 col-sm-7">
                <p><?php echo $singleProduct['product_version']; ?></p>
              </div>
            </div>
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3 col-lg-3"><?php if( $singleProduct['product_type'] == 'SDK') {  ?>OS<?php } else { ?>File<?php } ?></label>
              <div class="col-md-5 col-sm-7">
                <p><?php if( $singleProduct['product_type'] == 'program') {$pos = strpos($singleProduct['product_file'],'_'); if($pos) { $singleProduct['product_file'] = substr_replace($singleProduct['product_file'],'',0,$pos+1);} echo $singleProduct['product_file'];  ?> <?php } else {  echo $os_string;}  ?></p>
              </div>
            </div>
            <?php if( $singleProduct['product_type'] == 'program') {} else {    ?>
            <div class="form-group upload ">
              <label class="col-sm-4 col-md-3 col-lg-3"></label>
              <div class="col-md-9 col-sm-12">
                <div class="table-responsive">
                 <table class="table rocking_table">
                  <tr>
                    <th>OS</th>
                    <th>Language</th>
                    <th>File</th>
                    <th>SHA1 Checksum</th>
                  </tr>
                  <!-- iOS -->
                   <?php if (is_array($iosArray) && count($iosArray)>0){
				 $irowcount = 1;
			  foreach($iosArray as $key=>$value) { 
              	if($irowcount == 1 ) { ?>
					<tr>
                    <td rowspan="<?php echo count($iosArray); ?>" style="vertical-align:middle">iOS</td>
                    <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
				<?php } else { ?>
              <tr>
              <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
              
			  <?php }
			  $irowcount++;} ?> <?php  } ?>
              <!-- iOS -->
              
              <!-- Android -->
              <?php if (is_array($androidArray) && count($androidArray)>0){
				   $irowcount = 1;
			  foreach($androidArray as $key=>$value) { 
              if($irowcount == 1 ) { ?>
					<tr>
                    <td rowspan="<?php echo count($androidArray); ?>" style="vertical-align:middle">Android</td>
                    <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
				<?php } else { ?>
              <tr>
              <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
              
			  <?php }
			  $irowcount++;
			   }   } ?>
               <!---  Androiad --> 
               <!-- Windows -->
               <?php if (is_array($windowsArray) && count($windowsArray)>0){
				   $irowcount = 1;
			  foreach($windowsArray as $key=>$value) { 
              if($irowcount == 1 ) { ?>
					<tr>
                    <td rowspan="<?php echo count($windowsArray); ?>" style="vertical-align:middle">Windows</td>
                    <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
				<?php } else { ?>
              <tr>
              <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
              
			  <?php }
			  $irowcount++;
			   }   } ?>
               <!-- Windows -->
               <!-- Linux -->
               <?php if (is_array($linuxArray) && count($linuxArray)>0){
				   $irowcount = 1;
			  foreach($linuxArray as $key=>$value) { 
              if($irowcount == 1 ) { ?>
					<tr>
                    <td rowspan="<?php echo count($linuxArray); ?>" style="vertical-align:middle">Linux</td>
                    <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
				<?php } else { ?>
              <tr>
              <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
              
			  <?php }
			  $irowcount++;
			   }   } ?>
               
               <!-- Linux -->
               <!-- OSX -->
               <?php if (is_array($osxArray) && count($osxArray)>0){
				   $irowcount = 1;
			  foreach($osxArray as $key=>$value) { 
              if($irowcount == 1 ) { ?>
					<tr>
                    <td rowspan="<?php echo count($osxArray); ?>" style="vertical-align:middle">OSX</td>
                    <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
				<?php } else { ?>
              <tr>
              <td><p><?php echo $value['product_language'];?></p></td>
                    <td><p><?php $pos = strpos($value['product_file'],'_'); if($pos) { $value['product_file'] = substr_replace($value['product_file'],'',0,$pos+1);} echo $value['product_file']; ?></p></td>
                    <td><p><?php echo $value['product_sha1_checksum'];?></p></td>
                  </tr>
              
			  <?php }
			  $irowcount++;
			   }   }    ?>
               <!-- OSX -->
                           
                
                </table>
				  </div>
              </div>
               
            </div>
           <?php } ?>
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3 col-lg-3" for="level">Release Note</label>
              <div class="col-md-9 col-sm-12">
                <p><?php echo $singleProduct['product_release_note']; ?> </p>
              </div>
            </div>
            <div class="row footer_btn">
              <div class="col-sm-4">
                <div class="pull-left"> <a href="list.php" class="btn btn-outline">Back to List</a> </div>
              </div>
              <div class="col-sm-8">
                <div class="pull-right"> <a href="#" class="btn btn-default" onClick="return Delete_Permission(<?php echo $cleaned['product_id']; ?>)">Delete</a> <a href="edit.php?product_id=<?php echo $cleaned['product_id']; ?>" class="btn btn-info">Edit</a> </div>
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
var Delete_Permission_staus = 0;
var Delete_id = 0;
$(document).ready(function() {
	
	
	$(".sidebar-menu > li").removeClass("active");
	  // add class to the one we clicked
	  $("#plist").addClass("active");
	// Menu active function
	
	
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
});
function Delete_Permission(delete_user_id) {
	$('#Email_sucess_transfer').show();
	Delete_id = delete_user_id
	if (Delete_Permission_staus == 1 ) {
		return true;	
	}else {
		return false;
	}
}
function tranferMemberShipfun(inquiry) {
		$('#Email_sucess_transfer').hide();
		if(inquiry == 'no') {
			 
		}else {
			window.location.href = "../../controller/product/product.php?product_id=<?php echo $cleaned['product_id']; ?>&del=del&os_string=<?php echo $os_string; ?>";
		}
	}
</script> 

<!-- AdminLTE App --> 
<script src="../../dist/js/app.min.js"></script> 

<!-- SlimScroll 1.3.0 --> 
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="../../dist/js/demo.js"></script> 
<script src="../../dist/js/jquery-ui.min.js" type="text/javascript"></script>
</body>
</html>
