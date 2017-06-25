<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, minimal-ui" />
    <title>Opens</title>
    <link href="images/favicon.ico" rel="icon" type="image/ico" />
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
</script> --> 
</head>
<body class="page-banner">
<section id="top_part"><?php require_once('../top_part/top_part.php');?></section>
<header id="main_header"><?php require_once('../header/header.php'); ?></header>
<div class="advisor-banner-header">
<div class="advisor-background-banner" style="background: url('../../images/page_bg_management.jpg') no-repeat center 100%; background-size: cover;">
<div class="advisor-title-banner-header">
    <div class="container">
        <div class="page_inside">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li>Management</li>
            </ul>
            <h1>Management</h1> </div>
    </div>
</div>
</div>
</div>
<section class="main-content">
<div class="Form_Inside management_page">
<div class="container">
<div class="member_page accordion_style">
	<h1>License Issuance History</h1>
	<div class="top_space_details">
	<div class="table-responsive">
	  <table class="table">
	  <tr>
		<th class="gray">Issue Date:</th>
		<th>2015.01.01 00:00:00</th>
	  </tr>
	  <tr>
		<th class="gray">User ID</th>
		<td>zonda9</td>
	  </tr>
	  <tr>
		<th class="gray">Target Type</th>
		<td>Device</td>
	  </tr>	
	  <tr>
		<th class="gray">License ID</th>
		<td>47eb0c8e-af44-4b66-85df-cae432e0ee81</td>
	  </tr>	
	  <tr>
		<th class="gray">Device ID</th>
		<td>test_dev</td>
	  </tr>	
	  <tr>
		<th class="gray">Device ID Type</th>
		<td>External</td>
	  </tr>	
	  <tr>
		<th class="gray p0" rowspan="4">
			<table width="100%">
				<tr>
					<td class="pr0">Book Info </td>
					<td class="p0">
						<table width="100%">
							<tr>
								<td class="p20">ISBN</td>
							</tr>
							<tr>
								<td class="p20">Book Title</td>
							</tr>
							<tr>
								<td class="p20">Price</td>
							</tr>
							<tr>
								<td class="p20">Currency</td>
							</tr>							
						</table>
					</td>
				</tr>
			</table>
		</th>
		<td>9788995432112</td>
	  </tr>	
	  <tr>
		<td>When snow falls on Christmas</td>
	  </tr>	
	  <tr>
		<td>99,000 won</td>
	  </tr>	
	  <tr>
		<td>KRW</td>
	  </tr>		  
	</table>
	</div>
	</div>
	<div class="Encrypt_eBook_btn Back_notice_list">
		<a href="notice.html" class="btn btn-info btn-lg btn-block">Back to List</a>
	</div>	
</div>	
</div>
</div>
</section>
<footer id="main_footer" class="main-footer"><?php require_once('../footer/footer.php'); ?></footer>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#startdate").datepicker({ dateFormat: 'dd-mm-yy' });
      $("#enddate").datepicker({ dateFormat: 'dd-mm-yy' });
  });
  </script>     
</body>

</html>