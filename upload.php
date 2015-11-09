<?php 

require "class.DB.inc";
session_start();
$username = $_SESSION['varname'];
echo $username; 

$db = "users";
$obj = new DB($db);

if (isset($_POST['up'])) {

	$cv = basename($_FILES['file']['name']);
	$obj->update($username, $cv);
}

?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post" enctype="multipart/form-data">
		<p>	
		Upload Your CV <br>
		<input type = "file" value="Browse" name="file"></input>
		<input type = "submit" value="upload" name="up"></input>
		</p>
 </form>