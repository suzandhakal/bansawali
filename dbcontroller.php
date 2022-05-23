<?php
class DBController {
    	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "db_bansawali";
	private $conn;

// 	private $host = "localhost";
// 	private $user = "root";
// 	private $password = "";
// 	private $database = "db_bansawali";
// 	private $conn;

	function __construct() {
		$this->conn = $this->connectDB();
		
	}

	function connectDB() {
	    $conn = mysqli_connect($this->host,$this->user,$this->password, $this->database);
	    
mysqli_query($conn,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

mysqli_set_charset($conn,'utf8');
		return $conn;
	}
	
	public function escapechar($str)
	{
		return str_replace("'","\'",$str);
	    // return mysqli_query($this->conn,$str);
	    
	}

	function runQuery($query) {
		$result = mysqli_query($this->conn, $query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function rawQuery($query) {
		$result = mysqli_query($this->conn, $query);
		return $result;
	}

	function numRows($query) {
	    $result  = mysqli_query($this->conn, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}

	function updateQuery($query) {
	    $result = mysqli_query($this->conn, $query);
		if (!$result) {
		    die('Invalid query: ' . mysqli_error($this->conn));
		} else {
			return $result;
		}
	}

	function insertQuery($query) {
	    $result = mysqli_query($this->conn, $query);
		if (!$result) {
		   //die('Invalid query: ' . mysqli_error($this->conn));
			return 0;
		} else {
	    return 1;
		}
	}

	function deleteQuery($query) {
	    $result = mysqli_query($this->conn, $query);
		if (!$result) {
			// die('Invalid query: ' . mysqli_error($this->conn));

			return 0;
		} else {
			return 1;
		}
	}

	function newID(){
		$result = mysqli_insert_id($this->conn);
		return $result;
	}
}
?>
