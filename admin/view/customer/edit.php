<?php include_once('../../check_login.php'); 
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


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Customer Management Edit</title>
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
        <div class="Form_Inside edit_data">
          <form role="form" class="form-horizontal" id="jvalidate" role="form" enctype="multipart/form-data" method="post" action="../../controller/customer/customer.php">
            <h2>User info</h2>
            <div class="form-group">
              <label class="col-sm-4 col-md-3" for="inputName">Register Date</label>
              <div class="col-sm-8 col-md-5 ">
                <p><?php echo date('Y-m-d',strtotime($singleCustomer['user_reg_date'])); ?></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3" for="inputEmail1">Name</label>
              <div class="col-sm-8 col-md-5">
                <input class="form-control" name="user_name" id="user_name" value="<?php echo $singleCustomer['user_name']; ?>" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3">Email (ID)</label>
              <div class="col-sm-8 col-md-5">
                <p><?php echo $singleCustomer['user_email']; ?></p>
              </div>
            </div>
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3">Password</label>
              <div class="col-sm-8 col-md-5"> <a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#ChangePassword">Change Password</a> </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3" for="country">Country</label>
              <div class="col-sm-8 col-md-5">
              <input type="text"  name="user_country" class="form-control" value="<?php echo $singleCustomer['user_country']; ?>"/>
                
              </div>
            </div>
            <div class="form-group btn_add">
              <label class="col-sm-4 col-md-3" for="level">Level</label>
              <div class="col-sm-8 col-md-5">
                <div class="row">
                  <div class="col-sm-3">
                    <p><?php echo ( $singleCustomer['user_level'] == 1 )? "<span style='font-size:16px;margin-left:4px;margin-right:6px;'>L1<span>" :(( $singleCustomer['user_level'] == 2 )? "<span style='font-size:16px;margin-left:4px;margin-right:6px;'>L2</span>" :(( $singleCustomer['user_level'] == 3 )? "<span style='font-size:16px;margin-left:4px;margin-right:6px;'>L3</span>" : ("Not Available"))); ?></p>
                  </div>
                  <div class="col-sm-9"><a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#ChangeLevel">Change Level</a></div>
                </div>
              </div>
            </div>
            <div style="height:30px;"></div>
             <?php if(isset($singleCustomer['user_level']) && ($singleCustomer['user_level'] == 2 || $singleCustomer['user_level'] == 3)) { ?>
            <h2>Company info</h2>
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="Cname">Company name</label>
              <div class="col-sm-8 col-md-5">
                <input class="form-control" name="user_company_name" value="<?php echo $singleCustomer['user_company_name']; ?>" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3" for="Caddress">Company address</label>
              <div class="col-sm-8 col-md-5">
                <input class="form-control" name="user_company_address" value="<?php echo $singleCustomer['user_company_address']; ?>" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3" for="CPnumber">Company phone number</label>
              <div class="col-sm-8 col-md-5">
                <input class="form-control" name="user_company_phone" value="<?php echo $singleCustomer['user_company_phone']; ?>" type="text">
              </div>
            </div>
            <?php  } ?>
            <div class="row footer_btn">
              <div class="col-sm-4">
                <div class="pull-left"> <a href="list.php" class="btn btn-outline">Back to List</a> </div>
              </div>
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $singleCustomer['user_id']; ?>" />
              <div class="col-sm-8">
                <div class="pull-right">  <button class="btn btn-info" type="submit" name="editsubmit" value="editsubmit">Done</button></div>
                 
                              
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
  <!-- Modal -->
  <div class="modal fade ChangePassword" id="ChangePassword" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><b>Change</b> password</h3>
          <div class="modal-pp">
            <p>Use the form below to change the password for your OPENS account <b>Your password must have :</b> English alphanumeric characters within 8 to 20 characters</p>
          </div>
          <form method="post" name="changepasswordA" id="changepasswordA" action="../../controller/user/useredit.php">
           
            <div class="input-group2">
         <div class="form-group">
           <input class="form-control" id="pwd" placeholder="Password" name="pwd" required type="password">
                 <span id="pwdspan"></span>
          </div>
           <div class="form-group"> <input class="form-control" id="repeatpwd" name="repeatpwd" placeholder="Re-enter the Password" required type="password">
                  <span id="repeatpwdspan"></span>                   </div>
       </div>
            <div class="footer_poup">  <button class="btn btn-outline" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-info" name="editchangepassword"  value="editchangepassword">Save Changes</button><!--<button type="button" class="btn btn-info" data-dismiss="modal">Save Changes</button>-->
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
              <div class="userId"><b>User ID : <?php echo $cleaned['user_id'];  ?></b></div>
              <div class="userName"><b>Name : <?php echo $singleCustomer['user_name'];  ?></b></div>
            </div>
            <ul class="br_level">
              <li>Current Level</li>
              <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
              <li>Change Level</li>
            </ul>
          </div>
          <form method="post">
            <div class="row_star">
              <div class="row">
                <div class="col-sm-6">
                  <p class="level_add"><?php echo ( $singleCustomer['user_level'] == 1 )? "<span style='font-size:16px;margin-left:4px;margin-right:6px;'>L1<span>" :(( $singleCustomer['user_level'] == 2 )? "<span style='font-size:16px;margin-left:4px;margin-right:6px;'>L2</span>" :(( $singleCustomer['user_level'] == 3 )? "<span style='font-size:16px;margin-left:4px;margin-right:6px;'>L3</span>" : ("Not Available"))); ?></p>
                </div>
                <div class="col-sm-6">
                  <select class="form-control" id="level_number" name="level_number">
                   <?php if($singleCustomer['user_level'] == 1) {}else {?><option value="1" >L1</option> <?php } ?> <?php if($singleCustomer['user_level'] == 2) { }else {?><option value="2">L2</option> <?php } ?><?php if($singleCustomer['user_level'] == 3) { }else {?><option value="3" >L3</option><?php } ?>
                  </select>
                </div>
              </div>
            </div>
             <div class="footer_poup"> <button class="btn btn-outline" data-dismiss="modal">Cancel</button>
            <input type="hidden" name="user_id" value="<?php echo  $cleaned['user_id']; ?>"/>
            <button type="submit" name="change_level" class="btn btn-info" value="change_level" onClick="return ChangeLevel(<?php echo  $cleaned['user_id']; ?>)">  Save changes
                </button>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
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
	$("#pwd").blur(function(){
  //alert("hello");
  var pwd = $('#pwd').val();

 var pwdl = $('#pwd').val().length;
 	if(pwdl>20 || pwdl<8 ) {
		clength =false;	
	}else{
		clength =true;	
	}
 var Exp = /^[a-z0-9\-\s]+$/i;

if(!pwd.match(Exp) || !(clength) ){
   //alert("ERROR");
   $("#pwdspan").removeClass("msg okay");
   $("#pwdspan").addClass("msg not_okay");
   $("#pwdspan").html('<i class="fa fa-times-circle"></i>');
   equalpw =false; 
   errorFormA = true;	

}else{
	//alert("SUCCESS");
	$("#pwdspan").removeClass("msg not_okay");
	$("#pwdspan").addClass("msg okay");
    $("#pwdspan").html('<i class="fa fa-check-circle"></i>');
	equalpw =true; 
	errorFormA =false;	
}
    //alert("SUCCESS");*/
});

$("#repeatpwd").blur(function(){
  //alert("hello");
  var pwd = $('#pwd').val();
  var repeatpwd = $('#repeatpwd').val();
  
 	if( pwd === repeatpwd) {
		var equalpws = true;	
	}else{
		var equalpws =false;	
	}
 if( !(equalpws) || !(equalpw) ){
   //alert("ERROR");
   $("#repeatpwdspan").removeClass("msg okay");
   $("#repeatpwdspan").addClass("msg not_okay");
   $("#repeatpwdspan").html('<i class="fa fa-times-circle"></i>');
   errorFormB =true;	
}else{
	//alert("SUCCESS");
	$("#repeatpwdspan").removeClass("msg not_okay");
	$("#repeatpwdspan").addClass("msg okay");
    $("#repeatpwdspan").html('<i class="fa fa-check-circle"></i>');
	errorFormB =false;	
}
    //alert("SUCCESS");*/
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
 <script type='text/javascript' src='../../js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='../../js/plugins/validationengine/jquery.validationEngine.js'></script>  
        <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.js'></script>
         <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.hooks.js'></script> 
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script> 
         <script>
		$(function() {
	//alert("hello");

   
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Please select an item!");
  $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "ID must contain only letters, numbers, or dashes.");
	$.validator.addMethod("loginPhone", function(value, element) {
        return this.optional(element) || /^[0-9\-+\s]+$/i.test(value);
    }, "ID must contain only letters, numbers, or dashes.");
	jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Letters and spaces only please"); 
	
	var jvalidate_edit = $("#jvalidate").validate({
     ignore: [],
                rules: {                                            
                        user_name: { required:true,
						lettersonly: true,
						maxlength: 50
						 },
						user_company_name: { required:true,
									  loginRegex: true,
						maxlength: 50
						 },
						 user_company_address: { required:true,
									  loginRegex: true,
						maxlength: 100
						 },
						 user_company_phone: { required:true,
									  loginPhone: true,
						maxlength: 15
						 },
						  				
                       
                }                                        
                }); 			

});
function ChangeLevel(userid) {
	level_number =$('#level_number').val();
	//alert(level_number);
	 $.post("../../ajax/change_level.php", { level_number: level_number,userid: userid},
            function(data){
				//alert(data);
				console.log(data);
				if(data == 1) {
				
				
				}else {}
				$('#ChangeLevel').modal("hide");
				//location.reload();
               //button.addClass('pressed');
              // button.html("Playing!") ;
            }
        );
		$('#Email_sucess').show();
		
	return false; 	
}
function hideModal() {
	$('#Email_sucess').hide();
	location.reload();
	//$('#ChangePassword').hide();
}
$('#changepasswordA').submit(function(e) {
	              pwds = $('#pwd').val();
				 repeatpwds = $('#repeatpwd').val();
			
				if ( pwds == '' || repeatpwds == ''   ) {
					return false;	
				} 
				if ( errorFormB || errorFormA ) {
					return false;	
				} 
				 e.preventDefault();
				user_id = $('#user_id').val();
				$.ajax({
        url: "../../ajax/changepw.php",
        type: 'POST',
        data: "user_id="+user_id+"&pwds="+pwds,
        success: function (data) {
			//alert(data);
			if (data == 1) {
				$('#ChangePassword').modal("hide");
				$("#message_box").text("Something Error");
				changePasswordError = 1; 
				$('#Email_sucess').show();
			}else{
				$('#ChangePassword').modal("hide");
				$("#message_box").text("Password changed");
				changePasswordError = 0;
				$('#Email_sucess').show();
			}

			
        }
  });
  });
</script> 
</body>
</html>
