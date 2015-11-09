<?php 
require "class.DB.inc";

if (isset($_POST['signup'])){

		$username = ($_POST['username']);
		$pass = ($_POST['password']);
		$email = ($_POST['email']);

	if ($username !='' && $pass != '' && $email !='') {


		$db = "users";
		$obj = new DB($db);

		$obj->makeRecord($username, $pass, $email);
			
		}
		else{
			echo "username, email and password field must be filled";
		}




}


 ?>

<h1>Please Provide your information to register</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post" enctype="multipart/form-data">
		<p>	Username:
			<input type ="text" name="username"></input>
			<br>
		</p>
		<p>	Password:
			<input type = "password" name="password"></input>
			<br>
		</p>
		<p>	Email:
			<input type ="text" name="email"></input><br>
		</p>
		<p>	<input type = "submit" value="SignUp" name="signup"></input>
		</p>

			
</form>