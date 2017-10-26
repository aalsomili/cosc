<?php require_once '../app/views/templates/headerPublic.php' ?>
<!DOCTYPE html>
<html>
<head>
<title>Loging Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#34495e">

	<div id="main-wrapper">
		<center>
			<h2>Login Form</h2>
			<img src="image/icon-1.png" class="icon"/>
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
    <?php require_once '../app/views/templates/footer.php' ?>
