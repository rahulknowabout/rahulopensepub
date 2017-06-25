<?php include_once('../../check_login.php');
include('../../modal/contract_history/contract_history.php');
 $cleaned = clean($_GET);
 
 if (isset($cleaned['contract_history_id']) && $cleaned['contract_history_id']!=""){
    $singleContractHistory = singleContractHistory($cleaned['contract_history_id']);
	$contractProduct = productContract($cleaned['contract_history_id']);
 }
 if (isset($singleContractHistory) && is_array($singleContractHistory) && count($singleContractHistory)>0) {
	 
	 //echo "<pre>";
	// print_r($singleContractHistory);
	 //die;
  }else {
	  $singleContractHistory['company_name'] ="";
	  $singleContractHistory['company_category'] ="";
	  $singleContractHistory['product_name'] ="";
	  $singleContractHistory['contract_date'] ="";
	  $singleContractHistory['contract_period_start_date'] ="";
	  $singleContractHistory['contract_period_end_date'] ="";
	  $singleContractHistory['country_info'] ="";
	  $singleContractHistory['company_address'] ="";
	  $singleContractHistory['company_phone'] ="";
	  $singleContractHistory['contact_person'] ="";
	  $singleContractHistory['contact_information'] ="";
	  $singleContractHistory['contact_email_address'] ="";
	  $singleContractHistory['remark'] ="";
	  $singleContractHistory['business_registration'] ="";
	  $singleContractHistory['company_regtration_number'] ="";
	  $singleContractHistory['company_ceo'] ="";
	  
  }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Details of Contract</title>
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
        <h1> <b>Registration</b> of Contract Details</h1>
      </section>
      
      <!-- Main content -->
      <section class="content member_page">
        <div class="Form_Inside view_data">
          <form role="form" class="form-horizontal">
            <h2>Contract Details</h2>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="Cname">Company Name*</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['company_name']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompanyCategory">Company Category*</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['company_category'];?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3">Contract Date*</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['contract_date']; ?></p>
              </div>
            </div>
            <div class="form-group Contract_Period">
              <label class="col-sm-4 col-md-3 col-lg-3">Contract Period*</label>
              <div class="col-md-7 col-sm-8 ContractDate">
                <p><?php echo $singleContractHistory['contract_period_start_date']; ?><span class="ico_tr">~</span><?php echo $singleContractHistory['contract_period_end_date']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CountryInformation">Status</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['contract_status']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CountryInformation">Country Information*</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['country_info']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompanyAdress">Company Adress*</label>
              <div class="col-md-9 col-sm-8">
                <p><?php echo $singleContractHistory['company_address']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompanyPhone">Company Phone # *</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['company_phone']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="ContactPerson">Contact Person</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['contact_person']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="ContactInformation">Contact Information</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['contact_information']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="ContactEmailAdress">Contact Email Adress</label>
              <div class="col-md-8 col-sm-8">
                <p><?php echo $singleContractHistory['contact_email_address']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="Remarks">Remarks</label>
              <div class="col-md-9 col-sm-12">
                <p><?php echo $singleContractHistory['remark']; ?></p>
              </div>
            </div>
            <div class="form-group upload">
              <label class="col-sm-4 col-md-3 col-lg-3">Business Registration</label>
              <div class="col-md-6 col-sm-8">
                <p class="FileNamed"><?php $pos = strpos($singleContractHistory['business_registration'],'_'); if($pos) { $singleContractHistory['business_registration'] = substr_replace($singleContractHistory['business_registration'],'',0,$pos+1);}  echo $singleContractHistory['business_registration']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompanyRegistrationNumber">Company Registration Number</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['company_regtration_number']; ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompnayCEO">Compnay CEO</label>
              <div class="col-md-6 col-sm-8">
                <p><?php echo $singleContractHistory['company_ceo']; ?></p>
              </div>
            </div>
            <div style="height:30px"></div>
            <?php  if (isset($contractProduct) && is_array($contractProduct) && count($contractProduct) > 0 ) { ?>
            <h2>Product Registration</h2>
            <div class="table-responsive">
             <table class="table row_tramp">
             <?php 
						foreach($contractProduct as $key => $value ) { ?>
                <tr>
                <td>Type</td>
                <td><p><?php echo $value['contract_product_type']; ?></p></td>
                <td>Product</td>
                <td><p><?php echo ($value['contract_product_name'] == 'c_sdk' )? "Client SDK" :(( $value['contract_product_name'] == 'p_sdk' )? "Packager SDK" :"OPENS Packager"); ?><?php //echo $value['contract_product_name']; ?></p></td>
                <td>OS</td>
                <td><p><?php echo $value['contract_product_os']; ?></p></td>
              </tr>        
                        
                        
           <?php } } ?>         
							
							
             
            </table>
            </div>
            <div class="row footer_btn">
              <div class="col-sm-4">
                <div class="pull-left"> <a href="list.php" class="btn btn-outline">Back to List</a> </div>
              </div>
              <div class="col-sm-8">
                <div class="pull-right"><a href="edit.php?contract_history_id=<?php echo $cleaned['contract_history_id'];  ?>"><button class="btn btn-info" type="button" name="info" value="infobutton">Edit</button></a></div>
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
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.2.3 --> 
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	
	// header, footer and left part attachment
	/*jQuery("#main_header").load("inc/header.html");
	jQuery("#main_sidebar").load("inc/LeftSidebar.html");
	jQuery("#main_footer").load("inc/footer.html");
	
	// Menu active function
	jQuery(".sidebar-menu > li").click(function() {
	  // remove classes from all
	  jQuery(".sidebar-menu > li").removeClass("active");
	  // add class to the one we clicked
	  jQuery(this).addClass("active");
	});*/
	$(".sidebar-menu > li").removeClass("active");
	 $('.treeview').removeClass('active');
     $("#servicelist").addClass('treeview active'); 
	 $("#chmlist").css("text-decoration","underline");
	
	
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
</body>
</html>