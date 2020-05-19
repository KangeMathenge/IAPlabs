<?php


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
