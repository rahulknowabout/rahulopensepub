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
<?php //echo "<pre>"; 
//print_r($_SERVER);die;
function getLocationInfoByIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
    if($ip_data && $ip_data->geoplugin_countryName != null){
        $result['country'] = $ip_data->geoplugin_countryName;
        $result['city'] = $ip_data->geoplugin_city;
    }
    return $result;
}
/*if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
   $ip = $_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
   $ip = $_SERVER['REMOTE_ADDR'];
}
echo 'http://api.wipmania.com/'.$ip;
 $ch = curl_init('http://api.wipmania.com/'.$ip );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json')
);
  echo $result12 = curl_exec($ch); die;
//echo $result12.address.country;
$test = str_replace('jsonpCallback(','',$result12);
$test = str_replace(')','',$test);

//die;
$arrayDecode = json_decode($test,true);
//echo "<pre>";*/
$location = getLocationInfoByIp();
$country = $location['country'];
//echo $country;
//die;
?>
   </head>
<body>
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php'); ?></header>
<section class="main-content">
    <div class="container">
    <div class="box verify-box" id="error_box" style="display:none;">
            <h1>Error</b></h1>
             <p>Some fields are not entered or entered incorrectly.</p>
            <a href="#" class="btn btn-info btn-lg btn-block" onClick="disappear()">Ok</a>
        </div>
        <div class="box register-box">
           <h1><b>Create</b> account</h1>
             <form name="register_form" id="register_form" action="../../controller/register/user.php" method="post">
              <h2>Mandatory field</h2>
                            <div class="form-group">
                <input type="text" class="form-control" id="name" name = "name" placeholder="Name" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                  <span id="emailspan"></span>
              </div>
				   <script type="text/javascript">
					$(document).ready(function(){
						$('[data-toggle="popover"]').popover({
							placement : 'top',
							trigger : 'hover'
						});
					});
					</script>
			
              <div class="input-group2">
                  <div class="form-group">
                   <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
				   <span class="msg info">
                      <a href="javascript:;" data-placement="top" data-toggle="popover" title="" data-content="English alphanumeric characters within 8 to 20 characters" data-original-title="Your Password must have :"><img src="../../images/info_icon_small.png" alt="" title=""></a></span>
					  <span id="pwdspan"></span>
                  </div>
                  <div class="form-group"> <input type="password" class="form-control" id="repeatpwd" name="repeatpwd" placeholder="Re-enter the Password" required>
                  <span id="repeatpwdspan"></span>
                   </div></div> 
              <div style="height:20px;"></div>
              <h2 class="btxt">Optional Field</h2>
               <div class="form-group">
                  <input type="text" class="form-control" id="country" name="country" placeholder="country" value="<?php echo $country; ?>" >
                </div> 
                 <div style="height:20px;"></div>
              <button type="submit" class="btn btn-info btn-lg btn-block">Create your account</button>
            </form> 
            
            <div class="create_note"><p>By creating an account, you agree to OPENS’s <a  href="#" type="button"  data-toggle="modal" data-target="#myModal">Conditions of Use</a>
</a> and <a  href="#" type="button"  data-toggle="modal" data-target="#myModalp">Privacy Notice</a>.</p></div>
        </div>
    </div>
    
</section>   
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="data_page">
            <h1><b>Conditions</b> of Use</h1>
            <div class="margin-bottom-40">
				<p>Welcome to Amazon.com. Amazon Services LLC and/or its affiliates ("Amazon") provide website features and other products and services to you when you visit or shop at Amazon.com, use Amazon products or services, use Amazon applications for mobile, or use software provided by Amazon in connection with any of the foregoing (collectively, "Amazon Services"). Amazon provides the Amazon Services subject to the following conditions.</p>
				<p>By using Amazon Services, you agree to these conditions. Please read them carefully.</p>
				<p>We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, or Amazon applications for mobile) you also will be subject to the guidelines, terms and agreements applicable to that Amazon Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service Terms will control.</p>
			 </div> 
            <div class="margin-bottom-40">
				<p>Welcome to Amazon.com. Amazon Services LLC and/or its affiliates ("Amazon") provide website features and other products and services to you when you visit or shop at Amazon.com, use Amazon products or services, use Amazon applications for mobile, or use software provided by Amazon in connection with any of the foregoing (collectively, "Amazon Services"). Amazon provides the Amazon Services subject to the following conditions.</p>
				<p>By using Amazon Services, you agree to these conditions. Please read them carefully.</p>
				<p>We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, or Amazon applications for mobile) you also will be subject to the guidelines, terms and agreements applicable to that Amazon Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service Terms will control.</p>
			 </div> 
            <div class="margin-bottom-40">
				<p>Welcome to Amazon.com. Amazon Services LLC and/or its affiliates ("Amazon") provide website features and other products and services to you when you visit or shop at Amazon.com, use Amazon products or services, use Amazon applications for mobile, or use software provided by Amazon in connection with any of the foregoing (collectively, "Amazon Services"). Amazon provides the Amazon Services subject to the following conditions.</p>
				<p>By using Amazon Services, you agree to these conditions. Please read them carefully.</p>
				<p>We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, or Amazon applications for mobile) you also will be subject to the guidelines, terms and agreements applicable to that Amazon Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service Terms will control.</p>
			 </div> 
            <div class="margin-bottom-40">
				<p>Welcome to Amazon.com. Amazon Services LLC and/or its affiliates ("Amazon") provide website features and other products and services to you when you visit or shop at Amazon.com, use Amazon products or services, use Amazon applications for mobile, or use software provided by Amazon in connection with any of the foregoing (collectively, "Amazon Services"). Amazon provides the Amazon Services subject to the following conditions.</p>
				<p>By using Amazon Services, you agree to these conditions. Please read them carefully.</p>
				<p>We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, or Amazon applications for mobile) you also will be subject to the guidelines, terms and agreements applicable to that Amazon Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service Terms will control.</p>
			 </div> 			 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="myModalp" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="data_page">
            <h1><b>Privacy</b> Notice</h1>
            <p>Welcome to Amazon.com. Amazon Services LLC and/or its affiliates ("Amazon") provide website features and other products and services to you when you visit or shop at Amazon.com, use Amazon products or services, use Amazon applications for mobile, or use software provided by Amazon in connection with any of the foregoing (collectively, "Amazon Services"). Amazon provides the Amazon Services subject to the following conditions.
By using Amazon Services, you agree to these conditions. Please read them carefully.</p>
<p>We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, or Amazon applications for mobile) you also will be subject to the guidelines, terms and agreements applicable to that Amazon Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service Terms will control.</p>
<p>PRIVACY</p>
<p>Please review our Privacy Notice, which also governs your use of Amazon Services, to understand our practices.</p>
<p>ELECTRONIC COMMUNICATIONS</p>
<p>When you use any Amazon Service, or send e-mails, text messages, and other communications from your desktop or mobile device to us, you are communicating with us electronically. You consent to receive communications from us electronically, such as e-mails, texts, mobile push notices, or notices and messages on this site or through the other Amazon Services, such as our Message Center, and you can retain copies of these communications for your records. You agree that all agreements, notices, disclosures, and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.</p>
<p>COPYRIGHT</p>
<p>All content included in or made available through any Amazon Service, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software is the property of Amazon or its content suppliers and protected by United States and international copyright laws. The compilation of all content included in or made available through any Amazon Service is the exclusive property of Amazon and protected by U.S. and international copyright laws.</p>
<p>TRADEMARKS</p>
<p>Click here to see a non-exhaustive list of Amazon trademarks. In addition, graphics, logos, page headers, button icons, scripts, and service names included in or made available through any Amazon Service are trademarks or trade dress of Amazon in the U.S. and other countries. Amazon's trademarks and trade dress may not be used in connection with any product or service that is not Amazon's, in any manner that is likely to cause confusion among customers, or in any manner that disparages or discredits Amazon. All other trademarks not owned by Amazon that appear in any Amazon Service are the property of their respective owners, who may or may not be affiliated with, connected to, or sponsored by Amazon.</p>
<div class="margin-bottom-20"></div>
<p>Welcome to Amazon.com. Amazon Services LLC and/or its affiliates ("Amazon") provide website features and other products and services to you when you visit or shop at Amazon.com, use Amazon products or services, use Amazon applications for mobile, or use software provided by Amazon in connection with any of the foregoing (collectively, "Amazon Services"). Amazon provides the Amazon Services subject to the following conditions.
By using Amazon Services, you agree to these conditions. Please read them carefully.
We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, or Amazon applications for mobile) you also will be subject to the guidelines, terms and agreements applicable to that Amazon Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service Terms will control.</p>
<p>PRIVACY</p>
<p>Please review our Privacy Notice, which also governs your use of Amazon Services, to understand our practices.</p>
<p>ELECTRONIC COMMUNICATIONS</p>
<p>When you use any Amazon Service, or send e-mails, text messages, and other communications from your desktop or mobile device to us, you are communicating with us electronically. You consent to receive communications from us electronically, such as e-mails, texts, mobile push notices, or notices and messages on this site or through the other </p>
        </div>
    </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
<footer id="main_footer" class="main-footer">
<?php require_once('../footer/footer.php'); ?>
</footer>
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
                        name: {
                                required: true,
                                loginRegex: true,
								minlength: 2,
								maxlength: 50
                        },
                        
                        pwd: {
                                required: true,
								Password:true,
                                minlength: 8,
                                maxlength: 20
                        },
						 repeatpwd : {
						 required: true,	 
                    	 equalTo : "#pwd"
                },
				email : {
						required: true,	
                    	email : true
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
  $("#email").blur(function(){
  //alert("hello");
   var email = $('#email').val();
  // alert(email);
     var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

    
   if(!email.match(regex)){
    $("#emailspan").removeClass("msg okay");
   	$("#emailspan").addClass("msg not_okay");
   	$("#emailspan").html('<i class="fa fa-times-circle"></i>');
	errorFormC =true;	


}else{
	
  $.ajax({
        url: "../../ajax/register.php",
        type: 'POST',
        data: "email="+email,
        success: function (data) {
			if(data == 1 ){
				$("#emailspan").removeClass("msg not_okay");
				$("#emailspan").addClass("msg okay");
    			$("#emailspan").html('<i class="fa fa-check-circle"></i>');
				errorFormC =false;	
			}else{
				 $("#emailspan").removeClass("msg okay");
   				 $("#emailspan").addClass("msg not_okay");
   				$("#emailspan").html('<i class="fa fa-times-circle"></i>');
				errorFormC =true;	
			}

			
        }
  });
  
}
$('#register_form').submit(function() {
				 
			if(errorFormC ){
				//alert("TEST");
				return false;	
			}
		
});
       //alert("SUCCESS");*/
});
  /*$.ajax({
        url: "../../ajax/register.php",
        type: 'POST',
        data: formData,
        success: function (data) {
			alert(data);
			if (data == "Error_Code=dup") {
				$("#included_error_tour").css("display", "block");
			}else {
$.ajax({
						url: "../../controller/notice/notice.php",
						type: "POST",
						
						

						data:{notice_content:dataString,update_id:data},
												
						success: function(data){
							window.location.href = 'list.php';
							console.log(data);

							}, error: function(c){
            console.log(c.message);
        } */
function disappear() {
	//alert("hello");
	$("#error_box").css("display","none");
}
</script>
</body>
</html>