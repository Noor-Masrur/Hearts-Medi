<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin | Panel</title>

	 <!-- Custom Styling -->
     <link rel="stylesheet" href="style.css">
    
    <!-- Admin Styling -->
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div style="background-image: linear-gradient(to top, #4169e1, #fafafa);
height: 100%">
<center>
	<div class="admin-login">
		<h1>Admin Login</h1>
	</div>
	<hr style="color: #031a61">

	<div class= "auth-content">
		<form action="login.php" method="POST">
			<?php
			if (isset($_GET['error']) && $_GET['error']==1) {
				echo "Wrong Username and Password";
				} 
			?>


			<div>
				<label>Username</label>
				<input type="text" name="username" class="text-input" />
			</div>
			<div>
				<label>Password</label>
				<input type="password" name="password"  class="text-input" />
			</div>
			<div>
				<button type="submit" name="submit" class="btn big-btn">Log In</button>
			</div>
			<!--done
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
			-->
		</form>
	</div>
	
</center>
</div>
</body>
</html>