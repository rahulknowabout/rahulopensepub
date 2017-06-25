<?php require_once('../../config.php');
require_once("../../functions.php");
require_once("../../new_functions.php");
require_once('../../commonfunctions.php');
//print_r($_COOKIE);die;
if((isset($_COOKIE['member_login']) && $_COOKIE['member_login']!= "" && isset($_COOKIE['member_password']) && $_COOKIE['member_password']!= "")) {
	$user_info = singleCustomerInfobyEmail($_COOKIE['member_login']);
	
}elseif(isset($_SESSION['member_login']) && $_SESSION['member_login']!= "" && isset($_SESSION['member_password']) && $_SESSION['member_password']!= "") {
	$user_info = singleCustomerInfobyEmail($_SESSION['member_login']);
}else {
	$user_info = "";
}
if (isset($user_info) && is_array($user_info) && count($user_info)>0) {
	if($user_info['api_user_id']!= "") {
		$baseURL ="http://v2.opensdrm.net/epubdrmpackager/users/".$user_info['api_user_id']."/devices"; 
		$deviceresult = DeviceInfo($baseURL,xapikey);
		$deviceresultArray =json_decode($deviceresult,true);
		if (json_last_error() === 0) {
			if(isset($deviceresultArray['device_info'])) {
   			$deviceArray =$deviceresultArray['device_info'];
			}else {
				$deviceArray =array();
			}
		}else{
			$deviceArray =array();
		}
		
	}else{
		$deviceArray =array();
	}
}else{
	$deviceArray =array();
}
//echo "<pre>";
//print_r($deviceresultArray);
///die;
if(isset($deviceresultArray['provider_id']) && $deviceresultArray['provider_id']!= "" ) {
	$baseURL ="http://v2.opensdrm.net/epubdrmpackager/providers/".$deviceresultArray['provider_id']."/masters"; 
		$sampleresult = SampleInfo($baseURL,xapikey);
		$sampleresultArray = json_decode($sampleresult,true);
		if (json_last_error() === 0) {
			if(isset($sampleresultArray['masters'])) {
   			$sampleArray =$sampleresultArray['masters'];
			}else {
				$sampleArray =array();
			}
		}else {
			$sampleArray =array();
		}
}else{
	$sampleArray = array();
}
//echo "<pre>";
//print_r($sampleArray);
//die;
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
</script> -->  
</head>
<body class="page-banner">
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php'); ?></header>
<div class="advisor-banner-header">
<div class="advisor-background-banner" style="background: url('../../images/page_bg_tutorials.jpg') no-repeat center 100%; background-size: cover;">
<div class="advisor-title-banner-header">
    <div class="container">
        <div class="page_inside">
            <ul class="breadcrumb">
                <li><a href="../../index.php"><i class="fa fa-home"></i></a></li>
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
    <li class="active">
        <a data-toggle="tab" href="#Certificate_DRM">
            <h3>Certificate-based eBook DRM <b>OPENS</b></h3> </a>
    </li>
    <li>
     
        <a data-toggle="tab" href="#Password_DRM">
          <h3>Password-based eBook DRM <b>Readium LCP</b></h3>  </a>
    </li>
</ul>
<div class="tab-content">
<div id="Certificate_DRM" class="tab-pane fade in active">
    <div class="install_opens">
        <div class="container">
            <h4><b>01</b> Install OPENS Reader </h4>
            <form name="certificate_form" id="certificate_form" method="post" action="tutorials_progress.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-5"> <img src="../../images/iphone_opens_screen.png" alt="" title="" class="img-responsive" /> </div>
                <div class="col-sm-7">
                    <p>For the OPENS DRM test, you need to install OPENS Reader which is an electronic book viewer.</p>
                    <div class="store_btn">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="img-wrapper">
                                    <a href="#"><img alt="outofdate-badge" src="../../images/google_play.png"></a>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="img-wrapper">
                                    <a href="#"><img alt="outofdate-badge" src="../../images/app_store.png"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="login_info_box">
                        <h5><b>OPENS Reader</b> test login information</h5>
                        <div id="login_id" class="log_info">ID : <span><?php if (isset($user_info) && is_array($user_info) && count($user_info)>0) {echo $user_info['api_user_id']; } ?></span></div>
                        <div id="login_pass" class="log_info">PW : <span><?php if (isset($user_info) && is_array($user_info) && count($user_info)>0) {echo $user_info['api_user_password']; } ?></span></div>
                    </div>
                    <ul class="play_list">
                        <li>1. Access the <a href="#">App Store</a> or <a href="#">Google Play</a>.</li>
                        <li>2. Search for <b>‘OPENS Reader’</b> to download app.</li>
                        <li>3. Sign in to the OPENS Reader app using the test login information above.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="eBook_encryption">
    
        <div class="container">
            <h4><b>02</b> eBook encryption</h4>
            <p>Add the EPUB file to be tested and set the service type of the eBook.</p>
            <div class="eBook_encryption_addfile eBook_box">
            <h5>Add File *</h5>
            <div class="row">
                <div class="col-sm-5">
                 
                    <div class="file_format group_box active_tab" id="file_format">
                    <ul class="checkbox_inside">
                       <li>
                       <input id="s-option" name="AddFile" type="radio" checked value="select"> 
                        <label for="s-option">Sample EPUB</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                     
                    <select multiple name="exist_file" id="exist_file">
                    <?php if(isset($sampleArray) && is_array($sampleArray) && count($sampleArray)>0 ) { ?>
                    <option value="0">Select File</option>
                        <?php 
									foreach($sampleArray as $key => $value ) { 
									$fileNameArray =explode("/",$value);
									$keyNext = array_search($deviceresultArray['provider_id'],$fileNameArray);
									$fileRealName = $fileNameArray[$keyNext+1];
									if ($fileRealName == 'null') {
										continue;
									}
										
						?>
                               <option value="<?php echo $value; ?>"><?php echo $fileRealName; ?></option>	
						<?php } } ?>
                    </select>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="file_format group_box EPUB_file inactive_tab" id="EPUB_file">
                    <ul class="checkbox_inside">
                       <li>
                       <input id="s-option-file" name="AddFile" type="radio" value="myepub">
                        <label for="s-option-file">My EPUB</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                     <div class="input_choose">
                        <label class="fileContainer">
                            Choose a file
                            <input type="file" name="myepub_file" id="myepub_file"/>
                             
                            
                        </label>
                     </div>
                    <ul class="listing_file_info">
                        <li>Can add files under 100MB</li>
                        <li>If you want to upload more than 1GB file, please contact Customer center.</li>
                    </ul>
                    </div>
                </div>                
            </div>
            </div>
            <div class="eBook_encryption_Service_Type eBook_box">
                <h5>Service Type Settings *</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="device_type_box group_box active_tab">
                        <ul class="checkbox_inside">
                           <li>
                           <input id="device_type" name="ServiceType" type="radio" value="device" checked>
                            <label for="device_type">Device Type</label>
                            <div class="check"><div class="inside"></div></div>
                            </li>
                        </ul>  
                       <div class="form-group">
                        <div class="row">
                            <div class="col-xs-11">
                            <select class="form-control"  name="device_name" id="device_choose">
                                <option value="0">Device Select</option>
                                <!--<option>Iphone</option>
                                <option>Ipad</option>
                                <option>Tab</option>-->
                                <?php if(isset($deviceArray) && is_array($deviceArray) && count($deviceArray)>0 ) {
									foreach($deviceArray as $key => $value ) { 
										if ($value['extdev_id'] == 'extid') {
											$prefix = "external,";
										}else {
											$prefix = "internal,";
										}
									
									?>
                                    		
										<option value="<?php echo $prefix.$value['dev_id']; ?>"><?php echo $value['dev_name']; ?></option>	
								<?php } }?>
                              </select>
                            <span class="msg info">
                                <a href="javascript:;" data-placement="top" data-toggle="popover" data-content="Select Device Type">
								<img src="../../images/info_icon.png" alt="" title="" /></a></span>
				   <script type="text/javascript">
					$(document).ready(function(){
						$('[data-toggle="popover"]').popover({
							placement : 'top',
							trigger : 'hover'
						});
					});
					</script>   
                          </div> 
                        </div>
                        </div> 
                        <p>You can control access to eBooks on the device specified by the user.</p>
                        <div class="device_choose_man text-center"><img src="../../images/device_choose_man.png" alt="" title="" class="img-responsive"></div>
                    </div>      
                    </div>
                    <div class="col-sm-6">
                    <div class="file_format group_box EPUB_file inactive_tab">
                        <ul class="checkbox_inside">
                           <li>
                           <input id="user_type" name="ServiceType" type="radio" value="user">
                            <label for="user_type">User Type</label>
                            <div class="check"><div class="inside"></div></div>
                            </li>
                        </ul>
                        <p>You can control so that only authenticated users can browse without device restriction.</p>
                        <div class="device_choose_man text-center"><img src="../../images/user_choose_man.png" alt="" title="" class="img-responsive"></div>
                    </div>                    
                    </div>
                </div>
            </div>
            <div class="eBook_Reading_Method_Settings eBook_box">
                <h5>eBook Reading Method Settings *</h5>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="device_type_box group_box active_tab">
                        <ul class="checkbox_inside">
                       <li>
                       <input id="download_file" name="eBookReadingMethod" type="radio" value="download" checked>
                        <label for="download_file">Download</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                    <p>By downloading to the device and viewing the EPUB, Ideal for small files or network environments.</p>
                    </div> </div>
                    <div class="col-sm-6">
                    <div class="file_format group_box EPUB_file inactive_tab">
                        <ul class="checkbox_inside">
                           <li>
                           <input id="Streaming" name="eBookReadingMethod" type="radio" disabled>
                            <label for="Streaming">Streaming (Service Coming May 2017)</label>
                            <div class="check"><div class="inside"></div></div>
                            </li>
                        </ul>
                        <p>Browse EPUB by streaming method. Ideal for large files or poor network environments.</p>
                    </div>                    
                    </div>                    
                </div>
            </div>
            <div class="eBook_Reading_Period_Settings eBook_box">
                <h5>eBook Reading Period Settings</h5>
                    <div class="device_type_box group_box box_cr">
                    <div class="choose_date">
                        <span class="choose_date_span">
							<div id="remember" class="checkbox">
							  <label class="ui-checkbox">
								<input type="checkbox" value="option1" name="datecheckbox" id="datecheckbox">
								<span>Start Date</span>
							   </label>
							</div>						
						</span>
                        <div class="inline_form_row">
                        <div class="inline_form_date">
                            <input id="startdate" name="startdate" class="form-control datepicker-custom" placeholder="DD/MM/YYYY" />
                        </div>
						<i class="fa custom_icon"><img src="../../images/calendar_icon.png" id="start_calancer" alt=""title="" /></i>
                        </div>
                        <span>~</span>
                        <span>End Date</span>
                        <div class="inline_form_row">
                        <div class="inline_form_date">
                            <input id="enddate" name="enddate" type="text" class="form-control  datepicker-custom" placeholder="DD/MM/YYYY" />
                        </div>
						<i class="fa custom_icon"><img src="../../images/calendar_icon.png" id="" alt=""title="" /></i>
                        </div>
                    </div>
                    <p>You can control access to eBooks only during the setup period.</p> 
                    <input id="providerid" name="provider_id" type="hidden" class="form-control datepicker-custom" value="<?php if(isset($deviceresultArray['provider_id']) && $deviceresultArray['provider_id']!= "" ) { echo $deviceresultArray['provider_id']; } ?>" />  
                    <input id="user_id" name="user_id" type="hidden" class="form-control datepicker-custom" value="<?php if(isset($deviceresultArray['user_id']) && $deviceresultArray['user_id']!= "" ) { echo $deviceresultArray['user_id']; } ?>" />              
                </div>
            </div>
            <?php if (isset($user_info) && is_array($user_info) && count($user_info)>0) {  ?>
            <div class="Encrypt_eBook_btn"><button class="btn btn-info btn-lg btn-block" type="submit">Encrypt eBook</button></div>
            <?php }else { ?>
            <div class="Encrypt_eBook_btn"><a href="#" class="btn btn-info btn-lg btn-block">Encrypt eBook</a></div>
            <?php } ?>
        </div>
    </div>
    </div>
    </form>
<div id="Password_DRM" class="tab-pane fade">
    <div class="install_opens">
        <div class="container">
            <h4><b>01</b> Install OPENS Reader </h4>
            <div class="row">
                <div class="col-sm-5"> <img src="../../images/iphone_opens_screen.png" alt="" title="" class="img-responsive" /> </div>
                <div class="col-sm-7">
                    <p>For the OPENS DRM test, you need to install OPENS Reader which is an electronic book viewer.</p>
                    <div class="store_btn">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="img-wrapper">
                                    <a href="#"><img alt="outofdate-badge" src="../../images/google_play.png"></a>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="img-wrapper">
                                    <a href="#"><img alt="outofdate-badge" src="../../images/app_store.png"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="login_info_box">
                        <h5><b>OPENS Reader</b> test login information</h5>
                        <div id="login_id" class="log_info">ID : <span><?php if (isset($user_info) && is_array($user_info) && count($user_info)>0) {echo $user_info['api_user_id']; } ?></span></div>
                        <div id="login_pass" class="log_info">PW : <span><?php if (isset($user_info) && is_array($user_info) && count($user_info)>0) {echo $user_info['api_user_password']; } ?></span></div>
                    </div>
                    <ul class="play_list">
                        <li>1. Access the <a href="#">App Store</a> or <a href="#">Google Play</a>.</li>
                        <li>2. Search for <b>‘OPENS Reader’</b> to download app.</li>
                        <li>3. Sign in to the OPENS Reader app using the test login information above.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="eBook_encryption">
        <div class="container">
        <form name="lcp_form" id="lcp_form" method="post" action="tutorials_progress_lcp.php" enctype="multipart/form-data">
            <h4><b>02</b> eBook encryption</h4>
            <p>Add the EPUB file to be tested and set the service type of the eBook.</p>
            <div class="eBook_encryption_addfile eBook_box">
            <h5>Add File *</h5>
            <div class="row">
                <div class="col-sm-5">
                    <div class="file_format group_box active_tab">
                    <ul class="checkbox_inside">
                       <li>
                       <input id="s-option-1" name="LCP_AddFile" type="radio" value="select" checked>
                        <label for="s-option-1">Sample EPUB</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                    <select multiple name="lcp_exist_file" id="lcp_exist_file">
                        <?php if(isset($sampleArray) && is_array($sampleArray) && count($sampleArray)>0 ) { ?>
                    <option value="0">Select File</option>
                        <?php 
									foreach($sampleArray as $key => $value ) { 
									$fileNameArray =explode("/",$value);
									$keyNext = array_search($deviceresultArray['provider_id'],$fileNameArray);
									$fileRealName = $fileNameArray[$keyNext+1];
									if ($fileRealName == 'null') {
										continue;
									}
										
						?>
                        <option value="<?php echo $value; ?>"><?php echo $fileRealName; ?></option>	
                        <?php } } ?>
                    </select>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="file_format group_box EPUB_file inactive_tab">
                    <ul class="checkbox_inside">
                       <li>
                       <input id="s-option-file-1" name="LCP_AddFile" class="LCP_E" type="radio" value="myepub">
                        <label for="s-option-file-1">My EPUB</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                     <div class="input_choose">
                        <label class="fileContainer">
                            Choose a file
                            <input type="file" name="lcp_myepub_file" id="lcp_myepub_file"/>
                        </label>
                     </div>
                    <ul class="listing_file_info">
                        <li>Can add files under 100MB</li>
                        <li>If you want to upload more than 1GB file, please contact Customer center.</li>
                    </ul>
                    </div>
                </div>                
            </div>
            </div>
            <div class="eBook_Reading_Period_Settings eBook_box">
                <h5>Password Settings *</h5>
                    <div class="device_type_box  active_tab">
                    <div class="form-group row">
                      <label for="example-password-input" class="col-sm-1 col-form-label">Password</label>
                      <div class="col-sm-3">
                        <input class="form-control" value="hunter2"  type="password" name="lcp_password" id="lcp_password">
                      </div>
                    </div>
                    <p>The eBook will be encrypted with the password you entered. Please enter within 8 characters.</p>                
                </div>
            </div> 
            <input id="providerid" name="provider_id" type="hidden" class="form-control datepicker-custom" value="<?php if(isset($deviceresultArray['provider_id']) && $deviceresultArray['provider_id']!= "" ) { echo $deviceresultArray['provider_id']; } ?>" />  
                    <input id="user_id" name="user_id" type="hidden" class="form-control datepicker-custom" value="<?php if(isset($deviceresultArray['user_id']) && $deviceresultArray['user_id']!= "" ) { echo $deviceresultArray['user_id']; } ?>" />
            <?php if (isset($user_info) && is_array($user_info) && count($user_info)>0) {  ?>
            <div class="Encrypt_eBook_btn"><button class="btn btn-info btn-lg btn-block" type="submit">Encrypt eBook</button></div>
            <?php }else { ?>
            <div class="Encrypt_eBook_btn"><a href="#" class="btn btn-info btn-lg btn-block">Encrypt eBook</a></div>
            <?php } ?>
        </div>
    </div>
    </form>
    </div>    
    </div>
</div>
</section>
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php'); ?></footer>
<link type="text/css" rel="stylesheet" href="../../css/jquery-ui.css">
<script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript">

	$(document).ready(function() {
	
		$("#startdate").datepicker({ dateFormat: 'dd/mm/yy' });
		$("#enddate").datepicker({ dateFormat: 'dd/mm/yy' });
		$('.fa-calendar').click(function(){
			//alert("d");
			//$(this).closest('.inline_form_date').find('.datepicker-custom').addClass('test');
			var datepickerID = $(this).parent().find('input').attr('id');
			$("#"+datepickerID).focus();
		});
		
		
		
	});
</script> 
<script type='text/javascript' src='../../js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='../../js/plugins/validationengine/jquery.validationEngine.js'></script>  
        <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.js'></script>
         <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.hooks.js'></script> 
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script> 
<script type="text/javascript">
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Byte';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
};
 //var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
	//var filesize = $("#ios_file_"+idprefix)[0].files[0].size;
	//alert(filesize);
	//var filesize = bytesToSize(filesize);
$(document).on('click', ".group_box input:radio", function(){
		$(this).closest(".eBook_box").find(".group_box").removeClass('active_tab').addClass("inactive_tab");
		if($(this).is(':checked'))
		{
			$(this).closest(".group_box").removeClass("inactive_tab").addClass("active_tab");
		}
		
	});
	
		//alert($('input[name=AddFile]:checked').val());
  
   
				$(document).ready(function(){
			$('#certificate_form').submit(function() {
				//alert("submit")
				 //$('.modal').show();
				var addFile = $('input[name=AddFile]:checked').val();
					if(addFile == 'select') {
						var addFileSelect = $( "#exist_file" ).val();
							if (addFileSelect == null || addFileSelect == 0 ) {
								addFileSelectStatus = 1;
								$("#message_box").text("Please select sample file");
								$('.modal').show();
								return false;
								
							}
						}else {
						 myepub_file = $('#myepub_file').val();
						 
						 if(myepub_file == ''){
							$("#message_box").text("Please upload file");
							$('.modal').show();
							return false;
						 }else {
						var filesizebyte = $("#myepub_file")[0].files[0].size;
						 var filesize = bytesToSize(filesizebyte);
						 
							 if(filesizebyte > 104857600){
							 myepub_fileSizeStatus = 1;
							  $("#message_box").text(" Please add files under 100MB");
							  $('.modal').show();
								return false;
							 }
								
						 }
						}
				var Device = $('input[name=ServiceType]:checked').val();
				//alert(Device);
					if ( Device == 'device') {
						var deviceSelect = $( "#device_choose" ).val();
							if (deviceSelect == null || deviceSelect == 0 ) {
								//deviceSelect = 1;
								//deviceSelectStaus = 1;
								$("#message_box").text("Please select deviceType");
								 $('.modal').show();
								return false;
							}
					}
					
					if($('#datecheckbox').prop('checked')) {
    						var startVdate = $( "#startdate" ).val();
							var endVdate = $( "#enddate" ).val();
							
							if(startVdate == '' || endVdate == '') {
								 $("#message_box").text("Please Set eBook Reading Period");
								 $('.modal').show();
								return false;
							}
							
							
					}
				//alert(Device);
					
				//alert(myepub_fileStatus);
				//return false;
				 
    });
	$('#lcp_form').submit(function() {
				//alert("submit")
				 //$('.modal').show();
				var addFile = $('input[name=LCP_AddFile]:checked').val();
					if(addFile == 'select') {
						var addFileSelect = $( "#lcp_exist_file" ).val();
							if (addFileSelect == null || addFileSelect == 0 ) {
								addFileSelectStatus = 1;
								$("#message_box").text("Please select sample file");
								$('.modal').show();
								return false;
								
							}
						}else {
						 myepub_file = $('#lcp_myepub_file').val();
						 
						 if(myepub_file == ''){
							$("#message_box").text("Please upload file");
							$('.modal').show();
							return false;
						 }else {
						var filesizebyte = $("#lcp_myepub_file")[0].files[0].size;
						 var filesize = bytesToSize(filesizebyte);
						 
							 if(filesizebyte > 104857600){
							 myepub_fileSizeStatus = 1;
							  $("#message_box").text(" Please add files under 100MB");
							  $('.modal').show();
								return false;
							 }
								
						 }
						}
						//var pwd = $('#lcp_password').val();
						var pwdl = $('#lcp_password').val().length;
						//return false;
						//alert(pwdl);
 						if(pwdl > 8) {
							$("#message_box").text("Please enter password  within 8 characters");
							  $('.modal').show();
								return false;	
						}
				/*var Device = $('input[name=ServiceType]:checked').val();
				//alert(Device);
					if ( Device == 'device') {
						var deviceSelect = $( "#device_choose" ).val();
							if (deviceSelect == null || deviceSelect == 0 ) {
								//deviceSelect = 1;
								//deviceSelectStaus = 1;
								$("#message_box").text("Please select deviceType");
								 $('.modal').show();
								return false;
							}
					}
					
					if($('#datecheckbox').prop('checked')) {
    						var startVdate = $( "#startdate" ).val();
							var endVdate = $( "#enddate" ).val();
							
							if(startVdate == '' || endVdate == '') {
								 $("#message_box").text("Please Set eBook Reading Period");
								 $('.modal').show();
								return false;
							}
							
							
					}*/
				//alert(Device);
					
				//alert(myepub_fileStatus);
				//return false;
				 
    });
});
function hideModal() {
	$('.modal').hide();
}
</script>
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
<?php 
	if (isset($_GET['error']) && $_GET['error'] == 'code1' ) { ?>
		<div class="modal fade in" id="Email_error" role="dialog"  style="display:block;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg" id="message_box">Error in file encription.</p>
        </div>
        <div style="height:20px;"></div> 
     
      <a href="tutorials.php" class="btn btn-info">OK</a>
    </div>
  </div>
</div>
</div>
<?php }

?>
</body>

</html>