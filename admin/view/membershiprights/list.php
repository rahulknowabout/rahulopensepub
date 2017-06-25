<?php include_once('../../check_login.php');
include('../../modal/membershiprights/membershiprights.php');
// error_reporting(E_ALL);
 //define(PERPAGE_LIMIT,10);
 include('../../comman_function.php');
 $memberShipRights = allMembershipRights();
 $countNotice = countNotice();
 //echo "<pre>";
 //print_r($countCustomer);die;
$count = $countNotice['opens_notice'];
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
}
 if (isset($cleanedGET['search_notice']) && $cleanedGET['search_notice'] == 'title' && isset($cleanedGET['searchinput_name'] ) ) {
	 if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
		  $noticeList = noticeSearchTitle($cleanedGET['searchinput_name'],$limistart,$limitend);
	 }else {
		  $noticeList = noticeSearchTitle($cleanedGET['searchinput_name']);
	 }
	  $searcharray['search_notice'] =$cleanedGET['search_notice'];
	  $searcharray['searchinput_name'] =$cleanedGET['searchinput_name'];
	 $count = noticeSearchTitleCount($cleanedGET['searchinput_name'])['opens_notice'];
	 //echo $count;die;
}elseif(isset($cleanedGET['search_notice']) && $cleanedGET['search_notice'] == 'content' && isset($cleanedGET['searchinput_name'] )) {
	  $searcharray['search_notice'] =$cleanedGET['search_notice'];
	  $searcharray['searchinput_name'] =$cleanedGET['searchinput_name'];
	 if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
			$noticeList = customerSearchEmail($cleanedGET['searchinput_name'],$limistart,$limitend);
	}else {
	 	$noticeList = noticeSearchContent($cleanedGET['searchinput_name']);
	}
	 $count = noticeSearchContentCount($cleanedGET['searchinput_name'])['opens_notice'];	 /*echo "<pre>";
print_r($customerList);
die;*/
 }else {
	 	if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
			//echo "hello";die;
			$noticeList = noticeList($limistart,$limitend);
		}else {
             $noticeList = noticeList();
		}
		//$count = count($customerList);
 }
 if (count($searcharray)>0) {
	  $pagination = pagination($count,'list.php?',$searcharray);
 }else {
 $pagination = pagination($count,'list.php?');
 }
 //echo "<pre>";
 //print_r($noticeList);die;


 ?>
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
        <h1> <b>MemberShip</b> Rights </h1>
      </section>
      
      <!-- Main content -->
      <section class="content"> 
        <!-- Small boxes (Stat box) -->
       
       
        <div class="Form_Inside certificate_table customer_management_table">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
              <th>From</th>
              <th>To</th>
              <th>Transfer Level</th>
              <th>Action</th>
                </tr>
              </thead>
              <tbody>
              
             <?php if (isset($memberShipRights) && is_array($memberShipRights) && count($memberShipRights)>0) { 
		  				foreach($memberShipRights as $customerKey => $customerValue) {
		 ?>
              <tr class='clickable-row' data-href='customerinfo.php?user_id=<?php echo $customerValue['user_id']; ?>' id="rowm_<?php echo $customerValue['id'];?>">
              <td><?php echo  $customerValue['id']; ?></td>
              
              <td><?php echo  $customerValue['from_transfer_id']; ?></td>
              <td><?php echo  $customerValue['to_transfer_id']; ?></td>
              <td><?php echo ( $customerValue['transfer_level'] == 1 )? "L1" :(( $customerValue['transfer_level'] == 2 )? "L2" :(( $customerValue['transfer_level'] == 3 )? "L3" : ("Not Available"))); ?></td>
              <td><button type="button" class="btn btn-default" name="Approvec<?php echo $customerValue['id'];?>" id="approvec_<?php echo $customerValue['id'];?>" onClick="approvec('<?php echo $customerValue['id'];?>','<?php echo $customerValue['from_transfer_id'];?>','<?php echo $customerValue['to_transfer_id'];?>','<?php echo $customerValue['transfer_level'];?>')" style="margin:5px; width:130px;"><?php  echo "Approve";?></button><button type="button" class="btn btn-default" name="Approvecn<?php echo $customerValue['id'];?>" id="approvecn_<?php echo $customerValue['id'];?>" onClick="approvecn('<?php echo $customerValue['id'];?>','<?php echo $customerValue['from_transfer_id'];?>','<?php echo $customerValue['to_transfer_id'];?>','<?php echo $customerValue['transfer_level'];?>')" style="margin:5px; width:130px;"><?php echo "Not Approve"; ?></button></td>
              
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
              
                 <?php //echo  $pagination;
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

<script>
function approvec(reviewid,from,to,tlevel) {
		//alert('approvec');
		//return false;
		 caseApprove = $("#approvec_"+reviewid).html();
		
			 actionvalue	 = 1;
		
		 $.post("../../ajax/membershiprights.php", { reviewid: reviewid,from: from,to: to,tlevel: tlevel, action: actionvalue },
            function(data){
				//alert(data);
				console.log(data);
				$("#message_box").text("Approve Successfully");
				$('#Email_sucess').show();
				 $('#rowm_'+reviewid).remove();
               //button.addClass('pressed');
              // button.html("Playing!") ;
            }
        );
	}
function approvecn(reviewid,from,to,tlevel) {
		//alert(reviewid);
		//alert('approvecnot');
		//return false;
		 caseApprove = $("#approvecn_"+reviewid).html();
		 actionvalue	 = 0;
		
		$.post("../../ajax/membershiprights.php", { reviewid: reviewid,from: from,to: to,tlevel: tlevel, action: actionvalue },
            function(data){
				//alert(data);
				  $("#message_box").text("Not Approve Successfully");
				  $('#Email_sucess').show();
				 $('#rowm_'+reviewid).remove();
				 
				console.log(data);
				 
               //button.addClass('pressed');
              // button.html("Playing!") ;
            }
        );
	}
function hideModal() {
	$('#Email_sucess').hide();
	//location.reload();
	//$('#ChangePassword').hide();
}
</script>
</body>
</html>