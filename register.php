<?php


if(isset($_POST['loginButton'])) {
	echo "login button was pressed";
}

if(isset($_POST['registerButton'])) {
	echo "register button was pressed\n";
	
	$username = sanitizeFormUserName($_POST['username']);
	
	$firstName = sanitizeFormString($_POST['firstName']);

	$lastName = sanitizeFormString($_POST['lastName']);
	
	$email = sanitizeFormString($_POST['email']);

	$email2 = sanitizeFormString($_POST['email2']);

	$password = sanitizeFormPassword($_POST["password"]);

	$password2 = sanitizeFormPassword($_POST["password2"]);
}

function sanitizeFormUserName($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function sanitizeFormPassword($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Slotify</title>
</head>
<body>
	<div id="inputContainer	">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<p>
				<label for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bart sympson" required>

			</p>
			<p>	
				<label for="loginPassword">Password</label> 
				<input id="loginPassword" name="loginPassword" type="password" required>
			</p>
			<button type="submit" name="loginButton">LOG IN</button>
		</form>

		<form id="registerForm" action="register.php" method="POST">
			<h2>Create your free account</h2>
			<p>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="e.g. bart sympson" required>

			</p>

			<p>
				<label for="firstName">First name</label>
				<input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" required>

			</p>

			<p>
				<label for="lastName">Last name</label>
				<input id="lastName" name="lastName" type="text" placeholder="e.g. Sympson" required>

			</p>

			<p>
				<label for="email">Email</label>
				<input id="email" name="email" type="text" placeholder="e.g. bart@gmail.com" required>

			</p>

			<p>
				<label for="email2">Confirm email</label>
				<input id="email2" name="email2" type="text" placeholder="e.g. bart@gmail.com" required>
			</p>


			<p>	
				<label for="password">Password</label> 
				<input id="password" name="password" type="password" placeholder="your password" required>
			</p>

			<p>	
				<label for="password2">Password</label> 
				<input id="password2" name="password2" type="password" placeholder="Confirm password" required>
			</p>
			<button type="submit" name="registerButton">SIGN UP</button>
		</form>
	</div>

</body>
</html>