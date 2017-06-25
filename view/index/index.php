<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, minimal-ui" />
<title>Opens</title>
<link href="../../images/favicon.ico" rel="icon" type="image/ico" />
<script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/css3-animate-it.js"></script>
<script type="text/javascript" src="../../js/wow.min.js"></script>    
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
<script>
$('document').ready(function(){
	jQuery(function ($) {
		var wow = new WOW({
			mobile: false
		});
		wow.init();
	}());
});
</script> 
  
</head>
<body class="page-banner">
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php');?></header>
<div id="carousel-example" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="item active"><div class="banner_img"><img src="../../images/banner.jpg" class="img-responsive" alt="" title="" /></div>
      <div class="container">
        <div class="relative text-left">
          <div class="carousel-caption">
            <h1 class="animated fadeInUp">e-Book streaming DRM, <br/>
              OPENS2 released!</h1>
            <p class="animated fadeInUp">Try using both streaming and downloaded e-Book <br/>
              files on the e-Book viewer no matter the size.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="sprit_bg">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6">
        <h2>The best way to protect your e-Book contents is <span class="st">OPENS DRM.</span></h2>
        <p>Check out our options and features included.</p>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="inside_data_tutorials"><a href="../../view/tutorial/tutorials.php" class="btn btn-info">Try Tutororial</a> <span>or <a href="#">learn more</a>.</span> </div>
      </div>
    </div>
  </div>
</div>
<section class="main-content home_content">
	<section class="overview_row">
    	<div class="container">
        <h3>OPENS <strong>Overview</strong></h3>
        <p>OPENS (Open EPUB Encryption System) DRM is a technology that encrypts EPUB eBooks and allows protected e-books to be viewed only by authorized users or devices based on licenses.</p>
        <p>OPENS DRM conforms to the W3C XML Encryption and W3C XML Signature standards recommended by the EPUB standard and is based on the X.509 certificate standard established as an international standard to provide a strong level of security . In addition, when the purchased e-book is used in the viewer, it can be browsed by downloading and streaming method, thereby providing a convenient e-book utilization environment for the user.</p>
        </div>
    </section>
	<section class="overview_row">
    	<div class="container">
         <h3>OPENS DRM <strong>Features</strong></h3>
         <div class="row">
        	<div class="col-sm-6">
            	<div class="Block_list wow fadeInLeft">
                	<span class="icon_box">
                    	<img src="../../images/iso_icon.png" alt="" title="" />
                    </span>
                    <h4>Support national and international standards</h4>
                    <ul>
                    	<li><span>Complies with KS national standards, conforms to IDPF EPUB security guidelines</span></li>
                        <li><span>Readium Licensed Content Protection (LCP) support</span></li>
                    </ul>
                </div>
            	<div class="Block_list wow fadeInLeft">
                	<span class="icon_box">
                    	<img src="../../images/integration_icon.png" alt="" title="" />
                    </span>
                    <h4>Easy integration</h4>
                    <ul>
                    	<li><span>Provides standard interface between EPUB Reader and DRM client</span></li>
                        <li><span>Multiple DRM client modules linked in one EPUB Reader</span></li>
                    </ul>
                </div>
            	<div class="Block_list wow fadeInLeft">
                	<span class="icon_box">
                    	<img src="../../images/share_icon.png" alt="" title="" />
                    </span>
                    <h4>Reliable eBook distribution</h4>
                    <ul>
                    	<li><span>Provides encrypted EPUB files for eBook production, distribution, and consumption</span></li>
                        <li><span>Security vulnerability can be solved at e-book supply stage</span></li>
                    </ul>
                </div>
            	<div class="Block_list wow fadeInLeft">
                	<span class="icon_box">
                    	<img src="../../images/book_icon.png" alt="" title="" />
                    </span>
                    <h4>Support various browsing methods</h4>
                    <ul>
                    	<li><span>Choice of e-book viewing (download / streaming)</span></li>
                        <li><span>Streaming method does not require additional server</span></li>
                    </ul>
                </div>                                                
            </div>
        	<div class="col-sm-6">
            	<div class="Block_list wow fadeInRight">
                	<span class="icon_box">
                    	<img src="../../images/security_icon.png" alt="" title="" />
                    </span>
                    <h4>Strong security</h4>
                    <ul>
                    	<li><span>Using the AES-256-CBC algorithm, RSA-2048 algorithm</span></li>
                        <li><span>Prevents hacking with reverse engineering techniques</span></li>
                    </ul>
                </div>
            	<div class="Block_list wow fadeInRight">
                	<span class="icon_box">
                    	<img src="../../images/thumb_icon.png" alt="" title="" />
                    </span>
                    <h4>Easy to use</h4>
                    <ul>
                    	<li><span>No need to build a separate server with cloud service</span></li>
                        <li><span>Simple user authentication and device authentication services</span></li>
                    </ul>
                </div>
            	<div class="Block_list wow fadeInRight">
                	<span class="icon_box">
                    	<img src="../../images/modules_icon.png" alt="" title="" />
                    </span>
                    <h4>Support for various business models</h4>
                    <ul>
                    	<li><span>Choice of service conditions when offering e-books</span></li>
                        <li><span>Authentication method, period, print, copy, etc.</span></li>
                    </ul>
                </div>
            	<div class="Block_list wow fadeInRight">
                	<span class="icon_box">
                    	<img src="../../images/various_icon.png" alt="" title="" />
                    </span>
                    <h4>Various OS support</h4>
                    <ul>
                    	<li><span>Can run on various OS platforms</span></li>
                        <li><span>iOS, Android, OSX, Windows</span></li>
                    </ul>
                </div>                  
            </div>            
        </div>
        </div>
    </section> 
    <section class="conceptual_diagram">
    	<div class="container">
        	<h3>Conceptual <strong>Diagram</strong></h3>
        </div>
        <div class="diagram_Bg">
          <div class="container">  	
            	<div class="text-center wow fadeInUp"><img src="../../images/diagram.png" alt="" title="" class="img-responsive" /></div>
           </div>
        </div>
    </section>  
    <section class="video_row">
    	<div class="container">
        	<h3>Demo <strong>Video</strong></h3>
    		<div class="text-center"><iframe class="embed-responsive-item img-responsive" src="//www.youtube.com/embed/ePbKGoIGAXY" width="780" height="385"></iframe></div>
        </div>
    </section> 
    <section class="patent_row">
    	<div class="container">
        	<h3>Our <strong>Patent</strong></h3>
	<div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">Patent name</th>
                    <th class="text-center">Division</th>
                    <th>Registration #</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                  <tr>
                    <td>An efficient management and operation method of the license on the digtal rights management system</td>
                    <td>Patent registration</td>
                    <td>1010738360000</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </section>
</section>
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php');?></footer>
</body>
</html>