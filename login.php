<!-- login.php -->

<?php

	// include header, connect to database
	include 'header_login.html';
	require 'includes/init.php';
	// check if the user is loging in
	if(isset($_POST['username']) && isset($_POST['password'])){
		$result = $user_obj->loginUser($_POST['username'],$_POST['password']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HiiFiVE - Login</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link href="css/login&register.css" rel="stylesheet" type="text/css">

	<style>		
		h2 {
			color: rgba(252, 83, 69, 0.842);
			text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
			text-decoration: underline overline;
		}
	</style>
	
</head>

<!-- creating cookie pop-up -->

<script>
  alert("This website uses cookies to ensure the best user experience. For more informatie, see https://www.cookiesandyou.com/ ");

</script>

<!-- end cookie pop-up -->

<body style="background-color: rgba(80, 121, 167)" >

	<div class="login">
		<h1>Login</h1>

		<form action="" method="POST">
			<label for="username">
				<i class="fas fa-user"></i>
			</label>

			<input type="text" id="username" name="username" value = 
			"<?php 
			if(!isset($_COOKIE['username'])) 
			{
				echo "";
			}
			else
			{
				echo $_COOKIE['username'];
			}
			?>"
			spellcheck="false" placeholder="Enter your username" required>

			<label for="password">
				<i class="fas fa-lock"></i>
			</label>

			<input type="password" id="password" name="password" value = 
			"<?php 
			if(!isset($_COOKIE['password']))
			{
				echo "";
			}
			else
			{
				echo $_COOKIE['password'];
			}
			?>"
			placeholder="Enter your password" required>

			<div>
				<input type="checkbox" name="remember_me" value="ch"/>Remember username and password </br>
			</div>
			
			<input type="submit" name = "login_button" value="Login">
			
			<div>
				<a href="register.php" style= "text-decoration: none; " > <h4 style="background-color: rgba(80, 121, 167); color: white; font-family: Calibri, sans-serif"> No account? Register now!</h4> </a>
			</div>
			
			
			<?php
				if(isset($result['errorMessage'])){
					echo '<p class="errorMsg">'.$result['errorMessage'].'</p>';
				}

				if(isset($result['successMessage'])){
					echo '<p class="successMsg">'.$result['successMessage'].'</p>';
				}

				// create cookie to keep used logged in for 1 day 	
				if(isset($_POST['login_button']))
				{
					if(isset($_POST['remember_me']))
					{
						setcookie('username', $_POST['username'], time() + (86400 * 30));
						setcookie('password', $_POST['password'], time() + (86400 * 30));
					}
				}
			?>
		</form>
		</div>
	</div>

</body>
</html>