<?php
include "crud.php";
include "authenticator.php";
include "DBConnector.php";
class User extends DBConnector implements Crud,Authenticator{
	private $user_id;
	private $first_name;
	private $last_name;
	private $city_name;
	private $username;
	private $password;

	function __construct($first_name, $last_name, $city_name, $username,$password){
		$this->first_name= $first_name;
		$this->last_name= $last_name;
		$this->city_name= $city_name;
		$this->username= $username;
		$this->password= $password;
			}
			//static constructor
	public static function create(){
		$instance=new self();
		return $instance;
	}
	//username setter
	public function setUsername($username){
		$this->username= $username;
	}

	//username getter
	public function getUsername(){

		return $this->username;
	}
	//password setter
	public function setPassword($password){
		$this->password;
	}
	//password getter
	public function getPassword(){
		return $this->password;
	}
	//user id setter
	public function setUserId($user_id){
		$this->user_id= $user_id;
	}
	//user id getter
	public function getUserId() {
		return $this->$user_id;
	}

	public function save(){
		$fn= $this->first_name;
		$ln= $this->last_name;
		$city=$this->city_name;
		$uname=$this->username;
		$this->hashPassword();
		$pass=$this->password;
		$me= "INSERT INTO user(first_name,last_name,user_city,username,password) Values ('$fn','$ln','$city', '$uname','$pass')";
		$res= $this->connect()->query($me); 
		$res= $this->closeDatabase();
		return $res;
		
	}
	

	public function readAll(){
		return null;
		
	}
	
	public function readUnique(){
		return null;
	}

	public function search(){
		return null;
	}

	public function update(){
		return null;
	}

	public function removeOne(){
		return null;
	}

	public function removeAll(){
		return null;
	}

	public function valiteForm(){
		//Return true if the values are not empty
		$fn = $this->first_name;
		$ln = $this->last_name;
		$city = $this->city_name;
		if ($fn ==""|| $ln ==""|| $city =="") {
			return false;
		}
		return true;
	}

	public function createFormErrorSessions(){
		session_start();
		$SESSION['form_errors'] = "All fields are required";
	}

	public function hashPassword(){
		//inbuilt function password_hash hashes our password
		$this->password= password_hash($this->password, PASSWORD_DEFAULT);
	}

	public function isPasswordCorrect(){
		$con2= $this->connect()->query("SELECT * FROM user");
		$found=false;
		while($row=mysqli_fetch_array($con2)){
			if(password_verify($this->getPassword(), $row['password']) && $this->getUsername()== $row['username']){
				$found=true;
			}
		}
		$con2= $this->closeDatabase();
	}
	public function login(){
		if($this->isPasswordCorrect()){
			header("Locaton:private_page.php");
		}
	}

	public function createUserSession(){
		session_start();
		unset($_SESSION['username']);
		session_destroy();
		header("Locaton:lab1.php");
	}

	public function logout(){
		session_start();
		unset($_SESSION['username']);
		session_destroy();
		header("Location:lab1.php");
	}
}

?>