<?php //echo "<pre>";
//print_r($_REQUEST);
//echo "<hr/>";
//print_r($_FILES);die;
include('../../modal/product/product.php');

$cleaned = clean($_POST);
$product_id =$cleaned['product_id'];

//echo $product_id;die;
$dup_array['product_version'] =trim($cleaned['product_version']);
$dup_array['product_type'] = $cleaned['product_type'];
$dup_array['product_name'] = $cleaned['product_name_program'];
$duplicate_product = singleProductByVersionExcept($dup_array,$cleaned['product_id']);
//echo "<pre>";
//print_r($duplicate_product);
//die;
if (is_array($duplicate_product) && count($duplicate_product)>0) {
	header("location: ../../view/product/addtmp.php?Error_Code=dup");die; 
} else {
	
	if (isset($cleaned['product_user_synchronization']) && $cleaned['product_user_synchronization'] == 1 ) {
		UpdateProductSynchronization($cleaned['product_id'],1); 
		$existProduct = CheckProductParent($cleaned['product_id']);
		
		//echo "<pre>";
		//print_r($existProduct);
		//die;
		if (isset($existProduct) && is_array($existProduct) && count($existProduct)>0) {
			$product_id = $existProduct['product_id'];
			$cleaned['product_id'] =$existProduct['product_id'];
			
if(isset($cleaned['product_type']) && $cleaned['product_type']!="" && $cleaned['product_type']=='program') {
//echo "<pre>";
//print_r($_REQUEST);die;
if (isset($_FILES['program_file_first']) && is_array($_FILES['program_file_first']) && isset($_FILES['program_file_first']['name']) && $_FILES['program_file_first']['name'] != "" && isset($_FILES['program_file_first']['size']) && $_FILES['program_file_first']['size']>0) {
	$programFileName =time()."_".$_FILES['program_file_first']['name'];
	move_uploaded_file($_FILES['program_file_first']['tmp_name'],'../../storage/product/program/'.$programFileName);
	
}else {
   $programFileName =$cleaned['program_file_hidden'];
}
$postarray['product_id'] = $cleaned['product_id'];
$postarray['product_reg_date'] = $cleaned['product_reg_date'];
$postarray['product_type'] = $cleaned['product_type'];
$postarray['product_name'] = $cleaned['product_name_program'];
$postarray['product_ios'] = 0;
$postarray['product_android'] = 0;
$postarray['product_windows'] = 0;
$postarray['product_linux'] = 0;
$postarray['product_osx'] = 0;
$postarray['product_file'] = $programFileName;
$postarray['product_version'] = $cleaned['product_version'];
$postarray['product_release_note'] = addslashes($cleaned['product_release_note']);
productHistoryUpdate($postarray);

}elseif(($cleaned['product_type']) && $cleaned['product_type']!="" && $cleaned['product_type']=='SDK'){
//echo "<pre>";
//print_r($_REQUEST);
//echo "<hr/>";
//print_r($_FILES);die;
$postarray['product_id'] = $cleaned['product_id'];
//$postarray['product_reg_date'] = $cleaned['product_reg_date'];
$postarray['product_type'] = $cleaned['product_type'];
$postarray['product_name'] = $cleaned['product_name_sdk'];
/****** ios Check               **********************/
if (isset($cleaned['ios_check'])) {
	$postarray['product_ios'] = 1;
}else {
	$postarray['product_ios'] = 0;
}
/****** Android Check               **********************/
if (isset($cleaned['android_check'])) {
	$postarray['product_android'] = 1;
}else {
	$postarray['product_android'] = 0;
}
/****** Windows Check               **********************/
if (isset($cleaned['windows_check'])) {
	$postarray['product_windows'] = 1;
}else {
	$postarray['product_windows'] = 0;
}
/******Linux Check               **********************/
if (isset($cleaned['linux_check'])) {
	$postarray['product_linux'] = 1;
}else {
	$postarray['product_linux'] = 0;
}
/******OSX Check               **********************/
if (isset($cleaned['osx_check'])) {
	$postarray['product_osx'] = 1;
}else {
	$postarray['product_osx'] = 0;
}
/*******************CHECKBOX END  **********************/
$postarray['product_file'] = "";
$postarray['product_version'] = $cleaned['product_version'];
$postarray['product_release_note'] = addslashes($cleaned['product_release_note']);
productHistoryUpdate($postarray);
//$product_id = mysql_insert_id();

/*** ios_Check array ***/
if (isset($cleaned['ios_check'])) {
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
   $iosArray = productIos($cleaned['product_id']);
   
   if (isset($iosArray) && is_array($iosArray) && count($iosArray)>0) {
			foreach($iosArray as $key => $value ) {
				if(isset($cleaned['language_ios_E'][$value['product_ios_id']]) && $cleaned['language_ios_E'][$value['product_ios_id']]!="" && isset($cleaned['ios_checksum_E'][$value['product_ios_id']])){
					
					if (isset($_FILES['ios_file_E']) && is_array($_FILES['ios_file_E']) && isset($_FILES['ios_file_E']['name'][$value['product_ios_id']]) && $_FILES['ios_file_E']['name'][$value['product_ios_id']] != "" && isset($_FILES['ios_file_E']['size'][$value['product_ios_id']]) && $_FILES['ios_file_E']['size'][$value['product_ios_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['ios_file_E']['name'][$value['product_ios_id']];
	move_uploaded_file($_FILES['ios_file_E']['tmp_name'][$value['product_ios_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['ios_file_hidden'][$value['product_ios_id']];
}
$postarray =array();
$postarray['product_ios_id'] =$value['product_ios_id'];
$postarray['product_language'] =$cleaned['language_ios_E'][$value['product_ios_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['ios_checksum_E'][$value['product_ios_id']];
productIosUpdate($postarray);
				}else {
					productIosDelete($value['product_ios_id']);
				}
			}
	}
	if (isset($cleaned['ios_checksum_first']) && $cleaned['ios_checksum_first']!="") {
	
	if (isset($_FILES['ios_file_first']) && is_array($_FILES['ios_file_first']) && isset($_FILES['ios_file_first']['name']) && $_FILES['ios_file_first']['name'] != "" && isset($_FILES['ios_file_first']['size']) && $_FILES['ios_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['ios_file_first']['name'];
	move_uploaded_file($_FILES['ios_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_ios_first'];
	$postarray['product_sha1_checksum'] = $cleaned['ios_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productIosRegister($postarray);
	}
	/** File move logic for ios file **/
	
	if (isset($_FILES['ios_file']) && is_array($_FILES['ios_file']) && count($_FILES['ios_file'])>0) {
			if (isset($_FILES['ios_file']['tmp_name']) && is_array($_FILES['ios_file']['tmp_name']) && count($_FILES['ios_file']['tmp_name'])>0) {
				foreach($_FILES['ios_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['ios_file']['name'][$fileSourceKey]) && $_FILES['ios_file']['name'][$fileSourceKey] != "" && isset($_FILES['ios_file']['size'][$fileSourceKey]) && $_FILES['ios_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['ios_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_ios']) && is_array($cleaned['language_ios']) && count($cleaned['language_ios'])>0) {
		foreach($cleaned['language_ios'] as $langKey => $langValue) {
		$postArray['language_ios'][] =$langValue;
		
	}
	}
	if (isset($cleaned['ios_checksum']) && is_array($cleaned['ios_checksum']) && count($cleaned['ios_checksum'])>0) {
		foreach($cleaned['ios_checksum'] as $checksumKey => $checksumValue) {
		$postArray['ios_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['ios_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_ios']) && isset($postArray['ios_checksum']) && isset($postArray['ios_filename']) && is_array($postArray['language_ios'])  && is_array($postArray['ios_checksum'])  && is_array($postArray['ios_filename']) && count($postArray['language_ios']) == count($postArray['ios_checksum']) &&count($postArray['ios_checksum']) == count($postArray['ios_filename'])) {
$iosarraylength = count($postArray['language_ios']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_ios'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['ios_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['ios_filename'][$i];
		productIosRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** android_Check array ***/
if (isset($cleaned['android_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	$androidArray = productAndroid($cleaned['product_id']);
if (isset($androidArray) && is_array($androidArray) && count($androidArray)>0) {
			foreach($androidArray as $key => $value ) {
				if(isset($cleaned['language_android_E'][$value['product_android_id']]) && $cleaned['language_android_E'][$value['product_android_id']]!="" && isset($cleaned['android_checksum_E'][$value['product_android_id']])){
					
					if (isset($_FILES['android_file_E']) && is_array($_FILES['android_file_E']) && isset($_FILES['android_file_E']['name'][$value['product_android_id']]) && $_FILES['android_file_E']['name'][$value['product_android_id']] != "" && isset($_FILES['android_file_E']['size'][$value['product_android_id']]) && $_FILES['android_file_E']['size'][$value['product_android_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['android_file_E']['name'][$value['product_android_id']];
	move_uploaded_file($_FILES['android_file_E']['tmp_name'][$value['product_android_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['android_file_hidden'][$value['product_android_id']];
}
$postarray =array();
$postarray['product_android_id'] =$value['product_android_id'];
$postarray['product_language'] =$cleaned['language_android_E'][$value['product_android_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['android_checksum_E'][$value['product_android_id']];
productAndroidUpdate($postarray);
				}else {
					productAndroidDelete($value['product_android_id']);
				}
			}
	}
	if (isset($cleaned['android_checksum_first']) && $cleaned['android_checksum_first']!="") {
	if (isset($_FILES['android_file_first']) && is_array($_FILES['android_file_first']) && isset($_FILES['android_file_first']['name']) && $_FILES['android_file_first']['name'] != "" && isset($_FILES['android_file_first']['size']) && $_FILES['android_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['android_file_first']['name'];
	move_uploaded_file($_FILES['android_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_android_first'];
	$postarray['product_sha1_checksum'] = $cleaned['android_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productAndroidRegister($postarray);
	}
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['android_file']) && is_array($_FILES['android_file']) && count($_FILES['android_file'])>0) {
			if (isset($_FILES['android_file']['tmp_name']) && is_array($_FILES['android_file']['tmp_name']) && count($_FILES['android_file']['tmp_name'])>0) {
				foreach($_FILES['android_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['android_file']['name'][$fileSourceKey]) && $_FILES['android_file']['name'][$fileSourceKey] != "" && isset($_FILES['android_file']['size'][$fileSourceKey]) && $_FILES['android_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['android_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_android']) && is_array($cleaned['language_android']) && count($cleaned['language_android'])>0) {
		foreach($cleaned['language_android'] as $langKey => $langValue) {
		$postArray['language_android'][] =$langValue;
		
	}
	}
	if (isset($cleaned['android_checksum']) && is_array($cleaned['android_checksum']) && count($cleaned['android_checksum'])>0) {
		foreach($cleaned['android_checksum'] as $checksumKey => $checksumValue) {
		$postArray['android_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['android_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_android']) && isset($postArray['android_checksum']) && isset($postArray['android_filename']) && is_array($postArray['language_android'])  && is_array($postArray['android_checksum'])  && is_array($postArray['android_filename']) && count($postArray['language_android']) == count($postArray['android_checksum']) &&count($postArray['android_checksum']) == count($postArray['android_filename'])) {
$iosarraylength = count($postArray['language_android']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_android'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['android_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['android_filename'][$i];
		productAndroidRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** android_Check array ***/
/*** windows_Check array ***/
if (isset($cleaned['windows_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	$windowsArray =productwindows($cleaned['product_id']);
	if (isset($windowsArray) && is_array($windowsArray) && count($windowsArray)>0) {
			foreach($windowsArray as $key => $value ) {
				if(isset($cleaned['language_windows_E'][$value['product_windows_id']]) && $cleaned['language_windows_E'][$value['product_windows_id']]!="" && isset($cleaned['windows_checksum_E'][$value['product_windows_id']])){
					
					if (isset($_FILES['windows_file_E']) && is_array($_FILES['windows_file_E']) && isset($_FILES['windows_file_E']['name'][$value['product_windows_id']]) && $_FILES['windows_file_E']['name'][$value['product_windows_id']] != "" && isset($_FILES['windows_file_E']['size'][$value['product_windows_id']]) && $_FILES['windows_file_E']['size'][$value['product_windows_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['windows_file_E']['name'][$value['product_windows_id']];
	move_uploaded_file($_FILES['windows_file_E']['tmp_name'][$value['product_windows_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['windows_file_hidden'][$value['product_windows_id']];
}
$postarray =array();
$postarray['product_windows_id'] =$value['product_windows_id'];
$postarray['product_language'] =$cleaned['language_windows_E'][$value['product_windows_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['windows_checksum_E'][$value['product_windows_id']];
productWindowsUpdate($postarray);
				}else {
					productWindowsDelete($value['product_windows_id']);
				}
			}
	}
	if (isset($cleaned['windows_checksum_first']) && $cleaned['windows_checksum_first']!="") {
	
	if (isset($_FILES['windows_file_first']) && is_array($_FILES['windows_file_first']) && isset($_FILES['windows_file_first']['name']) && $_FILES['windows_file_first']['name'] != "" && isset($_FILES['windows_file_first']['size']) && $_FILES['windows_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['windows_file_first']['name'];
	move_uploaded_file($_FILES['windows_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_windows_first'];
	$postarray['product_sha1_checksum'] = $cleaned['windows_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productWindowsRegister($postarray);
	}
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['windows_file']) && is_array($_FILES['windows_file']) && count($_FILES['windows_file'])>0) {
			if (isset($_FILES['windows_file']['tmp_name']) && is_array($_FILES['windows_file']['tmp_name']) && count($_FILES['windows_file']['tmp_name'])>0) {
				foreach($_FILES['windows_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['windows_file']['name'][$fileSourceKey]) && $_FILES['windows_file']['name'][$fileSourceKey] != "" && isset($_FILES['windows_file']['size'][$fileSourceKey]) && $_FILES['windows_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['windows_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_windows']) && is_array($cleaned['language_windows']) && count($cleaned['language_windows'])>0) {
		foreach($cleaned['language_windows'] as $langKey => $langValue) {
		$postArray['language_windows'][] =$langValue;
		
	}
	}
	if (isset($cleaned['windows_checksum']) && is_array($cleaned['windows_checksum']) && count($cleaned['windows_checksum'])>0) {
		foreach($cleaned['windows_checksum'] as $checksumKey => $checksumValue) {
		$postArray['windows_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['windows_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_windows']) && isset($postArray['windows_checksum']) && isset($postArray['windows_filename']) && is_array($postArray['language_windows'])  && is_array($postArray['windows_checksum'])  && is_array($postArray['windows_filename']) && count($postArray['language_windows']) == count($postArray['windows_checksum']) &&count($postArray['windows_checksum']) == count($postArray['windows_filename'])) {
$iosarraylength = count($postArray['language_windows']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_windows'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['windows_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['windows_filename'][$i];
		productWindowsRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** windows_Check array ***/

/*** linux_Check array ***/
if (isset($cleaned['linux_check'])) {
	 
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	
	$linuxArray =productLinux($cleaned['product_id']);
	if (isset($linuxArray) && is_array($linuxArray) && count($linuxArray)>0) {
			foreach($linuxArray as $key => $value ) {
				if(isset($cleaned['language_linux_E'][$value['product_linux_id']]) && $cleaned['language_linux_E'][$value['product_linux_id']]!="" && isset($cleaned['linux_checksum_E'][$value['product_linux_id']])){
					
					if (isset($_FILES['linux_file_E']) && is_array($_FILES['linux_file_E']) && isset($_FILES['linux_file_E']['name'][$value['product_linux_id']]) && $_FILES['linux_file_E']['name'][$value['product_linux_id']] != "" && isset($_FILES['linux_file_E']['size'][$value['product_linux_id']]) && $_FILES['linux_file_E']['size'][$value['product_linux_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['linux_file_E']['name'][$value['product_linux_id']];
	move_uploaded_file($_FILES['linux_file_E']['tmp_name'][$value['product_linux_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['linux_file_hidden'][$value['product_linux_id']];
}
$postarray =array();
$postarray['product_linux_id'] =$value['product_linux_id'];
$postarray['product_language'] =$cleaned['language_linux_E'][$value['product_linux_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['linux_checksum_E'][$value['product_linux_id']];
productLinuxUpdate($postarray);
				}else {
					productLinuxDelete($value['product_linux_id']);
				}
			}
	}

	
	if (isset($cleaned['linux_checksum_first']) && $cleaned['linux_checksum_first']!="") {
	
	if (isset($_FILES['linux_file_first']) && is_array($_FILES['linux_file_first']) && isset($_FILES['linux_file_first']['name']) && $_FILES['linux_file_first']['name'] != "" && isset($_FILES['linux_file_first']['size']) && $_FILES['linux_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['linux_file_first']['name'];
	move_uploaded_file($_FILES['linux_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_linux_first'];
	$postarray['product_sha1_checksum'] = $cleaned['linux_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productLinuxRegister($postarray);
	}
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['linux_file']) && is_array($_FILES['linux_file']) && count($_FILES['linux_file'])>0) {
			if (isset($_FILES['linux_file']['tmp_name']) && is_array($_FILES['linux_file']['tmp_name']) && count($_FILES['linux_file']['tmp_name'])>0) {
				foreach($_FILES['linux_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['linux_file']['name'][$fileSourceKey]) && $_FILES['linux_file']['name'][$fileSourceKey] != "" && isset($_FILES['linux_file']['size'][$fileSourceKey]) && $_FILES['linux_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['linux_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_linux']) && is_array($cleaned['language_linux']) && count($cleaned['language_linux'])>0) {
		foreach($cleaned['language_linux'] as $langKey => $langValue) {
		$postArray['language_linux'][] =$langValue;
		
	}
	}
	if (isset($cleaned['linux_checksum']) && is_array($cleaned['linux_checksum']) && count($cleaned['linux_checksum'])>0) {
		foreach($cleaned['linux_checksum'] as $checksumKey => $checksumValue) {
		$postArray['linux_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['linux_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
//echo $cleaned['product_id'];
if (isset($postArray['language_linux']) && isset($postArray['linux_checksum']) && isset($postArray['linux_filename']) && is_array($postArray['language_linux'])  && is_array($postArray['linux_checksum'])  && is_array($postArray['linux_filename']) && count($postArray['language_linux']) == count($postArray['linux_checksum']) &&count($postArray['linux_checksum']) == count($postArray['linux_filename'])) {
$iosarraylength = count($postArray['language_linux']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_linux'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['linux_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['linux_filename'][$i];
		productLinuxRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** linux_Check array ***/

/*** OSX_Check array ***/
if (isset($cleaned['osx_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	$osxArray =productOsx($cleaned['product_id']);
	//echo "<pre>";
	//print_r($osxArray);
	//echo "<hr/>";
	//print_r($_POST['language_osx_E']);
	//echo "<hr/>";
	//print_r($_POST['osx_checksum_E']);
	//echo "<hr/>";
	////print_r($_FILES['osx_file_E']);
	//echo "<hr/>";
	//print_r($_POST['osx_file_hidden']);

	//die;
	if (isset($osxArray) && is_array($osxArray) && count($osxArray)>0) {
			foreach($osxArray as $key => $value ) {
				if(isset($cleaned['language_osx_E'][$value['product_osx_id']]) && $cleaned['language_osx_E'][$value['product_osx_id']]!="" && isset($cleaned['osx_checksum_E'][$value['product_osx_id']])){
					
					if (isset($_FILES['osx_file_E']) && is_array($_FILES['osx_file_E']) && isset($_FILES['osx_file_E']['name'][$value['product_osx_id']]) && $_FILES['osx_file_E']['name'][$value['product_osx_id']] != "" && isset($_FILES['osx_file_E']['size'][$value['product_osx_id']]) && $_FILES['osx_file_E']['size'][$value['product_osx_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['osx_file_E']['name'][$value['product_osx_id']];
	move_uploaded_file($_FILES['osx_file_E']['tmp_name'][$value['product_osx_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['osx_file_hidden'][$value['product_osx_id']];
}
$postarray =array();
$postarray['product_osx_id'] =$value['product_osx_id'];
$postarray['product_language'] =$cleaned['language_osx_E'][$value['product_osx_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['osx_checksum_E'][$value['product_osx_id']];
productOsxUpdate($postarray);
				}else {
					productOsxDelete($value['product_osx_id']);
				}
			}
	}
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	
	if (isset($cleaned['osx_checksum_first']) && $cleaned['osx_checksum_first']!="") {
	if (isset($_FILES['osx_file_first']) && is_array($_FILES['osx_file_first']) && isset($_FILES['osx_file_first']['name']) && $_FILES['osx_file_first']['name'] != "" && isset($_FILES['osx_file_first']['size']) && $_FILES['osx_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['osx_file_first']['name'];
	move_uploaded_file($_FILES['osx_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
	
}else {
   $iosFileName ="";
}
    $postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_osx_first'];
	$postarray['product_sha1_checksum'] = $cleaned['osx_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productOsxRegister($postarray);	
	}
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['osx_file']) && is_array($_FILES['osx_file']) && count($_FILES['osx_file'])>0) {
			if (isset($_FILES['osx_file']['tmp_name']) && is_array($_FILES['osx_file']['tmp_name']) && count($_FILES['osx_file']['tmp_name'])>0) {
				foreach($_FILES['osx_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['osx_file']['name'][$fileSourceKey]) && $_FILES['osx_file']['name'][$fileSourceKey] != "" && isset($_FILES['osx_file']['size'][$fileSourceKey]) && $_FILES['osx_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['osx_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_osx']) && is_array($cleaned['language_osx']) && count($cleaned['language_osx'])>0) {
		foreach($cleaned['language_osx'] as $langKey => $langValue) {
		$postArray['language_osx'][] =$langValue;
		
	}
	}
	if (isset($cleaned['osx_checksum']) && is_array($cleaned['osx_checksum']) && count($cleaned['osx_checksum'])>0) {
		foreach($cleaned['osx_checksum'] as $checksumKey => $checksumValue) {
		$postArray['osx_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['osx_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_osx']) && isset($postArray['osx_checksum']) && isset($postArray['osx_filename']) && is_array($postArray['language_osx'])  && is_array($postArray['osx_checksum'])  && is_array($postArray['osx_filename']) && count($postArray['language_osx']) == count($postArray['osx_checksum']) &&count($postArray['osx_checksum']) == count($postArray['osx_filename'])) {
$iosarraylength = count($postArray['language_osx']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] = $product_id;
		$postinsertArray['product_language'] =$postArray['language_osx'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['osx_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['osx_filename'][$i];
		productOsxRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $product_id;
//echo $iosarraylength; die;
}
/*** osx_Check array ***/
}
header("location: ../../view/product/list.php");

		}else {
			UpdateProductSynchronization($cleaned['product_id'],1);
	if(isset($cleaned['product_type']) && $cleaned['product_type']!="" && $cleaned['product_type']=='program') {
//echo "<pre>";
//print_r($_REQUEST);die;
if (isset($_FILES['program_file_first']) && is_array($_FILES['program_file_first']) && isset($_FILES['program_file_first']['name']) && $_FILES['program_file_first']['name'] != "" && isset($_FILES['program_file_first']['size']) && $_FILES['program_file_first']['size']>0) {
	$programFileName =time()."_".$_FILES['program_file_first']['name'];
	move_uploaded_file($_FILES['program_file_first']['tmp_name'],'../../storage/product/program/'.$programFileName);
	
}else {
   $programFileName ="";
}
$postarray['product_reg_date'] = $cleaned['product_reg_date'];
$postarray['product_type'] = $cleaned['product_type'];
$postarray['parent_product_id'] = $cleaned['product_id'];
$postarray['product_name'] = $cleaned['product_name_program'];
$postarray['product_ios'] = 0;
$postarray['product_android'] = 0;
$postarray['product_windows'] = 0;
$postarray['product_linux'] = 0;
$postarray['product_osx'] = 0;
$postarray['product_file'] = $programFileName;
$postarray['product_version'] = $cleaned['product_version'];
$postarray['product_uploaded_time'] = "".date('Y-m-d H:i:s')."";
$postarray['product_release_note'] = addslashes($cleaned['product_release_note']);
$postarray['product_user_synchronization'] = $cleaned['product_user_synchronization'];
productHistoryRegister($postarray);

}elseif(isset($cleaned['product_type']) && $cleaned['product_type']!="" && $cleaned['product_type']=='SDK') {

//echo "<pre>";
//print_r($_REQUEST);
//echo "<hr/>";
//print_r($_FILES);die;
$postarray['product_reg_date'] = $cleaned['product_reg_date'];
$postarray['product_type'] = $cleaned['product_type'];
$postarray['parent_product_id'] = $cleaned['product_id'];
$postarray['product_name'] = $cleaned['product_name_sdk'];
$postarray['product_uploaded_time'] = "".date('Y-m-d H:i:s')."";

/****** ios Check               **********************/
if (isset($cleaned['ios_check'])) {
	$postarray['product_ios'] = 1;
}else {
	$postarray['product_ios'] = 0;
}
/****** Android Check               **********************/
if (isset($cleaned['android_check'])) {
	$postarray['product_android'] = 1;
}else {
	$postarray['product_android'] = 0;
}
/****** Windows Check               **********************/
if (isset($cleaned['windows_check'])) {
	$postarray['product_windows'] = 1;
}else {
	$postarray['product_windows'] = 0;
}
/******Linux Check               **********************/
if (isset($cleaned['linux_check'])) {
	$postarray['product_linux'] = 1;
}else {
	$postarray['product_linux'] = 0;
}
/******OSX Check               **********************/
if (isset($cleaned['osx_check'])) {
	$postarray['product_osx'] = 1;
}else {
	$postarray['product_osx'] = 0;
}
/*******************CHECKBOX END  **********************/
$postarray['product_file'] = "";
$postarray['product_version'] = $cleaned['product_version'];
$postarray['product_release_note'] = addslashes($cleaned['product_release_note']);
$postarray['product_user_synchronization'] = $cleaned['product_user_synchronization'];
productHistoryRegister($postarray);
$product_id = mysql_insert_id();
$cleaned['product_id'] = $product_id;

/*** ios_Check array ***/
if (isset($cleaned['ios_check'])) {
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	if (isset($_FILES['ios_file_first']) && is_array($_FILES['ios_file_first']) && isset($_FILES['ios_file_first']['name']) && $_FILES['ios_file_first']['name'] != "" && isset($_FILES['ios_file_first']['size']) && $_FILES['ios_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['ios_file_first']['name'];
	move_uploaded_file($_FILES['ios_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_ios_first'];
	$postarray['product_sha1_checksum'] = $cleaned['ios_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productIosRegister($postarray);
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['ios_file']) && is_array($_FILES['ios_file']) && count($_FILES['ios_file'])>0) {
			if (isset($_FILES['ios_file']['tmp_name']) && is_array($_FILES['ios_file']['tmp_name']) && count($_FILES['ios_file']['tmp_name'])>0) {
				foreach($_FILES['ios_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['ios_file']['name'][$fileSourceKey]) && $_FILES['ios_file']['name'][$fileSourceKey] != "" && isset($_FILES['ios_file']['size'][$fileSourceKey]) && $_FILES['ios_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['ios_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_ios']) && is_array($cleaned['language_ios']) && count($cleaned['language_ios'])>0) {
		foreach($cleaned['language_ios'] as $langKey => $langValue) {
		$postArray['language_ios'][] =$langValue;
		
	}
	}
	if (isset($cleaned['ios_checksum']) && is_array($cleaned['ios_checksum']) && count($cleaned['ios_checksum'])>0) {
		foreach($cleaned['ios_checksum'] as $checksumKey => $checksumValue) {
		$postArray['ios_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['ios_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_ios']) && isset($postArray['ios_checksum']) && isset($postArray['ios_filename']) && is_array($postArray['language_ios'])  && is_array($postArray['ios_checksum'])  && is_array($postArray['ios_filename']) && count($postArray['language_ios']) == count($postArray['ios_checksum']) &&count($postArray['ios_checksum']) == count($postArray['ios_filename'])) {
$iosarraylength = count($postArray['language_ios']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_ios'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['ios_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['ios_filename'][$i];
		productIosRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** android_Check array ***/
if (isset($cleaned['android_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	
	if (isset($_FILES['android_file_first']) && is_array($_FILES['android_file_first']) && isset($_FILES['android_file_first']['name']) && $_FILES['android_file_first']['name'] != "" && isset($_FILES['android_file_first']['size']) && $_FILES['android_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['android_file_first']['name'];
	move_uploaded_file($_FILES['android_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_android_first'];
	$postarray['product_sha1_checksum'] = $cleaned['android_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productAndroidRegister($postarray);
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['android_file']) && is_array($_FILES['android_file']) && count($_FILES['android_file'])>0) {
			if (isset($_FILES['android_file']['tmp_name']) && is_array($_FILES['android_file']['tmp_name']) && count($_FILES['android_file']['tmp_name'])>0) {
				foreach($_FILES['android_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['android_file']['name'][$fileSourceKey]) && $_FILES['android_file']['name'][$fileSourceKey] != "" && isset($_FILES['android_file']['size'][$fileSourceKey]) && $_FILES['android_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['android_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_android']) && is_array($cleaned['language_android']) && count($cleaned['language_android'])>0) {
		foreach($cleaned['language_android'] as $langKey => $langValue) {
		$postArray['language_android'][] =$langValue;
		
	}
	}
	if (isset($cleaned['android_checksum']) && is_array($cleaned['android_checksum']) && count($cleaned['android_checksum'])>0) {
		foreach($cleaned['android_checksum'] as $checksumKey => $checksumValue) {
		$postArray['android_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['android_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_android']) && isset($postArray['android_checksum']) && isset($postArray['android_filename']) && is_array($postArray['language_android'])  && is_array($postArray['android_checksum'])  && is_array($postArray['android_filename']) && count($postArray['language_android']) == count($postArray['android_checksum']) &&count($postArray['android_checksum']) == count($postArray['android_filename'])) {
$iosarraylength = count($postArray['language_android']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_android'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['android_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['android_filename'][$i];
		productAndroidRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** android_Check array ***/
/*** windows_Check array ***/
if (isset($cleaned['windows_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	
	if (isset($_FILES['windows_file_first']) && is_array($_FILES['windows_file_first']) && isset($_FILES['windows_file_first']['name']) && $_FILES['windows_file_first']['name'] != "" && isset($_FILES['windows_file_first']['size']) && $_FILES['windows_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['windows_file_first']['name'];
	move_uploaded_file($_FILES['windows_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_windows_first'];
	$postarray['product_sha1_checksum'] = $cleaned['windows_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productWindowsRegister($postarray);
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['windows_file']) && is_array($_FILES['windows_file']) && count($_FILES['windows_file'])>0) {
			if (isset($_FILES['windows_file']['tmp_name']) && is_array($_FILES['windows_file']['tmp_name']) && count($_FILES['windows_file']['tmp_name'])>0) {
				foreach($_FILES['windows_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['windows_file']['name'][$fileSourceKey]) && $_FILES['windows_file']['name'][$fileSourceKey] != "" && isset($_FILES['windows_file']['size'][$fileSourceKey]) && $_FILES['windows_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['windows_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_windows']) && is_array($cleaned['language_windows']) && count($cleaned['language_windows'])>0) {
		foreach($cleaned['language_windows'] as $langKey => $langValue) {
		$postArray['language_windows'][] =$langValue;
		
	}
	}
	if (isset($cleaned['windows_checksum']) && is_array($cleaned['windows_checksum']) && count($cleaned['windows_checksum'])>0) {
		foreach($cleaned['windows_checksum'] as $checksumKey => $checksumValue) {
		$postArray['windows_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['windows_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_windows']) && isset($postArray['windows_checksum']) && isset($postArray['windows_filename']) && is_array($postArray['language_windows'])  && is_array($postArray['windows_checksum'])  && is_array($postArray['windows_filename']) && count($postArray['language_windows']) == count($postArray['windows_checksum']) &&count($postArray['windows_checksum']) == count($postArray['windows_filename'])) {
$iosarraylength = count($postArray['language_windows']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_windows'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['windows_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['windows_filename'][$i];
		productWindowsRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** windows_Check array ***/

/*** linux_Check array ***/
if (isset($cleaned['linux_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	
	if (isset($_FILES['linux_file_first']) && is_array($_FILES['linux_file_first']) && isset($_FILES['linux_file_first']['name']) && $_FILES['linux_file_first']['name'] != "" && isset($_FILES['linux_file_first']['size']) && $_FILES['linux_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['linux_file_first']['name'];
	move_uploaded_file($_FILES['linux_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_linux_first'];
	$postarray['product_sha1_checksum'] = $cleaned['linux_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productLinuxRegister($postarray);
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['linux_file']) && is_array($_FILES['linux_file']) && count($_FILES['linux_file'])>0) {
			if (isset($_FILES['linux_file']['tmp_name']) && is_array($_FILES['linux_file']['tmp_name']) && count($_FILES['linux_file']['tmp_name'])>0) {
				foreach($_FILES['linux_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['linux_file']['name'][$fileSourceKey]) && $_FILES['linux_file']['name'][$fileSourceKey] != "" && isset($_FILES['linux_file']['size'][$fileSourceKey]) && $_FILES['linux_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['linux_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_linux']) && is_array($cleaned['language_linux']) && count($cleaned['language_linux'])>0) {
		foreach($cleaned['language_linux'] as $langKey => $langValue) {
		$postArray['language_linux'][] =$langValue;
		
	}
	}
	if (isset($cleaned['linux_checksum']) && is_array($cleaned['linux_checksum']) && count($cleaned['linux_checksum'])>0) {
		foreach($cleaned['linux_checksum'] as $checksumKey => $checksumValue) {
		$postArray['linux_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['linux_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_linux']) && isset($postArray['linux_checksum']) && isset($postArray['linux_filename']) && is_array($postArray['language_linux'])  && is_array($postArray['linux_checksum'])  && is_array($postArray['linux_filename']) && count($postArray['language_linux']) == count($postArray['linux_checksum']) &&count($postArray['linux_checksum']) == count($postArray['linux_filename'])) {
$iosarraylength = count($postArray['language_linux']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_linux'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['linux_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['linux_filename'][$i];
		productLinuxRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** linux_Check array ***/

/*** OSX_Check array ***/
if (isset($cleaned['osx_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	
	if (isset($_FILES['osx_file_first']) && is_array($_FILES['osx_file_first']) && isset($_FILES['osx_file_first']['name']) && $_FILES['osx_file_first']['name'] != "" && isset($_FILES['osx_file_first']['size']) && $_FILES['osx_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['osx_file_first']['name'];
	move_uploaded_file($_FILES['osx_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_osx_first'];
	$postarray['product_sha1_checksum'] = $cleaned['osx_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productOsxRegister($postarray);
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['osx_file']) && is_array($_FILES['osx_file']) && count($_FILES['osx_file'])>0) {
			if (isset($_FILES['osx_file']['tmp_name']) && is_array($_FILES['osx_file']['tmp_name']) && count($_FILES['osx_file']['tmp_name'])>0) {
				foreach($_FILES['osx_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['osx_file']['name'][$fileSourceKey]) && $_FILES['osx_file']['name'][$fileSourceKey] != "" && isset($_FILES['osx_file']['size'][$fileSourceKey]) && $_FILES['osx_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['osx_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_osx']) && is_array($cleaned['language_osx']) && count($cleaned['language_osx'])>0) {
		foreach($cleaned['language_osx'] as $langKey => $langValue) {
		$postArray['language_osx'][] =$langValue;
		
	}
	}
	if (isset($cleaned['osx_checksum']) && is_array($cleaned['osx_checksum']) && count($cleaned['osx_checksum'])>0) {
		foreach($cleaned['osx_checksum'] as $checksumKey => $checksumValue) {
		$postArray['osx_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['osx_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_osx']) && isset($postArray['osx_checksum']) && isset($postArray['osx_filename']) && is_array($postArray['language_osx'])  && is_array($postArray['osx_checksum'])  && is_array($postArray['osx_filename']) && count($postArray['language_osx']) == count($postArray['osx_checksum']) &&count($postArray['osx_checksum']) == count($postArray['osx_filename'])) {
$iosarraylength = count($postArray['language_osx']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_osx'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['osx_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['osx_filename'][$i];
		productOsxRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** osx_Check array ***/
	
}
		}
} else {
	//echo "<pre>";
//print_r($cleaned);
//echo "<hr/>";
//print_r($_FILES);
//die;
	/**   USER APPLY FOR SYNCHRONIZATION  **/
	
UpdateProductSynchronization($cleaned['product_id'],0);
if(isset($cleaned['product_type']) && $cleaned['product_type']!="" && $cleaned['product_type']=='program') {
//echo "<pre>";
//print_r($_REQUEST);die;
if (isset($_FILES['program_file_first']) && is_array($_FILES['program_file_first']) && isset($_FILES['program_file_first']['name']) && $_FILES['program_file_first']['name'] != "" && isset($_FILES['program_file_first']['size']) && $_FILES['program_file_first']['size']>0) {
	$programFileName =time()."_".$_FILES['program_file_first']['name'];
	move_uploaded_file($_FILES['program_file_first']['tmp_name'],'../../storage/product/program/'.$programFileName);
	
}else {
   $programFileName =$cleaned['program_file_hidden'];
}
$postarray['product_id'] = $cleaned['product_id'];
$postarray['product_reg_date'] = $cleaned['product_reg_date'];
$postarray['product_type'] = $cleaned['product_type'];
$postarray['product_name'] = $cleaned['product_name_program'];
$postarray['product_ios'] = 0;
$postarray['product_android'] = 0;
$postarray['product_windows'] = 0;
$postarray['product_linux'] = 0;
$postarray['product_osx'] = 0;
$postarray['product_file'] = $programFileName;
$postarray['product_version'] = $cleaned['product_version'];
$postarray['product_release_note'] = addslashes($cleaned['product_release_note']);
productHistoryUpdate($postarray);

}elseif(($cleaned['product_type']) && $cleaned['product_type']!="" && $cleaned['product_type']=='SDK'){
//echo "<pre>";
//print_r($_REQUEST);
//echo "<hr/>";
//print_r($_FILES);die;
$postarray['product_id'] = $cleaned['product_id'];
//$postarray['product_reg_date'] = $cleaned['product_reg_date'];
$postarray['product_type'] = $cleaned['product_type'];
$postarray['product_name'] = $cleaned['product_name_sdk'];
/****** ios Check               **********************/
if (isset($cleaned['ios_check'])) {
	$postarray['product_ios'] = 1;
}else {
	$postarray['product_ios'] = 0;
}
/****** Android Check               **********************/
if (isset($cleaned['android_check'])) {
	$postarray['product_android'] = 1;
}else {
	$postarray['product_android'] = 0;
}
/****** Windows Check               **********************/
if (isset($cleaned['windows_check'])) {
	$postarray['product_windows'] = 1;
}else {
	$postarray['product_windows'] = 0;
}
/******Linux Check               **********************/
if (isset($cleaned['linux_check'])) {
	$postarray['product_linux'] = 1;
}else {
	$postarray['product_linux'] = 0;
}
/******OSX Check               **********************/
if (isset($cleaned['osx_check'])) {
	$postarray['product_osx'] = 1;
}else {
	$postarray['product_osx'] = 0;
}
/*******************CHECKBOX END  **********************/
$postarray['product_file'] = "";
$postarray['product_version'] = $cleaned['product_version'];
$postarray['product_release_note'] = addslashes($cleaned['product_release_note']);
productHistoryUpdate($postarray);
//$product_id = mysql_insert_id();

/*** ios_Check array ***/
if (isset($cleaned['ios_check'])) {
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
   $iosArray = productIos($cleaned['draft_product_id']);
   
   if (isset($iosArray) && is_array($iosArray) && count($iosArray)>0) {
			foreach($iosArray as $key => $value ) {
				if(isset($cleaned['language_ios_E'][$value['product_ios_id']]) && $cleaned['language_ios_E'][$value['product_ios_id']]!="" && isset($cleaned['ios_checksum_E'][$value['product_ios_id']])){
					
					if (isset($_FILES['ios_file_E']) && is_array($_FILES['ios_file_E']) && isset($_FILES['ios_file_E']['name'][$value['product_ios_id']]) && $_FILES['ios_file_E']['name'][$value['product_ios_id']] != "" && isset($_FILES['ios_file_E']['size'][$value['product_ios_id']]) && $_FILES['ios_file_E']['size'][$value['product_ios_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['ios_file_E']['name'][$value['product_ios_id']];
	move_uploaded_file($_FILES['ios_file_E']['tmp_name'][$value['product_ios_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['ios_file_hidden'][$value['product_ios_id']];
}
$postarray =array();
$postarray['product_id'] =$cleaned['product_id'];
$postarray['product_ios_id'] =$value['product_ios_id'];
$postarray['product_language'] =$cleaned['language_ios_E'][$value['product_ios_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['ios_checksum_E'][$value['product_ios_id']];
productIosUpdate($postarray);
				}else {
					productIosDelete($value['product_ios_id']);
				}
			}
	}
	if (isset($cleaned['ios_checksum_first']) && $cleaned['ios_checksum_first']!="") {
	
	if (isset($_FILES['ios_file_first']) && is_array($_FILES['ios_file_first']) && isset($_FILES['ios_file_first']['name']) && $_FILES['ios_file_first']['name'] != "" && isset($_FILES['ios_file_first']['size']) && $_FILES['ios_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['ios_file_first']['name'];
	move_uploaded_file($_FILES['ios_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_ios_first'];
	$postarray['product_sha1_checksum'] = $cleaned['ios_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productIosRegister($postarray);
	}
	/** File move logic for ios file **/
	
	if (isset($_FILES['ios_file']) && is_array($_FILES['ios_file']) && count($_FILES['ios_file'])>0) {
			if (isset($_FILES['ios_file']['tmp_name']) && is_array($_FILES['ios_file']['tmp_name']) && count($_FILES['ios_file']['tmp_name'])>0) {
				foreach($_FILES['ios_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['ios_file']['name'][$fileSourceKey]) && $_FILES['ios_file']['name'][$fileSourceKey] != "" && isset($_FILES['ios_file']['size'][$fileSourceKey]) && $_FILES['ios_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['ios_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_ios']) && is_array($cleaned['language_ios']) && count($cleaned['language_ios'])>0) {
		foreach($cleaned['language_ios'] as $langKey => $langValue) {
		$postArray['language_ios'][] =$langValue;
		
	}
	}
	if (isset($cleaned['ios_checksum']) && is_array($cleaned['ios_checksum']) && count($cleaned['ios_checksum'])>0) {
		foreach($cleaned['ios_checksum'] as $checksumKey => $checksumValue) {
		$postArray['ios_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['ios_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_ios']) && isset($postArray['ios_checksum']) && isset($postArray['ios_filename']) && is_array($postArray['language_ios'])  && is_array($postArray['ios_checksum'])  && is_array($postArray['ios_filename']) && count($postArray['language_ios']) == count($postArray['ios_checksum']) &&count($postArray['ios_checksum']) == count($postArray['ios_filename'])) {
$iosarraylength = count($postArray['language_ios']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_ios'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['ios_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['ios_filename'][$i];
		productIosRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** android_Check array ***/
if (isset($cleaned['android_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	$androidArray = productAndroid($cleaned['draft_product_id']);
if (isset($androidArray) && is_array($androidArray) && count($androidArray)>0) {
			foreach($androidArray as $key => $value ) {
				if(isset($cleaned['language_android_E'][$value['product_android_id']]) && $cleaned['language_android_E'][$value['product_android_id']]!="" && isset($cleaned['android_checksum_E'][$value['product_android_id']])){
					
					if (isset($_FILES['android_file_E']) && is_array($_FILES['android_file_E']) && isset($_FILES['android_file_E']['name'][$value['product_android_id']]) && $_FILES['android_file_E']['name'][$value['product_android_id']] != "" && isset($_FILES['android_file_E']['size'][$value['product_android_id']]) && $_FILES['android_file_E']['size'][$value['product_android_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['android_file_E']['name'][$value['product_android_id']];
	move_uploaded_file($_FILES['android_file_E']['tmp_name'][$value['product_android_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['android_file_hidden'][$value['product_android_id']];
}
$postarray =array();
$postarray['product_id'] =$cleaned['product_id'];
$postarray['product_android_id'] =$value['product_android_id'];
$postarray['product_language'] =$cleaned['language_android_E'][$value['product_android_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['android_checksum_E'][$value['product_android_id']];
productAndroidUpdate($postarray);
				}else {
					productAndroidDelete($value['product_android_id']);
				}
			}
	}
	if (isset($cleaned['android_checksum_first']) && $cleaned['android_checksum_first']!="") {
	if (isset($_FILES['android_file_first']) && is_array($_FILES['android_file_first']) && isset($_FILES['android_file_first']['name']) && $_FILES['android_file_first']['name'] != "" && isset($_FILES['android_file_first']['size']) && $_FILES['android_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['android_file_first']['name'];
	move_uploaded_file($_FILES['android_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_android_first'];
	$postarray['product_sha1_checksum'] = $cleaned['android_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productAndroidRegister($postarray);
	}
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['android_file']) && is_array($_FILES['android_file']) && count($_FILES['android_file'])>0) {
			if (isset($_FILES['android_file']['tmp_name']) && is_array($_FILES['android_file']['tmp_name']) && count($_FILES['android_file']['tmp_name'])>0) {
				foreach($_FILES['android_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['android_file']['name'][$fileSourceKey]) && $_FILES['android_file']['name'][$fileSourceKey] != "" && isset($_FILES['android_file']['size'][$fileSourceKey]) && $_FILES['android_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['android_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_android']) && is_array($cleaned['language_android']) && count($cleaned['language_android'])>0) {
		foreach($cleaned['language_android'] as $langKey => $langValue) {
		$postArray['language_android'][] =$langValue;
		
	}
	}
	if (isset($cleaned['android_checksum']) && is_array($cleaned['android_checksum']) && count($cleaned['android_checksum'])>0) {
		foreach($cleaned['android_checksum'] as $checksumKey => $checksumValue) {
		$postArray['android_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['android_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_android']) && isset($postArray['android_checksum']) && isset($postArray['android_filename']) && is_array($postArray['language_android'])  && is_array($postArray['android_checksum'])  && is_array($postArray['android_filename']) && count($postArray['language_android']) == count($postArray['android_checksum']) &&count($postArray['android_checksum']) == count($postArray['android_filename'])) {
$iosarraylength = count($postArray['language_android']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_android'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['android_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['android_filename'][$i];
		productAndroidRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** android_Check array ***/
/*** windows_Check array ***/
if (isset($cleaned['windows_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	$windowsArray =productwindows($cleaned['draft_product_id']);
	if (isset($windowsArray) && is_array($windowsArray) && count($windowsArray)>0) {
			foreach($windowsArray as $key => $value ) {
				if(isset($cleaned['language_windows_E'][$value['product_windows_id']]) && $cleaned['language_windows_E'][$value['product_windows_id']]!="" && isset($cleaned['windows_checksum_E'][$value['product_windows_id']])){
					
					if (isset($_FILES['windows_file_E']) && is_array($_FILES['windows_file_E']) && isset($_FILES['windows_file_E']['name'][$value['product_windows_id']]) && $_FILES['windows_file_E']['name'][$value['product_windows_id']] != "" && isset($_FILES['windows_file_E']['size'][$value['product_windows_id']]) && $_FILES['windows_file_E']['size'][$value['product_windows_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['windows_file_E']['name'][$value['product_windows_id']];
	move_uploaded_file($_FILES['windows_file_E']['tmp_name'][$value['product_windows_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['windows_file_hidden'][$value['product_windows_id']];
}
$postarray =array();
$postarray['product_id'] =$cleaned['product_id'];
$postarray['product_windows_id'] =$value['product_windows_id'];
$postarray['product_language'] =$cleaned['language_windows_E'][$value['product_windows_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['windows_checksum_E'][$value['product_windows_id']];
productWindowsUpdate($postarray);
				}else {
					productWindowsDelete($value['product_windows_id']);
				}
			}
	}
	if (isset($cleaned['windows_checksum_first']) && $cleaned['windows_checksum_first']!="") {
	
	if (isset($_FILES['windows_file_first']) && is_array($_FILES['windows_file_first']) && isset($_FILES['windows_file_first']['name']) && $_FILES['windows_file_first']['name'] != "" && isset($_FILES['windows_file_first']['size']) && $_FILES['windows_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['windows_file_first']['name'];
	move_uploaded_file($_FILES['windows_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_windows_first'];
	$postarray['product_sha1_checksum'] = $cleaned['windows_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productWindowsRegister($postarray);
	}
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['windows_file']) && is_array($_FILES['windows_file']) && count($_FILES['windows_file'])>0) {
			if (isset($_FILES['windows_file']['tmp_name']) && is_array($_FILES['windows_file']['tmp_name']) && count($_FILES['windows_file']['tmp_name'])>0) {
				foreach($_FILES['windows_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['windows_file']['name'][$fileSourceKey]) && $_FILES['windows_file']['name'][$fileSourceKey] != "" && isset($_FILES['windows_file']['size'][$fileSourceKey]) && $_FILES['windows_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['windows_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "TEST";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_windows']) && is_array($cleaned['language_windows']) && count($cleaned['language_windows'])>0) {
		foreach($cleaned['language_windows'] as $langKey => $langValue) {
		$postArray['language_windows'][] =$langValue;
		
	}
	}
	if (isset($cleaned['windows_checksum']) && is_array($cleaned['windows_checksum']) && count($cleaned['windows_checksum'])>0) {
		foreach($cleaned['windows_checksum'] as $checksumKey => $checksumValue) {
		$postArray['windows_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['windows_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_windows']) && isset($postArray['windows_checksum']) && isset($postArray['windows_filename']) && is_array($postArray['language_windows'])  && is_array($postArray['windows_checksum'])  && is_array($postArray['windows_filename']) && count($postArray['language_windows']) == count($postArray['windows_checksum']) &&count($postArray['windows_checksum']) == count($postArray['windows_filename'])) {
$iosarraylength = count($postArray['language_windows']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_windows'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['windows_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['windows_filename'][$i];
		productWindowsRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** windows_Check array ***/

/*** linux_Check array ***/
if (isset($cleaned['linux_check'])) {
	 
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	
	$linuxArray =productLinux($cleaned['draft_product_id']);
	if (isset($linuxArray) && is_array($linuxArray) && count($linuxArray)>0) {
			foreach($linuxArray as $key => $value ) {
				if(isset($cleaned['language_linux_E'][$value['product_linux_id']]) && $cleaned['language_linux_E'][$value['product_linux_id']]!="" && isset($cleaned['linux_checksum_E'][$value['product_linux_id']])){
					
					if (isset($_FILES['linux_file_E']) && is_array($_FILES['linux_file_E']) && isset($_FILES['linux_file_E']['name'][$value['product_linux_id']]) && $_FILES['linux_file_E']['name'][$value['product_linux_id']] != "" && isset($_FILES['linux_file_E']['size'][$value['product_linux_id']]) && $_FILES['linux_file_E']['size'][$value['product_linux_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['linux_file_E']['name'][$value['product_linux_id']];
	move_uploaded_file($_FILES['linux_file_E']['tmp_name'][$value['product_linux_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['linux_file_hidden'][$value['product_linux_id']];
}
$postarray =array();
$postarray['product_id'] =$cleaned['product_id'];
$postarray['product_linux_id'] =$value['product_linux_id'];
$postarray['product_language'] =$cleaned['language_linux_E'][$value['product_linux_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['linux_checksum_E'][$value['product_linux_id']];
productLinuxUpdate($postarray);
				}else {
					productLinuxDelete($value['product_linux_id']);
				}
			}
	}

	
	if (isset($cleaned['linux_checksum_first']) && $cleaned['linux_checksum_first']!="") {
	
	if (isset($_FILES['linux_file_first']) && is_array($_FILES['linux_file_first']) && isset($_FILES['linux_file_first']['name']) && $_FILES['linux_file_first']['name'] != "" && isset($_FILES['linux_file_first']['size']) && $_FILES['linux_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['linux_file_first']['name'];
	move_uploaded_file($_FILES['linux_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
}else {
   $iosFileName ="";
}
	$postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_linux_first'];
	$postarray['product_sha1_checksum'] = $cleaned['linux_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productLinuxRegister($postarray);
	}
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['linux_file']) && is_array($_FILES['linux_file']) && count($_FILES['linux_file'])>0) {
			if (isset($_FILES['linux_file']['tmp_name']) && is_array($_FILES['linux_file']['tmp_name']) && count($_FILES['linux_file']['tmp_name'])>0) {
				foreach($_FILES['linux_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['linux_file']['name'][$fileSourceKey]) && $_FILES['linux_file']['name'][$fileSourceKey] != "" && isset($_FILES['linux_file']['size'][$fileSourceKey]) && $_FILES['linux_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['linux_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_linux']) && is_array($cleaned['language_linux']) && count($cleaned['language_linux'])>0) {
		foreach($cleaned['language_linux'] as $langKey => $langValue) {
		$postArray['language_linux'][] =$langValue;
		
	}
	}
	if (isset($cleaned['linux_checksum']) && is_array($cleaned['linux_checksum']) && count($cleaned['linux_checksum'])>0) {
		foreach($cleaned['linux_checksum'] as $checksumKey => $checksumValue) {
		$postArray['linux_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['linux_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
//echo $cleaned['product_id'];
if (isset($postArray['language_linux']) && isset($postArray['linux_checksum']) && isset($postArray['linux_filename']) && is_array($postArray['language_linux'])  && is_array($postArray['linux_checksum'])  && is_array($postArray['linux_filename']) && count($postArray['language_linux']) == count($postArray['linux_checksum']) &&count($postArray['linux_checksum']) == count($postArray['linux_filename'])) {
$iosarraylength = count($postArray['language_linux']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] =$product_id;
		$postinsertArray['product_language'] =$postArray['language_linux'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['linux_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['linux_filename'][$i];
		productLinuxRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $iosarraylength; die;
}
/*** linux_Check array ***/

/*** OSX_Check array ***/
if (isset($cleaned['osx_check'])) {
//echo "<pre>";
//print_r($_POST);
//echo "<hr/>";
//print_r($_FILES);die;
	$osxArray =productOsx($cleaned['draft_product_id']);
	//echo "<pre>";
	//print_r($osxArray);
	//echo "<hr/>";
	//print_r($_POST['language_osx_E']);
	//echo "<hr/>";
	//print_r($_POST['osx_checksum_E']);
	//echo "<hr/>";
	////print_r($_FILES['osx_file_E']);
	//echo "<hr/>";
	//print_r($_POST['osx_file_hidden']);

	//die;
	if (isset($osxArray) && is_array($osxArray) && count($osxArray)>0) {
			foreach($osxArray as $key => $value ) {
				if(isset($cleaned['language_osx_E'][$value['product_osx_id']]) && $cleaned['language_osx_E'][$value['product_osx_id']]!="" && isset($cleaned['osx_checksum_E'][$value['product_osx_id']])){
					
					if (isset($_FILES['osx_file_E']) && is_array($_FILES['osx_file_E']) && isset($_FILES['osx_file_E']['name'][$value['product_osx_id']]) && $_FILES['osx_file_E']['name'][$value['product_osx_id']] != "" && isset($_FILES['osx_file_E']['size'][$value['product_osx_id']]) && $_FILES['osx_file_E']['size'][$value['product_osx_id']]>0) {
	$iosFileNameEdit =time()."_".$_FILES['osx_file_E']['name'][$value['product_osx_id']];
	move_uploaded_file($_FILES['osx_file_E']['tmp_name'][$value['product_osx_id']],'../../storage/product/sdk/'.$iosFileNameEdit);
	
}else {
   $iosFileNameEdit =$cleaned['osx_file_hidden'][$value['product_osx_id']];
}
$postarray =array();
$postarray['product_id'] =$cleaned['product_id'];
$postarray['product_osx_id'] =$value['product_osx_id'];
$postarray['product_language'] =$cleaned['language_osx_E'][$value['product_osx_id']];
$postarray['product_file'] =$iosFileNameEdit;
$postarray['product_sha1_checksum'] =$cleaned['osx_checksum_E'][$value['product_osx_id']];
productOsxUpdate($postarray);
				}else {
					productOsxDelete($value['product_osx_id']);
				}
			}
	}
	unset($postarray);
	$postarray =array();
	unset($postinsertArray);
	$postinsertArray =array();
	$iosFileNameArray=array();
	
	if (isset($cleaned['osx_checksum_first']) && $cleaned['osx_checksum_first']!="") {
	if (isset($_FILES['osx_file_first']) && is_array($_FILES['osx_file_first']) && isset($_FILES['osx_file_first']['name']) && $_FILES['osx_file_first']['name'] != "" && isset($_FILES['osx_file_first']['size']) && $_FILES['osx_file_first']['size']>0) {
	$iosFileName =time()."_".$_FILES['osx_file_first']['name'];
	move_uploaded_file($_FILES['osx_file_first']['tmp_name'],'../../storage/product/sdk/'.$iosFileName);
	
	
}else {
   $iosFileName ="";
}
    $postarray['product_id'] = $product_id;
	$postarray['product_language'] = $cleaned['language_osx_first'];
	$postarray['product_sha1_checksum'] = $cleaned['osx_checksum_first'];
	$postarray['product_file'] = $iosFileName;
	productOsxRegister($postarray);	
	}
	
	/** File move logic for ios file **/
	
	if (isset($_FILES['osx_file']) && is_array($_FILES['osx_file']) && count($_FILES['osx_file'])>0) {
			if (isset($_FILES['osx_file']['tmp_name']) && is_array($_FILES['osx_file']['tmp_name']) && count($_FILES['osx_file']['tmp_name'])>0) {
				foreach($_FILES['osx_file']['tmp_name'] as $fileSourceKey => $fileSourceValue) {
					if (isset($_FILES['osx_file']['name'][$fileSourceKey]) && $_FILES['osx_file']['name'][$fileSourceKey] != "" && isset($_FILES['osx_file']['size'][$fileSourceKey]) && $_FILES['osx_file']['size'][$fileSourceKey] > 0 ) {
						$iosFileName =time()."_".$_FILES['osx_file']['name'][$fileSourceKey];
						$iosFileNameArray[$fileSourceKey] = $iosFileName;
						move_uploaded_file($fileSourceValue,'../../storage/product/sdk/'.$iosFileName);
					}else {
						$iosFileNameArray[$fileSourceKey] = "";
					}
				}
			}
		
	}
	/** File move logic for ios file **/
	
	/*** form one array **/
	
	if (isset($cleaned['language_osx']) && is_array($cleaned['language_osx']) && count($cleaned['language_osx'])>0) {
		foreach($cleaned['language_osx'] as $langKey => $langValue) {
		$postArray['language_osx'][] =$langValue;
		
	}
	}
	if (isset($cleaned['osx_checksum']) && is_array($cleaned['osx_checksum']) && count($cleaned['osx_checksum'])>0) {
		foreach($cleaned['osx_checksum'] as $checksumKey => $checksumValue) {
		$postArray['osx_checksum'][] =$checksumValue;
		
	}
	}
	
	if (isset($iosFileNameArray) && is_array($iosFileNameArray) && count($iosFileNameArray)>0) {
		foreach($iosFileNameArray as $iosfilenameKey => $iosfilenameValue) {
		$postArray['osx_filename'][] =$iosfilenameValue;
		
	}
	
}
/*** form one array **/
//if ()
if (isset($postArray['language_osx']) && isset($postArray['osx_checksum']) && isset($postArray['osx_filename']) && is_array($postArray['language_osx'])  && is_array($postArray['osx_checksum'])  && is_array($postArray['osx_filename']) && count($postArray['language_osx']) == count($postArray['osx_checksum']) &&count($postArray['osx_checksum']) == count($postArray['osx_filename'])) {
$iosarraylength = count($postArray['language_osx']);
	for ($i = 0; $i<$iosarraylength;$i++) {
		unset($postinsertArray);
		$postinsertArray =array();
		$postinsertArray['product_id'] = $product_id;
		$postinsertArray['product_language'] =$postArray['language_osx'][$i];
		$postinsertArray['product_sha1_checksum'] =$postArray['osx_checksum'][$i];
		$postinsertArray['product_file'] =$postArray['osx_filename'][$i];
		productOsxRegister($postinsertArray);
	}
}
//echo "<pre>";
//print_r($postArray);
//echo "<hr/>";
//echo $product_id;
//echo $iosarraylength; die;
}
/*** osx_Check array ***/
}
header("location: ../../view/product/list.php");
}
}
?>