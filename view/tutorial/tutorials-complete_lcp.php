<?php require_once('../../config.php'); 
//echo $_SESSION['filedownload'];die;
		if(isset($_SESSION['filedownload']) && $_SESSION['filedownload'] == 1 ) {
			//echo $_SESSION['filedownload'];die;
			//$_SESSION['filedownload'] = 2;
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
    <link href="../../css/style.css" type="text/css" rel="stylesheet" /> </head>
<!--<script type="text/javascript"> 
$(document).ready(function(){
  $("#top_part").load("inc/top_part.html");
  $("#main_header").load("inc/header.html"); 
  $("#main_footer").load("inc/footer.html"); 
});
</script>-->    
</head>
<body class="page-banner">
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php'); ?></header>
<div class="advisor-banner-header">
<div class="advisor-background-banner" style="background: url('images/page_bg.jpg') no-repeat center 100%; background-size: cover;">
<div class="advisor-title-banner-header">
    <div class="container">
        <div class="page_inside">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><a href="#">Tutorials</a></li>
                <li>Tutorials</li>
            </ul>
            <h1>Tutorials</h1> </div>
    </div>
</div>
</div>
</div>
<section class="main-content">
<div class="container">
<div class="member_page">
    <h1>Tutorials</h1>
    <p>In the Tutorial, you can experience OPENS DRM, a certificate-based e-book encryption technology, and Readium LCP, a password-based e-book encryption technology. Select the DRM you want to experience and follow the steps below to test it. OPENS DRM and Readium LCP are commercial software, and for use outside of testing purposes, you must enter into a software license purchase contract.</p>
</div>
</div>
<div class="Form_Inside">
<ul class="nav nav-tabs">
    <li >
        <a data-toggle="tabdisable" href="#Certificate_DRM">
            <h3>Certificate-based eBook DRM <b>OPENS</b></h3> </a>
    </li>
    <li class="active">
        <a data-toggle="tab" href="#Password_DRM">
            <h3>Password-based eBook DRM <b>Readium LCP</b></h3> </a>
    </li>
</ul>
<div class="tab-content">
<div id="Certificate_DRM" class="tab-pane fade">
 <div class="container">
     <div class="Certificate_row">
         <img src="../../images/opens_DRM_applied.png" alt="" title="" class="img-responsive" />
     <p>The e-book you uploaded is protected by OPENS DRM and will be kept on the server until the download period shown at the bottom.<br/>
The encrypted EPUB file can also be found in Tutorials> History.</p>
        <div class="Download_Period">
            <h3 class="text-center"><b>Download Period :</b> Until 2017.03.06</h3>
            
            <div class="scan_file">
            
                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2F<?php echo SITE_BASE_URL_FILE."/storage/epub/lcp/".$_GET['success']; ?>m%2F&choe=UTF-8" style="width:80px;height:80px;"/>
                <h3>Download the file at
                <a href="tutorials-download.php?file=<?php echo $_GET['success']; ?>" target="_blank">http://opens.drm.nt/d4r87t</a></h3>
            </div>
            
        </div>
        </div>
<div class="Encrypt_eBook_btn"><a href="#" class="btn btn-info btn-lg btn-block">Guide to reading eBooks</a></div>     
 </div>    
</div>
<div id="Password_DRM" class="tab-pane fade in active">
  <div class="container">
     <div class="Certificate_row">
         <img src="../../images/opens_LCP_applied.png" alt="" title="" class="img-responsive" />
     <p>The e-book you uploaded is protected by OPENS DRM and will be kept on the server until the download period shown at the bottom. <br/>
The encrypted EPUB file can also be found in Tutorials> History.</p>
        <div class="Download_Period">
            <h3 class="text-center"><b>Download Period :</b> Until 2017.03.06</h3>
            <div class="scan_file">
                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2F<?php echo SITE_BASE_URL_FILE."/storage/epub/lcp/".$_GET['success']; ?>m%2F&choe=UTF-8" style="width:80px;height:80px;"/>
                <h3>Download the file at
                <a href="tutorials-download_lcp.php?file=<?php echo $_GET['success']; ?>" target="_blank">http://opens.drm.nt/d4r87t</a></h3>
                <!--<iframe src="tutorials-download.php" name="frame"></iframe></h3>-->
            </div>
        </div>
        </div>
<div class="Encrypt_eBook_btn"><a href="#" class="btn btn-info btn-lg btn-block">Guide to reading eBooks</a></div>     
 </div>
</div>    
</div>
</div>
</section>
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php'); ?></footer>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script>
  function callbackAjax() 
  {
	 $.ajax({
            type: 'GET',
            url: '../../ajax/callbacktest.php',
            
            success: function (response) {
			console.log(response);
				if(response == 1){
					//alert(response);
						window.location.href="../../index.php"
				}else{
					callbackAjax();
				}
				//alert(response);
				
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        }); 
  }
  $(document).ready(function() {
    $("#startdate").datepicker({ dateFormat: 'dd-mm-yy' });
      $("#enddate").datepicker({ dateFormat: 'dd-mm-yy' });
	   //cust_id = getParameterByName('customer_id');
//alert("heloo");
         $.ajax({
            type: 'GET',
            url: '../../ajax/callbacktest.php',
            
            success: function (response) {
				if(response == 1){
					console.log(response);
					//alert(response);
						window.location.href="../../index.php"
				}else{
					callbackAjax();
				}
            },
            error: function (xhr, ajaxOptions, thrownError) {
            }
        });
        
  });
  </script>
  
</body>

</html>