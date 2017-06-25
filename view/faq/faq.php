<?php include('../../admin/modal/faq/notice.php'); 
require_once('../../commonfunctions.php');
if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
	$limistart = ($_REQUEST['pageNumber']-1)*30;
	$limitend =30;
}else {
	$limistart = 0;
	$limitend =30;
}
$countNotice = countNotice();
$count = $countNotice['opens_notice'];
//
	$pagination ="";
	$noticeList = noticeList($limistart,$limitend);
	//print_r($noticeList);die;
	$pagination = pagination($count,'faq.php?');
//echo "<pre>";
//print_r($noticeList);
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
</script>-->    
</head>
<body class="page-banner">
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php'); ?></header>
<div class="advisor-banner-header">
			<div class="advisor-background-banner" style="background: url('images/page_bg_download.jpg') no-repeat center 100%; background-size: cover;">
				<div class="advisor-title-banner-header">
					<div class="container">
                    <div class="page_inside">
                    <ul class="breadcrumb">
                        <li><a href="../../index.php"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Notice</a></li>
						<li>FAQ</li>
                    </ul>
                    <h1>FAQ</h1>
					</div>
                    </div>
				</div> 
			</div> 
		</div>    
	<section class="main-content">
    <div class="container"> 
        <div class="member_page">
            <h1>FAQ</h1>
            <div class="Form_Inside">
             <div class="accordion_style accordion_style_faq">
				<div class="panel-group" id="accordion">
				  
                    <?php if (isset($noticeList) && is_array($noticeList) && count($noticeList)>0) { 
					$i = 1;
		  				foreach($noticeList as $customerKey => $customerValue) {
		 ?>
             <!-- <tr class='clickable-row' data-href='customerinfo.php?user_id=<?php echo $customerValue['user_id']; ?>'>
              <td><?php echo  $customerValue['id']; ?></td>
              
              <td><?php echo  $customerValue['notice_title']; ?></td>
              <td><?php echo  $customerValue['notice_date']; ?></td>
              <td><a href="info.php?notice_id=<?php echo $customerValue['id']; ?>" class="btn btn-primary">View</a></td>
              
         </tr>-->
         <div class="panel panel-default">
					<div class="panel-heading">
					  <a data-toggle="collapse" data-parent="#accordion" href="#data<?php echo $customerValue['id']; ?>" class="dr collapsed">
						<h4 class="panel-title"><?php echo  $customerValue['notice_title']; ?><span class="droparrow"></span></h4>
					  </a>
					</div>
         <div id="data<?php echo $customerValue['id']; ?>" class="panel-collapse collapse">
						<div class="inside_space">
						<?php echo $notice_content_html = stripslashes(stripslashes($customerValue['notice_content_html'])); ?>
						</div>
					</div>
				  </div>
        
         <?php					
			}
		  }

           
		   
?>		
					
				 <!-- <div class="panel panel-default">
					<div class="panel-heading">
					  <a data-toggle="collapse" data-parent="#accordion" href="#data2" class="dr collapsed">
						<h4 class="panel-title"> Lorem ipsum dolor sit emet. <span class="droparrow"></span></h4>
					  </a>
					</div>
					<div id="data2" class="panel-collapse collapse">
						<div class="inside_space">
						<p>Welcome to Amazon.com. Amazon Services LLC and/or its affiliates ("Amazon") provide website features and other products and services to you when you visit or shop at Amazon.com, use Amazon products or services, use Amazon applications for mobile, or use software provided by Amazon in connection with any of the foregoing (collectively, "Amazon Services"). Amazon provides the Amazon <p>Services subject to the following conditions.</p>
						<p>By using Amazon Services, you agree to these conditions. Please read them carefully.</p>
						<p>We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, or Amazon applications for mobile) you also will be subject to the guidelines, terms and agreements applicable to that Amazon Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service Terms will control.</p>
						</div>
					</div>
					  <div class="panel panel-default">
						<div class="panel-heading">
						  <a data-toggle="collapse" data-parent="#accordion" href="#data3" class="dr collapsed">
							<h4 class="panel-title"> Lorem ipsum dolor sit emet. <span class="droparrow"></span></h4>
						  </a>
						</div>
						<div id="data3" class="panel-collapse collapse">
							<div class="inside_space">
							<p>Welcome to Amazon.com. Amazon Services LLC and/or its affiliates ("Amazon") provide website features and other products and services to you when you visit or shop at Amazon.com, use Amazon products or services, use Amazon applications for mobile, or use software provided by Amazon in connection with any of the foregoing (collectively, "Amazon Services"). Amazon provides the Amazon <p>Services subject to the following conditions.</p>
							<p>By using Amazon Services, you agree to these conditions. Please read them carefully.</p>
							<p>We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, or Amazon applications for mobile) you also will be subject to the guidelines, terms and agreements applicable to that Amazon Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service Terms will control.</p>
							</div>
						</div>
					  <div class="panel panel-default">
						<div class="panel-heading">
						  <a data-toggle="collapse" data-parent="#accordion" href="#data4" class="dr collapsed">
							<h4 class="panel-title"> Lorem ipsum dolor sit emet. <span class="droparrow"></span></h4>
						  </a>
						</div>
						<div id="data4" class="panel-collapse collapse">
							<div class="inside_space">
							<p>Welcome to Amazon.com. Amazon Services LLC and/or its affiliates ("Amazon") provide website features and other products and services to you when you visit or shop at Amazon.com, use Amazon products or services, use Amazon applications for mobile, or use software provided by Amazon in connection with any of the foregoing (collectively, "Amazon Services"). Amazon provides the Amazon <p>Services subject to the following conditions.</p>
							<p>By using Amazon Services, you agree to these conditions. Please read them carefully.</p>
							<p>We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, or Amazon applications for mobile) you also will be subject to the guidelines, terms and agreements applicable to that Amazon Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service Terms will control.</p>
							</div>
						</div>
					  </div>-->						
					  </div>					
				  </div>	 
			 </div>	
             <div style="height:20px;"></div>
            <nav aria-label="Page navigation example">
              <div class="text-center">
              <ul class="pagination">
               <!-- <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                  </a>
                </li>-->
                <?php  echo  $pagination; ?>
              </ul>
                </div>	 
            </nav>                
            </div>
        </div>
    </div>
</section>
     
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php'); ?></footer>
</body>
</html>