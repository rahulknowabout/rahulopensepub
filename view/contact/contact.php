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
<body class="page-banner contact-page">
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php'); ?></header>
    
<section class="main-content">
    <div class="container-fluid"> 
    <div id='gmap_canvas' class="gmap"></div>
<!--<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBdZyrT9Gk-OiOnhfb0YQ3p-JyAtaYHpac'></script>-->

<script type='text/javascript'>  

	   function init_map() {
	       var myOptions = {
	           zoom: 16,
	           center: new google.maps.LatLng(37.51453945732800, 127.10807722695800),
	           mapTypeId: google.maps.MapTypeId.ROADMAP
	       };
		   
			var MapIcon = '../../images/map_icon.png';
			
			map = new google.maps.Map(document.getElementById('gmap_canvas'),
	           myOptions);
	       marker = new google.maps.Marker({
	           map: map,
	           position: new google.maps.LatLng(37.51433945732627, 127.10247722695317),
			   icon: MapIcon
	       });


	       infowindow = new google.maps.InfoWindow({
	           content: '<strong>DRM inside Co., Ltd</strong><br>Songpa-gu, Korea<br>'
	       });
	       google.maps.event.addListener(marker, 'click', function() {
	           infowindow.open(map, marker);
	       });
	       // infowindow.open(map, marker);
	   }
	   google.maps.event.addDomListener(window, 'load', init_map);
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4RsIEBJZ9xzai74k1gRVg1oVaRxP8yKY&callback=init_map"
  type="text/javascript"></script>
   <div class="info_box">
	<img src="../../images/graphic_DRM_logo.png" alt="" title="" />
	<p><b>DRM inside Co., Ltd</b><br/>(05719)  #801,#802, <br/> Karak ID Tower, 105, Jungdae-ro, Songpa-gu, Korea</p>
	<ul>
		<li><i class="fa fa-phone"></i> (+82)2-430-7267</li>
		<li><i class="fa fa-print"></i> (+82)2-430-7268</li>
		<li><i class="fa fa-envelope"></i> <a href="mailto:contact@drminsdie.com">contact@drminsdie.com</a></li>
		<li><i class="fa fa-facebook"></i>  <a href="www.facebook.com/drminside">facebook.com/drminside</a></li>
		<li><i class="fa"></i> <a href="www.facebook.com/opensreader">facebook.com/opensreader</a></li>		
		<li><i class="fa fa-globe"></i> <a href="www.drminside.com">www.drminside.com</a></li>
	</ul>
   </div>
   </div>
 	
</section>    
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php'); ?></footer>
</body>
</html>
</html>