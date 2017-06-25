<?php
//echo "hello";die;
error_reporting(0);
ini_set('session.gc_maxlifetime', '36000');
//echo $_SERVER['base_dir'];
if($_SERVER['HTTP_HOST']=="localhost")
{
	define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "opens_epub_book_db");
	define("editor_BASE_URL", "http://localhost/opensepub/storage/");
} else {
    define("DB_HOST", "opensepubbook.db.10968206.hostedresource.com");
    define("DB_USER", "opensepubbook");
    define("DB_PASS", "JdnnY!4d@");
    define("DB_NAME", "opensepubbook");
	define("editor_BASE_URL", "http://backend.syann.com/opensepub/storage/");
	define("SITE_BASE_URL", "http://backend.syann.com/opensepub/");
	define("SITE_BASE_URL_FILE", "backend.syann.com/opensepub/");
	define("xapikey", "TEST40aa-eb1a-441c-8161-89f99074a02d");
	define("editor_BASE_URL", "http://backend.syann.com/opensepub/storage/");
}
    $dblink = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME) or die("Can not connect right now.");
	if (!$dblink) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$GLOBALS['dblink'] = $dblink;  
	//print_r($GLOBALS['dblink']);
	//echo "successfully";die;
mysqli_select_db($dblink,DB_NAME);// Session
session_start();
define('SESSION_NAME', 'Tour-Track');
define("COMPANY", "KnollInfo");	
	#dump($_SESSION);
?>