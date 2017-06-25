<?php session_start();
function download($path)
{
	$pathinfo = pathinfo($path);
	//print_r($pathinfo);
	// if file is not readable or not exists
	if (!is_readable($path))
		die('File does not exist or it is not readable!');

	// get file's pathinfo
	$pathinfo = pathinfo($path);
	//print_r($pathinfo);
	// set file name
	$file_name = $pathinfo['basename'];

	// guess mime type by extension
	//$mimes = require 'mimes.php';
	//$mime = isset($mimes[$pathinfo['extension']]) ? $mimes[$ext] : 'application/octet-stream';

	// set headers
	header('Pragma: public');
	header('Expires: -1');
	header('Cache-Control: public, must-revalidate, post-check=0, pre-check=0');
	header('Content-Transfer-Encoding: binary');
	header("Content-Disposition: attachment; filename=\"$file_name\"");
	header('Content-Length: ' . filesize($path));
	header("Content-Type: $mime");

	// read file as chunk to reduce memory usages
	if ( $fp = fopen($path, 'rb') ) {
		ob_end_clean();

		while( !feof($fp) and (connection_status()==0) ) {
			print(fread($fp, 8192));
			flush();
		}

		@fclose($fp);
		$_SESSION['filedownload'] = 1;
		exit;
	}
}
$file = $_GET['file'];
//$file = 'd1_testani.epub';
download('../../storage/epub/'. $file);

?>