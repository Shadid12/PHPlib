<?php 

session_start();
include "class.DB.inc";

$username = $_SESSION['varname'];

if ($username == "") {
	echo "you are not logged in";
}
else{
	echo "<h1>Hello $username </h1> <br>";


	$data = "users";
	$db = new DB($data); // creates a new database instance
	$db->makeConn(); // connect to database

	$cv = $db->blob($username);
	if ($cv === false) {

	echo "looks like you don't have a CV uploaded to your profile!!! <br>";
	echo "<a href='upload.php'> Upload Now </a>";
	}

	else{

		echo "welcome back <br> Click ";
		echo "<a href='download.php'> Download </a> CV or make an <a href='upload.php'>Update</a>";
	}

	if (isset($_POST['out'])) {
	session_destroy();
}
}


 ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post">
		<p>	<input type = "submit" value="Sign Out" name="out"></input>
		</p>
</form>