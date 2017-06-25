<?php include_once('../../check_login.php'); 
  include('../../modal/admng/admng.php');
$admin_info = selectAdmin();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Admin Edit</title>
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
        <h1> <b>Admin</b> Edit </h1>
      </section>
      
      <!-- Main content -->
      <section class="content member_page">
        <div class="Form_Inside edit_data">
          <form id="jvalidate" role="form" class="form-horizontal" method="post" action="../../controller/admng/admng.php">
            
            
            
            
            
            
            
            <div style="height:30px;"></div>
             
            
            <div class="form-group">
              <label class="col-sm-4 col-md-3 col-lg-3" for="Cname">Name</label>
              <div class="col-sm-8 col-md-5">
                <input class="form-control" name="admin_id" id="admin_id" value="<?php echo $admin_info['admin_id']; ?>" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-md-3" for="Caddress">Password</label>
              <div class="col-sm-8 col-md-5">
                <input class="form-control" type="password"  name="admin_password" id="password2" value="">
              </div>
            </div>
            <div class="row footer_btn">
               <div class="col-sm-3">
                
                 
                              
              </div>
              
              <div class="col-sm-8">
                <div>  <button class="btn btn-info" type="submit" name="editsubmit" value="editsubmit">Submit</button></div>
                 
                              
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
  
  
  <!-- change level Modal -->
  
  <!-- message model -->
  
  <!-- message model -->
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.2.3 --> 
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="../../bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {$(".sidebar-menu > li").removeClass("active");
	  // add class to the one we clicked
	  $("#alist").addClass("active");});

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

    $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "ID must contain only letters, numbers, or dashes.");
	
	 $.validator.addMethod("Password", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "Password must contain only letters, numbers, or dashes.");
	

            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        admin_id: {
                                required: true,
                                loginRegex: true,
								minlength: 3,
								maxlength: 10
                        },
                        
                        admin_password: {
                                required: true,
								Password:true,
                                minlength: 8,
                                maxlength: 20
                        }
                       
                    }                                        
                }); 

});
 </script>
 <script>$(document).ready(function(){
	$("#admin_id").blur(function(){
  var pwd = $('#admin_id').val();;
var Exp = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

if(!pwd.match(Exp)){}
    //alert("ERROR");
else{}
    //alert("SUCCESS");
});
  });
</script>        
          
</body>
</html>
