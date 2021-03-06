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
</script>   --> 
</head>
<body class="page-banner">
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php'); ?></header>
<div class="advisor-banner-header">
			<div class="advisor-background-banner" style="background: url('../../images/page_bg.jpg') no-repeat center 100%; background-size: cover;">
				<div class="advisor-title-banner-header">
					<div class="container">
                    <div class="page_inside">
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a></li>
                        <li>My info</li>
                    </ul>
                    <h1>My info</h1>
					</div>
                    </div>
				</div> 
			</div> 
		</div>    
<section class="main-content">
    <div class="container">
         
        <div class="member_page">
            <h1>My <b>info</b></h1>
            <p>You can edit your membership information.</p>
            <div class="Form_Inside">
            <form role="form" class="form-horizontal">
                <h2>My info</h2>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="inputName">Name</label>
                  <div class="col-md-4 col-sm-7"><input type="text" class="form-control" id="inputName" placeholder="John Smith"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="inputEmail1">Email</label>
                  <div class="col-md-4 col-sm-7"><input type="email" class="form-control" id="inputEmail1" placeholder="johnsmith@email.com"></div>
                </div>
                <div class="form-group btn_add">
                  <label class="col-sm-4 col-md-3 col-lg-2">Password</label>
                    <div class="col-md-4 col-sm-7">
                    <a href="#" class="btn btn-info">Change password</a>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="country">Country</label>
                    <div class="col-md-4 col-sm-7">
                    <select class="form-control" id="country">
                    <option>South Korea</option>
                    <option>America</option>
                    <option>India</option>
                    <option>Australia</option>
                  </select>
                </div>
                </div> 
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="level">Level</label>
                    <div class="col-md-4 col-sm-7">
                    <p>L2</p>
                </div>
                </div>                
                <div style="height:20px;"></div>
                <h2>Company info</h2>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="Cname">Company name</label>
                  <div class="col-sm-7"><input type="text" class="form-control" id="Cname" placeholder="DRM inside Co., Ltd"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="Caddress">Company address</label>
                  <div class="col-sm-7"><input type="text" class="form-control" id="Caddress" placeholder="105, Jungdae-ro, Songpa-gu, Seoul, Republic of Korea"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="CPnumber">Company phone number</label>
                  <div class="col-sm-7"><input type="text" class="form-control" id="CPnumber" placeholder="+82-2-430-7267"></div>
                </div> 
                <div class="form-group btn_add">
                  <label class="col-sm-4 col-md-3 col-lg-2">Transfer of <br/>membership rights</label>
                    <div class="col-md-4 col-sm-7">
                    <a href="#" class="btn btn-info btn-outline">Cancel permission for transfer</a>
                        <span class="status_msg">Status: Requesting</span>
                </div>
                </div>                
                <div style="height:70px;" class="Mobile_space"></div>
                <div class="form-group text-center">
                  <div class="btns_list">
                   <a href="#" class="btn btn-info btn-outline">Cancel</a>
                  </div>
                  <div class="btns_list">
                      <a href="#" class="btn btn-info">Save</a>
                  </div>                    
                </div>
              </form> 
            </div>
        </div>
    </div>
</section>    
<footer class="main-footer">
   <div class="container">
    <div class="row">
        <div class="col-sm-7 col-xs-12">
            <h4>Contact Us</h4>
            <img src="images/DRM_logo.png" alt="" title="" />
            <div class="info">
                <p><span class="min_title"><i class="fa fa-map-marker"></i> Address</span> (05719) #801, Karak ID Tower, 105, Jungdae-ro, Songpa-gu, Seoul, Korea</p>
                <ul class="ft_listing">
                    <li><span class="min_title"><i class="fa fa-phone"></i> Phone</span> (+82) 2-430-7267</li>
                    <li><span class="min_title"><i class="fa fa-envelope"></i> E-mail</span> <a href="#">(+82) 2-430-7267</a></li>
                    <li><span class="min_title"><i class="fa fa-facebook"></i> Facebook</span> <a href="#">facebook.com/drminside</a></li>
                </ul>
                <ul class="ft_listing">
                    <li><span class="min_title"><i class="fa fa-print"></i> Fax</span> (+82) 2-430-7268</li>
                    <li><span class="min_title"><i class="fa fa-globe"></i> Web</span> <a href="#">www.drminside.com</a></li>
                </ul>                
            </div>
        </div> 
        <div class="col-sm-4 col-sm-offset-1 col-xs-12">
            <h4>Informaition</h4>
            <ul class="links_ft">
                <li><a href="#">Conditions of Use</a></li>
                <li><a href="#">Privacy Notice</a></li>
                <li><a href="#">Company Info</a></li>
                <li><a href="#">Site Map</a></li>
            </ul>
        </div>
     </div>   
   </div>
</footer>
</body>
</html>