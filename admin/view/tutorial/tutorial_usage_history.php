<?php  include_once('../../check_login.php');
include('../../modal/tutorial/tutorial.php');
 //error_reporting(E_ALL);
 //define(PERPAGE_LIMIT,10);
 include('../../comman_function.php');
 $countContractHistory = selectCountTutorialHistory();
 //echo "<pre>";
// print_r($countContractHistory);die;
$count = $countContractHistory['tutorial_history'];
 
//$pagination = pagination($count,'list.php?');
$searcharray = array(); 
/* echo "<pre>";
 print_r($_GET);
 die;*/
$cleanedGET = clean($_GET);
if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
	$limistart = ($_REQUEST['pageNumber']-1)*30;
	$limitend =30;
	$contractHistoryList = selectTutorialHistory($limistart,$limitend);
}else {
	$limistart = 0;
	$limitend =30;
	$contractHistoryList = selectTutorialHistory($limistart,$limitend);
}
 if (isset($cleanedGET['contract_start_date']) && isset($cleanedGET['contract_end_date']) && isset($cleanedGET['search_category']) && isset($cleanedGET['serach_name']) ) {
	 if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
			$contractHistoryList = contractHistorySearch($cleanedGET['contract_start_date'],$cleanedGET['contract_end_date'],$cleanedGET['search_category'],$cleanedGET['serach_name'],$limistart,$limitend); 
	 }else {
$contractHistoryList = contractHistorySearch($cleanedGET['contract_start_date'],$cleanedGET['contract_end_date'],$cleanedGET['search_category'],$cleanedGET['serach_name']);	 }
	  $searcharray['contract_start_date'] =$cleanedGET['contract_start_date'];
	  $searcharray['contract_end_date'] =$cleanedGET['contract_end_date'];	
	  $searcharray['search_category'] =$cleanedGET['search_category'];	
	  $searcharray['serach_name'] =$cleanedGET['serach_name'];	
	 		  
}
 if (count($searcharray)>0) {
	 $count = contractHistorySearchCount($cleanedGET['contract_start_date'],$cleanedGET['contract_end_date'],$cleanedGET['search_category'],$cleanedGET['serach_name'])['tutorial_history'];
	  $pagination = pagination($count,'tutorial_usage_history.php?',$searcharray);
 }else {
  
 $pagination = pagination($count,'tutorial_usage_history.php?');
 }
 //echo "<pre>";
// print_r($contractHistoryList);
 //die;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
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
      <h1> <b>Tutorial</b> Usage History </h1>
    </section>
    
    <!-- Main content -->
    <section class="content member_page"> 
      <!-- Small boxes (Stat box) -->
      <div class="filter_box">
        <div class="filter_data">
          <form name="search_form" id="search_form_contract" method="post" action="../../controller/tutorial/search.php">
            <div class="form-group row">
              <label class="col-md-3 col-sm-12">Period Search</label>
              <div class="col-md-9 col-sm-12">
                <div class="start_date">
                  <label>Start Date</label>
                  <input  name="contract_start_date" id="contract_period_start_date" class="form-control" placeholder="YYYY/MM/DD" value="<?php if (isset($_GET['contract_start_date']) && $_GET['contract_start_date'] != '') { echo $_GET['contract_start_date'];}else { echo date('Y-m-d', strtotime('-1 day'));  } ?>" />
                  <i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i> </div>
                <span class="ico_tr">~</span>
                <div class="end_date">
                  <label>End Date</label>
                  <input name="contract_end_date" id="contract_period_end_date" class="form-control" placeholder="YYYY/MM/DD" value="<?php if (isset($_GET['contract_end_date']) && $_GET['contract_end_date'] != '') { echo $_GET['contract_end_date'];}else { echo date('Y-m-d'); } ?>" />
                  <i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i> </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-3 col-sm-12">Search Fields</label>
              <div class="col-md-9 col-sm-12">
                <div class="row">
                  <div class="col-md-3 MobileMasterSpace">
                    <div class="select-style">
                     <select class="form-control" id="device_choose" name="search_category">
                      <option value="userid" <?php if (isset($_GET['search_category']) && $_GET['search_category'] == 'userid') { echo "selected='selected'";} ?>>userid</option>
                      <option value="email" <?php if (isset($_GET['search_category']) && $_GET['search_category'] == 'email') { echo "selected='selected'";} ?>>email</option>
                      
                    </select>
                  </div>
                  </div>
                  <div class="col-md-6 col-sm-9 col-xs-8 MobileMasterSpace MobileMasterFull">
                    <input class="form-control"name="serach_name" type="text" value="<?php if (isset($_GET['serach_name']) && $_GET['serach_name'] != '') { echo $_GET['serach_name'];}else { echo ""; } ?>">
                  </div>
                  <div class="col-sm-3 col-xs-4 MobileMasterFull">
                    <button type="submit" name = "search_submit" value="search_submit" class="btn btn-lg btn-info btn-block">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="list_txt">
        <ul>
          <li><b>Tutorials used today</b> :<?php echo todayTutorial()['today_tutorial'];?> times </li>
          <li><b>Number of users</b> : <?php echo todayTutorialUser()['today_tutorial'];?></li>
        </ul>
      </div>
      <div class="Form_Inside certificate_table">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Level</th>
                <th>Email</th>
                <th>Userid</th>
                <th>FileName</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
             <?php if (isset($contractHistoryList) && is_array($contractHistoryList) && count($contractHistoryList)>0) { 
		  				foreach($contractHistoryList as $contractHistoryKey => $contractHistoryValue) {
							
		 ?>
              <tr>
              <td><?php echo  $contractHistoryValue['tutorial_id']; ?></td>
              <td><?php echo ( $contractHistoryValue['user_level'] == 1 )? "L1" :(( $contractHistoryValue['user_level'] == 2 )? "L2" :(( $contractHistoryValue['user_level'] == 3 )? "L3" : ("Not Available"))); ?></td>
              <td><?php echo  $contractHistoryValue['user_email']; ?></td>
              <td><?php echo  $contractHistoryValue['user_id']; ?></td>
              <td><?php echo  $contractHistoryValue['tutorial_file_name']; ?>
              <td><?php echo  $contractHistoryValue['tutorial_start_date']."";?></td>
              
             
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
  </div> </div>
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
	  // add class to the one we clicked
	  $("#tlist").addClass("active");
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
	
	// Calender function
	$('.fa-calendar').click(function() {
		var datepickerID = $(this).parent().find('input').attr('id');
		$("#" + datepickerID).focus();
	});	
});
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