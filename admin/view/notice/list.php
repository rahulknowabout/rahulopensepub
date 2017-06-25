<?php include_once('../../check_login.php'); 
include('../../modal/notice/notice.php');

 include('../../comman_function.php');
 $countNotice = countNotice();
 
$count = $countNotice['opens_notice'];

$searcharray = array(); 


 $cleanedGET = clean($_GET);

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


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Notice</title>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><b>Notice</b></h1>
    </section>
    
    <!-- Main content -->
    <section class="content"> 
      <!-- Small boxes (Stat box) -->
      <div class="filter_box">
        <div class="filter_data">
          <form name="search_form" id="search_form_customer" method="post" action="../../controller/notice/notice_search.php">
            <div class="row">
              <div class="col-md-2 MobileMasterSpace">
                <div class="select-style">
                  <select class="form-control" id="device_choose" name="search_notice">
                   <option value="title" <?php if(isset($cleanedGET['search_notice']) && $cleanedGET['search_notice'] == 'title'){echo "selected ='selected'"; } ?>>Title</option>
                                	<option value="content" <?php if(isset($cleanedGET['search_notice']) && $cleanedGET['search_notice'] == 'content'){echo "selected ='selected'"; } ?>>Content</option><!-- <option>Title</option>
                    <option>Register Date</option>-->
                  </select>
                </div>
              </div>
              <div class="col-md-10">
                <div class="row">
                  <div class="col-sm-9 col-xs-8 MobileMasterSpace MobileMasterFull">
                    <input class="form-control" id="searchinput" name="searchinput_name" value="<?php if(isset($cleanedGET['searchinput_name'] )&& $cleanedGET['searchinput_name']!=""){ echo $cleanedGET['searchinput_name']; } ?>" required type="text">
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
      <div class="pull-right btn_ft">  <a href="addtmp.php"><button class="btn btn-info" type="button" name="write_notice">Write</button></a></div>
      <div class="Form_Inside certificate_table notice_table notice_table_row">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Register Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
           
               <?php if (isset($noticeList) && is_array($noticeList) && count($noticeList)>0) { 
		  				foreach($noticeList as $customerKey => $customerValue) {
		 ?>
              <tr class='clickable-row' data-href='customerinfo.php?user_id=<?php echo $customerValue['user_id']; ?>'>
              <td><?php echo  $customerValue['id']; ?></td>
              
              <td><?php echo  $customerValue['notice_title']; ?></td>
              <td><?php echo  $customerValue['notice_date']; ?></td>
              <td><a href="info.php?notice_id=<?php echo $customerValue['id']; ?>" class="btn btn-default">View</a></td>
              
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
  
  <footer id="main_footer" class="main-footer"><?php include_once('../footer/footert.php') ?></footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.2.3 --> 
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="../../bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	
	
	  
    //alert();
	
	$(".sidebar-menu > li").removeClass("active");
	 $('.treeview').removeClass('active');
     $("#nlist").addClass('treeview active'); 
	 $("#nlista").css("text-decoration","underline");
    /*$('.sidebar-menu .treeview').on('click', function () {
		//alert("hello")
      $('.treeview').removeClass('active');
        $(this).addClass('treeview active');  
     });*/

	
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