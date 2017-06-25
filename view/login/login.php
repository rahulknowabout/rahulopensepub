<?php 
if((isset($_COOKIE['member_login']) && $_COOKIE['member_login']!= "" && isset($_COOKIE['member_password']) && $_COOKIE['member_password']!= "")) {
	header('location:../../index.php');
	
}elseif(isset($_SESSION['member_login']) && $_SESSION['member_login']!= "" && isset($_SESSION['member_password']) && $_SESSION['member_password']!= "") {
	header('location:../../index.php');
}
?>
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
  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>

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
        <div class="box login-box">
           <h1><b>Login</b></h1>
             <form method="post" name="login_form" id="login_form" action="">
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email"> 
              </div>
                  <div class="form-group">
                   <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password"> 
                  </div> 
                <div id="remember" class="checkbox">
                  <label class="ui-checkbox">
                    <input type="checkbox" value="check1" name="checkbox1" id="checkbox1">
                    <span>Remember me</span>
                   </label>
                </div>
                 <div style="height:20px;"></div>
              <button type="submit" class="btn btn-info btn-lg btn-block">Login</button>
            </form> 
            <div class="create_note"><p><a href="findpw.php">Forgot your password?</a></p></div>
        </div>
    </div>
</section>
    
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php');?></footer>
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
</body>
 <style>
           .login-dialog .modal-dialog {
                width: 300px;
				color:hsla(0,0%,0%,1.00);
				
            }
			
        </style>
<script>
function hideModal() {
	$('.modal').hide();
}
 $(document).ready(function(){
	 $('#login_form').submit(function(e) {
		 e.preventDefault();
	var email = $('#email').val();
	var pwd =  $('#pwd').val();	
	if($("#checkbox1").is(':checked')) {
    //alert("check");  // checked
	var checkValue = '1';
	}
else {
	var checkValue = '0';
    //alert("uncheck");
}
			$.ajax({
        url: "../../ajax/login.php",
        type: 'POST',
        data: "email="+email+"&pwd="+pwd+"&checkValue="+checkValue,
        success: function (data) {
			//alert(data);
			if(data == 1 ){
				window.location.href = "../../view/user/changepw.php"
				
			}else if(data == 2){
				//alert("Email not Verified");
				$("#message_box").text("Email not Verified");
				$('.modal').show();
			}else {
				$("#message_box").text("Please Check Your Email or Password");
				$('.modal').show();
				//alert("Please Check Your Email or Password");
			}

			
        }
  });
			
		
});
 });
  /* BootstrapDialog.show({
            title: 'Sign In',
            message: 'Your sign-in form goes here.',
            cssClass: 'login-dialog',
            buttons: [{
                label: 'Sign In Now!',
                cssClass: 'btn-primary',
                action: function(dialog){
                    dialog.close();
                }
            }]
        });*/
        


</script>

</html>