<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Wrong Email or Password!";
		}else
		{
			echo "Wrong Email or Password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="logstyle.css">
</head>
<body>
	<div class="container">
		<h2>Log in</h2>
		<hr>
		<form method="post">

			<div class="textfield">
				<label for="email">Email</label>
				<input type="text" name="email">

			</div>
			
			<div class="textfield">
				<label for="password">Password</label>
				<input type="password" name="password">
			</div>
			<br>

			<input type="submit" value="Log in">
			<br></br>
	
		
		
		</form>
		<hr class="line">
		<br>

			
<a class="createLink" href="signup.php">Create a new Account</a>
<br>
	</div>
</body>
</html>

