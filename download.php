<?php 

require "class.DB.inc";
session_start();
$username = $_SESSION['varname'];
echo $username; 

$db = "users";
$obj = new DB($db);

if (isset($_POST['down'])) {

	$obj->down($username);
}

?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post" enctype="multipart/form-data">
		<p>	
		<input type = "submit" value="download" name="down"></input>
		CV now
		</p>
 </form>