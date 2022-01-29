<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin | Panel</title>
</head>
<body>
<center>
	<h1>Please Login</h1>
	<hr>
	<form action="login.php" method="POST">
		<?php
		if (isset($_GET['error']) && $_GET['error']==1) {
		 	echo "Wrong Username and Password";
		 } 
		?>
		<table cellpadding="10" cellspacing="10">
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Enter"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>