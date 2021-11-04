<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include("connection.php");
class Incident {
	protected $conn;
	protected $data = array();
	public function __construct()  {

		$db = new dbObj();
		$connString =  $db->getConnstring();
		$this->conn = $connString;
	}
	
	public function getIncidents() {
		$sql = "SELECT * FROM incident";
		$queryRecords = pg_query($this->conn, $sql) or die("error to fetch incidents data");
		$data = pg_fetch_all($queryRecords);
		return $data;
	}
}

?>
