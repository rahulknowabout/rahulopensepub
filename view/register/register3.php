<?php session_start();
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
        <div class="box verify-box">
            <h1>Verification <b>is completed.</b></h1>
             <p>You can start OPENS now!</p>
            <a href="../../index.php" class="btn btn-info btn-lg btn-block">Home</a>
        </div>
    </div>
</section>    
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php');?></footer>
</body>
</html>