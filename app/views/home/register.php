<?php require_once '../app/views/templates/headerPublic.php' ?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body style="background-color:#FFD3D3">

	<div id="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img src="/images/icon-1.png" class="icon"/>
		</center>
	
	<form class="myForm" action="/login/register" method="post">
		<label><b>Username:</b></label><br>
		<input name="username" type="text" class="inputValues" placeholder="Type your username" required /><br><br>
		<label><b>Password:</b></label><br>
		<input name="password" type="password" class="inputValues" placeholder="Type your password" required /><br><br>
		<label><b>Confirm Password:</b></label><br>
		<input name="cpassword" type="password" class="inputValues" placeholder="Type your password to confirm" required /><br><b>
		<input name="submit-btn" type="submit" id="signup-btn" value="Sign Up"/><br>
		<a href="/login/index"><input type="button" id="back-btn" value="Back"/>
	</form>
	
	</div>
</body>
</html>
    <?php require_once '../app/views/templates/footerPublic.php' ?>
