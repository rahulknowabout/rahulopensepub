<?php require_once('../../admin/modal/customer/customer.php'); 
if(isset($_COOKIE['member_login']) && $_COOKIE['member_login']!= "" && isset($_COOKIE['member_password']) && $_COOKIE['member_password']!= "" ) {
	$user_info = singleCustomerbyEmail($_COOKIE['member_login']);
	$MemberShipRequestCount = MemberShipRequestCount($_COOKIE['member_login'])['membershiprequest'];
	//sleep(3);
	if(isset($_GET['change']) && $_GET['change'] == 1) {
		setToLevelF($_COOKIE['member_login']);
	}
	
} else if(isset($_SESSION['member_login']) && $_SESSION['member_login']!= "" && isset($_SESSION['member_password']) && $_SESSION['member_password']!= "") {
	$user_info = singleCustomerbyEmail($_SESSION['member_login']);
	$MemberShipRequestCount = MemberShipRequestCount($_SESSION['member_login'])['membershiprequest'];
	//sleep(3);
	if(isset($_GET['change']) && $_GET['change'] == 1) {
		setToLevelF($_SESSION['member_login']);
	}
}else {
	header('location:../../index.php');
	$user_info = "";
	$MemberShipRequestCount = 0;
}

//echo "<pre>";
//print_r($user_info);
//die;
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
$location = getLocationInfoByIp();
$country = $location['country'];
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
<body class="page-banner">
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php');?></header>
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
            <form role="form" class="form-horizontal" name="editmyinfo" id="jvalidate" method="post" action="../../controller/user/useredit.php" >
                <h2>My info</h2>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="inputName">Name</label>
                  <div class="col-md-4 col-sm-7"><input type="text" class="form-control" id="inputName" name="user_name" placeholder="" value = "<?php echo $user_info['user_name']; ?>"/></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="inputEmail1">Email</label>
                  <div class="col-md-4 col-sm-7"><input type="email" class="form-control" id="inputEmail1" name="user_email" placeholder="" disabled value = " <?php echo $user_info['user_email']; ?> " /><input type="hidden" class="form-control" id="user_email_hidden" name="user_email_hidden" value = "<?php echo $user_info['user_email']; ?>"/></div>
                </div>
                <div class="form-group btn_add">
                  <label class="col-sm-4 col-md-3 col-lg-2">Password</label>
                    <div class="col-md-4 col-sm-7">
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ChangePassword">Change password</a>
                </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="country">Country</label>
                    <div class="col-md-4 col-sm-7">
                    <input type="text" class="form-control" id="country" name="country" placeholder="country" value="<?php echo $country; ?>" />
                </div>
                </div> 
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="level">Level</label>
                    <div class="col-md-4 col-sm-7">
                    <p><?php echo ( $user_info['user_level'] == 1 )? "L1" :(( $user_info['user_level'] == 2 )? "L2" :(( $user_info['user_level'] == 3 )? "L3" : ("Not Available"))); ?></p>
                </div>
                </div> 
                <?php if ($user_info['user_level']>1) { ?>               
                <div style="height:20px;"></div>
                <h2>Company info</h2>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="Cname">Company name</label>
                  <div class="col-sm-7"><input type="text" class="form-control" id="user_company_name" name="user_company_name" placeholder="" value = "<?php echo $user_info['user_company_name']; ?>" /></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="Caddress">Company address</label>
                  <div class="col-sm-7"><input type="text" class="form-control" id="user_company_address" placeholder="" name="user_company_address" value="<?php echo $user_info['user_company_address']; ?>"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="CPnumber">Company phone number</label>
                  <div class="col-sm-7"><input type="text" class="form-control" id="CPnumber" name="user_company_phone" placeholder=""  value="<?php echo $user_info['user_company_phone']; ?>"></div>
                </div> 
                <div class="form-group btn_add">
                  <label class="col-sm-4 col-md-3 col-lg-2">Transfer of <br/>membership rights</label>
                    <div class="col-md-4 col-sm-7">
                   
                    <span id="membership_span"  <?php if ($MemberShipRequestCount > 0 ) {  ?> style="display:none;" <?php } ?>><a href="#" data-toggle="modal" data-target="#transfermembership" class="btn btn-info">Permission for transfer</a> </span>
                    
                       <span id="membership_span_cancel" <?php if ($MemberShipRequestCount == 0 ) {  ?> style="display:none;" <?php } ?>><button class="btn btn-info btn-outline" onClick="cancelPermission()" type="button">Cancel permission for transfer</button>
                     <span class="status_msg">Status: Requesting</span></span>
                       
                </div>
                </div>
                <?php } ?> 
                <input type="hidden" class="form-control" id="user_id" name="user_id" placeholder=""  value="<?php echo $user_info['user_id']; ?>">               
                <div style="height:70px;" class="Mobile_space"></div>
                <div class="form-group text-center">
                  <div class="btns_list">
                   <a href="../../index.php" class="btn btn-info btn-outline">Cancel</a>
                  </div>
                  <div class="btns_list">
                      <button class="btn btn-info" type="submit" name="editsubmit" value="editsubmit">Save</button>
                  </div>                    
                </div>
                
              </form> 
            </div>
        </div>
    </div>
</section>    
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php');?></footer>
<!-- Modal -->
<div class="modal fade" id="ChangePassword" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3 class="modal-title"><b>Change</b> password</h3>
        <div class="modal-pp">
        <p>Use the form below to change the password for your OPENS account 
            <b>Your password must have :</b>
English alphanumeric characters within 8 to 20 characters</p>
        </div>
        <form method="post" name="changepasswordA" id="changepasswordA" action="../../controller/user/useredit.php">
        <div class="form-group">
            <input class="form-control" id="pwdo" name="pwdo" placeholder="Password" type="password"> 
        </div>            
       <div class="input-group2">
          <div class="form-group">
           <input class="form-control" id="pwd" placeholder="Password" name="pwd" required type="password">
                 <span id="pwdspan"></span>
          </div>
           <div class="form-group"> <input class="form-control" id="repeatpwd" name="repeatpwd" placeholder="Re-enter the Password" required type="password">
                  <span id="repeatpwdspan"></span>                   </div>
       </div>   
      <div style="height:20px;"></div>
        <button type="submit" class="btn btn-info" name="editchangepassword"  value="editchangepassword">Save Changes</button>
     </form>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="transfermembership" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3 class="modal-title"><b>Transfer</b> of membership rights</h3>
        <div class="modal-pp">
       <p> Enter the email address (ID) and name of the person you want to transfer the membership to.

The person to transfer the membership rights must be on the OPENS homepage,
It is necessary to match the information created at the time of membership registration.

<b>If you apply for membership transfer, the transfer will be completed by the 
administrator's final approval. Members who have applied for membership transfer
after final approval by the administrator are adjusted to? L1 and can no longer use 
the Download menu.

Whether or not processing will be sent by email</b></p>
        </div>
        <br/>
        <form method="post" name="transfermembershipform" id="transfermembershipform" action="xyz.php">
                    
      
          <div class="form-group">
           <input class="form-control" id="tname" placeholder="Name" name="tname" required type="text">
                 
          </div>
           <div class="form-group"><input class="form-control" id="temail" name="temail" placeholder="Email" required type="email"></div>
          
      <div style="height:20px;"></div>
        <button type="submit" class="btn btn-info" name="membershiptransfer"  value="membershiptransfer">Apply for membership transfer</button>
     </form>
    </div>
  </div>
</div>
</div>
<div class="modal fade in" id="Email_sucess" role="dialog"  <?php if ( $user_info['opens_mupdate'] == 1 && ($user_info['user_level'] == 2 || $user_info['user_level'] == 3)) {?> style="display:block;" <?php } else {  ?> style="display:none;" <?php } ?>>
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg" id="message_box">Membership Changed.</p>
        </div>
        <div style="height:20px;"></div> 
      <button class="btn btn-info" onClick="hideModal()">OK</button>
    </div>
  </div>
</div>
</div>
<div class="modal fade in" id="Email_sucess_transfer" role="dialog"  style="display:none;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg" id="transfer_confirmation_message_box">Would you like to transfer membership privileges?</p>
        </div>
        <div style="height:20px;"></div>
        
    <button type="button" class="btn-info btn-lg" style="margin-right:5px;" onClick="tranferMemberShipfun('yes')">Yes</button>
   
    <button type="button" class="btn-info btn-lg" onClick="tranferMemberShipfun('no')">No</button>
  
                   
                               
                 
      <!--<button class="btn btn-info" onClick="hideModal()">OK</button>-->
    </div>
  </div>
</div>
</div>
 <script type='text/javascript' src='../../js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
 <script type='text/javascript' src='../../js/plugins/validationengine/jquery.validationEngine.js'></script>  
 <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.js'></script>
 <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.hooks.js'></script> 
 <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script> 
        
 <?php if ($user_info['user_level']>1) { ?> 
 <script>
		$(function() {
	//alert("hello");

   
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Please select an item!");
  $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "ID must contain only letters, numbers, or dashes.");
	$.validator.addMethod("loginPhone", function(value, element) {
        return this.optional(element) || /^[0-9\-+\s]+$/i.test(value);
    }, "ID must contain only letters, numbers, or dashes.");
	jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Letters and spaces only please"); 
	var jvalidate = $("#changelevel").validate({
     ignore: [],
                rules: {                                            
                        level_number: { valueNotEquals: '0' },
						messages: {
   						level_number: { valueNotEquals: "Please select an item!" }
  					} 
                       
                }                                        
                }); 
	var jvalidate_edit = $("#jvalidate").validate({
     ignore: [],
                rules: {                                            
                        user_name: { required:true,
						lettersonly: true,
						maxlength: 50
						 },
						user_company_name: { required:true,
									  loginRegex: true,
						maxlength: 50
						 },
						 user_company_address: { required:true,
									  loginRegex: true,
						maxlength: 100
						 },
						 user_company_phone: { required:true,
									  loginPhone: true,
						maxlength: 15
						 },
						  				
                       
                }                                        
                }); 			

});
</script>   
 
 <?php }else { ?>
 <script>
 $(function() {
	//alert("helloELSE");

   
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Please select an item!");
  $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "ID must contain only letters, numbers, or dashes.");
	$.validator.addMethod("loginPhone", function(value, element) {
        return this.optional(element) || /^[0-9\-\s]+$/i.test(value);
    }, "ID must contain only letters, numbers, or dashes.");
	 $.validator.addMethod("Password", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    },"Password must contain only letters, numbers, or dashes.");
	jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Letters and spaces only please"); 
	var jvalidate = $("#changelevel").validate({
     ignore: [],
                rules: {                                            
                        level_number: { valueNotEquals: '0' },
						messages: {
   						level_number: { valueNotEquals: "Please select an item!" }
  					} 
                       
                }                                        
                }); 
	var jvalidate_edit = $("#jvalidate").validate({
     ignore: [],
                rules: {                                            
                        user_name: { required:true,
						lettersonly: true,
						maxlength: 50
						 }
						
						  				
                       
                }                                        
                }); 	
				/*var jvalidate = $("#changepasswordA").validate({
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
                }); 	*/	

});
</script>
  
 
 <?php } ?>  
 <script>
 var changePasswordError = 0;
 function hideModal() {
	$('#Email_sucess').hide();
	if (changePasswordError == 0 ) {
		window.location.href="changepw.php?change=1";
	}
	//$('#ChangePassword').hide();
}
var equalpw = false;
var errorFormA = false; 
var errorFormB = false; 
var errorFormC = true;
var clength =true 
 $(document).ready(function(){
	  
  $("#pwd").blur(function(){
  //alert("hello");
  var pwd = $('#pwd').val();

 var pwdl = $('#pwd').val().length;
 	if(pwdl>20 || pwdl<8 ) {
		clength =false;	
	}else{
		clength =true;	
	}
 var Exp = /^[a-z0-9\-\s]+$/i;

if(!pwd.match(Exp) || !(clength) ){
   //alert("ERROR");
   $("#pwdspan").removeClass("msg okay");
   $("#pwdspan").addClass("msg not_okay");
   $("#pwdspan").html('<i class="fa fa-times-circle"></i>');
   equalpw =false; 
   errorFormA = true;	

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
  
  $('#changepasswordA').submit(function(e) {
	              pwds = $('#pwd').val();
				 repeatpwds = $('#repeatpwd').val();
				 pwdos = $('#pwdo').val();
				//alert($.trim(pwdos).length);
				//alert("submit");
				//return false;
				if ( pwds == '' || repeatpwds == '' || pwdos == ''  ) {
					return false;	
				} 
				if ( errorFormB || errorFormA ) {
					return false;	
				} 
				 e.preventDefault();
				email = $('#user_email_hidden').val();
				$.ajax({
        url: "../../ajax/changepw.php",
        type: 'POST',
        data: "email="+email+"&pwdos="+pwdos+"&pwds="+pwds,
        success: function (data) {
			if (data == 1) {
				$("#message_box").text("Input information does not match.Please re-enter");
				changePasswordError = 1; 
				$('#Email_sucess').show();
			}else{
				$("#message_box").text("Password changed");
				changePasswordError = 0;
				$('#Email_sucess').show();
			}

			
        }
  });
  });
  
  $('#transfermembershipform').submit(function(e) {
	  //alert("submit");
	  //return false;	
	              tname = $('#tname').val();
				 temail = $('#temail').val();
				email = $('#user_email_hidden').val();
				//alert($.trim(pwdos).length);
				//alert(temail);
				//alert(email);
				//return false;
				if ( tname == '' || temail == '') {
				return false;
				}else if(temail == email ) {
					return false;
				}
				
			 e.preventDefault();
				
		$.ajax({
        url: "../../ajax/transfermembership.php",
        type: 'POST',
        data: "tname="+tname+"&temail="+temail+"&check=email"+"&email="+email,
        success: function (data) {
			//alert(data);
			if (data == 1) {
				$("#message_box").text("No registered name or email");
				changePasswordError = 1; 
				$('#Email_sucess').show();
			}else{
				
				
				$('#Email_sucess_transfer').show();
			}

			
        }
  });
				
				 
    });
	
	function tranferMemberShipfun(inquiry) {
		$('#Email_sucess_transfer').hide();
		if(inquiry == 'no') {
			 
		}else {
			tname = $('#tname').val();
			temail = $('#temail').val();
			email = $('#user_email_hidden').val();
			var tlevel = <?php echo $user_info['user_level']; ?>;
			
			$.ajax({
        url: "../../ajax/updatetransfermembership.php",
        type: 'POST',
        data: "tname="+tname+"&temail="+temail+"&email="+email+"&tlevel="+tlevel,
        success: function (data) {
			//alert(data);
			if (data == 1) {
				$("#message_box").text("Your application for membership transfer has been completed.Once the transfer of membership rights is processed, the results will be emailed to you.");
				changePasswordError = 0; 
				$('#Email_sucess').show();
			}
			

			
        }
  });
		}
	}
	
function cancelPermission() {
		email = $('#user_email_hidden').val();
		$.ajax({
        url: "../../ajax/canceltransfermembership.php",
        type: 'POST',
        data: "email="+email,
        success: function (data) {
			//alert(data);
			if (data == 1) {
				$('#membership_span_cancel').css('display', 'none');
				$('#membership_span').css('display', 'block');
					//window.location.href="changepw.php";
			}
			

			
        }
  });
	}

 </script> 
</body>
</html>