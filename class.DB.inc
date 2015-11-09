<?php 

#this class connects to the database.

class DB {

	//instance variable

	private $db;
	private $conn;

	// constructor 
	public function DB ($dbname){
		$this->db = $dbname;
	}


	// methods
	/*
	*This method connects to database.
	*/
	public function makeConn(){
		// make connection
	$this->conn = mysqli_connect('localhost','root','', $this->db);


	// if fails show error
	if (!$this->conn) {
	    die("Connection failed: " . mysqli_connect_error());
	    
	}
	}

	/*
	* This method finds if a particular user exists
	*/

	public function userExist($name){
		$this->makeConn();	// make connection

		// build SQL query
		$sql ="SELECT '$this->db', password FROM credentials WHERE username = '$name'"; 
		$result = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_row($result);

		if ($row == false) {
			return false;
		}
		else{
			return true;
		}
		

	}

	public function _user_password_combo($name, $pass){

		$this->makeConn();


		$sql ="SELECT '$this->db', username, password FROM credentials WHERE username = '$name'"; 
		$result = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_row($result);

		$dbUsname = $row[1];
		$dbPassword = $row[2];



			if ($name == $dbUsname && $pass == $dbPassword) {

				return true;				
			}

			else{

				return false;
			}

	}


	public function blob($name){
		$this->makeConn();

		$sql ="SELECT '$this->db', username, password, cv FROM credentials WHERE username = '$name'"; 
		$result = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_row($result);

		$blob = $row[3];
		if ($blob !="") {
			return true;
		}
		else{
			return false;
		}
	}

	public function update($name, $cv){
		$this->makeConn(); // makes the connection

		$cvFileType = pathinfo($cv,PATHINFO_EXTENSION);

		if($cvFileType != "pdf" ) {
    				echo " Sorry, only pdf files are allowed.";	
			}
			else{
				
				$sql = "UPDATE credentials SET cv='$cv' WHERE username='$name'";

				
				if (mysqli_query($this->conn, $sql)) {

					header("Location: profile.php");

				} else {

    			echo "Error updating record: " . mysqli_error($conn);
    			
				}
			}

	}

	public function down($name){
		$this->makeConn(); // makes the connection

		$sql ="SELECT username, password, email, cv FROM credentials WHERE username = '$name'";
		$result = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_row($result);

		header("Content-Disposition: attachment; filename=$row[3]");

	}


	public function makeRecord($username, $password , $email){
		$this->makeConn();

		//todo check for already taken emails.

		$sql = "INSERT INTO credentials (username, password, email)
				VALUES ('$username', '$password', '$email')";
		if ($this->conn->query($sql) === TRUE) {
		     			header("location: home.php");
					} 
		else 
		{
		    			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


}

 ?>