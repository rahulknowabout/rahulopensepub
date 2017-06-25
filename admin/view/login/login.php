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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper"> 
  <!-- Header -->
  <header id="main_header" class="main-header"><?php include_once('../header/headert.php') ?></header>
  <!-- Left Sidebar -->
  <aside id="main_sidebar" class="main-sidebar"><?php //include_once('../header/LeftSidebar.php') ?></aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="width_define"> 
      <!-- Content Header (Page header) -->
      <section class="content-header">
       <h1><b>Login</b></h1>
      </section>
      
      <!-- Main content -->
      <section class="main-content">
    <div class="container">        
        <div class="box login-box">
           
             <form method="post" name="login_form" id="login_form"  action="../../controller/login/login.php">
              <div class="form-group">
                <input type="text" name="login_id" id="login_id" class="form-control" placeholder="ID"/>
              </div>
                  <div class="form-group">
                     <input type="password" name="login_password" id="login_password" class="form-control" placeholder="Password"/>
                  </div> 
                
                 <div style="height:20px;"></div>
              <button type="submit" class="btn btn-info btn-lg btn-block">Login</button>
            </form> 
            
        </div>
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
  
  <!-- message model -->
  <div class="modal fade in" id="Email_sucess" role="dialog"  style="display:none;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg" id="message_box">Your ID And Password Wrong</p>
        </div>
        <div style="height:20px;"></div> 
      <button class="btn btn-info" onClick="hideModal()">OK</button>
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
<script type="text/javascript">
$(document).ready(function() {
	
	
	
	// Menu active function
	
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
                <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../../js/plugins.js"></script>        
        <script type="text/javascript" src="../../js/actions.js"></script> 
</script>
<script type="text/javascript">
		
$(function() {
	$.validator.setDefaults({
    highlight: function(element, errorClass) {
        var $element = $(element);
        // Add the red outline.
        $element.parent().addClass(errorClass);
        // Add the red cross.
        $element.siblings(".error_status").addClass("check");
    },
    unhighlight: function(element, errorClass) {
        var $element = $(element);
        // Remove the red cross.
        $element.siblings(".error_status").removeClass("check");
        // Remove the red outline.
        $element.parent().removeClass(errorClass);
    }
});

    

            var jvalidate = $("#login_form").validate({
                ignore: [],
                rules: {                                            
                        login_id: {
                                required: true,
                                
                        },
                        
                        login_password: {
                                required: true,
						}
                    }                                        
                }); 

});

function hideModal() {
	$('#Email_sucess').hide();
	window.location.href="login.php";
	//location.reload();
	//$('#ChangePassword').hide();
}
 </script>
 <?php
 if(isset($_GET['error_code']) && $_GET['error_code']=='L1'){
?>
<script>
$('#Email_sucess').show();
  </script>>
  
<?php			
			
			
	}
 
 ?>

</body>



   
</html>






