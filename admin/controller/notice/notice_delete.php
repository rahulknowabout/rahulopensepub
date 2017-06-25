<?php  //echo "<pre>";print_r($_GET);die;
include('../../modal/notice/notice.php');
if(isset($_GET['notice_id']) && $_GET['notice_id']!= "") {
noticeDelete($_GET['notice_id']);
}
header("location: ../../view/notice/list.php"); 
?>