<?php // echo "<pre>";
//print_r($_REQUEST);die;
include('../../modal/product/product.php');
$cleaned = clean($_POST);
if ( isset($_REQUEST['del']) && $_REQUEST['del'] == 'del') {
	$cleaned = clean($_GET);
	deleteProduct($cleaned['product_id']);
	$os_type_array = explode(",",$cleaned['os_string']);
		if (is_array($os_type_array) && count($os_type_array)>0) {
				foreach ($os_type_array as $key => $value ){
					if($value == 'iOS') {
						deleteIosProduct($cleaned['product_id']);
					}
					if($value == 'Android') {
						deleteAndroidProduct($cleaned['product_id']);
					}
					if($value == 'Windows') {
						deleteWindowsProduct($cleaned['product_id']);
					}
					if($value == 'Linux') {
						deleteLinuxProduct($cleaned['product_id']);
					}
					if($value == 'OSX') {
						deleteOsxProduct($cleaned['product_id']);
					}
				}
				
		}
$existProduct = CheckProductParent($cleaned['product_id']);
		if (isset($existProduct) && is_array($existProduct) && count($existProduct)>0) {
			$product_id = $existProduct['product_id'];
			$cleaned['product_id'] =$existProduct['product_id'];
			//echo "<pre>";
			//print_r($existProduct);
			//die;
unset($os_array);
 $os_array =array();
 if ($existProduct['product_ios'] == 1) {
	  $os_array[] = 'iOS';
   // $iosArray = productIos($cleaned['product_id']);
	//echo "<pre>";
	//print_r($iosArray);
	//die;
 }
 if ($existProduct['product_android'] == 1) { 
 $os_array[] = 'Android';
// $androidArray = productAndroid($cleaned['product_id']);
 }
 if ($existProduct['product_windows'] == 1) { 
 $os_array[] = 'Windows';
 //$windowsArray =productwindows($cleaned['product_id']);
 
 }
 if ($existProduct['product_linux'] == 1) { 
 $os_array[] = 'Linux';
 //$linuxArray =productLinux($cleaned['product_id']);
 }
 if ($existProduct['product_osx'] == 1) { 
 $os_array[] = 'OSX';
  //$osxArray =productOsx($cleaned['product_id']);
 }
 if (is_array($os_array) && count($os_array)>0) {
				foreach ($os_array as $key => $value ){
					if($value == 'iOS') {
						deleteIosProduct($cleaned['product_id']);
					}
					if($value == 'Android') {
						deleteAndroidProduct($cleaned['product_id']);
					}
					if($value == 'Windows') {
						deleteWindowsProduct($cleaned['product_id']);
					}
					if($value == 'Linux') {
						deleteLinuxProduct($cleaned['product_id']);
					}
					if($value == 'OSX') {
						deleteOsxProduct($cleaned['product_id']);
					}
				}
				
		}
		deleteProduct($cleaned['product_id']);
			//echo "<hr/>";
			//print_r($_FILES);
			//echo "<hr/>";
			//print_r($existProduct);

			//$product_id = $existProduct['product_id'];
			//$cleaned['product_id'] =$existProduct['product_id'];
		}
		header("location: ../../view/product/list.php");
	}

if (isset($cleaned['search_product_type']) && $cleaned['search_product_type'] == 'all') {
	//productSearch
	header("location: ../../view/product/list.php?search_product_type=all"); 
}else if (isset($cleaned['search_product_type']) && $cleaned['search_product_type'] == 'SDK') {
		if(isset($cleaned['product_name_sdk']) && $cleaned['product_name_sdk'] == 'all') {
			header("location: ../../view/product/list.php?search_product_type=SDK"); 
		}elseif(isset($cleaned['product_name_sdk']) && $cleaned['product_name_sdk'] == 'c_sdk') {
			header("location: ../../view/product/list.php?search_product_type=SDK&product_name_sdk=c_sdk"); 
		}elseif(isset($cleaned['product_name_sdk']) && $cleaned['product_name_sdk'] == 'p_sdk') {
			header("location: ../../view/product/list.php?search_product_type=SDK&product_name_sdk=p_sdk"); 
		}
	//productSearch
	
}elseif(isset($cleaned['search_product_type']) && $cleaned['search_product_type'] == 'program'){
	header("location: ../../view/product/list.php?search_product_type=program"); 
}

?>