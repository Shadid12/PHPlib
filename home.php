<!DOCTYPE html>
<html>


<!-- Style Sheet -->
<style>
#p{color:orange;
   }
.right {
    position: absolute;
    right: 0px;
    width: 500px;
	top: 30px;
}

</style>
<!-- END STYLE SHEET -->



<div id = "header">
<hr>
<img style="display:inline-block" src="img/logo.png">
<h1 style="color:orange;display:inline-block;font-family:serif">GROUP 16- HR Consulting Service </h1>

	<div class ="right">
		<i style="color:orange">User Login</i> <br>
		<!-- Login form -->
		<form action="loginScript.php" method= "post">
			Username:
			<input type ="text" name="username"></input>
			<br>
			Password:
			<input type = "password" name="password"></input>
			<br>
			<input type = "submit" value="Login" name="login"></input>
		</form>
		<!-- end login -->
		<i style="color:orange">Registration: </i> 
		<a href="register.php">New user click here to register</a>
		<br>
	</div>


</div>
<hr style="background-color:orange;color:orange;height:5px">
<hr style="background-color:darkblue;color:darkblue;height:20px">


</html>