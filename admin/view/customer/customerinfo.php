<?php include_once('../../check_login.php'); 
// include('../header/header.php'); 
 include('../../modal/customer/customer.php');
 $cleaned = clean($_GET);
 if (isset($cleaned['user_id']) && $cleaned['user_id']!=""){
    $singleCustomer = singleCustomer($cleaned['user_id']);
 }
 if (isset($singleCustomer) && is_array($singleCustomer) && count($singleCustomer)>0) {
  }else {
	  $singleCustomer['user_name'] ="";
	  $singleCustomer['user_email'] ="";
	  $singleCustomer['user_country'] ="";
	  $singleCustomer['user_level'] ="";
	  $singleCustomer['user_reg_date'] ="";
	  $singleCustomer['user_company_name'] ="";
	  $singleCustomer['user_company_address'] ="";
	  $singleCustomer['user_company_phone'] ="";
	  
  }
 //echo "<pre>";
//print_r($singleCustomer);die;
	 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Customer Management View</title>
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
        <h1> <b>Customer</b> Management </h1>
      </section>
      
      <!-- Main content -->
      <section class="content member_page">
        <div class="Form_Inside view_data">
          <form role="form" class="form-horizontal">
            <h2>User info</h2>
            <div class="form-group">
 
              <label class="col-sm-4 col-md-3 col-lg-3" for="inputName">Register Date</label>
              <div class="col-md-4 col-sm-7">
                <p><?php echo $singleCustomer['user_reg_date']; ?></p>
              </div>
     
			  </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="inputEmail1">Name</label>
              <div class="col-md-4 col-sm-7">
                <p><?php echo $singleCustomer['user_name']; ?></p>
              </div>
            </div>
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3 col-lg-3">Email (ID)</label>
              <div class="col-md-4 col-sm-7">
                <p><?php echo $singleCustomer['user_email']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="country">Country</label>
              <div class="col-md-4 col-sm-7">
                <p><?php echo $singleCustomer['user_country']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="level">Level</label>
              <div class="col-md-4 col-sm-7">
                <p><?php echo ( $singleCustomer['user_level'] == 1 )? "L1" :(( $singleCustomer['user_level'] == 2 )? "L2" :(( $singleCustomer['user_level'] == 3 )? "L3" : ("Not Available"))); ?></p>
              </div>
            </div>
            <div style="height:30px;"></div>
             <?php if(isset($singleCustomer['user_level']) && ($singleCustomer['user_level'] == 2 || $singleCustomer['user_level'] == 3)) { ?>
            <h2>Company info</h2>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="Cname">Company name</label>
              <div class="col-sm-7">
                <p><?php echo $singleCustomer['user_company_name']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="Caddress">Company address</label>
              <div class="col-sm-7">
                <p><?php echo $singleCustomer['user_company_address']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CPnumber">Company phone number</label>
              <div class="col-sm-7">
                <p><?php echo $singleCustomer['user_company_phone']; ?></p>
              </div>
            </div>
            <?php  } ?>
            <div class="row footer_btn">
              <div class="col-sm-4">
                <div class="pull-left"> <a href="list.php" class="btn btn-outline">Back to List</a> </div>
              </div>
              <div class="col-sm-8">
                <div class="pull-right"> <a href="#" class="btn btn-default" onClick="return Delete_Permission(<?php echo $cleaned['user_id']; ?>)">Delete</a> <a href="edit.php?user_id=<?php echo $cleaned['user_id']; ?>" class="btn btn-info">Edit</a> </div>
              </div>
            </div>
          </form>
        </div>
      </section>
      <!-- /.content --> 
    </div>
  </div>
  <!-- /.content-wrapper -->
  
 <footer id="main_footer" class="main-footer"><?php include_once('../footer/footert.php') ?></footer>
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
<!-- ./wrapper --> 

<!-- jQuery 2.2.3 --> 
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="../../bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
var Delete_Permission_staus = 0;
var Delete_id = 0;
$(document).ready(function() {
	
	
	
	// Menu active function
	jQuery(".sidebar-menu > li").click(function() {
	  // remove classes from all
	  jQuery(".sidebar-menu > li").removeClass("active");
	  // add class to the one we clicked
	  jQuery(this).addClass("active");
	});
	
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
			window.location.href = "../../controller/customer/customer.php?user_id=<?php echo $cleaned['user_id']; ?>&del=del";
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
