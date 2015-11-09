
<?php 

session_start();	// to call superglobal array $_SESSION

// require "class.Auth.inc";
require "class.DB.inc";  // database connection class


if (isset($_POST['login'])){

	$usrName = ($_POST['username']);
	$paswrd  = ($_POST['password']);

	// connect to database
	$db = "users";
	$db_obj = new DB($db);
	$db_obj->makeConn();

	// find if user exists 
	$c = $db_obj->userExist($usrName);
				


#if user does't exist go to registration page
	if($c==false)
	{
		#todo registration page
		echo "user doesn't exist";
	}


	if($c==true){	#if user do exist check for user password combo

		$k = $db_obj->_user_password_combo($usrName, $paswrd);
		
		if($k == true){
			
			$_SESSION['varname'] = $usrName;
			header("Location: profile.php");

			// echo $oo." ".$cc;
		}
	}




	/*
	*This function finds if the user exists 
	*/


}

 ?>

