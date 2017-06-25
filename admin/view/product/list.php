 <?php include_once('../../check_login.php');
 include('../../modal/product/product.php');
 include('../../comman_function.php');
 $countProduct = countProduct();
 $count = $countProduct['total_product'];
 //$pagination = pagination($count,'list.php?');
$searcharray = array(); 


 $cleanedGET = clean($_GET);

if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
	$limistart = ($_REQUEST['pageNumber']-1)*3;
	$limitend =3;
}
 if (isset($cleanedGET['search_product_type']) && $cleanedGET['search_product_type'] == 'all' ) {
	 if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
		  $productList = productList($limistart,$limitend);
	 }else {
		   $productList = productList();
	 }
	 
}elseif (isset($cleanedGET['search_product_type']) && $cleanedGET['search_product_type'] == 'SDK' ) {
	 if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
		 	if(isset($cleanedGET['product_name_sdk']) && $cleanedGET['product_name_sdk'] == 'c_sdk')
		  			$productList = productSearch('SDK','c_sdk',$limistart,$limitend);
	        elseif(isset($cleanedGET['product_name_sdk']) && $cleanedGET['product_name_sdk'] == 'p_sdk'){
				$productList = productSearch('SDK','p_sdk',$limistart,$limitend);
			}else{
				$productList = productSearch('SDK','all',$limistart,$limitend);
				$cleanedGET['product_name_sdk'] ='all';
			}
	 }else {
		   if(isset($cleanedGET['product_name_sdk']) && $cleanedGET['product_name_sdk'] == 'c_sdk') {
		  			$productList = productSearch('SDK','c_sdk');
	        }elseif(isset($cleanedGET['product_name_sdk']) && $cleanedGET['product_name_sdk'] == 'p_sdk'){
				$productList = productSearch('SDK','p_sdk');
			}else{
				$productList = productSearch('SDK','all');
				$cleanedGET['product_name_sdk'] ='all';
			}
	 }
	  $searcharray['search_product_type'] =$cleanedGET['search_product_type'];
	  $searcharray['product_name_sdk'] =$cleanedGET['product_name_sdk'];
	  $count = productSearchCount($cleanedGET['search_product_type'],$cleanedGET['product_name_sdk'])['total_product'];
	 //echo $count;die;
}elseif (isset($cleanedGET['search_product_type']) && $cleanedGET['search_product_type'] == 'program' ) {
	 if (isset($_REQUEST['pageNumber']) && $_REQUEST['pageNumber']>0 ) {
		 	
				$productList = productSearch('program','all',$limistart,$limitend);
			
	 }else {
		   
				$productList = productSearch('program','all');
			
	 }
	  $searcharray['search_product_type'] =$cleanedGET['search_product_type'];
	  $searcharray['product_name_program'] =all;
	  $count = productSearchCount($cleanedGET['search_product_type'],'all')['total_product'];
	 //echo $count;die;
}
 if (count($searcharray)>0) {
	  $pagination = pagination($count,'list.php?',$searcharray);
 }else {
 $productList = productList($limistart,$limitend); 
 $pagination = pagination($count,'list.php?');
 }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Product Management</title>
<link href="../../dist/img/favicon.ico" rel="icon" type="/ico" />
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.css">
<!-- Main style -->
<link rel="stylesheet" href="../../dist/css/style.css">
<link rel="stylesheet" href="../../dist/css/skins/_all-skins.css">
<!-- iCheck -->
<link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
<!-- jqueryUI -->
<link type="text/css" rel="stylesheet" href="../../dist/css/jquery-ui.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper"> 
  <!-- Header -->
 <header id="main_header" class="main-header"><?php include_once('../header/headert.php') ?></header>
  <!-- Left Sidebar -->
  <aside id="main_sidebar" class="main-sidebar"><?php include_once('../header/LeftSidebar.php') ?></aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="width_define"> 
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> <b>Product</b> Management </h1>
      </section>
      
      <!-- Main content -->
      <section class="content"> 
        <!-- Small boxes (Stat box) -->
        <div class="filter_box filter_box2">
          <div class="filter_data">
            <form name="search_form" id="search_form_product" method="post" action="../../controller/product/product.php">
              <div class="form-group row mb10">
                <label class="col-sm-3">Type</label>
                <div class="col-md-9 col-sm-12">
                  <div class="row">
                    <div class="col-sm-4 col-xs-4 Mobilebtn">
                      <input type="radio" value="all" name="search_product_type" id="All"  <?php if(isset($cleanedGET['search_product_type']) ) { if(isset($cleanedGET['search_product_type']) && $cleanedGET['search_product_type'] == 'all'){echo "checked ='checked'"; } } else {echo "checked"; } ?> onChange="productTypeChange(this.value)"  />
                      <label for="All" class="btn btn-outline">All</label>
                    </div>
                    <div class="col-sm-4 col-xs-4 Mobilebtn">
                      <input type="radio" value="SDK" name="search_product_type" id="SDKType" <?php if(isset($cleanedGET['search_product_type']) && $cleanedGET['search_product_type'] == 'SDK'){echo "checked ='checked'"; } ?> onChange="productTypeChange(this.value)"/>
                      <label for="SDKType" class="btn btn-outline">SDK</label>
                    </div>
                    <div class="col-sm-4 col-xs-4 Mobilebtn">
                      <input type="radio" value="program" name="search_product_type" id="ProgramType" <?php if(isset($cleanedGET['search_product_type']) && $cleanedGET['search_product_type'] == 'program'){echo "checked ='checked'"; } ?> onChange="productTypeChange(this.value)"/>
                      <label for="ProgramType" class="btn btn-outline">Program</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row mb0">
                <label class="col-sm-3">Product</label>
                <div class="col-md-9 col-sm-12">
                  <div class="select-style">
                   
                    <span  id="product_name_sdk_span" <?php if(isset($cleanedGET['search_product_type']) && $cleanedGET['search_product_type'] == 'SDK'){echo "style ='dispaly:block'"; }else{ ?> style="display:none;" <?php } ?>><select name="product_name_sdk" id="product_name_sdk" class="select form-control" ><option value="all">All</option><option value="c_sdk" <?php if(isset($cleanedGET['product_name_sdk']) && $cleanedGET['product_name_sdk'] == 'c_sdk'){echo "selected ='selected'"; } ?> >Client SDK</option><option value="p_sdk" <?php if(isset($cleanedGET['product_name_sdk']) && $cleanedGET['product_name_sdk'] == 'p_sdk'){echo "selected ='selected'"; } ?>  >Packager SDK</option></select></span>
                               <span id="product_name_program_span" <?php if(isset($cleanedGET['search_product_type']) && $cleanedGET['search_product_type'] == 'program'){echo "style ='dispaly:block'"; }else{ ?> style="display:none;" <?php } ?>><select name="product_name_program" id="product_name_program" class="select form-control"><option value="opens_packager">OPENS Packager</option></select></span>
                               <span id="product_name_all" <?php if(isset($cleanedGET['search_product_type']) && $cleanedGET['search_product_type'] == 'program' || ( $cleanedGET['search_product_type'] == 'SDK' ) ) { ?> style="display:none;"   <?php } ?> > <select name="product_name_all" id="product_name_all" class="select form-control"><option value="all">All</option> </select> </span>
                  </div>
                </div>
                
                <div class="pull-right btn_ft m0"> <button type="submit" name = "search_submit" value="search_submit" class="btn btn-info" style="margin-top:20px;">Search</button> </div>
              </div>
            </form>
          </div>
        </div>
        <div class="pull-right btn_ft m0"> <a href="addtmp.php" class="btn btn-info">Upload</a> </div>
        <div class="Form_Inside certificate_table">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Type</th>
                  <th>Product</th>
                  <th>Version</th>
                  <th>OS</th>
                </tr>
              </thead>
              <tbody>
               <?php if (isset($productList) && is_array($productList) && count($productList)>0) { 
		  				foreach($productList as $productKey => $productValue) {
							unset($os_array);
							$os_array =array();
							if ($productValue['product_ios'] == 1) { $os_array[] = 'iOS';}
							if ($productValue['product_android'] == 1) { $os_array[] = 'Android';}
							if ($productValue['product_windows'] == 1) { $os_array[] = 'Windows';}
							if ($productValue['product_linux'] == 1) { $os_array[] = 'Linux';}
							if ($productValue['product_osx'] == 1) { $os_array[] = 'OSX';}
							$os_string =implode(",",$os_array);
							if ($productValue['product_name'] == 'c_sdk') { $productValue['product_name'] = 'Client';}
							if ($productValue['product_name'] == 'p_sdk') { $productValue['product_name'] = 'Packager SDK';}
							if ($productValue['product_name'] == 'opens_packager') { $productValue['product_name'] = 'OPENS Packager';}
		 ?>
              <tr class='clickable-row' data-href='customerinfo.php?user_id=<?php echo $productValue['product_id']; ?>'>
              <td><?php echo  $productValue['product_id']; ?></td>
              <td><?php echo  $productValue['product_type']; ?></td>
              <td><?php echo  $productValue['product_name']; ?></td>
              <td><?php echo  $productValue['product_version']; ?></td>
              <td><?php echo  $os_string; ?></td>
              <td><a href="productinfo.php?product_id=<?php echo $productValue['product_id']; ?>"><button class="btn btn-default">View</button></a><!--<a href="edit.php?user_id=<?php echo $productValue['product_id']; ?>"><button class="btn btn-primary" style="margin-left:5px;">Edit / Change Level</button></a><button class="btn  btn-primary" style="margin-left:5px;" data-toggle="modal" data-target="#myModalNorm_<?php echo $productValue['user_id']; ?>">Change Level</button>--></td>
         </tr>
        
         <?php					
			}
		  }

           
		   
?>	
            
              </tbody>
            </table>
          </div>
          <nav aria-label="Page navigation example">
            <div class="text-center">
              <ul class="pagination">
               
                 <?php echo  $pagination;
     ?>
              </ul>
            </div>
          </nav>
        </div>
      </section>
      <!-- /.content --> 
    </div>
  </div>
  <!-- /.content-wrapper -->
  
  <footer id="main_footer" class="main-footer"><?php include_once('../footer/footert.php') ?></footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.2.3 --> 
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="../../bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	
	
	$(".sidebar-menu > li").removeClass("active");
	  // add class to the one we clicked
	  $("#plist").addClass("active");
	// Menu active function
	
	
		
});
</script> 

<!-- AdminLTE App --> 
<script src="../../dist/js/app.min.js"></script> 

<!-- SlimScroll 1.3.0 --> 
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="../../dist/js/demo.js"></script> 
<script src="../../dist/js/jquery-ui.min.js" type="text/javascript"></script>
<script>
function productTypeChange(ptype) {
	//alert(ptype);	
	if (ptype == 'program') {
		
		$("#product_name_sdk_span").css("display", "none");
		$("#product_name_program_span").css("display", "block");
		$("#product_name_all").css("display", "none");
	}if (ptype == 'SDK') {
		$("#product_name_sdk_span").css("display", "block");
		$("#product_name_program_span").css("display", "none");
		$("#product_name_all").css("display", "none");
		
		}if(ptype == 'all') {
		$("#product_name_sdk_span").css("display", "none");
		
		$("#product_name_program_span").css("display", "none");
		$("#product_name_all").css("display", "block");
		
	}
}
</script>
</body>
</html>
