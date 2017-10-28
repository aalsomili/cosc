<?php require_once '../app/views/templates/header.php' ?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body style="background-color:#34495e">

	<div id="main-wrapper">
		<center>
			<h2>Home Page</h2>
			<h3>Welcome 
			<?php
				echo $_SESSION['username'] 
				?></h3>
			<img src="images/icon-1.png" class="icon"/>
		</center>
	
	<form class="myForm" action="homepage.php" method="post">
		<input name="logout" type="submit" id="logout-btn" value="Log Out"/><br>
	</form>
	
	</div>
	
</body>
</html>

    <?php require_once '../app/views/templates/footer.php' ?>
