<?php
	class MySQL
	{
		var $connection;
		
		function __construct($autoConnect = false)
		{
			if ($autoConnect === true)
			{
				$this->connect();
			}
		}
		
		function connect()
		{
			$this->connection = @mysql_connect(DB_HOST, DB_USER, DB_PASS);

			if (!$this->connection)
			{
				echo("Database login error - " . mysql_error());
			}

			if (@mysql_select_db(DB_NAME, $this->connection) === false)
			{
				echo("Database selection error - " . mysql_error());
			}
		}
		
		function checkConnection()
		{
			return @mysql_ping();
		}
		
		function disconnect()
		{
			if (isset($this->connection))
			{
				mysql_close($this->connection);
			}
		}
		
		public static function query($SQL, $return = false, $resultType = MYSQLI_ASSOC)
		{
			$dblink = $GLOBALS['dblink'];
			//print_r($dblink);die;
			$result = mysqli_query($dblink,$SQL);

			if ($result === false)
			{
				die("SQL error - " . mysqli_error() . "<br />" . $SQL);
				return false;
			}
			elseif ($result === true)
			{
				$queryType = substr($SQL, 0, strpos($SQL, " "));

				# get result of last sql + return it on insert
				if (strtoupper($queryType) == "INSERT" && $return === true)
				{
					$insertID = mysqli_insert_id();
					$table = substr($SQL, 12, strpos($SQL, " ", 12) - 12);
					
					$r = mysqli_query($dblink,"SELECT DATABASE()") or die(mysql_error());
					$dbname = mysqli_result($r, 0);
					
					$index = MySQL::query("SHOW INDEX FROM " . $dbname . "." . $table, true);
					$key = $index['Column_name'];

					$SQL = "SELECT * FROM " . $table . " WHERE " . $key . " = " . $insertID;
					$result = MySQL::query($SQL, true);
				}

				return $result;
			}
			else
			{
				$records = array();

				while ($row = mysqli_fetch_array($result, $resultType))
				{
					$records[] = $row;
				}

				# if only 1 record returns a single record instead of an array containing a single record
				if (count($records) == 1 && $return === true)
				{
					return $records[0];
				}

				return $records;
			}			
		}
        
		function found_rows()
		{
			$SQL = "SELECT FOUND_ROWS();";
			$result = MySQL::query($SQL, true);
			return $result['FOUND_ROWS()'];
		}
	}
?>