<?php require_once '../app/views/templates/headerPublic.php' ?>

<!DOCTYPE html>
<html>
<head>
<title>Loging Page</title> 
</head>
<body style="background-color:#FFD3D3">

	<div id="main-wrapper">
		<center>
			<h2>Login Form</h2>
			<img src="/images/icon-1.png" class="icon"/>
		</center>
	
	<form class="myForm" action="/login/index" method="post">
		<label><b>Username:</b></label><br>
		<input name="username" type="text" class="inputValues" placeholder="Type your username"/><br><br>
		<label><b>Password:</b></label><br>
		<input name="password" type="password" class="inputValues" placeholder="Type your password"/><br><br>
		<input name="login" type="submit" id="login-btn" value="Login"/>
		<a href="/login/register"><input type="button" id="register-btn" value="Register"/>
	</form>
	</div>
	
</body>
</html>

    <?php require_once '../app/views/templates/footerPublic.php' ?>
