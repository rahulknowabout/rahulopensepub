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
    <form method="post" name="login_form" id="login_form" action="../../controller/register/forgot.php">
        <div class="box verify-box f_box_password">
            <h1>Forgot <b>your password?</b></h1>
            
             <p>Please enter your email address when you sign up. We’ll send a password reset link to your email account.</p>
              <div class="form-group">
                <input class="form-control" id="email" placeholder="Email" type="email" name="email"> 
                <span class="error" <?php if(isset($_GET['errorCode']) && $_GET['errorCode'] == 1) {}else{ ?> style="display:none;" <?php } ?> >Email not found.</span>
              </div>                 
            <button type="submit" class="btn btn-info btn-lg btn-block">Send</button>        
           </div> 
        </form>     
    </div>
</section>    
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php');?></footer>
<?php if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
<div class="modal fade in" id="Email_sucess" role="dialog"  style="display:block;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg">Email sent.</p>
        </div>
        <div style="height:20px;"></div> 
      <a href="../../index.php" class="btn btn-info">OK</a>
    </div>
  </div>
</div>
</div> 
<div class="modal-backdrop fade in"></div>
<?php } ?>
</body>
</html>