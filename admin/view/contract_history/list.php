<?php include_once('../../check_login.php');
include('../../modal/contract_history/contract_history.php');
// error_reporting(E_ALL);
 //define(PERPAGE_LIMIT,10);
 include('../../comman_function.php');
 $countContractHistory = countContractHistory();
 /*echo "<pre>";
 print_r($countCustomer);die;*/
$count = $countContractHistory['total_Contract_history'];
 
//$pagination = pagination($count,'list.php?');
$searcharray = array(); 

/* echo "<pre>";
 print_r($_GET);
 die;*/
 $cleanedGET = clean($_GET);
//echo "<pre>";
//print_r($cleanedGET);
//die;

if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
	$limistart = ($_REQUEST['pageNumber']-1)*30;
	$limitend =30;
	$contractHistoryList = contractHistoryList($limistart,$limitend);
}else {
	$contractHistoryList = contractHistoryList();
}
 if (isset($cleanedGET['contract_start_date']) && isset($cleanedGET['contract_end_date']) && isset($cleanedGET['search_category']) && isset($cleanedGET['serach_name']) && isset($cleanedGET['status'])) {
	 if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
			$contractHistoryList = contractHistorySearch($cleanedGET['contract_start_date'],$cleanedGET['contract_end_date'],$cleanedGET['search_category'],$cleanedGET['serach_name'],$cleanedGET['status'],$limistart,$limitend); 
	 }else {
$contractHistoryList = contractHistorySearch($cleanedGET['contract_start_date'],$cleanedGET['contract_end_date'],$cleanedGET['search_category'],$cleanedGET['serach_name'],$cleanedGET['status']);	 }
	  $searcharray['contract_start_date'] =$cleanedGET['contract_start_date'];
	  $searcharray['contract_end_date'] =$cleanedGET['contract_end_date'];	
	  $searcharray['search_category'] =$cleanedGET['search_category'];	
	  $searcharray['serach_name'] =$cleanedGET['serach_name'];	
	  $searcharray['status'] =$cleanedGET['status'];		  
}
 if (count($searcharray)>0) {
	 $count = contractHistorySearchCount($cleanedGET['contract_start_date'],$cleanedGET['contract_end_date'],$cleanedGET['search_category'],$cleanedGET['serach_name'],$cleanedGET['status'])['total_Contract_history'];
	  $pagination = pagination($count,'list.php?',$searcharray);
 }else {
  
 $pagination = pagination($count,'list.php?');
 }




?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Contract History Management</title>
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
        <h1> <b>Contract</b> History Management </h1>
      </section>
      
      <!-- Main content -->
      <section class="content"> 
        <!-- Small boxes (Stat box) -->
        <div class="filter_box">
          <div class="filter_data">
            <form name="search_form" id="search_form_contract" method="post" action="../../controller/contract_history/search.php">
              <div class="form-group row">
                <label class="col-md-3 col-sm-12">Period Search</label>
                <div class="col-md-9 col-sm-12">
                  <div class="start_date">
                    <label>Start Date</label>
                   <!-- <input id="startdate" class="form-control" placeholder="21 / 02 / 2017" />-->
                    <input type="text" name="contract_start_date" id="contract_period_start_date" class="form-control datepicker" value="<?php if (isset($_GET['contract_start_date']) && $_GET['contract_start_date'] != '') { echo $_GET['contract_start_date'];}else { echo date('Y-m-d', strtotime('-1 years')); } ?>" />
                    <i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i> </div>
                  <span class="ico_tr">~</span>
                  <div class="end_date">
                    <label>End Date</label>
                    <input type="text" name="contract_end_date" id="contract_period_end_date" class="form-control datepicker" value="<?php if (isset($_GET['contract_end_date']) && $_GET['contract_end_date'] != '') { echo $_GET['contract_end_date'];}else { echo date('Y-m-d'); } ?>"/>
                    <i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i> </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3">Type</label>
                <div class="col-md-9 col-sm-12">
                  <div class="row">
                   <div class="col-sm-4 col-xs-4 Mobilebtn">
                    <input type="radio" name="status" value="all" <?php if (isset($_GET['status'])) { if ($_GET['status'] != 'available' && $_GET['status'] != 'unavailable') { echo "checked";}else {} }else { echo "checked"; } ?> id="All"  />
                    <label for="All" class="btn btn-outline">All</label>
                  </div>
                  <div class="col-sm-4 col-xs-4 Mobilebtn">
                    <input type="radio" name="status" value="available" <?php if (isset($_GET['status']) && $_GET['status'] == 'available') { echo "checked";} ?> id="AvailableType" />
                    <label for="AvailableType" class="btn btn-outline">Available</label>
                  </div>
                  <div class="col-sm-4 col-xs-4 Mobilebtn">
                    <input type="radio" name="status" value="unavailable" <?php if (isset($_GET['status']) && $_GET['status'] == 'unavailable') { echo "checked";} ?> id="UnavailableType" />
                    <label for="UnavailableType" class="btn btn-outline">Unavailable</label>
                  </div>
                </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-sm-12">Search Fields</label>
                <div class="col-md-9 col-sm-12">
                  <div class="row">
                    <div class="col-md-3 MobileMasterSpace">
                      <div class="select-style">
                        <select class="form-control" name="search_category" id="company_category">
                          <!--<option>Com. name</option>
                          <option>Com. email</option>
                          <option>Com. name</option>
                          <option>Com. email</option>-->
                          <option value="company_name" <?php if (isset($_GET['search_category']) && $_GET['search_category'] == 'company_name') { echo "selected='selected'";} ?>>Com.Name</option><option value="contact_person" <?php if (isset($_GET['search_category']) && $_GET['search_category'] == 'contact_person') { echo "selected='selected'";} ?>>Con.Person</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-9 col-xs-8 MobileMasterSpace MobileMasterFull">
                     <input type="text" name="serach_name" class="form-control" value="<?php if (isset($_GET['serach_name']) && $_GET['serach_name'] != '') { echo $_GET['serach_name'];}else { echo ""; } ?>" style = "display:inline-block;"/><!-- <input class="form-control" id="inputName" type="text">-->
                    </div>
                    <div class="col-sm-3 col-xs-4 MobileMasterFull">
                      <button type="submit" name = "search_submit" value="search_submit" class="btn btn-lg btn-info btn-block">Search</button><!--<button type="submit" class="btn btn-info btn-lg btn-block">Search</button>-->
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="pull-right btn_ft m0"> <a href="add.php" class="btn btn-info">Registration of contract details</a> </div>
        <div class="Form_Inside certificate_table contract_history_management">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Contract Date</th>
                  <th>Company Name</th>
                  <th>Contact Person</th>
                  <th>Contact Period</th>
                  <th>Status</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if (isset($contractHistoryList) && is_array($contractHistoryList) && count($contractHistoryList)>0) { 
		  				foreach($contractHistoryList as $contractHistoryKey => $contractHistoryValue) {
							
		 ?>
              <tr class='clickable-row' data-href='info.php?contract_history_id=<?php echo $contractHistoryValue['contract_history_id']; ?>'>
              <td><?php echo  $contractHistoryValue['contract_history_id']; ?></td>
              <td><?php echo  $contractHistoryValue['contract_date']; ?></td>
              <td><?php echo  $contractHistoryValue['company_name']; ?></td>
              <td><?php if ($contractHistoryValue['contact_person'] == "") { echo "NA"; } else { echo  $contractHistoryValue['contact_person']; } ?></td>
              <td><?php echo  $contractHistoryValue['contract_period_start_date']."`".$contractHistoryValue['contract_period_end_date']; ?></td>
              <td><?php echo  $contractHistoryValue['contract_status']; ?></td><td><a href="info.php?contract_history_id=<?php echo $contractHistoryValue['contract_history_id']; ?>"><button class="btn btn-default">View Detail</button></a></td>
             
         </tr>
        
         <?php					
			}
		  }

           
		   
?>		
               
              </tbody>
            </table>
          </div>
          <nav aria-label="Page navigation example">
            <div class="text-center">
              <ul class="pagination">
              
                <?php echo  $pagination;
     ?>
              </ul>
            </div>
          </nav>
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
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="../../bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	
	
		
	 $(".sidebar-menu > li").removeClass("active");
	 $('.treeview').removeClass('active');
     $("#servicelist").addClass('treeview active'); 
	 $("#chmlist").css("text-decoration","underline");
	
	$('select:focus').prev().css('background-color', '#eee');
	
	// Date function
	$("#contract_period_start_date").datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$("#contract_period_end_date").datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$("#licensestartdate").datepicker({
		dateFormat: 'dd/mm/yy'
	});
	$("#licenseenddate").datepicker({
		dateFormat: 'dd/mm/yy'
	});	
	
	/*// Calender function
	$('.fa-calendar').click(function() {
		var datepickerID = $(this).parent().find('input').attr('id');
		$("#" + datepickerID).focus();
	});	
	
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });*/
	
// Input file function
	
/*'use strict';

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
}( document, window, 0 ));	*/
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
