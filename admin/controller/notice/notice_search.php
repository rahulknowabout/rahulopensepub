<?php  //echo "<pre>";print_r($_POST);die;
include('../../modal/notice/notice.php');
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['search_submit'])  && $_POST['search_submit']=='search_submit' && isset($_POST['searchinput_name'])) {
//echo "<pre>";
//print_r($cleaned);die;
if (isset($_POST['search_notice']) && $_POST['search_notice']=='title'){
//customerSearchEmail($cleanedPOST['searchinput_name']);
header("location: ../../view/notice/list.php?search_notice=title&searchinput_name=".$_POST['searchinput_name'].""); 
}
if (isset($_POST['search_notice']) && $_POST['search_notice'] == 'content') {
//customerSearchEmail($cleanedPOST['searchinput_name']);
header("location: ../../view/notice/list.php?search_notice=content&searchinput_name=".$_POST['searchinput_name'].""); 
}
}
?>