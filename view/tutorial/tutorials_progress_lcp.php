<?php ini_set('max_execution_time', 300);
require_once('../../config.php');
require_once("../../functions.php");
require_once("../../new_functions.php");
require_once('../../commonfunctions.php');
//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//die;
//echo $stdate = str_replace('/','-',"".$_POST['enddate']."");
//$date=date_create($stdate);
//echo date_format($date,"Ymd");
if (isset($_POST['LCP_AddFile']) && $_POST['LCP_AddFile'] == 'select') {
									$fileNameArray =explode("/",$_POST['lcp_exist_file']);
									$keyNext = array_search($_POST['provider_id'],$fileNameArray);
									$fileRealName = $fileNameArray[$keyNext+1];
$data_array['masterEpub']	= 	$_POST['lcp_exist_file'];
$data_array['drmType']	= 	'lcp';
//$data_array['packageType']	= 	$_POST['eBookReadingMethod'];
/*if(isset($_POST['datecheckbox'])) {
	if(isset($_POST['startdate']) && $_POST['startdate']!= "" && isset($_POST['enddate']) && $_POST['enddate']!= ""  ) {
		$newstartDate = date_create(str_replace('/','-',"".$_POST['startdate'].""));
		$newendDate = date_create(str_replace('/','-',"".$_POST['enddate'].""));
		
		$data_array['rights']['startDate']	= 	date_format($newstartDate,"Ymd");
		$data_array['rights']['endDate']	= 	date_format($newendDate,"Ymd");
	}
}*/
$data_array['lcpInfo']['password']	= 	$_POST['lcp_password'];
$data_array['lcpInfo']['hint']	= 	$_POST['user_id'];
//$data_array['rights']	= 	$_POST['eBookReadingMethod'];							
//print_r($data_string = json_encode($data_array));	die;	
$data_string = json_encode($data_array);		
//print_r($data_string = json_encode($data_array));	die;					
$source = "http://v2.opensdrm.net/epubdrmpackager/masters/repackage";
$ch = curl_init($source);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
	'x-api-key:TEST40aa-eb1a-441c-8161-89f99074a02d',                                                                         
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
//print_r($result);die;
 if(file_exists("../../storage/epub/lcp/".$fileRealName)) unlink("../../storage/epub/lcp/".$fileRealName);
$destination = "../../storage/epub/lcp/".$fileRealName;
$file = fopen($destination, "w+");
fputs($file, $result);
fclose($file);
//die;
$tutorialHistoryArray['tutorial_file_name']  = $fileRealName;
$tutorialHistoryArray['tutorial_file_type']  = 'lcp';
$tutorialHistoryArray['user_id']  = $_POST['user_id'];
$tutorialHistoryCount = selectTutorialHistory($tutorialHistoryArray)['tutorial_history'];
if($tutorialHistoryCount>0) {
$tutorialHistoryArray['tutorial_start_date']  = date('Y-m-d h:i:s');
$tutorialHistoryArray['tutorial_end_date']  = date('Y-m-d h:i:s',strtotime('+24 hours'));
updateTutorialHistory($tutorialHistoryArray);
}else{
$tutorialHistoryArray['tutorial_start_date']  = date('Y-m-d h:i:s');
$tutorialHistoryArray['tutorial_end_date']  = date('Y-m-d h:i:s',strtotime('+24 hours'));
addTutorialHistory($tutorialHistoryArray);	
}
header('location:tutorials-complete_lcp.php?success='.$fileRealName);
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
<div class="advisor-background-banner" style="background: url('../../images/page_bg.jpg') no-repeat center 100%; background-size: cover;">
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
                        <div id="login_id" class="log_info">ID : <span>testuser1024</span></div>
                        <div id="login_pass" class="log_info">PW : <span>en29fcn@!</span></div>
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
                    <div class="file_format group_box EPUB_file inactive_tab">
                    <ul class="checkbox_inside">
                       <li>
                       <input id="s-option" name="selector" type="checkbox">
                        <label for="s-option">Sample EPUB</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                    <select multiple>
                        <option>trees.epub (1MB)</option>
                        <option>cc-shared.epub (150KB)</option>
                        <option>comic-book.epub (2MB)</option>
                        <option>wiki-wiki.epub (2MB)</option>
                        <option>with_video+sound.epub (3MB)</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="file_format group_box EPUB_file inactive_tab">
                    <ul class="checkbox_inside">
                       <li>
                       <input id="s-option-file" name="selector" type="checkbox">
                        <label for="s-option-file">My EPUB</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                     <div class="input_choose">
                        <label class="fileContainer">
                            Choose a file
                            <input type="file" disabled/>
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
                        <div class="device_type_box">
                        <ul class="checkbox_inside">
                           <li>
                           <input id="device_type" name="selector" type="checkbox">
                            <label for="device_type">Device Type</label>
                            <div class="check"><div class="inside"></div></div>
                            </li>
                        </ul>  
                       <div class="form-group">
                        <div class="row">
                            <div class="col-xs-11">
                            <select class="form-control" id="device_choose">
                                <option>Device Select</option>
                                <option>Iphone</option>
                                <option>Ipad</option>
                                <option>Tab</option>
                              </select>
                            <span class="msg info">
                                <a href="#" data-placement="top" data-toggle="popover" data-content="Some content inside the popover"><i class="fa fa-info-circle"></i></a></span>
                        <script>
                            $(document).ready(function(){
                                $('[data-toggle="popover"]').popover();
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
                    <div class="file_format EPUB_file">
                        <ul class="checkbox_inside">
                           <li>
                           <input id="user_type" name="selector" type="checkbox">
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
                    <div class="device_type_box">
                        <ul class="checkbox_inside">
                       <li>
                       <input id="download_file" name="selector" type="checkbox">
                        <label for="download_file">Download</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                    <p>By downloading to the device and viewing the EPUB, Ideal for small files or network environments.</p>
                    </div> </div>
                    <div class="col-sm-6">
                    <div class="file_format EPUB_file">
                        <ul class="checkbox_inside">
                           <li>
                           <input id="Streaming" name="selector" type="checkbox">
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
                    <div class="device_type_box">
                    <div class="choose_date">
                        <span><i class="fa fa-check-square"></i>Start Date</span>
                        <div class="inline_form_row">
                        <form class="inline_form_date">
                            <input id="startdate" class="form-control" placeholder="DD/MM/YYYY"/>
                        </form>
                        <i class="fa fa-calendar"></i>
                        </div>
                        <span>~</span>
                        <span>End Date</span>
                        <div class="inline_form_row">
                        <form class="inline_form_date">
                            <input id="enddate" class="form-control" placeholder="DD/MM/YYYY" />
                        </form>
                        <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                    <p>You can control access to eBooks only during the setup period.</p>                
                </div>
            </div> 
            <div class="Encrypt_eBook_btn"><a href="#" class="btn btn-info btn-lg btn-block">Encrypt eBook</a></div>
        </div>
    </div>
    </div>
<div id="Password_DRM" class="tab-pane fade in active">
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
                        <div id="login_id" class="log_info">ID : <span>testuser1024</span></div>
                        <div id="login_pass" class="log_info">PW : <span>en29fcn@!</span></div>
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
                    <div class="file_format">
                    <ul class="checkbox_inside">
                       <li>
                       <input id="s-option" name="selector" type="checkbox">
                        <label for="s-option">Sample EPUB</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                    <select multiple>
                        <option>trees.epub (1MB)</option>
                        <option>cc-shared.epub (150KB)</option>
                        <option>comic-book.epub (2MB)</option>
                        <option>wiki-wiki.epub (2MB)</option>
                        <option>with_video+sound.epub (3MB)</option>
                    </select>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="file_format EPUB_file">
                    <ul class="checkbox_inside">
                       <li>
                       <input id="s-option-file" name="selector" type="checkbox">
                        <label for="s-option-file">My EPUB</label>
                        <div class="check"><div class="inside"></div></div>
                        </li>
                    </ul>
                     <div class="input_choose">
                        <label class="fileContainer">
                            Choose a file
                            <input type="file"/>
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
                    <div class="device_type_box">
                    <div class="form-group row">
                      <label for="example-password-input" class="col-sm-1 col-form-label">Password</label>
                      <div class="col-sm-3">
                        <input class="form-control" value="hunter2" id="example-password-input" type="password">
                      </div>
                    </div>
                    <p>The eBook will be encrypted with the password you entered. Please enter within 8 characters.</p>                
                </div>
            </div> 
            <div class="Encrypt_eBook_btn"><a href="#" class="btn btn-info btn-lg btn-block">Encrypt eBook</a></div>
        </div>
    </div>
    </div>    
    </div>
</div>
</section>
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php'); ?></footer>
<?php if (isset($_POST['LCP_AddFile']) && $_POST['LCP_AddFile'] == 'myepub') { ?>
<div class="modal fade in" id="eBook_progress" role="dialog" style="display: block;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="progress_msg">eBook is being encrypted.
</p>
        </div>
        <div class="text-center"> <span  id = "progressbartext" class="progress_text">0%</span></div>
		<div class="meter red">
			<span id="progressbarrunner" style="width: 0%"></span>
		</div>     
        <div style="height:40px;"></div> 
      <div class="btn_center"><a href="../../index.php" class="btn btn-info btn-outline">Cancel</a></div>
    </div>
  </div>
</div>
</div> 
<div class="modal-backdrop fade in"></div>]
<?php } ?>

</body>
</html><?php
//ob_start();
//ob_flush();
//flush();
//echo "<pre>";
 $ch = curl_init();
 $headers = array("x-api-key:TEST40aa-eb1a-441c-8161-89f99074a02d","Content-Type:multipart/form-data");
 //$url ="http://stackoverflow.com";
	$url="http://v2.opensdrm.net/epubdrmpackager/providers/devtest/masters";
	$args['file'] = new CurlFile("".$_FILES['lcp_myepub_file']['tmp_name']."");
	$args['fileName'] = "".$_FILES['lcp_myepub_file']['name']."";
	//print_r($args);die;
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_HEADER => false,
        CURLOPT_POST => 1,
        CURLOPT_HTTPHEADER => $headers,
		CURLOPT_POSTFIELDS => $args,
        CURLOPT_RETURNTRANSFER => true,
		 
    ); // cURL options
curl_setopt_array($ch, $options);
curl_setopt($ch, CURLOPT_BUFFERSIZE,128);
curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'progress');
curl_setopt($ch, CURLOPT_NOPROGRESS, false);
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
$html = curl_exec($ch);
//print_r(curl_getinfo($ch));
curl_close($ch);
$returnArray = json_decode($html,true);
//print_r($returnArray); die;
if(isset($returnArray['result']) && $returnArray['result'] == 'error' ) {
	//ob_end_clean( );
	$string = '<script type="text/javascript">';
    $string .= 'window.location = "tutorials.php?error=code1"';
    $string .= '</script>';

    echo $string;
	
}else if(isset($returnArray['result']) && $returnArray['result'] == 'success'){
	//ob_end_clean( );
	if (isset($_POST['LCP_AddFile']) && $_POST['LCP_AddFile'] == 'myepub') {
$fileNameArray =explode("/",$returnArray['masterEpub']);
									$keyNext = array_search($_POST['provider_id'],$fileNameArray);
									$fileRealName = $fileNameArray[$keyNext+1];
$data_array['masterEpub']	= 	$returnArray['masterEpub'];
$data_array['drmType']	= 	'lcp';
//$data_array['packageType']	= 	$_POST['eBookReadingMethod'];
/*if(isset($_POST['datecheckbox'])) {
	if(isset($_POST['startdate']) && $_POST['startdate']!= "" && isset($_POST['enddate']) && $_POST['enddate']!= ""  ) {
		$newstartDate = date_create(str_replace('/','-',"".$_POST['startdate'].""));
		$newendDate = date_create(str_replace('/','-',"".$_POST['enddate'].""));
		
		$data_array['rights']['startDate']	= 	date_format($newstartDate,"Ymd");
		$data_array['rights']['endDate']	= 	date_format($newendDate,"Ymd");
	}
}*/
$data_array['lcpInfo']['password']	= 	$_POST['lcp_password'];
$data_array['lcpInfo']['hint']	= 	"no hint";
//$data_array['rights']	= 	$_POST['eBookReadingMethod'];							
//print_r($data_string = json_encode($data_array));	die;	
$data_string = json_encode($data_array);		
//print_r($data_string = json_encode($data_array));	die;					
$source = "http://v2.opensdrm.net/epubdrmpackager/masters/repackage";
$ch = curl_init($source);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
	'x-api-key:TEST40aa-eb1a-441c-8161-89f99074a02d',                                                                         
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
//print_r($result);die;
 if(file_exists("../../storage/epub/lcp/".$fileRealName)) unlink("../../storage/epub/lcp/".$fileRealName);
$destination = "../../storage/epub/lcp/".$fileRealName;
$file = fopen($destination, "w+");
fputs($file, $result);
fclose($file);
$tutorialHistoryArray['tutorial_file_name']  = $fileRealName;
$tutorialHistoryArray['tutorial_file_type']  = 'lcp';
$tutorialHistoryArray['user_id']  = $_POST['user_id'];
$tutorialHistoryCount = selectTutorialHistory($tutorialHistoryArray)['tutorial_history'];
if($tutorialHistoryCount>0) {
$tutorialHistoryArray['tutorial_start_date']  = date('Y-m-d h:i:s');
$tutorialHistoryArray['tutorial_end_date']  = date('Y-m-d h:i:s',strtotime('+24 hours'));
updateTutorialHistory($tutorialHistoryArray);
}else{
$tutorialHistoryArray['tutorial_start_date']  = date('Y-m-d h:i:s');
$tutorialHistoryArray['tutorial_end_date']  = date('Y-m-d h:i:s',strtotime('+24 hours'));
addTutorialHistory($tutorialHistoryArray);	
}
	$string = '<script type="text/javascript">';
    $string .= 'window.location = "tutorials-complete_lcp.php?success='.$fileRealName.'"';
    $string .= '</script>';

    echo $string;
	//header('location:tutorials-complete?success=epub');
}
}
//print_r(curl_getinfo());
//die;

//ob_flush();
//flush();
?> 
<?php
function progress($resource,$download_size, $downloaded, $upload_size, $uploaded)
{
    if($download_size > 0) { ?>
 <script>
	$("#progressbarrunner").css("width","<?php echo round($downloaded / $download_size  * 100); ?>%");
    $("#progressbartext").text("<?php echo round($downloaded / $download_size  * 100); ?>%");
    <?php if(round($downloaded / $download_size  * 100) == 100 ) {
		$setTutorial = 1;
	 ?>
	//window.location.href = 'tutorials-complete.php';
	
	<?php } ?>
    </script>
    <?php
	}
	//sleep(0.5);	
	
    
} 


?>