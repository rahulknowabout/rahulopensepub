<?php require_once('../../config.php');
require_once("../../functions.php");
require_once("../../new_functions.php");
require_once('../../commonfunctions.php');
if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
	$limistart = ($_REQUEST['pageNumber']-1)*30;
	$limitend =30;
}else {
	$limistart = 0;
	$limitend =30;
}
 if((isset($_COOKIE['member_login']) && $_COOKIE['member_login']!= "" && isset($_COOKIE['member_password']) && $_COOKIE['member_password']!= "")) {
	 $user_info = singleCustomerInfobyEmail($_COOKIE['member_login']);
	$Tutorial_History = selectTutorialHistoryByUserid($user_info['api_user_id'],$limistart,$limitend);
	$count = selectCountTutorialHistoryByUserid($user_info['api_user_id'])['tutorial_history'];
	$pagination = pagination($count,'tutorial_history.php?');
	
}elseif(isset($_SESSION['member_login']) && $_SESSION['member_login']!= "" && isset($_SESSION['member_password']) && $_SESSION['member_password']!= "") {
	$user_info = singleCustomerInfobyEmail( $_SESSION['member_login']);
	$Tutorial_History = selectTutorialHistoryByUserid($user_info['api_user_id'],$limistart,$limitend);
	$count = selectCountTutorialHistoryByUserid($user_info['api_user_id'])['tutorial_history'];
	$pagination = pagination($count,'tutorial_history.php?');
}else {
	$Tutorial_History = array();
	$pagination ="";
}
//echo "<pre>";
//print_r($Tutorial_History);
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
			<div class="advisor-background-banner" style="background: url('../../images/page_bg.jpg') no-repeat center 100%; background-size: cover;">
				<div class="advisor-title-banner-header">
					<div class="container">
                    <div class="page_inside">
                    <ul class="breadcrumb">
                        <li><a href="../../index.php"><i class="fa fa-home"></i></a></li>
                        <li><a href="#">Tutorials</a></li>
                        <li>History</li>
                    </ul>
                    <h1>History</h1>
					</div>
                    </div>
				</div> 
			</div> 
		</div>    
<section class="main-content">
    <div class="container"> 
        <div class="member_page history_page">
            <h1>History</b></h1>
            <p>You can check your tutorial usage history.</p>
            <div class="Form_Inside">
            <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>File Name</th>
                    <th>Download Date</th>
                    <th>Download</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
				if (isset($Tutorial_History) && is_array($Tutorial_History) && count($Tutorial_History) > 0 ) {
					$countset = $count;
					foreach($Tutorial_History as $key => $value ) { 
					 if ((strtotime(date('Y-m-d h:i:s')) > strtotime($value['tutorial_end_date'])) ) { 
					 	$classline ="class='line_through'";
					 }else{
						 $classline ="";
					 }
					?>
					<tr <?php echo $classline; ?>>
                    <td><?php echo $value['tutorial_id']; ?></td>
                    <td><?php echo $value['tutorial_file_type'] == 'opens' ? strtoupper($value['tutorial_file_type']):"Readium  ".strtoupper($value['tutorial_file_type']); ?></td>
                    <td><?php echo $value['tutorial_start_date']; ?></td>
                    <td><?php echo $value['tutorial_file_name'];?></td>
                    <td><?php echo date('Y-m-d',strtotime($value['tutorial_start_date'])); ?>~<?php echo date('Y-m-d',strtotime($value['tutorial_end_date'])); ?></td>
                    <?php if ((strtotime(date('Y-m-d h:i:s')) > strtotime($value['tutorial_end_date'])) ) { ?>
                    <td>Download</td>
                    <?php }else { 
						if ($value['tutorial_file_type'] == 'opens') { ?>
							<td><a href="tutorials-download.php?file=<?php echo $value['tutorial_file_name']; ?>">Download</a></td>
						<?php }else { ?>
							<td><a href="tutorials-download_lcp.php?file=<?php echo $value['tutorial_file_name']; ?>">Download</a></td>
						<?php }
					
					?>
                    
                    <?php } ?>
                  </tr>	
				<?php 
					$countset--; }
				}
				
				
				?>
                  <!--<tr>
                    <td>115</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr>
                    <td>114</td>
                    <td>Readium LCP</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr>
                    <td>113</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr>
                    <td>112</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr>
                    <td>111</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr>
                    <td>110</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr>
                    <td>109</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr>
                    <td>108</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr>
                    <td>107</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr class="line_through">
                    <td>106</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr class="line_through">
                    <td>105</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr class="line_through">
                    <td>104</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr class="line_through">
                    <td>103</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr> 
                  <tr class="line_through">
                    <td>102</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>
                  <tr class="line_through">
                    <td>101</td>
                    <td>OPENS</td>
                    <td>2017.01.01 15:00:00</td>
                    <td>adc_opens_170101.epub</td>
                    <td>2017.01.01~2017.01.02</td>
                    <td><a href="#">Download</a></td>
                  </tr>    -->                
                    
                </tbody>
              </table>
            </div>
            
            <div style="height:20px;"></div>
            <nav aria-label="Page navigation example">
              <div class="text-center">
              <ul class="pagination">
                <!--<li class="page-item">
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