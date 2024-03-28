<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['pass2'];


			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,first_name,last_name,email,password) values ('$user_id','$fname','$lname','$email','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
	}		

?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="logstyle.css">
	<script src="validation.js" defer></script>
</head>
<body>
	<div class="container">
		<h2>Sign Up</h2>
		<hr>
		<form method="post" onsubmit="return validate();">

			<div class="textfield">
				<label for="fname">First Name</label>
				<input type="text" name="fname" id="fname">
			</div>
			
			<div class="textfield">
				<label for="lname">Last Name</label>
				<input type="text" name="lname" id="lname">
			</div>
	

			<div class="textfield">
				<label for="email">Email</label>
				<input type="email" name="email" id="email">
			</div>
		
			<div class="textfield">
				<label for="pass">Password</label>
				<input type="password" name="pass" id="pass">
			</div>

			<div class="textfield">
				<label for="pass2">Re-type Password</label>
				<input type="password" name="pass2" id="pass2">
			</div>
			<button type="reset">Reset</button>
			<div class="textfield"></div>
				<input type="submit" value="Sign Up">

				

			<div class="textfield"></div>

		
		</form>
		<br>
		<hr class="line">
		<br>

		
			
<a class="createLink" href="login.php">Click here to Login</a>
		</div>
	</div>	
</body>
</html>