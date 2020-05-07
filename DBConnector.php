<?php
define('DB_SERVER','localhost');
define('DB_USER', 'root');
define('DB_PASS','');
define('DB_NAME', 'btc3205');

class DBConnector{
public $conn;

function connect(){
	$this->conn = new  mysqli('localhost','root','','btc3205');
	
	return $this->conn;
}
function closeDatabase(){
	mysqli_close($this->conn);
	}

}
?>