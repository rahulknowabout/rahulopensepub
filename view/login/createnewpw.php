<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, minimal-ui" />    
  <title>Opens</title>
  <link href="../../images/favicon.ico" rel="icon" type="image/ico" />
  <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
  <link href="../../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
  <link href="../../css/animate.css" type="text/css" rel="stylesheet" />
  <link href="../../css/style.css" type="text/css" rel="stylesheet" />
<!--<script type="text/javascript"> 
$(document).ready(function(){
  $("#top_part").load("inc/top_part.html");
  $("#main_header").load("inc/header.html"); 
  $("#main_footer").load("inc/footer.html"); 
});
</script>-->    
</head>
<body>
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php');?></header>
<section class="main-content">
    <div class="container">
        <div class="box verify-box f_box_password update_password">
            <h1>Create <b>new password</b></h1>
             <p>Please enter your new password.</p>
            <form name="register_form" id="register_form" action="../../controller/register/updatepassword.php" method="post">
                <div class="input-group2">
                  <div class="form-group">
                   <input class="form-control" id="pwd" placeholder="Password" name="pwd" required type="password">
                      <span class="msg info"><a href="javascript:;" data-placement="top" data-toggle="popover" title="Your password must have :" data-content="English alphanumeric characters within 8 to 20 characters
"><i class="fa fa-info-circle"></i></a></span>
                      <span id="pwdspan"></span>
                        <script>
                            $(document).ready(function(){
                                $('[data-toggle="popover"]').popover();
                            });
                        </script>                       
                  </div>
                  <div class="form-group"> <input class="form-control" id="repeatpwd" name="repeatpwd" placeholder="Re-enter the Password" required type="password">
                  <span id="repeatpwdspan"></span>                   </div>
            </div> 
            <input class="form-control"  name="key1"  type="hidden"  value="<?php if(isset($_GET['key1']) && $_GET['key1']!= ""){echo $_GET['key1'];  } ?>">
            <input class="form-control"  name="key2"  type="hidden"  value="<?php if(isset($_GET['key2']) && $_GET['key2']!= ""){echo $_GET['key2'];  } ?>">
                <button type="submit" class="btn btn-info btn-lg btn-block">Save changes</button>
            </form>
            
        </div>      
    </div> 
</section>    
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php');?></footer>
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
        return this.optional(element) || /^[a-z\-\s]+$/i.test(value);
    }, "Cannot input numbers, special symbols, can not input more than 50 bytes");
	
	 $.validator.addMethod("Password", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "Password must contain only letters, numbers, or dashes.");
	

            var jvalidate = $("#register_form").validate({
                ignore: [],
                rules: {                                            
                       
                        
                        pwd: {
                                required: true,
								Password:true,
                                minlength: 8,
                                maxlength: 20
                        },
						 repeatpwd : {
						 required: true,	 
                    	 equalTo : "#pwd"
                }

                       
                    }                                        
                }); 

});
 </script>
 <script>
 var equalpw = false;
var errorFormA = false; 
var errorFormB = false; 
var errorFormC = true; 

 $(document).ready(function(){
  $("#pwd").blur(function(){
  //alert("hello");
  var pwd = $('#pwd').val();

 var pwdl = $('#pwd').val().length;
 	if(pwdl>20 || pwdl<8 ) {
		var clength =false;	
	}else{
		var clength =true;	
	}
 var Exp = /^[a-z0-9\-\s]+$/i;

if(!pwd.match(Exp) || !(clength) ){
   //alert("ERROR");
   $("#pwdspan").removeClass("msg okay");
   $("#pwdspan").addClass("msg not_okay");
   $("#pwdspan").html('<i class="fa fa-times-circle"></i>');
   equalpw =false; 
   errorFormA =true;	

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
</body>
</html>