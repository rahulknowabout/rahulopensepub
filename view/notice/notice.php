<?php error_reporting(E_ALL);
 include('../../admin/modal/notice/notice.php');
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
	$noticeList = noticeListonly($limistart,$limitend);
	//print_r($noticeList);die;
	$pagination = pagination($count,'notice.php?');

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
			<div class="advisor-background-banner" style="background: url('images/page_bg_notice.jpg') no-repeat center 100%; background-size: cover;">
				<div class="advisor-title-banner-header">
					<div class="container">
                    <div class="page_inside">
                    <ul class="breadcrumb">
                        <li><a href="../../index.php"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Notice</a></li>
                        <li>Notice</li>
                    </ul>
                    <h1>Notice</h1>
					</div>
                    </div>
				</div> 
			</div> 
		</div>    
<section class="main-content">
    <div class="container"> 
        <div class="member_page">
            <h1>Notice</b></h1>
            <div class="Form_Inside notice_table">
            <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Date</th>
                    
                  </tr>
                </thead>
                <tbody>
                 <?php if (isset($noticeList) && is_array($noticeList) && count($noticeList)>0) { 
		  				foreach($noticeList as $customerKey => $customerValue) {
		 ?>
              <tr class='clickable-row' data-href='notice_detail.php?id=<?php echo $customerValue['id']; ?>'>
              <td style="text-align:center;"><?php echo  $customerValue['id']; ?></td>
              <td style="text-align:left;"><?php echo  $customerValue['notice_title']; ?></td>
              <td style="text-align:center;"><?php echo  $customerValue['notice_date']; ?></td>
              
              
         </tr>
        
         <?php					
			}
		  }

           
		   
?>		
                  <!--<tr>
                    <td>211</td>
                    <td>Lorem ipsum dolor sit emet.</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>210</td>
                    <td>Product tutorials downloads managemennotice</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>209</td>
                    <td>title title</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>208</td>
                    <td>Product tutorials downloads managemennotice Product tutorials downloads managemennotice Product tutorials downloa.</td>
                    <td>2016.12.01</td>
                  </tr>
                  <tr>
                    <td>207</td>
                    <td>Administrator wrote in the admin page Screen exposed in conjunction with announcement</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>206</td>
                    <td>TitleTitleTitleTitleTitleTitleTitleTitleTitleTitleTitleTitle</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>205</td>
                    <td>Administrator wrote in the admin page Screen exposed in conjunction with announcement</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>204</td>
                    <td>When you click [Verify your email address] button, you will go to the authentication confirmation screen of OPENS homepage</td>
                    <td>2016.12.01</td>
                  </tr>
                  <tr>
                    <td>203</td>
                    <td>You’ve received this email because of your request on OPENS.com account with this email address.</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>202</td>
                    <td>When you click [Verify your email address] button, you will go to the authentication confirmation screen of OPENS homepage</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>201</td>
                    <td>TitleTitleTitleTitleTitleTitleTitleTitleTitleTitleTitleTitle</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>200</td>
                    <td>Try free epub tutorials, OPENS DRM.</td>
                    <td>2016.12.01</td>
                  </tr>
                  <tr>
                    <td>199</td>
                    <td>When you click [Verify your email address] button, you will go to the authentication confirmation screen of OPENS homepage</td>
                    <td>2017.01.01</td>
                  </tr>
                  <tr>
                    <td>198</td>
                    <td>You’ve received this email because of your request on OPENS.com account with this email address.</td>
                    <td>2017.01.01</td>
                  </tr> 
                  <tr>
                    <td>197</td>
                    <td>When you click [Verify your email address] button, you will go to the authentication confirmation screen of OPENS homepage</td>
                    <td>2016.12.01</td>
                  </tr>-->                 
                </tbody>
              </table>
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
<script>
jQuery(document).ready(function($) {
			//alert("hello");
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
</html>