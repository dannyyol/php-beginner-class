<?php

class Database{
	private $conn;
	function __construct()
	{
		
		$this->conn = $this->connect_db() ;
	}

	public function connect_db(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "php_auth";

		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		else{

			$db_sql = "CREATE DATABASE IF NOT EXISTS php_auth";
			$tb1_sql = "CREATE TABLE IF NOT EXISTS students (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				firstname VARCHAR(30) NULL,
				lastname VARCHAR(30) NULL,
				email VARCHAR(50) NULL,
				gender VARCHAR(50) NULL,
				age VARCHAR(50) NULL
			)";
	
			$tb2_sql = "CREATE TABLE IF NOT EXISTS users (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				email VARCHAR(50) NULL,
				passwd VARCHAR(50) NULL,
				role varchar(255) DEFAULT 'student'
			)";

			if($conn->query($db_sql) == TRUE){
				// echo "database created successfully";
				// return $conn;
			}else{
				echo "Error creating database: " . $conn->error;
			}
	
			if ($conn->query($tb1_sql) === TRUE && $conn->query($tb2_sql) === TRUE) {
				// echo "Table students created successfully";

				return $conn;
				// echo "Table students created successfully";
			} else {
				echo "Error creating table: " . $conn->error;
			}
	
	
			$conn->close();

		}
	}


	public function create($fname,$lname,$email,$gender,$age){
		$sql = "INSERT INTO `students` (firstname, lastname, email, gender, age) VALUES ('$fname', '$lname', '$email', '$gender', '$age')";
		$res = mysqli_query($this->conn, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}
	}

	public function read($id=null){
		$sql = "SELECT * FROM `students`";
		if($id){ $sql .= " WHERE id=$id";}
 		$res = mysqli_query($this->conn, $sql);
 		return $res;
	}

	public function update($fname,$lname,$email,$gender,$age, $id){
		$sql = "UPDATE `students` SET firstname='$fname', lastname='$lname', email='$email', gender='$gender', age='$age' WHERE id=$id";
		$res = mysqli_query($this->conn, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		$sql = "DELETE FROM `students` WHERE id=$id";
 		$res = mysqli_query($this->conn, $sql);
 		if($res){
 			return true;
 		}else{
 			return false;
 		}
	}

	public function sanitize($var){
		$return = mysqli_real_escape_string($this->conn, $var);
		return $return;
	}

	public function register($email, $password){
        $sql = "INSERT INTO `users` (email, passwd) VALUES ('$email', '$password')";
		$res = mysqli_query($this->conn, $sql);
		if($res){
	 		return true;
		}else{
			return false;
		}

	}
	
	public function login($email, $password){
		$sql = "SELECT * FROM `users` WHERE email ='{$email}' AND passwd = '{$password}'";
		$res = mysqli_query($this->conn, $sql);
 		return $res;
	}


	public function readUsers($id=null){
		$sql = "SELECT * FROM `users`";
		if($id){ $sql .= " WHERE id=$id";}
 		$res = mysqli_query($this->conn, $sql);
 		return $res;
	}

	public function updateUser($role,$password,$email, $id){
		$sql = "UPDATE `users` SET email='$email', role='$role', passwd='$password' WHERE id=$id";
		$res = mysqli_query($this->conn, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}


}

$database = new Database();

?>