<?php include_once('../../check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Customer Management</title>
<link href="dist/img/favicon.ico" rel="icon" type="/ico" />
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
<?php 
 
 include('../../modal/customer/customer.php');

 include('../../comman_function.php');
 $countCustomer = countCustomer();

$count = $countCustomer['totalcustomer'];

$searcharray = array(); 


 $cleanedGET = clean($_GET);

if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
	$limistart = ($_REQUEST['pageNumber']-1)*30;
	$limitend =30;
}
 if (isset($cleanedGET['search_customer']) && $cleanedGET['search_customer'] == 'name' && isset($cleanedGET['searchinput_name'] ) ) {
	 if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
		  $customerList = customerSearchName($cleanedGET['searchinput_name'],$limistart,$limitend);
	 }else {
		  $customerList = customerSearchName($cleanedGET['searchinput_name']);
	 }
	  $searcharray['search_customer'] =$cleanedGET['search_customer'];
	  $searcharray['searchinput_name'] =$cleanedGET['searchinput_name'];
	 $count = customerSearchNameCount($cleanedGET['searchinput_name'])['totalcustomer'];
	 //echo $count;die;
}elseif(isset($cleanedGET['search_customer']) && $cleanedGET['search_customer'] == 'email' && isset($cleanedGET['searchinput_name'] )) {
	  $searcharray['search_customer'] =$cleanedGET['search_customer'];
	  $searcharray['searchinput_name'] =$cleanedGET['searchinput_name'];
	 if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
			$customerList = customerSearchEmail($cleanedGET['searchinput_name'],$limistart,$limitend);
	}else {
	 	$customerList = customerSearchEmail($cleanedGET['searchinput_name']);
	}
	 $count = customerSearchEmailCount($cleanedGET['searchinput_name'])['totalcustomer'];	 /*echo "<pre>";
print_r($customerList);
die;*/
 }else {
	 	if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
			//echo "hello";die;
			$customerList = customerList($limistart,$limitend);
		}else {
             $customerList = customerList();
		}
		//$count = count($customerList);
 }
 if (count($searcharray)>0) {
	  $pagination = pagination($count,'list.php?',$searcharray);
 }else {
 $pagination = pagination($count,'list.php?');
 }
 //echo "<pre>";
// print_r($customerList);die;
	 
?>

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
      <section class="content"> 
        <!-- Small boxes (Stat box) -->
        <div class="filter_box">
          <div class="filter_data">
            <form name="search_form" id="search_form_customer" method="post" action="../../controller/customer/customer.php">
              <div class="row">
                <div class="col-md-3 MobileMasterSpace">
                  <div class="select-style">
                    <select class="form-control" id="device_choose" name="search_customer">
                      <!--<option>Level</option>-->
                      <option  value="email" <?php if(isset($cleanedGET['search_customer']) && $cleanedGET['search_customer'] == 'email'){echo "selected ='selected'"; } ?>>Email</option>
                      <option value="name" <?php if(isset($cleanedGET['search_customer']) && $cleanedGET['search_customer'] == 'name'){echo "selected ='selected'"; } ?>>Name</option>
                      <!--<option>Register Date</option>-->
                    </select>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-sm-9 col-xs-8 MobileMasterSpace MobileMasterFull">
                      <input class="form-control" id="inputName" type="text" name="searchinput_name" value="<?php if(isset($cleanedGET['searchinput_name'] )&& $cleanedGET['searchinput_name']!=""){ echo $cleanedGET['searchinput_name']; } ?>" required>
                    </div>
                    <div class="col-sm-3 col-xs-4 MobileMasterFull">
                      <button type="submit" name = "search_submit" value="search_submit" class="btn btn-info btn-lg btn-block">Search</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="pull-right btn_ft"> <!--<a href="#" data-toggle="modal" data-target="#ChangeLevel" class="btn btn-default">Change Level</a>--> <a href="../membershiprights/list.php" class="btn btn-default">Manage MembershipRights</a> </div>
        <div class="Form_Inside certificate_table customer_management_table">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Level</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Register Date</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
              
              <?php if (isset($customerList) && is_array($customerList) && count($customerList)>0) { 
		  				foreach($customerList as $customerKey => $customerValue) {
		 ?>
              <tr class='clickable-row' data-href='customerinfo.php?user_id=<?php echo $customerValue['user_id']; ?>'>
              <td><?php echo  $customerValue['user_id']; ?></td>
              <td id="col_<?php echo $customerValue['user_id']; ?>"><?php echo ( $customerValue['user_level'] == 1 )? "L1" :(( $customerValue['user_level'] == 2 )? "L2" :(( $customerValue['user_level'] == 3 )? "L3" : ("Not Available"))); ?></td>
              <td><?php echo  $customerValue['user_email']; ?></td>
              <td><?php echo  $customerValue['user_name']; ?></td>
              <td><?php echo  date('Y-m-d',strtotime($customerValue['user_reg_date'])); ?></td>
              <td><button class="btn btn-default" style="margin-left:5px; width:130px;" data-toggle="modal" data-target="#myModalNorm_<?php echo $customerValue['user_id']; ?>">Change Level</button><a href="customerinfo.php?user_id=<?php echo $customerValue['user_id']; ?>"><button class="btn btn-default"  style="margin-left:5px;margin-top:5px;width:130px;">View Detail</button></a></td>
             <!-- <td colspan="2"><a href="customerinfo.php?user_id=<?php echo $customerValue['user_id']; ?>"><button class="btn btn-primary">View</button></a><a href="edit.php?user_id=<?php echo $customerValue['user_id']; ?>"><button class="btn btn-primary" style="margin-left:5px;">Edit / Change Level</button></a><!--<button class="btn  btn-primary" style="margin-left:5px;" data-toggle="modal" data-target="#myModalNorm_<?php echo $customerValue['user_id']; ?>">Change Level</button></td>-->
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
    <!-- /.content-wrapper --> 
  </div>
  <footer id="main_footer" class="main-footer"><?php include_once('../footer/footert.php') ?></footer>
  <!-- change level Modal -->
  <?php if (isset($customerList) && is_array($customerList) && count($customerList)>0) { 
		  				foreach($customerList as $customerKey => $customerValue) {
		 ?>
  <div class="modal fade" id="myModalNorm_<?php echo $customerValue['user_id']; ?>" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><b>Change</b> level</h3>
          <div class="modal-pp">
            <p>Select the level you want to change and click the [Save Changes] button. </p>
            <div class="define_user">
              <div class="userId"><b>User ID : <?php echo $customerValue['user_id'];  ?></b></div>
              <div class="userName"><b>Name : <?php echo $customerValue['user_name'];  ?></b></div>
            </div>
            <ul class="br_level">
              <li>Current Level</li>
              <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
              <li>Change Level</li>
            </ul>
          </div>
          <form role="form" id="changelevel_<?php echo $customerValue['user_id']; ?>" name="changelevel_<?php echo $customerValue['user_id']; ?>" method="post" action="../../controller/customer/customer.php">
            <div class="row_star">
              <div class="row">
                <div class="col-sm-6">
                  <p class="level_add"><?php echo ( $customerValue['user_level'] == 1 )? "<span style='font-size:16px;margin-left:4px;margin-right:6px;'>L1<span>" :(( $customerValue['user_level'] == 2 )? "<span style='font-size:16px;margin-left:4px;margin-right:6px;'>L2</span>" :(( $customerValue['user_level'] == 3 )? "<span style='font-size:16px;margin-left:4px;margin-right:6px;'>L3</span>" : ("Not Available"))); ?></p>
                </div>
                <div class="col-sm-6">
                  <select class="form-control" id="level_number_<?php echo $customerValue['user_id']; ?>" name="level_number">
                   <?php if($customerValue['user_level'] == 1) {}else {?><option value="1" >L1</option> <?php } ?> <?php if($customerValue['user_level'] == 2) { }else {?><option value="2">L2</option> <?php } ?><?php if($customerValue['user_level'] == 3) { }else {?><option value="3" >L3</option><?php } ?> 
                  </select>
                </div>
              </div>
            </div>
            <div class="footer_poup"> <button class="btn btn-outline" data-dismiss="modal">Cancel</button>
            <input type="hidden" name="user_id" value="<?php echo  $customerValue['user_id']; ?>"/>
            <input type="hidden" name="form_list" value="form_list"/>
                <button type="submit" name="change_level" class="btn btn-info" value="change_level" onClick="return ChangeLevel(<?php echo  $customerValue['user_id']; ?>)">
                    Save changes
                </button>
              <!--<button type="button" class="btn btn-info" data-dismiss="modal">Save Changes</button>-->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php } } ?>
  <!-- Change Level Model End -->
  <!-- message model -->
  <div class="modal fade in" id="Email_sucess" role="dialog"  style="display:none;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg" id="message_box">Level change successfully</p>
        </div>
        <div style="height:20px;"></div> 
      <button class="btn btn-info" onClick="hideModal()">OK</button>
    </div>
  </div>
</div>
</div>
  <!-- message model -->
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.2.3 --> 
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="../../bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
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
function ChangeLevel(userid) {
	level_number =$('#level_number_'+userid).val();
	//alert(level_number);
	 $.post("../../ajax/change_level.php", { level_number: level_number,userid: userid},
            function(data){
				//alert(data);
				console.log(data);
				if(data == 1) {
				changetext ='';
				if (level_number == 1 ){changetext='L1';}else if(level_number == 2){changetext='L2';}else if (level_number == 3) { changetext='L3'; } 
				 $("#col_"+userid).text(changetext);
				 
				 <?php ?>
				}else {}
				$('#myModalNorm_'+userid).modal("hide");
				$('#Email_sucess').show();
				
            }
        );
		//$('#myModalNorm_'+userid).hide();
		
	return false; 	
}
function hideModal() {
	$('#Email_sucess').hide();
	location.reload();
	//$('#ChangePassword').hide();
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