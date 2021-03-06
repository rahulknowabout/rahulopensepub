<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Contract History Management</title>
<link href="dist/img/favicon.ico" rel="icon" type="/ico" />
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.css">
<!-- Main style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
<!-- jqueryUI -->
<link type="text/css" rel="stylesheet" href="dist/css/jquery-ui.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="plugins/iCheck/all.css">

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
  <header id="main_header" class="main-header"></header>
  <!-- Left Sidebar -->
  <aside id="main_sidebar" class="main-sidebar"></aside>
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
            <form method="post" action="#">
              <div class="form-group row">
                <label class="col-md-3 col-sm-12">Period Search</label>
                <div class="col-md-9 col-sm-12">
                  <div class="start_date">
                    <label>Start Date</label>
                    <input id="startdate" class="form-control" placeholder="21 / 02 / 2017" />
                    <i class="fa custom_icon"><img src="dist/img/calendar_icon.png" alt="" title=""></i> </div>
                  <span class="ico_tr">~</span>
                  <div class="end_date">
                    <label>End Date</label>
                    <input id="enddate" class="form-control" placeholder="DD/MM/YYYY" />
                    <i class="fa custom_icon"><img src="dist/img/calendar_icon.png" alt="" title=""></i> </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3">Type</label>
                <div class="col-md-9 col-sm-12">
                  <div class="row">
                   <div class="col-sm-4 col-xs-4 Mobilebtn">
                    <input type="radio" value="All" name="CertificateType" id="All" checked />
                    <label for="All" class="btn btn-outline">All</label>
                  </div>
                  <div class="col-sm-4 col-xs-4 Mobilebtn">
                    <input type="radio" value="SDK Type" name="CertificateType" id="AvailableType" />
                    <label for="AvailableType" class="btn btn-outline">Available</label>
                  </div>
                  <div class="col-sm-4 col-xs-4 Mobilebtn">
                    <input type="radio" value="Program Type" name="CertificateType" id="UnavailableType" />
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
                        <select class="form-control" id="device_choose">
                          <option>Com. name</option>
                          <option>Com. email</option>
                          <option>Com. name</option>
                          <option>Com. email</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-9 col-xs-8 MobileMasterSpace MobileMasterFull">
                      <input class="form-control" id="inputName" type="text">
                    </div>
                    <div class="col-sm-3 col-xs-4 MobileMasterFull">
                      <button type="submit" class="btn btn-info btn-lg btn-block">Search</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="pull-right btn_ft m0"> <a href="registration_of_contract_details.html" class="btn btn-info">Registration of contract details</a> </div>
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
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>114</td>
                  <td>SDK</td>
                  <td>Packager SDK</td>
                  <td>Jason Mraz</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>available</td>
                </tr>
                <tr>
                  <td>113</td>
                  <td>SDK</td>
                  <td>Packager SDK</td>
                  <td>Eric</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>available</td>
                </tr>
                <tr>
                  <td>112</td>
                  <td>SDK</td>
                  <td>Packager SDK</td>
                  <td>John Smith</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>available</td>
                </tr>
                <tr>
                  <td>111</td>
                  <td>SDK</td>
                  <td>Packager SDK</td>
                  <td>User</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>available</td>
                </tr>
                <tr>
                  <td>110</td>
                  <td>SDK</td>
                  <td>Client SDK</td>
                  <td>Hyeryun Kim</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>available</td>
                </tr>
                <tr>
                  <td>109</td>
                  <td>SDK</td>
                  <td>Client SDK</td>
                  <td>Alice Kang</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>available</td>
                </tr>
                <tr>
                  <td>108</td>
                  <td>SDK</td>
                  <td>Client SDK</td>
                  <td>Mike Hong</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>available</td>
                </tr>
                <tr>
                  <td>107</td>
                  <td>SDK</td>
                  <td>Client SDK</td>
                  <td>tester</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>available</td>
                </tr>
                <tr>
                  <td>106</td>
                  <td>SDK</td>
                  <td>Client SDK</td>
                  <td>andrew hay</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>available</td>
                </tr>
                <tr class="disabled">
                  <td>105</td>
                  <td>Program</td>
                  <td>OPENS Packager</td>
                  <td>benjamin</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>unavailable</td>
                </tr>
                <tr class="disabled">
                  <td>104</td>
                  <td>Program</td>
                  <td>OPENS Packager</td>
                  <td>daniel</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>unavailable</td>
                </tr>
                <tr class="disabled">
                  <td>103</td>
                  <td>Program</td>
                  <td>OPENS Packager</td>
                  <td>paul kim</td>
                  <td>2017.01.01 ~ 2017.01.01</td>
                  <td>unavailable</td>
                </tr>
              </tbody>
            </table>
          </div>
          <nav aria-label="Page navigation example">
            <div class="text-center">
              <ul class="pagination">
                <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fa fa-angle-left"></i></span> </a> </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true"><i class="fa fa-angle-right"></i></span> </a> </li>
              </ul>
            </div>
          </nav>
        </div>
      </section>
      <!-- /.content --> 
    </div>
  </div>
  <!-- /.content-wrapper -->
  
  <footer id="main_footer" class="main-footer"></footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.2.3 --> 
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	
	// header, footer and left part attachment
	jQuery("#main_header").load("inc/header.html");
	jQuery("#main_sidebar").load("inc/LeftSidebar.html");
	jQuery("#main_footer").load("inc/footer.html");
	
	// Menu active function
	jQuery(".sidebar-menu > li").click(function() {
	  // remove classes from all
	  jQuery(".sidebar-menu > li").removeClass("active");
	  // add class to the one we clicked
	  jQuery(this).addClass("active");
	});
	
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
<script src="dist/js/app.min.js"></script> 

<!-- SlimScroll 1.3.0 --> 
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script> 
<!-- iCheck 1.0.1 --> 
<script src="plugins/iCheck/icheck.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="dist/js/demo.js"></script> 
<script src="dist/js/jquery-ui.min.js" type="text/javascript"></script>
</body>
</html>
