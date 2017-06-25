<?php include_once('../../check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Product History Registration</title>
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
        <h1> <b>Product History</b> Registration </h1>
        <span class="alert-danger" id="included_error_tour" <?php if(isset($_GET['Error_Code']) && $_GET['Error_Code'] == 'dup'){ ?> style="display:block;"  <?php }else{ ?> style="display:none" <?php } ?> onClick="alertDisappear();">This Product Exist, Please Try Another</span> 
      </section>
      
      <!-- Main content -->
      <section class="content member_page">
        <div class="Form_Inside edit_data">
         <form id="jvalidate" role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="../../controller/product/productadd.php">
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3">Register Date</label>
              <div class="col-md-5 col-sm-7">
                <p><?php echo date('Y-m-d'); ?><input type="hidden" name="product_reg_date" value="<?php echo date('Y-m-d'); ?>"/></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="type_choose">Type</label>
              <div class="col-md-5 col-sm-7">
                <div class="select-style">
               
                  <select name="product_type" id="product_type" class="form-control" onChange="productTypeChange(this.value)"><option value="SDK">SDK</option><option value="program">Program</option></select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="product_choose">Product</label>
              <div class="col-md-5 col-sm-7">
                <div class="select-style">
                 
                  <span  id="product_name_sdk_span"><select name="product_name_sdk" id="product_name_sdk" class="form-control"><option value="c_sdk">Client SDK</option><option value="p_sdk">Packager SDK</option></select></span><span id="product_name_program_span" style="display:none;"><select name="product_name_program" id="product_name_program" class="form-control"><option value="opens_packager">OPENS Packager</option></select></span>
                </div>
              </div>
            </div>
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3 col-lg-3">Version</label>
              <div class="col-md-5 col-sm-7">
              <!--  <input class="form-control" id="version4" placeholder="1.0.0" type="text">-->
              <input type="text" class="form-control" name="product_version" id="product_version" placeholder="1.0.0" value="<?php //echo $singleCustomer['user_name']; ?>"/>
              </div>
            </div>
            <span id="row_file" style="display:none;">
            <div class="form-group upload ">
              <label class="col-sm-4 col-md-3 col-lg-3">File</label>
             
              <div class="col-md-5 col-sm-8" id="row_file_td" style="display:none;">
                <input type="file" name="program_file_first" id="program_file_first" class="inputfile inputfile-1" style="display:none;" onChange="programsetfilename(this.value,'first')"/>
               <!-- <label for="file-1" class="btn btn-default btn-block file-btn"> Upload <span class="File_name_view">abcdefg.exe (1.1MB)</span>-->
               <span  class="btn btn-default btn-block file-btn" name="program_button_first" onclick="document.getElementById('program_file_first').click();">Upload </span>
                 <span id="program_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"></span> 
                
              </div>
            </div>
            </span>
            <span id="row_os">
            <div class="form-group upload ">
              <label class="col-sm-4 col-md-3 col-lg-3">OS</label>
              <div class="col-md-9 col-sm-12"> <span class="checkbox_design">
                <input type="checkbox" name="ios_check" id="ios_check" />
                <label for="ios_check"><span></span>iOS</label>
                </span> <span class="checkbox_design">
                <input type="checkbox" name="android_check" id="android_check" />
                <label for="android_check"><span></span>Android</label>
                </span> <span class="checkbox_design">
                <input type="checkbox" name="windows_check" id="windows_check"  />
                <label for="windows_check"><span></span>Windows</label>
                </span> <span class="checkbox_design">
                <input type="checkbox" name="linux_check" id="linux_check"  />
                <label for="linux_check"><span></span>Linux</label>
                </span> <span class="checkbox_design">
                <input type="checkbox" name="osx_check" id="osx_check" />
                <label for="osx_check"><span></span>OSX</label>
                </span>
                
                <div class="table-responsive" id="ios_table" style="display:none">
                  <table class="table rocking_table" id="data_table_ios">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
                    <tr>
                      <td id="ios_rowspan" rowspan="1" style="vertical-align:middle">iOS</td>
                      <td><div class="select-style">
                        
                          <select class="form-control" name="language_ios_first"><option value="cpp">C++</option><option value="java">Java</option></select>
                        </div></td>
                      <td><input type="file" name="ios_file_first" id="ios_file_first"  style="display:none;" onChange="iossetfilename(this.value,'first')"/><input type="button" value="[Upload]" name="ios_button_first" onclick="document.getElementById('ios_file_first').click();" /><span id="ios_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"></span><!--<a href="#"></a>--></td>
                      <td><input type="text" name="ios_checksum_first" class="form-control"/></td>
                      <td><div class="row_btn">
                          <button type="button" name="addRowIosbutton" onClick="addRowIos()"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                          <button type="button" name="minusRowIosbutton"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                        </div></td>
                    </tr>
                   
                    
                    
                   
                  </table>
                </div>
                <div class="table-responsive" id="android_table" style="display:none;">
                  <table class="table rocking_table" id="data_table_android">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
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
                  </table>
                </div>
                <div class="table-responsive" id="windows_table" style="display:none;">
                  <table class="table rocking_table" id="data_table_windows">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
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
                  </table>
                </div>
                <div class="table-responsive" id="linux_table" style="display:none;">
                  <table class="table rocking_table" id="data_table_linux">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
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
                  </table>
                </div>
                <div class="table-responsive" id="osx_table" style="display:none;">
                  <table class="table rocking_table" id="data_table_osx">
                    <tr>
                      <th>OS</th>
                      <th>Language</th>
                      <th>File</th>
                      <th>SHA1 Checksum</th>
                      <th>Edit</th>
                    </tr>
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
                  </table>
                </div>
              </div>
            </div>
            </span>
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3 col-lg-3" for="level">Release Note</label>
              <div class="col-md-9 col-sm-8">
                <textarea class="form-control" name="product_release_note"></textarea>
              </div>
            </div>
            <div class="row footer_btn">
              <div class="col-sm-4">
                <div class="pull-left"> <a href="list.php" class="btn btn-outline">Back to List</a> </div>
              </div>
              <div class="col-sm-8">
                <div class="pull-right"> <button class="btn btn-info" type="submit" name="editsubmit" value="editsubmit">Done</button></div>
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

  <!-- Modal -->
  <div class="modal fade" id="ChangePassword" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><b>Change</b> password</h3>
          <div class="modal-pp">
            <p>Use the form below to change the password for your OPENS account <b>Your password must have :</b> English alphanumeric characters within 8 to 20 characters</p>
          </div>
          <form method="post">
            <div class="input-group2">
              <div class="form-group">
                <input class="form-control" id="pwd" placeholder="New Password" required="" type="Password">
                <span class="msg okay"><i class="fa fa-check-circle"></i></span> </div>
              <div class="form-group">
                <input class="form-control" id="repeatpwd" placeholder="Re-enter the Password" required="" type="password">
                <span class="msg not_okay"><i class="fa fa-times-circle"></i></span> </div>
            </div>
            <div class="footer_poup"> <a href="#" class="btn btn-outline">Cancel</a>
              <button type="button" class="btn btn-info" data-dismiss="modal">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- change level Modal -->
  <div class="modal fade" id="ChangeLevel" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><b>Change</b> level</h3>
          <div class="modal-pp">
            <p>Select the level you want to change and click the [Save Changes] button. </p>
            <div class="define_user">
              <div class="userId"><b>User ID : tester@email.com</b></div>
              <div class="userName"><b>Name : John Smith</b></div>
            </div>
            <ul class="br_level">
              <li>Current Level</li>
              <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
              <li>Current Level</li>
            </ul>
          </div>
          <form method="post">
            <div class="row_star">
              <div class="row">
                <div class="col-sm-6">
                  <p class="level_add">L1</p>
                </div>
                <div class="col-sm-6">
                  <select class="form-control" id="device_choose">
                    <option>Select</option>
                    <option>L1</option>
                    <option>L2</option>
                    <option>L3</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="footer_poup"> <a href="#" class="btn btn-outline">Cancel</a>
              <button type="button" class="btn btn-info" data-dismiss="modal">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./wrapper --> 

<!-- Page script --> 

<!-- jQuery 2.2.3 --> 

<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="../../bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">var global_table_prefix = "";
var global_table_row_id = "";
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
	$('#ios_check').change(function() {
   if($(this).is(":checked")) {
       $("#ios_table").css("display", "block");
	   	  $('#ios_file_first').addClass('multi');

	   
   }else {
             $("#ios_table").css("display", "none");
			 $('#ios_file_first').removeClass('multi');
       }
   //'unchecked' event code
});
$('#android_check').change(function() {
   if($(this).is(":checked")) {
	  // document.getElementById('android_table').style.display='block';
       $("#android_table").css("display", "block");
	   $('#android_file_first').addClass('multi');
   }else {
	   //document.getElementById('android_table').style.display='none';
           $("#android_table").css("display", "none");
		   $('#android_file_first').removeClass('multi');
			
       }
   //'unchecked' event code
});
$('#windows_check').change(function() {
   if($(this).is(":checked")) {
       $("#windows_table").css("display", "block");
	    $('#windows_file_first').addClass('multi');
   }else {
             $("#windows_table").css("display", "none");
			 $('#windows_file_first').removeClass('multi');
       }
   //'unchecked' event code
});
$('#linux_check').change(function() {
   if($(this).is(":checked")) {
       $("#linux_table").css("display", "block");
	   $('#linux_file_first').addClass('multi');
   }else {
             $("#linux_table").css("display", "none");
			 $('#linux_file_first').removeClass('multi');
       }
   //'unchecked' event code
});
$('#osx_check').change(function() {
   if($(this).is(":checked")) {
       $("#osx_table").css("display", "block");
	   $('#osx_file_first').addClass('multi');
   }else {
             $("#osx_table").css("display", "none");
			 $('#osx_file_first').removeClass('multi');

       }
   //'unchecked' event code
});
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
/** IOS FUNCTION ADD **/
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
  function deleteRows(table_prifix,tablerowId) {
	  $('#Email_sucess_transfer').show();
	  global_table_prefix = table_prifix;
      global_table_row_id = tablerowId;
	  
	 	
	  
  }
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
  /** IOS FUNCTION ADD  */
</script> 

<!-- AdminLTE App --> 
<script src="../../dist/js/app.min.js"></script> 

<!-- SlimScroll 1.3.0 --> 
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script> 
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
            }
  }
	});
	
/*$('#jvalidate').validate({
    // your other plugin options
});*/

/*jQuery.validator.addClassRules({
  work_emp_name: {
    required: true,
    minlength: 2
  },
 $("#jvalidate").validate({
  rules: {
    program_file_first: {
    required: true
   }
 }
});
});*/


	
							

});
function alertDisappear() {
	$("#included_error_tour").css("display", "none");
}
function validateFileName() {
    $check = true;
    $(".multi").each(function(){
       var files = $(this).val(); 

        if(files=='') { 
           //alert("No document file selected");
		   $("#message_box").text("Upload file");
				//changePasswordError = 1; 
				$('#Email_sucess').show();
           $check = false;
           return false; // You don't want to loop, so exit each loop
		   
        }
    });

    return $check;
}
function validateCheckSumName() {
    $check = true;
    $(".checkSum").each(function(){
       var files = $(this).val(); 

        if(files=='') { 
           //alert("Please Fill Checksum");
		    //$("#message_box").text("Fill checksum");
				//changePasswordError = 1; 
				//$('#Email_sucess_message').show();
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
		var fileValidate = validateFileName();
		if (fileValidate) {
		}else {
			return false;
		}
		var ChkValidate = validateCheckSumName();
		if (ChkValidate) {
		}else {
			return false;
		}
       
		}else {
			var ext = $('#program_file_first').val();
			if(ext == "") {
    		//alert('Select a File');
			 $("#message_box").text("Upload file");
				//changePasswordError = 1; 
				$('#Email_sucess').show();
			return false;
}
			
		}
    });
});
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
