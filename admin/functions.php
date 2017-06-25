<?php
	//DATABASE CONNECTION DETAILS
	function dbConnect()
	{
		global $dblink;
		$dblink = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Can not connect right now.");
		if (!$dblink) 
		{
			die('Could not connect: ' . mysql_error());
		} 
		mysql_select_db(DB_NAME) or die ("Can not select database." . mysql_error());
	}
	
	function formatForScreen($content)
	{		
		return str_replace(
						array("\n", "&#8232;", "&", "<li><br>", "<ul><br>", "'", "[nbsp]", "[raquo]"), 
						array("<br />", "<br />", "&amp;", "<li>", "<li>", "&#8217;", "&nbsp;", "&raquo;"), 
						$content
					);
	}
	
	function check_array($array, $value)
	{
		echo(checkArray($array, $value));
	}
	
	function checkArray($array, $value)
	{
		if (in_array($value, $array))
		{
			return "checked=\"checked\"";
		}
		else
		{
			return false;
		}
	}
	
	function getCountry()
	{
		$country_list = array(
		"Afghanistan",
		"Albania",
		"Algeria",
		"Andorra",
		"Angola",
		"Antigua and Barbuda",
		"Argentina",
		"Armenia",
		"Australia",
		"Austria",
		"Azerbaijan",
		"Bahamas",
		"Bahrain",
		"Bangladesh",
		"Barbados",
		"Belarus",
		"Belgium",
		"Belize",
		"Benin",
		"Bhutan",
		"Bolivia",
		"Bosnia and Herzegovina",
		"Botswana",
		"Brazil",
		"Brunei",
		"Bulgaria",
		"Burkina Faso",
		"Burundi",
		"Cambodia",
		"Cameroon",
		"Canada",
		"Cape Verde",
		"Central African Republic",
		"Chad",
		"Chile",
		"China",
		"Colombi",
		"Comoros",
		"Congo (Brazzaville)",
		"Congo",
		"Costa Rica",
		"Cote d'Ivoire",
		"Croatia",
		"Cuba",
		"Cyprus",
		"Czech Republic",
		"Denmark",
		"Djibouti",
		"Dominica",
		"Dominican Republic",
		"East Timor (Timor Timur)",
		"Ecuador",
		"Egypt",
		"El Salvador",
		"Equatorial Guinea",
		"Eritrea",
		"Estonia",
		"Ethiopia",
		"Fiji",
		"Finland",
		"France",
		"Gabon",
		"Gambia, The",
		"Georgia",
		"Germany",
		"Ghana",
		"Greece",
		"Grenada",
		"Guatemala",
		"Guinea",
		"Guinea-Bissau",
		"Guyana",
		"Haiti",
		"Honduras",
		"Hungary",
		"Iceland",
		"India",
		"Indonesia",
		"Iran",
		"Iraq",
		"Ireland",
		"Israel",
		"Italy",
		"Jamaica",
		"Japan",
		"Jordan",
		"Kazakhstan",
		"Kenya",
		"Kiribati",
		"Korea, North",
		"Korea, South",
		"Kuwait",
		"Kyrgyzstan",
		"Laos",
		"Latvia",
		"Lebanon",
		"Lesotho",
		"Liberia",
		"Libya",
		"Liechtenstein",
		"Lithuania",
		"Luxembourg",
		"Macedonia",
		"Madagascar",
		"Malawi",
		"Malaysia",
		"Maldives",
		"Mali",
		"Malta",
		"Marshall Islands",
		"Mauritania",
		"Mauritius",
		"Mexico",
		"Micronesia",
		"Moldova",
		"Monaco",
		"Mongolia",
		"Morocco",
		"Mozambique",
		"Myanmar",
		"Namibia",
		"Nauru",
		"Nepa",
		"Netherlands",
		"New Zealand",
		"Nicaragua",
		"Niger",
		"Nigeria",
		"Norway",
		"Oman",
		"Pakistan",
		"Palau",
		"Panama",
		"Papua New Guinea",
		"Paraguay",
		"Peru",
		"Philippines",
		"Poland",
		"Portugal",
		"Qatar",
		"Romania",
		"Russia",
		"Rwanda",
		"Saint Kitts and Nevis",
		"Saint Lucia",
		"Saint Vincent",
		"Samoa",
		"San Marino",
		"Sao Tome and Principe",
		"Saudi Arabia",
		"Senegal",
		"Serbia and Montenegro",
		"Seychelles",
		"Sierra Leone",
		"Singapore",
		"Slovakia",
		"Slovenia",
		"Solomon Islands",
		"Somalia",
		"South Africa",
		"Spain",
		"Sri Lanka",
		"Sudan",
		"Suriname",
		"Swaziland",
		"Sweden",
		"Switzerland",
		"Syria",
		"Taiwan",
		"Tajikistan",
		"Tanzania",
		"Thailand",
		"Togo",
		"Tonga",
		"Trinidad and Tobago",
		"Tunisia",
		"Turkey",
		"Turkmenistan",
		"Tuvalu",
		"Uganda",
		"Ukraine",
		"United Arab Emirates",
		"United Kingdom",
		"United States",
		"Uruguay",
		"Uzbekistan",
		"Vanuatu",
		"Vatican City",
		"Venezuela",
		"Vietnam",
		"Yemen",
		"Zambia",
		"Zimbabwe"	);
				
		return $country_list;
	}
	
	
	function getMime($FileExt)
	{
		if (stristr ($FileExt, ".") != false)
		{
			$FileExt = substr ($FileExt, 1);	
		}
		
		$mime_types = array
		(
			"323" => "text/h323",
			"acx" => "application/internet-property-stream",
			"ai" => "application/postscript",
			"aif" => "audio/x-aiff",
			"aifc" => "audio/x-aiff",
			"aiff" => "audio/x-aiff",
			"asf" => "video/x-ms-asf",
			"asr" => "video/x-ms-asf",
			"asx" => "video/x-ms-asf",
			"au" => "audio/basic",
			"avi" => "video/x-msvideo",
			"axs" => "application/olescript",
			"bas" => "text/plain",
			"bcpio" => "application/x-bcpio",
			"bin" => "application/octet-stream",
			"bmp" => "image/bmp",
			"c" => "text/plain",
			"cat" => "application/vnd.ms-pkiseccat",
			"cdf" => "application/x-cdf",
			"cer" => "application/x-x509-ca-cert",
			"class" => "application/octet-stream",
			"clp" => "application/x-msclip",
			"cmx" => "image/x-cmx",
			"cod" => "image/cis-cod",
			"cpio" => "application/x-cpio",
			"crd" => "application/x-mscardfile",
			"crl" => "application/pkix-crl",
			"crt" => "application/x-x509-ca-cert",
			"csh" => "application/x-csh",
			"css" => "text/css",
			"dcr" => "application/x-director",
			"der" => "application/x-x509-ca-cert",
			"dir" => "application/x-director",
			"dll" => "application/x-msdownload",
			"dms" => "application/octet-stream",
			"doc" => "application/msword",
			"docx" => "application/msword",		
			"dot" => "application/msword",
			"dvi" => "application/x-dvi",
			"dxr" => "application/x-director",
			"eps" => "application/postscript",
			"etx" => "text/x-setext",
			"evy" => "application/envoy",
			"exe" => "application/octet-stream",
			"fif" => "application/fractals",
			"flr" => "x-world/x-vrml",
			"gif" => "image/gif",
			"gtar" => "application/x-gtar",
			"gz" => "application/x-gzip",
			"h" => "text/plain",
			"hdf" => "application/x-hdf",
			"hlp" => "application/winhlp",
			"hqx" => "application/mac-binhex40",
			"hta" => "application/hta",
			"htc" => "text/x-component",
			"htm" => "text/html",
			"html" => "text/html",
			"htt" => "text/webviewhtml",
			"ico" => "image/x-icon",
			"ief" => "image/ief",
			"iii" => "application/x-iphone",
			"ins" => "application/x-internet-signup",
			"isp" => "application/x-internet-signup",
			"jfif" => "image/pipeg",
			"jpe" => "image/jpeg",
			"jpeg" => "image/jpeg",
			"jpg" => "image/jpeg",
			"js" => "application/x-javascript",
			"latex" => "application/x-latex",
			"lha" => "application/octet-stream",
			"lsf" => "video/x-la-asf",
			"lsx" => "video/x-la-asf",
			"lzh" => "application/octet-stream",
			"m13" => "application/x-msmediaview",
			"m14" => "application/x-msmediaview",
			"m3u" => "audio/x-mpegurl",
			"man" => "application/x-troff-man",
			"mdb" => "application/x-msaccess",
			"me" => "application/x-troff-me",
			"mht" => "message/rfc822",
			"mhtml" => "message/rfc822",
			"mid" => "audio/mid",
			"mny" => "application/x-msmoney",
			"mov" => "video/quicktime",
			"movie" => "video/x-sgi-movie",
			"mp2" => "video/mpeg",
			"mp3" => "audio/mpeg",
			"mpa" => "video/mpeg",
			"mpe" => "video/mpeg",
			"mpeg" => "video/mpeg",
			"mpg" => "video/mpeg",
			"mpp" => "application/vnd.ms-project",
			"mpv2" => "video/mpeg",
			"ms" => "application/x-troff-ms",
			"mvb" => "application/x-msmediaview",
			"nws" => "message/rfc822",
			"oda" => "application/oda",
			"p10" => "application/pkcs10",
			"p12" => "application/x-pkcs12",
			"p7b" => "application/x-pkcs7-certificates",
			"p7c" => "application/x-pkcs7-mime",
			"p7m" => "application/x-pkcs7-mime",
			"p7r" => "application/x-pkcs7-certreqresp",
			"p7s" => "application/x-pkcs7-signature",
			"pbm" => "image/x-portable-bitmap",
			"pdf" => "application/pdf",
			"pfx" => "application/x-pkcs12",
			"pgm" => "image/x-portable-graymap",
			"pko" => "application/ynd.ms-pkipko",
			"pma" => "application/x-perfmon",
			"pmc" => "application/x-perfmon",
			"pml" => "application/x-perfmon",
			"pmr" => "application/x-perfmon",
			"pmw" => "application/x-perfmon",
			"pnm" => "image/x-portable-anymap",
			"pot" => "application/vnd.ms-powerpoint",
			"ppm" => "image/x-portable-pixmap",
			"pps" => "application/vnd.ms-powerpoint",
			"ppt" => "application/vnd.ms-powerpoint",
			"prf" => "application/pics-rules",
			"ps" => "application/postscript",
			"pub" => "application/x-mspublisher",
			"qt" => "video/quicktime",
			"ra" => "audio/x-pn-realaudio",
			"ram" => "audio/x-pn-realaudio",
			"ras" => "image/x-cmu-raster",
			"rgb" => "image/x-rgb",
			"rmi" => "audio/mid",
			"roff" => "application/x-troff",
			"rtf" => "application/rtf",
			"rtx" => "text/richtext",
			"scd" => "application/x-msschedule",
			"sct" => "text/scriptlet",
			"setpay" => "application/set-payment-initiation",
			"setreg" => "application/set-registration-initiation",
			"sh" => "application/x-sh",
			"shar" => "application/x-shar",
			"sit" => "application/x-stuffit",
			"snd" => "audio/basic",
			"spc" => "application/x-pkcs7-certificates",
			"spl" => "application/futuresplash",
			"src" => "application/x-wais-source",
			"sst" => "application/vnd.ms-pkicertstore",
			"stl" => "application/vnd.ms-pkistl",
			"stm" => "text/html",
			"svg" => "image/svg+xml",
			"sv4cpio" => "application/x-sv4cpio",
			"sv4crc" => "application/x-sv4crc",
			"t" => "application/x-troff",
			"tar" => "application/x-tar",
			"tcl" => "application/x-tcl",
			"tex" => "application/x-tex",
			"texi" => "application/x-texinfo",
			"texinfo" => "application/x-texinfo",
			"tgz" => "application/x-compressed",
			"tif" => "image/tiff",
			"tiff" => "image/tiff",
			"tr" => "application/x-troff",
			"trm" => "application/x-msterminal",
			"tsv" => "text/tab-separated-values",
			"txt" => "text/plain",
			"uls" => "text/iuls",
			"ustar" => "application/x-ustar",
			"vcf" => "text/x-vcard",
			"vrml" => "x-world/x-vrml",
			"wav" => "audio/x-wav",
			"wcm" => "application/vnd.ms-works",
			"wdb" => "application/vnd.ms-works",
			"wks" => "application/vnd.ms-works",
			"wmf" => "application/x-msmetafile",
			"wps" => "application/vnd.ms-works",
			"wri" => "application/x-mswrite",
			"wrl" => "x-world/x-vrml",
			"wrz" => "x-world/x-vrml",
			"xaf" => "x-world/x-vrml",
			"xbm" => "image/x-xbitmap",
			"xla" => "application/vnd.ms-excel",
			"xlc" => "application/vnd.ms-excel",
			"xlm" => "application/vnd.ms-excel",
			"xls" => "application/vnd.ms-excel",
			"xlt" => "application/vnd.ms-excel",
			"xlw" => "application/vnd.ms-excel",
			"xof" => "x-world/x-vrml",
			"xpm" => "image/x-xpixmap",
			"xwd" => "image/x-xwindowdump",
			"z" => "application/x-compress",
			"zip" => "application/zip"
		);
		
		if ($mime_types[$FileExt] == null)
		{
			return "misc/other";	
		}
		
		return $mime_types[$FileExt];
	}
	
	// Company Documents Functions
	function full_copy ($source, $target)
	{
		if (is_dir($source))
		{
			@mkdir($target);
		  
			$d = dir($source);
		  
			while (false !== ($entry = $d->read()))
			{
				if ($entry == '.' || $entry == '..')
				{
					continue;
				}
			  
				$Entry = $source . '/' . $entry;          
				if (is_dir ($Entry))
				{
					full_copy ($Entry, $target.'/'.$entry);
					continue;
				}
				copy ($Entry, $target.'/'.$entry);
			}
		  
			$d->close();
		}
		else
		{
			copy ($source, $target);
		}
	}
	
	function delTree($FolderName)
	{
		if (file_exists($FolderName))
		{
			$files = scandir ($FolderName);
			natcasesort($files);
			
			if (count ($files) > 2)
			{
				foreach ($files as $file) 
				{
					if (file_exists ($FolderName."/".$file) && $file != '.' && $file != '..') 
					{
						if (is_dir ($FolderName."/".$file))
						{
							$folderContents = scandir ($FolderName."/".$file);
							natcasesort($folderContents);
							
							if (is_dir ($file) && count ($folderContents) > 2)
							{
								delTree ($FolderName."/".$file);	
							}
							else
							{
								unlink ($FolderName."/".$file);	
							}
						}
						else
						{
							unlink ($FolderName."/".$file);	
						}
					}
				}				
			}
			else
			{
				rmdir ($FolderName);
			}
		}
	} 
	function FolderInfo($directory)
	{
		$array = array();
		$array['size'] = 0;
		$array['filecount'] = 0;
		$array['foldercount'] = 0;
		$array['lastmodified'] = 0;
		$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory), RecursiveIteratorIterator::SELF_FIRST);
		foreach ($objects as $name => $file)
		{
			$array['size'] += $file -> getSize();
			$array['filecount'] = $file -> isFile() === true ? $array['filecount'] += 1 : $array['filecount'] += 0;
			$array['foldercount'] = $file -> isDir() === true ? $array['foldercount'] += 1 : $array['foldercount'] += 0;	
			
			if ($file -> getMTime() > $array['lastmodified'] && $file -> isDir == true)
			{
				$array['lastmodified'] = $file -> getMTime();	
			}
		}
		return $array;
	} 
	
	function FormatBytes($bytes, $precision = 2) 
	{
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
	  
		$bytes = max ($bytes, 0);
		$pow = floor (($bytes ? log ($bytes) : 0) / log (1024));
		$pow = min ($pow, count ($units) - 1);
	  
		$bytes /= pow (1024, $pow);
	  
		return round ($bytes, $precision) . ' ' . $units[$pow];
	} 
	// Company Documents Functions
	
	
	
	function Preview($text, $count = 0)
	{
		$Count2 = $count;
		$text = nl2br($text);
		$text = strip_tags($text);		
		
		if (strlen($text) > $count)
		{	
			while ($text[$count] != " " && $count < strlen($text) - 1)
			{
				$count++;
				if ($count - $Count2 == 12)
				{
					return substr($text, 0, $count)."...";
				}
			}
			return substr($text, 0, $count)."...";
		}
		else
		{			
			return $text;
		}
		return $text;
	}
	
	function get_tasks($id_user)
	{
		$sql = "SELECT id_task, task_name, task_due FROM pr_project_tasks WHERE id_task_owner = '".$id_user."' ORDER BY `priority` ASC";
		$res = mysql_query($sql) or die(mysql_error());
		while($task = mysql_fetch_array($res)){
			
			$due = strtotime($task['task_due']);
			$today = strtotime(date('Y-m-d'));
			if($today > $due){
				$class = "class='red'";	
			}else{
				$class = "";	
			}
			
			$str = '';
			$str .= '<li id="task_'.$task['id_task'].'" '.$class.'>';
			$str .= '<div class="handle"></div>';
			$str .= '<div class="desc">';
			$str .= '<a href="javascript:addTask('.$task['id_task'].')" title="Task Details">'.(strlen($task['task_name']) > 10 ? Preview($task['task_name'], 9) : $task['task_name']).'</a>';
			$str .= '<br/><span style="font-size:8px;">Due Date: '.($task['task_due'] != '0000-00-00 00:00:00' ? date('d/m/Y',strtotime($task['task_due'])) : 'TBC').'</span></div>';
			$str .= '</li>';
			
			echo $str;
		
		}
	}
	
	function  drop_down_values($table, $value, $label, $selected)
	{
		echo "<option value=''>Please Select...</option>";
		$sql = "SELECT $label,$value FROM $table ORDER BY $label ASC";
		$res = mysql_query($sql) or die("Drop Down Error:- ".mysql_error());
		while($row = mysql_fetch_array($res)){
			if($selected == $row[$value] || $selected == $row[$label]){
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}
			echo "<option value='".$row[$value]."' $sel>".$row[$label]."</option>";
		}
	}
	
	function  drop_down_values_where($table, $value, $label, $selected, $not)
	{
		//echo "<option value=''>Please Select...</option>";
		$sql = "SELECT $label,$value FROM $table $not ORDER BY $label ASC";
		$res = mysql_query($sql) or die("Drop Down Error:- ".mysql_error());
		while($row = mysql_fetch_array($res)){
			if($selected == $row[$value] || $selected == $row[$label]){
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}
			echo "<option value='".$row[$value]."' $sel>".$row[$label]."</option>";
		}
	}
	
	function  drop_down_values_extra($table, $value, $label, $selected, $not)
	{
		echo "<option value=''>Please Select...</option>";
		$sql = "SELECT $label,$value FROM $table $not ORDER BY $label ASC";
		$res = mysql_query($sql) or die("Drop Down Error:- ".mysql_error());
		while($row = mysql_fetch_array($res)){
			if($selected == $row[$value] || $selected == $row[$label]){
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}
			echo "<option value='".$row[$value]."' $sel>".$row[$label]."</option>";
		}
	}
	
	function count_tasks($id_project)
	{
		$sql = "SELECT COUNT(id_task) FROM pr_project_tasks WHERE id_project = '".$id_project."'";
		$res = mysql_query($sql) or die(mysql_error());
		return mysql_result($res,0);
	}
	
	function drop_task_pre($selected,$curr)
	{
		echo "<option value=''>N/A</option>";
		$main = '';
		$count = 0;
		$sql = "SELECT p.project_name, t.id_task, t.task_name 
				FROM pr_project p, pr_project_tasks t
				WHERE t.id_project = p.id
				AND t.id_task <> '".$curr."'
				ORDER BY p.project_name, t.task_name ASC";
		$res = mysql_query($sql) or die("Drop Down Error:- ".mysql_error());
		while($row = mysql_fetch_array($res)){
			
			if($main != $row['project_name']){
				if($count > 0){
					echo "</optgroup>";
				}
				$main = $row['project_name'];
				echo "<optgroup label='".$row['project_name']."'>";
			}
			
			if($selected == $row['id_task'] || $selected == $row['task_name']){
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}
			echo "<option value='".$row['id_task']."' $sel>".$row['task_name']."</option>";
			$count ++;
		}
	}
	
	function drop_project_pre($selected)
	{
		echo "<option value=''>N/A</option>";
		$sql = "SELECT id, project_name FROM pr_project ORDER BY project_name ASC";
		$res = mysql_query($sql) or die("Drop Down Error:- ".mysql_error());
		while($row = mysql_fetch_array($res)){
			if($selected == $row['id'] || $selected == $row['project_name']){
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}
			echo "<option value='".$row['id']."' $sel>".$row['project_name']."</option>";
		}	
	}
	
	function drop_projects($selected)
	{
		echo "<option value=''>Please Select...</option>";
		$sql = "SELECT id, project_name FROM pr_project WHERE project_status IN (1,2,3,4) ORDER BY project_name ASC";
		$res = mysql_query($sql) or die("Drop Down Error:- ".mysql_error());
		while($row = mysql_fetch_array($res)){
			if($selected == $row['id'] || $selected == $row['project_name']){
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}
			echo "<option value='".$row['id']."' $sel>".$row['project_name']."</option>";
		}		
	}
	
	function IdToCountry($CountryId)
	{
		$Query = mysql_query("SELECT `country` FROM `db_country_regions` WHERE `id` = '$CountryId'");
		$row = mysql_fetch_row($Query);
		
		return $row[0];
	}
	
	function GetFlag($CountryName)
	{
		$Query = mysql_query("SELECT `alpha_2_code` FROM `db_country_regions` WHERE `country` = '$CountryName'");
		$row = mysql_fetch_row($Query);
		
		if ($row[0] == NULL)
		{
			return "none";	
		}
		return strtolower($row[0]);	
	}
	
	function CountryToId($CountryName)
	{
		$Query = mysql_query("SELECT `id` FROM `db_country_regions` WHERE `country` = '$CountryName'");
		$row = mysql_fetch_row($Query);
		
		return $row[0];
	}
	
	function vessel_header($id_vessel)
	{
	
		if ($id_vessel != 0)
		{
			$SQL = "SELECT v.*, c.id AS 'company_id', c.name AS 'company_name' FROM ves_details v, crm_companies c WHERE v.ves_client = c.id AND v.ves_id = '" . $id_vessel . "'";
			$query = mysql_query($SQL) or die(mysql_error());
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			
			if ($row['ves_next_check'] < time())
			{
				$class = "red";
			}
			else
			{
				$class = "";	
			}
			
			$str = "";
			$str .= "<div id=\"callscreenfieldset\">";
			$str .= "	<span class=\"boat\">" . $row['ves_name'] . "</span>";
			$str .= "	<span class=\"company\"><a href='landing.php?sec=Clients&pg=companies-details&company=".$row['company_id']."' title='".$row['company_name']."'>" . $row['company_name'] . "</a></span>";
			$str .= "</div>";
			
			echo $str;
			
			return $row;
		}
		else
		{
			$str = '';
			$str .= '<div id="callscreenfieldset">';
			$str .= '<span class="boat">Vessel Name</span>';
			$str .= '</div>';
			
			echo $str;	
		}
	}
	
	function draw_header($id_case){
		
		if($id_case != "NEW"){
		
			$sql = "SELECT c.id, c.first_name, c.last_name, v.name, t.value AS 'town', sp.value AS 'state', cr.country
					FROM crm_contacts c, crm_offices o, ca_cases ca, crm_companies v, db_town t, db_state_province sp, db_country_regions cr
					WHERE ca.case_id = '$id_case' 
					AND ca.id_contact = c.id 
					AND v.id = o.id_company
					AND o.id = c.id_office
					AND ca.id_location = t.id 
					AND t.id_county = sp.id
					AND sp.id_country = cr.id
					LIMIT 1";
			$result = mysql_query($sql) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
				$id = $row['id'];
				$name = $row['first_name'].' '.$row['last_name'];
				$company = $row['name'];
				$location = $row['town'].', '.$row['state'].', '.$row['country'];
			}
			
			$log = "
			SELECT l.`status`, l.`date`, l.number, c.first_name, c.last_name, c.contact_no_1, c.contact_no_2, c.contact_no_3, c.contact_no_4 
			FROM ca_call_cascade_log l, crm_contacts c 
			WHERE l.id_case = '$id_case' AND l.id_contact = c.id 
			ORDER BY l.`date` DESC LIMIT 1";
			$log = mysql_query($log) or die(mysql_error());
			if(mysql_num_rows($log) > 0){
				$data = mysql_fetch_array($log);
				$status = $data['status'];
				$name2 = $data['first_name'].' '.$data['last_name'];
				$telephone = $data['contact_no_'.$data['number']];
				$date = date('j/m/Y G:i',strtotime($data['date']));
			}else{
				$status = 3;
			}
			switch($status){
				case '0':
					$status = 'No Answer - '.$name2.' - '.$date;
				break;
				case '1':
					$status = 'Contact Made - '.$name2.' - '.$date;
				break;
				case '2':
					$status = 'Message Left - '.$name2.' - '.$date;
				break;
				case '3':
					$status = 'Not Tried Yet';
				break;
			}
			
			$str = '';
			$str .= '<div id="callscreenfieldset" style="overflow:hidden">';
			$str .= '<span class="contacts"><a href="landing.php?sec=clients&pg=client-details&id='.$id.'" title="'.$name.'">'.$name.'</a></span>';
			$str .= '<span class="company">'.$company.'</span>';
			$str .= '<span class="location">'.$location.'</span>';
			$str .= '<span class="calllog">'.$status.'</span>';
			$str .= '<span class="version">Case: '.$id_case.'-1</span>';
			$str .= '</div>';
		
		}else{
		
			$str = '';
			$str .= '<div id="callscreenfieldset">';
			$str .= '<span class="version">Case: '.$id_case.'-1</span>';
			$str .= '</div>';
		
		}
		
		echo $str;
	
	}
	
	function getCrmCompanyName($id_company)
	{
		$SQL = "SELECT * FROM crm_companies WHERE id = '" . $id_company . "'";
		$query = mysql_query($SQL) or die(mysql_error() . "<br />" . $SQL);
		$result = mysql_fetch_array($query, MYSQL_ASSOC);
		return $result['name'];
	}
	
	function check_select($x,$y){
		if($x == $y){
			return ' selected="selected"';	
		}else{
			return '';	
		}
	}
	
	function check_checked($x){
		if($x == '1'){
			return 'checked="checked"';
		}else{
			return '';
		}	
	}
	
	function check_disabled($x, $y)
	{
		if ($x == $y)
		{
			return " disabled=\"disabled\"";
		}
		else
		{
			return "";
		}
	}
	
	function check_check($x, $y)
	{
		if ($x == $y)
		{
			return " checked=\"checked\"";
		}
		else
		{
			return "";
		}
	}

	function check_class($x, $y)
	{
		if ($x == $y)
		{
			return " class=\"selected\"";
		}
		else
		{
			return "";
		}
	}
	
	function get_state_id($location,$state){
		$sql = "SELECT id FROM db_state_province WHERE id_country = '$location' AND `value` = '$state' LIMIT 1";
		$result = mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result) > 0){
			return mysql_result($result,0,0);
		}else{
			$update = "INSERT INTO db_state_province (`id_country`, `value`) 
						VALUES ('$location', '$state')";
			mysql_query($update) or die(mysql_error());
			return mysql_insert_id();
		}
	}
	
	function get_town_id($state,$town){
		$sql = "SELECT id FROM db_town WHERE id_county = '$state' AND `value` = '$town' LIMIT 1";
		$result = mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result) > 0){
			return mysql_result($result,0,0);
		}else{
			$update = "INSERT INTO db_town (`id_county`, `value`) 
						VALUES ('$state', '$town')";
			mysql_query($update) or die(mysql_error());
			return mysql_insert_id();
		}	
	}
	
	//LOG USER ACTION
	function addActivityLog($context, $action, $ref, $username) {
		$ip = $_SERVER['REMOTE_ADDR'];
		$query = "INSERT INTO log_activity (context, action, ref, ip, date, user) 
					VALUES ('$context', '$action', '$ref', '$ip', now(), '$username')";
		mysql_query($query) or die(mysql_error());
	}
	
	function debug($message){
		if(DEBUG === true){
			echo "<div id='debug'><strong>TESTING--></strong>$message</div>";
		}
	}
	
	//A FUNCTION FOR THE LOG
	function addUserLog($username, $password, $action, $description) {
		$ip = $_SERVER['REMOTE_ADDR'];
		$query = "INSERT INTO log_access (action, description, ip, date, username, password) 
					VALUES ('$action', '$description', '$ip', now(), '$username', '$password')";
		mysql_query($query) or die(mysql_error());
	}
	
	//GET DROP VALUES FROM DATABASE
	function getDropDownValues($table,$value,$label,$selected){
		if($table == "users" || $table == "users_role" || $table == "db_business_unit" || $table == "db_skills" || $table == "db_languages" || $table == "db_country_regions"){
			$sql = "SELECT $value, $label FROM $table ORDER BY $label ASC";
		} else {
			$sql = "SELECT $value, $label FROM $table WHERE status = 1 ORDER BY weight, $label ASC";
		}
		$res = mysql_query($sql) or die("Drop Down Error:- ".mysql_error());
		while($row = mysql_fetch_array($res)){
			if($selected == $row[$value] || $selected == $row[$label]){
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}
			echo "<option value='".$row[$value]."' $sel>".$row[$label]."</option>";
		}
	}
	
	function getDatabaseID_1($name,$table){
		$query = "SELECT id FROM $table WHERE value = '$name' LIMIT 1";
		$res = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($res) > 0){
			$return_data = mysql_result($res,0,0);
		}else{
			$query = "INSERT INTO $table VALUES ('','$name','1','')";
			$res = mysql_query($query);
			$return_data = mysql_insert_id();
		}
		return $return_data;
	}
	
	function getDatabaseID_2($name,$id,$name2,$table){
		$query = "SELECT id FROM $table WHERE value = '$name' AND $name2 = '$id' LIMIT 1";
		$res = mysql_query($query) or die(mysql_error()."<br/><b>QUERY:</b> ".$query);
		if(mysql_num_rows($res) > 0){
			$return_data = mysql_result($res,0,0);
		}else{
			$query = "INSERT into $table values ('','$id','$name','', '')";
			$res = mysql_query($query);
			$return_data = mysql_insert_id();
		}
		return $return_data;
	}
	
	function getDatabaseValue($table, $id) {
		$query = "SELECT value FROM $table WHERE id = '$id' LIMIT 1";
		$res = mysql_query($query) or die(mysql_error()."<br/><b>QUERY:</b> ".$query);
		if(mysql_num_rows($res) > 0) {
			$return_data = mysql_result($res,0,0);
		}
		else {
			$return_data = "";
		}
		return $return_data;
	}
	
	function getCompanyID($name){
		$query = "SELECT id FROM crm_companies WHERE name = '$name' LIMIT 1";
		$res = mysql_query($query) or die(mysql_error()."<br/><b>QUERY:</b> ".$query);
		if(mysql_num_rows($res) > 0){
			$return_data = mysql_result($res,0,0);
		}else{
			$query = "INSERT INTO crm_companies (name) VALUES ('$name')";
			$res = mysql_query($query);
			$return_data = mysql_insert_id();
		}
		return $return_data;
	}
	
	function getCompanyName($id) {
		$query = "SELECT name FROM crm_companies WHERE id = '$id' LIMIT 1";
		$res = mysql_query($query) or die(mysql_error()."<br/><b>QUERY:</b> ".$query);
		if(mysql_num_rows($res) > 0) {
			$return_data = mysql_result($res,0,0);
		}
		else {
			$return_data = "";
		}
		return $return_data;
	}
	
	function add_querystring_var($url, $key, $value) {
		$url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
		$url = substr($url, 0, -1);
		if (strpos($url, '?') === false) {
			return ($url . '?' . $key . '=' . $value);
		} else {
			return ($url . '&' . $key . '=' . $value);
		}  
	}
	
	function remove_querystring_var($url, $key) {
	  $url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
	  $url = substr($url, 0, -1);
	  return ($url);
	} 
	
	function alert($message){
		echo "<div id=\"errorContainer\">
				<strong>Alert:</strong> ".$message."
			</div>";
	}
	
	function feedback($message){
		echo "<div id=\"feedbackContainer\">
				<strong>Feedback:</strong> ".$message."
			</div>";
	}
	
	function getContactsBread()
	{		
		if ($_GET['company'] == "" && $_GET['office'] == "" && $_GET['contact'] == "")
		{
			return false;
		}
	
		if(isset($_GET['company']) && $_GET['company'] != ""){
			$company = $_GET['company'];
			$sql = "SELECT name FROM crm_companies WHERE id = '$company' LIMIT 1";
			$res = mysql_query($sql);
			$company = mysql_result($res,0,0);
		} else {
			$company = "";
		} 
		
		if(isset($_GET['office']) && $_GET['office'] != ""){
			$office = $_GET['office'];
			$sql = "SELECT office_nickname FROM crm_offices WHERE id = '$office' LIMIT 1";
			$res = mysql_query($sql);
			$office = mysql_result($res,0,0);
		} else {
			$office = "";
		} 
		
		if(isset($_GET['contact']) && $_GET['contact'] != ""){
			$contact = $_GET['contact'];
			$sql = "SELECT CONCAT(first_name,' ',last_name) FROM crm_contacts WHERE id = '$contact'";
			$res = mysql_query($sql);
			$contact = mysql_result($res,0,0);
		} else {
			$contact = "";
		} 
		
		$topModule = Navigation::getModuleByFolder("clients");

		echo("<a href='landing.php?sec=clients&pg=" . $topModule['default_page'] . "'>CRM</a>");
		
		$page = ($_GET['pg'] == "companies-details") ? "company-details" : $_GET['pg'];
		
		if($company != ""){
			echo " &rsaquo; <a href='landing.php?sec=clients&pg=companies-details&company=".$_GET['company']."' title='$company'>$company</a>";
		}
		
		if($office != ""){
			echo " &rsaquo; <a href='landing.php?sec=clients&pg=office-details&company=".$_GET['company']."&office=".$_GET['office']."' title='$office'>$office</a>";
		}
		
		if($contact != ""){
			echo " &rsaquo; <a href='landing.php?sec=clients&pg=contact-details&company=".$_GET['company']."&office=".$_GET['office']."&contact=".$_GET['contact']."' title='$contact'>$contact</a>";
		}
		
		echo(" &rsaquo; " . ucwords(str_replace("-", " ", $page)));
	}
	
	function getOffices($company,$selected){
		
		$sql = "SELECT id, office_nickname FROM crm_offices WHERE id_company = '".$company."' ORDER BY office_nickname ASC";
		$res = mysql_query($sql) or die("Drop Down Error:- ".mysql_error());
		while($row = mysql_fetch_array($res)){
			if($selected == $row['id'] || $selected == $row['office_nickname']){
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}
			echo "<option value='".$row['id']."' $sel>".$row['office_nickname']."</option>";
		}	
	}
	
	function getModuliftOffices($selected){
		
		$sql = "SELECT * FROM users_groups WHERE group_id > 1 ORDER BY group_name ASC";
		$res = mysql_query($sql) or die("Drop Down Error:- ".mysql_error());
		while($row = mysql_fetch_array($res)){
			if($selected == $row['group_id'] || $selected == $row['group_name']){
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}
			echo "<option value='".$row['group_id']."' $sel>".$row['group_name']." Office</option>";
		}	
	}
	
	function checkValue($x){
		if($x == ""){
			//DO NOTHING
		} else {
			echo $x."<br/>";
		}
	}
	
	function send_system_email($toEmail, $subject, $mainTitle, $subTitle, $content, $attachments = false, $ccEmail = false)
	{	
		ob_start();
		include(SERVER_PATH.'lib/includes/_system-html-email.php');
		$theMessage = ob_get_clean();
		
		$transport = Swift_MailTransport::newInstance();
		$mailer = Swift_Mailer::newInstance($transport);
		$message = Swift_Message::newInstance();
		$message->setSubject($subject);
		$message->setFrom(array(SYSTEM_EMAIL => COMPANY));
		$message->setTo($toEmail);	
		if($ccEmail != false)
		{
			if(is_array($ccEmail))
			{
				foreach($ccEmail as $email)
				{
					$message->addCc($email);
				}
			}else{
				$message->addCc($ccEmail);
			}
		}
		$message->setBody($theMessage, 'text/html');
		
		if($attachments != "")
		{
			foreach ($attachments as &$value) 
			{
				$message->attach(Swift_Attachment::fromPath(SERVER_PATH . $value));
			}
		}
		
		$result = $mailer->send($message);
	}

	function sendMail($fromEmail,$fromName,$toEmail,$toName,$subject,$theMessage,$attachment=false,$priority=3,$ccEmail="",$bccEmail=""){
		
		$transport = Swift_MailTransport::newInstance();
		
		//MESSAGE DETAILS
		$mailer = Swift_Mailer::newInstance($transport);
		$message = Swift_Message::newInstance();
		$message->setSubject($subject);
		$message->setFrom(array($fromEmail => $fromName));
		$message->setTo($toEmail);
		if($ccEmail != ""){
			$message->setCc($ccEmail);
		}
		if($bccEmail != ""){
			$message->setBcc($bccEmail);
		}
		$message->setBody($theMessage, 'text/html');
		$message->setPriority($priority);
		
		//ATTACHMENTS
		if($attachment != ""){
			foreach ($attachment as &$value) {
				$message->attach(Swift_Attachment::fromPath(SERVER_PATH.'lib/uploads/'.$value));
			}
		}
		//SEND THE MESSAGE
		if(count($toEmail) > 1){
			$result = $mailer->batchSend($message);
		} else {
			$result = $mailer->send($message);
		}
		return '1';
	}
	
	function countCompanies(){
		$sql = "SELECT COUNT(id) FROM crm_companies";
		$res = mysql_query($sql);
		return mysql_result($res,0,0);
	}
	
	function countAllOffices(){
		$sql = "SELECT COUNT(id) FROM crm_offices";
		$res = mysql_query($sql);
		return mysql_result($res,0,0);
	}
	
	function countAllContacts(){
		$sql = "SELECT COUNT(id) FROM crm_contacts";
		$res = mysql_query($sql);
		return mysql_result($res,0,0);
	}
	
	function getTaskForDetails($for,$ref){
		Switch($ref){
			case "Company":
				$sql = "SELECT name FROM crm_companies WHERE id = '$for'";
			break;
			case "Office":
				$sql = "SELECT office_nickname FROM crm_offices WHERE id = '$for'";
			break;
			case "Contact":
				$sql = "SELECT CONCAT(first_name,' ',last_name) FROM crm_contacts WHERE id = '$for'";
			break;
			case "order":
				$sql = "SELECT CONCAT('Order - ',project_name) FROM pr_order WHERE id = '$for'";
			break;
			case "quote":
				$sql = "SELECT CONCAT('Quote - ',project_name) FROM pr_order WHERE id = '$for'";
			break;
			case "Enquiry":
				$sql = "SELECT CONCAT('Enquiry - E',enquiry_id) FROM en_enquiry WHERE enquiry_id = '$for'";
			break;
		}
		$result = mysql_query($sql) or die(mysql_error().$sql);
		return mysql_result($result,0);
	}
	
	function GetMonthString($n)
	{
		$timestamp = mktime(0, 0, 0, $n, 1, 2009);
		
		return date("F", $timestamp);
	}
	
	function getScript($id_company, $script, $companyName, $callerName)
	{
		$SQL = "SELECT $script FROM crm_scripts WHERE id_company = $id_company";
		$query = mysql_query($SQL);
		//dump($SQL);
		$data = mysql_fetch_array($query);
		$return = nl2br($data[$script]);
		$return = str_replace('[#user_name#]',$_SESSION[SESSION_NAME]['user_name'],$return);
		$return = str_replace('[#company_name#]',$companyName ,$return);
		$return = str_replace('[#caller_name#]',$callerName,$return);
		return $return;
	
	}
	
	function getUserName($id)
	{
		$query = mysql_query ("SELECT `user_name`, `user_surname` FROM `users` WHERE `user_id` = '".$id."'") or die (mysql_error());
		$name = mysql_fetch_row($query);
		return $name[0]." ".$name[1];
	}
	
	
	function getSmsStatus($id){
	
		switch($id){
			case 0:
				$status = 'Immediate report';
				break;
			case 1:
				$status = 'Period report';
				break;
			case 2:
				$status = 'Stop connect';
				break;
			case 4:
				$status = 'Geo-fence (Alarm)';
				break;
			case 5:
				$status = 'SOS (Alarm)';
				break;
			case 13:
				$status = 'Sleep mode (Alarm)';
				break;
			case 14:
				$status = 'Battery low (Alarm)';
				break;
			case 16:
				$status = 'Motion report (Vibration)';
				break;
			case 17:
				$status = 'Motion report (Regular)';
				break;
			case 18:
				$status = 'Parking mode (Alarm)';
				break;
			case 19:
				$status = 'Parking mode (Regular)';
				break;
			case 20:
				$status = 'Sleep mode (Regular)';
				break;
			case 21:
				$status = 'SMS/GPRS Immediate report';
				break;
			case 22:
				$status = 'SMS/GPRS period report';
				break;
			case 23:
				$status = 'SMS/GPRS Geofence (Alarm)';
				break;
			case 24:
				$status = 'Motion report (Activate)';
				break;
		}
		
		return $status;
	}
	
	function getGpsFix($id){
		
		switch($id){
			case 1:
				$ret = 'N/A';
				break;
			case 2:
				$ret = 'GPS 2D';
				break;
			case 3:
				$ret = 'GPS 3D';
				break;		
		}
		
		return $ret;
	}			

	function subval_sort($array, $subkey, $sort = "asc")
	{ // from http://firsttube.com/read/sorting-a-multi-dimensional-array-with-php/ (20/07/2010)
		if (count($array) > 0 && $subkey != "")
		{
			foreach($array as $key => $value)
			{
				$subkeyValues[$key] = $value[$subkey];
			}
			
			if ($sort == "asc")
			{
				asort($subkeyValues);
			}
			else
			{
				arsort($subkeyValues);
			}
			
			foreach($subkeyValues as $key => $value)
			{
				$result[] = $array[$key];
			}
		}
		return $result;
	}
	
	function dump($object)
	{
		echo("<pre style='margin: 20px; background: white; border: 2px inset grey; color: black; white-space: pre-wrap;'>");
		print_r($object);
		echo("</pre>");
	}
	
	function clean($variable)
	{
		if (is_array($variable) === true)
		{
			$cleaned = array();
			
			foreach ($variable as $key => $value)
			{
				if (is_array($value) === true)
				{
					$cleaned[$key] = clean($value);
				}
				else
				{
					$cleaned[$key] = @mysqli_real_escape_string($GLOBALS['dblink'] ,$value);
				}
			}
			
			return $cleaned;
		}
		else
		{
			return @mysqli_real_escape_string($GLOBALS['dblink'] ,$value);
		}
	}
	
	function arrayUnique($array, $preserveKeys = false)
	{
		$results = array();
		$hashes = array();
		
		foreach($array as $key => $element)
		{
			$hash = md5(json_encode($element));

			if (!isset($hashes[$hash])) 
			{
				$hashes[$hash] = $hash;

				if ($preserveKeys === true)
				{
					$results[$key] = $element;
				}
				else 
				{
					$results[] = $element;
				}
			}
		}
		
		return $results;
	}
	
	function makeBinary($value)
	{
		$result = ($value >= 1) ? "1" : "0";
		return $result;
	}
	
        
        
        
        
        
	require_once("classes/mysql-class.php");
        require_once("classes/users-class.php");
	//require_once(SERVER_PATH . "lib/scripts/php/classes/navigation-class.php");
	//require_once(SERVER_PATH . "lib/scripts/php/classes/templates-class.php");
	//require_once(SERVER_PATH . "lib/scripts/php/classes/image-class.php");
	
	//require_once(SERVER_PATH . "lib/scripts/php/classes/tracking-class.php");
	#require_once(SERVER_PATH . "lib/modules/Tracking/scripts/php/pointLocation-class.php");
	//require_once(SERVER_PATH . "lib/scripts/php/classes/crm-class.php");
	//require_once(SERVER_PATH . "lib/scripts/php/classes/messaging-class.php");
	//require_once(SERVER_PATH . "lib/scripts/php/classes/regions-class.php");
	//require_once(SERVER_PATH . "lib/scripts/php/classes/alerts-class.php");
	//require_once(SERVER_PATH . "lib/scripts/php/classes/requests-class.php");
?>