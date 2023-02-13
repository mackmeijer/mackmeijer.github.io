<!-- register.php -->

<?php

	// include header, connect to database
	include 'header_login.html';
	require 'includes/init.php';

	// check if the user is signing up
	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
		$result = $user_obj->singUpUser($_POST['username'],$_POST['email'],$_POST['password']);
	}

	// check if the user is already locked in
	if(isset($_SESSION['username'])) {
		header('Location: home.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> HiiFiVE- Register</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link href="css/login&register.css" rel="stylesheet" type="text/css">
	<style>
		.container {
			display: grid; 
			grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
			grid-template-rows: 1fr 1fr 1fr 1fr;
			gap: 7px 7px; 
			grid-template-areas: 
			"Home Home Home Home Home"
			"Info Info Info Register Register"
			"Info Info Info Register Register"
			"Info Info Info Register Register"; 
		}
		
		.Home { grid-area: Home;
			background-color: rgba(80, 121, 167, 0.8);
			height: 250px;
			text-align: center;
			font-size: 35px; 
			border-radius: 4px;
			}
			
		.Info { grid-area: Info; 
			background: rgba(252, 84, 69, 0.842);
			font-size: 35px;
			text-align: center;
			padding: 30px;
			box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
			border-radius: 4px;
			}
		
		.Register { grid-area: Register; 
			background-color:rgba(252, 83, 69, 0.842);
			padding: 100px;
			box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
			border-radius: 4px;
			}
		
		
		h2 {
			color: rgba(252, 83, 69, 0.842);
			text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
			text-decoration: underline overline;
		}

	</style>
</head>

<body style="background-color: rgba(80, 121, 167)" >
    <div class="register">

        <h1>Register</h1>
        <form action="" method="POST" novalidate>

        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" maxlength="20" id="username" name="username" spellcheck="false" placeholder="Enter your username" required>

        <label for="email">
            <i class="fas fa-envelope"></i>
        </label>
        <input type="email" id="email" name="email" spellcheck="false" placeholder="Enter your email address" required>

        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <input type="submit" value="Sign Up">
        <div>
			<a href="login.php" style= "text-decoration: none; " > <h4 style="background-color: rgba(80, 121, 167); color: white; font-family: Calibri, sans-serif"> Already have an account? Login! </h4> </a>
		</div>
        </form>
        
        <div>
            <?php
            if(isset($result['errorMessage'])){
                echo '<p class="errorMsg">'.$result['errorMessage'].'</p>';
            }
            if(isset($result['successMessage'])){
                echo '<p class="successMsg">'.$result['successMessage'].'</p>';
            }
            ?>  
        </div>

    </div>
</body>
</html>