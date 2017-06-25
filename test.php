<script>
	//$("#progressbarrunner").css("width","<?php echo round($downloaded / $download_size  * 100); ?>%");
    //$("#progressbartext").text("<?php echo round($downloaded / $download_size  * 100); ?>%");
    <?php if(round($downloaded / $download_size  * 100) == 100 ) { ?>
	/*window.location.href = 'tutorials-complete.php';*/
	<?php } ?>
    </script>
    <?php    
		}


<?php if(isset($_FILES)) {
	//print_r($_FILES);die;
	move_uploaded_file($_FILES['file']['tmp_name'],'storage/test.epub');
}

date_default_timezone_set("Asia/Kolkata");

$random = substr( md5(rand()), 0, 7);
 //echo $random;

  // $_REQUEST['id'] ='TEST';
   // $_REQUEST['date'] ='TEST';
 $date =date("h.i A d M");
 $putarray = $_REQUEST;
 $putarray['date'] = $date;
 $putarray['id'] = rand();
 //echo "<pre>";

 //echo $date;die;
// echo date_format($date, "jS M Y");
 
$jsonput =json_encode($putarray);
//print_r($jsonput);die;
// Constants
/*$FIREBASE = "https://edm-bytes-preprod.firebaseio.com/";
$NODE_DELETE = "temperature.json";
$NODE_GET = "NewsArticles.json";
$NODE_PATCH = ".json";
$NODE_PUT = "temperature.json";

// Data for PUT
// Node replaced
$data = 32;

// Data for PATCH
// Matching nodes updated
$data = array(
    "temperature" => 42
);

// JSON encoded
$json = json_encode( $data );

// Initialize cURL
$curl = curl_init();

// Create
 curl_setopt( $curl, CURLOPT_URL, $FIREBASE . $NODE_PUT );
 curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PUT" );
 curl_setopt( $curl, CURLOPT_POSTFIELDS, 32 );

// Read
 curl_setopt( $curl, CURLOPT_URL, $FIREBASE . $NODE_GET );

// Update
//curl_setopt( $curl, CURLOPT_URL, $FIREBASE . $NODE_PATCH );
//curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PATCH" );
//curl_setopt( $curl, CURLOPT_POSTFIELDS, $json );

// Delete
// curl_setopt( $curl, CURLOPT_URL, $FIREBASE . $NODE_DELETE );
// curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "DELETE" );

// Get return value
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );

// Make request
// Close connection
$response = curl_exec( $curl );

curl_close( $curl );

// Show result
echo $response . "\n";

?>
<?php
/*$url = 'https://edm-bytes-preprod.firebaseio.com/NewsArticles.json?print=pretty';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
if(curl_error($ch))
{
    echo 'error:' . curl_error($ch); die;
}
curl_close($ch);
print_r($data);
die;

$url = 'https://brilliant-torch-967.firebaseio.com/Devices.json';
$arr = array("Devices" =>array("iPhone"=>500));  
$data_string = json_encode($arr);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string))
);
echo $result = curl_exec($ch);*/
?>
<?php
$url = 'https://edm-bytes-preprod.firebaseio.com/NewsArticles.json';

//print_r($data_string);die;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonput);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($jsonput))
);
echo $result = curl_exec($ch);

$url = 'https://edm-bytes-preprod.firebaseio.com/NewsArticlesCount.json?print=pretty';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
if(curl_error($ch))
{
    echo 'error:' . curl_error($ch); die;
}
curl_close($ch);
$total = json_decode($data,true);
//print_r($total);die;
$tot = $total['Total'];
//echo $tot;die;
$tot++;
$url = 'https://edm-bytes-preprod.firebaseio.com/NewsArticlesCount.json';
$arr = array("Total" =>$tot);  
$data_string = json_encode($arr);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string))
);
echo $result = curl_exec($ch);
?>
