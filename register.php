<?php

	include("includes/Constants.php");
	include("includes/Account.php");
	

	$account = new Account();

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
	
	function getInputValue($name) {
		if(isset($_POST[$name])){
			return $_POST[$name];
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Slotify</title>
	<link rel="stylesheet" type="text/css" href="includes/assets/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="includes/js/register.js"></script>
</head>
<body>
	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError("Your username must be between 5 and 25 characters"); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bart sympson" required>

					</p>
					<p>	
						<label for="loginPassword">Password</label> 
						<input id="loginPassword" name="loginPassword" type="password" required>
					</p>
					<button type="submit" name="loginButton">LOG IN</button>

					<div  id="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Sing up now.</span>
					</div>
				</form>

				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>
					<p> 	
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" value="<?php getInputValue('username')?>" placeholder="e.g. bart sympson" required>

					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">First name</label>
						<input id="firstName" name="firstName" type="text" value="<?php getInputValue('firstName')?>" placeholder="e.g. Bart" required>

					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Last name</label>
						<input id="lastName" name="lastName" type="text" value="<?php getInputValue('lastName')?>" placeholder="e.g. Sympson" required>

					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="text" value="<?php getInputValue('email')?>" placeholder="e.g. bart@gmail.com" required>

					</p>

					<p>
						<label for="email2">Confirm email</label>
						<input id="email2" name="email2" type="text" value="<?php getInputValue('email2')?>" placeholder="e.g. bart@gmail.com" required>
					</p>


					<p>	
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<label for="password">Password</label> 
						<input id="password" name="password" type="password" placeholder="your password" required>
					</p>

					<p>	
						<label for="password2">Password</label> 
						<input id="password2" name="password2" type="password" placeholder="Confirm password" required>
					</p>
					<button type="submit" name="registerButton">SIGN UP</button>
					<div  id="hasAccountText">
						<span id="hideRegister">Already have an account? Sing in here.</span>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>