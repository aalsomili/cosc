<?php require_once '../app/views/templates/header.php'?>

<!DOCTYPE html>
<html>
<head>
<title>Create a Reminder page</title> 
</head>
<body style="background-color:#FFD3D3">

	<div id="main-wrapper">
		<center>
			<h2>create a reminder</h2>
		</center>
	
	<form action="/reminder/index" method="post">
	
		<label><b>subject:</b></label><br>
		<input name="subject" type="text" placeholder="subject"/><br><br>
		
		<label><b>description:</b></label><br>
		<input name="description" type="text" placeholder="description"/><br><br>
		
		<a href="/reminder/create"><input name="create" type="button" value="create"/>
	</form>
	</div>
	
</body>
</html>

    <?php require_once '../app/views/templates/footer.php' ?>
