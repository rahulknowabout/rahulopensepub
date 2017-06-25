<?php include_once('../../check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Registration of Contract Details</title>
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
        <h1> <b>Registration</b> of Contract Details </h1>
        <span class="alert-danger" id="included_error_tour" <?php if(isset($_GET['Error_Code']) && $_GET['Error_Code'] == 'dup'){ ?> style="display:block;"  <?php }else{ ?> style="display:none" <?php } ?> onClick="alertDisappear();">This Company Contract History Exist, Please Try Another</span> 
      </section>
      
      <!-- Main content -->
      <section class="content member_page">
        <div class="Form_Inside edit_data">
          <form  id="jvalidate" role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="../../controller/contract_history/contract_history.php">
            <h2>Contract Details</h2>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="Cname">Company Name*</label>
              <div class="col-md-6 col-sm-8">
               <!-- <input class="form-control" id="Cname" placeholder="" type="text">--><input type="text" name="company_name" class="form-control" value="" style="width:100%;height:100%;"/>
               
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompanyCategory">Company Category*</label>
              <div class="col-md-6 col-sm-8">
                <div class="select-style">
                  <select class="form-control" name="company_category" id="company_category">
                   <option value="E_book_distributor">E-book distributor</option><option value="eBook_broker">eBook broker</option><option value="writer">writer</option><option value="publisher">publisher</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3">Contract Date*</label>
              <div class="col-md-6 col-sm-8">
                <div class="start_date ContractDate">
                  <!--<input id="ContractDate" class="form-control" placeholder="DD/MM/YYYY" />-->
                  <input type="text" name="contract_date" id="contract_date" class="form-control datepicker" value="" />
                  <i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i> </div>
              </div>
            </div>
            <div class="form-group Contract_Period">
              <label class="col-sm-4 col-md-3 col-lg-3">Contract Period*</label>
              <div class="col-md-7 col-sm-12 ContractDate">
                <div class="start_date MobileMasterSpace">
                 <!-- <input id="startdate" class="form-control" placeholder="DD/MM/YYYY" />--><input type="text" name="contract_period_start_date" id="contract_period_start_date" class="form-control datepicker" value="<?php echo date('d/m/Y') ?>"/>
                  <i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i> </div>
                <span class="ico_tr">~</span>
                <div class="end_date">
                 <!-- <input id="enddate" class="form-control" placeholder="DD/MM/YYYY" />--><input type="text" name="contract_period_end_date" id="contract_period_end_date" class="form-control datepicker" value="<?php echo date('d/m/Y',strtotime('+1 years')); ?>" />
                  <i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i> </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CountryInformation">Country Information*</label>
              <div class="col-md-6 col-sm-8">
                <div>
                  <input type="text" class="form-control" name="country_info" id="country_info" value="<?php //echo $singleCustomer['user_name']; ?>" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompanyAdress">Company Adress*</label>
              <div class="col-md-9 col-sm-8">
                
                <input type="text" class="form-control" name="company_address" id="company_address" value="<?php //echo $singleCustomer['user_name']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompanyPhone">Company Phone # *</label>
              <div class="col-md-6 col-sm-8">
               <input type="text" class="form-control" name="company_phone" id="company_phone" value="<?php //echo $singleCustomer['user_name']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="ContactPerson">Contact Person</label>
              <div class="col-md-6 col-sm-8">
                <input type="text" class="form-control" name="contact_person" id="contact_person" value="<?php //echo $singleCustomer['user_name']; ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="ContactInformation">Contact Information</label>
              <div class="col-md-6 col-sm-8">
                <input type="text" class="form-control" name="contact_information" id="contact_information" value="<?php //echo $singleCustomer['user_name']; ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="ContactEmailAdress">Contact Email Adress</label>
              <div class="col-md-8 col-sm-8">
                <div class="row">
                  <div class="col-sm-6 col-xs-8">
                   <input type="text" class="form-control" name="contact_email_address" id="contact_email_address" value="<?php //echo $singleCustomer['user_name']; ?>" />
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="Remarks">Remarks</label>
              <div class="col-md-9 col-sm-8">
                <textarea class="form-control" name="remark" id="Remarks"></textarea>
              </div>
            </div>
            <div class="form-group upload">
              <label class="col-sm-4 col-md-3 col-lg-3">Business Registration</label>
              <!--<div class="col-md-6 col-sm-8">
                <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                <label for="file-1" class="btn btn-default btn-block file-btn"> Upload <span class="File_name_view">abcdefg.exe (1.1MB)</span>
                  <button><i class="fa custom_icon"><img src="../../dist/img/close.png" alt="" title=""></i></button>
                </label>-->
                 <div class="col-md-5 col-sm-8" id="row_file_td" >
                <input type="file" name="program_file_first" id="program_file_first" class="inputfile inputfile-1" onChange="programsetfilename(this.value,'first')"/>
               <!-- <label for="file-1" class="btn btn-default btn-block file-btn"> Upload <span class="File_name_view">abcdefg.exe (1.1MB)</span>-->
               <span  class="btn btn-default btn-block file-btn" name="program_button_first" onclick="document.getElementById('program_file_first').click();">Upload </span>
                 <span id="program_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"></span> 
                
              </div>
              </div>
             
            
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompanyRegistrationNumber">Company Registration Number</label>
              <div class="col-md-6 col-sm-8">
                <input type="text" class="form-control" name="company_regtration_number" id="company_regtration_number" value="<?php //echo $singleCustomer['user_name']; ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="CompnayCEO">Compnay CEO</label>
              <div class="col-md-6 col-sm-8">
               <input type="text" class="form-control" name="company_ceo" id="company_ceo" value="<?php //echo $singleCustomer['user_name']; ?>" />
              </div>
            </div>
            <div style="height:30px"></div>
            <span class="checkbox_design">
                <input type="checkbox" name="ios_check" id="ios_check" />
                <label for="ios_check"><span></span>Check for Product Registration </label></span>
                <span id="pregisteration" style="display:none;">
                <h2>Product Registration</h2>
  
           <div class="table-responsive">
              <table class="table row_tramp" id="data_table_ios">
              <tr>
                <td>Type</td>
                <td><div class="select-style">
                <select class="form-control" name="type_first"  onChange="displayProper(this.value,'first');"><option value="SDK">SDK</option><option value="Program">Program</option></select>
                    
                     
                    </select>
                  </div></td>
                <td>Product</td>
                <td><div class="select-style">
                <span id="program_span_first" style="display:none;"><select name="program_first" class="form-control"><option value="opens_packager">OPENS Packager</option></select></span><span id="sdk_span_first"><select name="sdk_first" id="sdk_first" class="form-control"><option value="c_sdk">Client SDK</option><option value="p_sdk">Packager SDK</option></select></span>
                   
                  </div></td>
                <td>OS</td>
                <td><div class="select-style" id="sdk_os_span_first">
                <span ><select name="sdk_os_first" class="form-control"><option value="ios">iOS</option><option value="android">Android</option><option value="windows">Windows</option><option value="linux">Linux</option><option value="osx">OSX</option></select></span>
                    
                  </div><span id="program_os_span_first" style = "display:none; text-align:center;"> ---- </span></td>
                <td><div class="row_btn">
                    <button type='button' name='buttonaddfirst'onClick='addRowIos()'><i class='fa fa-plus-circle' aria-hidden='true'></i></button>
                    <button type='button' name='buttondeletefirst'><i class='fa fa-minus-circle' aria-hidden='true'></i></button>
                  </div></td>
              </tr>
             
            </table>
			  </div>
              </span>
            <div class="row footer_btn">
              <div class="col-sm-4">
                <div class="pull-left"> <a href="list.php" class="btn btn-outline">Back to List</a> </div>
              </div>
              <div class="col-sm-8">
                <div class="pull-right"><button class="btn btn-info" type="submit" name="addsubmit" value="addsubmit">Done</button> </div>
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

 
 <script>
var global_table_prefix = "";
var global_table_row_id = "";
$(document).ready(function() {
	
	// header, footer and left part attachment
	/*jQuery("#main_header").load("inc/header.html");
	jQuery("#main_sidebar").load("inc/LeftSidebar.html");
	jQuery("#main_footer").load("inc/footer.html");*/
	
	// Menu active function
	$(".sidebar-menu > li").removeClass("active");
	 $('.treeview').removeClass('active');
     $("#servicelist").addClass('treeview active'); 
	 $("#chmlist").css("text-decoration","underline");
	
	$('select:focus').prev().css('background-color', '#eee');
	
	// Date function
	$("#startdate").datepicker({
		dateFormat: 'dd/mm/yy'
	});
	$("#contract_period_end_date").datepicker({
		dateFormat: 'yy/mm/dd'
		
	});
	$("#contract_date").datepicker({
		dateFormat: 'yy/mm/dd'
	});
	$("#contract_period_start_date").datepicker({
		dateFormat: 'yy/mm/dd'
	});
	
	// Calender function
	
	
// Input file function
	

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
<script type='text/javascript' src='../../js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
 <script type='text/javascript' src='../../js/plugins/validationengine/jquery.validationEngine.js'></script> 
 <script type='text/javascript' src='../../js/plugins/bootstrap/bootstrap-select.js'></script>  
 <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.js'></script>
 <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.hooks.js'></script> 
 <script type='text/javascript' src='../../js/plugins/moment.min.js'></script>
 <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>     
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../../js/plugins.js"></script>        
        <script type="text/javascript" src="../../js/actions.js"></script> 
<script type="text/javascript">
$(function() {
$.validator.addMethod("numericdot", function(value, element) {
        return this.optional(element) || /^[0-9.]+$/i.test(value);
    }, "Add Correct Version.");
/*jQuery.validator.addMethod("validDate", function(value, element) {
        return this.optional(element) || moment(value,"YYYY-MM-DD").isValid();
    }, "Please enter a valid date in the format YYYY-MM-DD");*/
	$.validator.addMethod("custom_number", function(value, element) {
    return this.optional(element) || value === "NA" ||
        value.match(/^[0-9,.!#$%@&()^'*+-=]+$/);
}, "Please enter a valid Phonenumber");
			
 $("#jvalidate").validate({
  rules: {
    company_name: {
		
      required: true
	 
      
    },
	
	contract_date: {
      required: true,
	  
      },
	  contract_period_start_date: {
      required: true
	  
      },
	
	  contract_period_end_date: {
      required: true
	  
      },
	
	 country_info: {
		required: true
	 },
	 company_address: {
		required: true
	 },
	
	 contact_email_address: {
		 email: true
	 },
	 company_phone: {
		 required: true,
		 custom_number: true
	 }
  }
	});
});
function displayProper(ptype,prefix) {
	//alert(ptype); 
	//alert(prefix); 
	if (ptype == 'Program') {
		$("#sdk_span_"+prefix).css("display", "none");
		$("#sdk_os_span_"+prefix).css("display", "none");
	    $("#program_span_"+prefix).css("display", "block");
		$("#program_os_span_"+prefix).css("display", "block");

	}
		if (ptype == 'SDK') {
	    
		$("#sdk_span_"+prefix).css("display", "block");
		$("#sdk_os_span_"+prefix).css("display", "block");

	    $("#program_span_"+prefix).css("display", "none");
        $("#program_os_span_"+prefix).css("display", "none");	}

	
 }
 function addRowIos() {
	  
	 
var table=document.getElementById("data_table_ios");
var table_len=(table.rows.length);
var tablerowId = Math.floor((Math.random() * 10000) + 1);
var row = table.insertRow(table_len).outerHTML="<tr id='row_ios_"+tablerowId+"'>\n\
									<td>Type</td><td><select class='form-control' name='type_product[]'  onChange = \"displayProper(this.value,"+tablerowId+")\" ><option value='SDK'>SDK</option><option value='Program'>Program</option></select></td><td>Product</td><td><div class='select-style'><span id='program_span_"+tablerowId+"' style='display:none;'><select name='program_name[]' class='form-control'><option value='opens_packager'>OPENS Packager</option></select></span><span id='sdk_span_"+tablerowId+"' ><select name='sdk_name[]'  class='form-control'><option value='c_sdk'>Client SDK</option><option value='p_sdk'>Packager SDK</option></select></span></div></td><td>OS</td><td><div class='select-style' id='sdk_os_span_"+tablerowId+"'><span ><select name='sdk_os[]' class='form-control'><option value='ios'>iOS</option><option value='android'>Android</option><option value='windows'>Windows</option><option value='linux'>Linux</option><option value='osx'>OSX</option></select></span></div><span id='program_os_span_"+tablerowId+"' style = 'display:none;text-align:center;'>----</span></td><td class = 'text-center' style='width:100px;'><div class='row_btn'><button type='button' name='buttonaddfirst_"+tablerowId+"' onClick='addRowIos()'><i class='fa fa-plus-circle' aria-hidden='true'></i></button><button type='button' name='buttondeletefirst_"+tablerowId+"' onClick='deleteRows(\"row_ios_\",\""+tablerowId+"\");'><i class='fa fa-minus-circle' aria-hidden='true'></i></button></td></div>\n</tr>"; 
									
								   
  }
  function deleteRows(table_prifix,tablerowId) {
	  $('#Email_sucess_transfer').show();
	  global_table_prefix = table_prifix;
      global_table_row_id = tablerowId;
	  
  }
  $('#ios_check').change(function() {
   if($(this).is(":checked")) {
       $("#pregisteration").css("display", "block");
	   	 
	   
   }else {
             $("#pregisteration").css("display", "none");
			
       }
   //'unchecked' event code
});
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Byte';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
};
function programsetfilename(val,idprefix)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
	var filesize = $("#program_file_first")[0].files[0].size;
	//alert(filesize);
	var filesize = bytesToSize(filesize);
	//alert(filesize);
    document.getElementById("program_file_span_"+idprefix).innerHTML  = '<span style="padding-left:2px;padding-right:2px;">'+fileName+' ( '+filesize+' )<span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick=\"clearSpan(\'program_file_span_'+idprefix+'\',\'program_file_'+idprefix+'\')\"></i></span></span>';
  }
  function clearSpan(id,fileid) {
	 document.getElementById(id).innerHTML ="";
	 $("#"+fileid).val('');
  } 
  
  function tranferMemberShipfun(inquiry) {
	  table_prifix = global_table_prefix ;
      tablerowId = global_table_row_id ;
		$('#Email_sucess_transfer').hide();
		if(inquiry == 'no') {
			 
		}else {
			document.getElementById(""+table_prifix+""+tablerowId+"").outerHTML ="";
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