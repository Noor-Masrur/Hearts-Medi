<?php
require("inc/db.php");
if (!isset($_SESSION['admin']) && $_SESSION['admin']!="admin") {
	header("Location: index.php");
}
if (isset($_POST['submit']) && $_POST['submit']=="update") {
	foreach ($_POST as $key => $value) {
		if ($key == 'id') {
			$id = $value;
		}
		
		$conn = new mysqli($host, $username, $password, $database);
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE `users` SET `$key` = '$value' WHERE `users`.`id` = '$id'";
		$result = $conn->query($sql); 
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin | Panel</title>
</head>
<body>
	<center>
		<h1>Edit  User</h1>
		<h2><a href="home.php">Home</a>
	</center>
	<table cellpadding="5" border="1">
		<tr>
			<td>id</td>
			<td>name</td>
			<td>email</td>
			<td>mobile</td>
			<td>bmdc</td>
			<td>nid</td>
			<td>dob</td>
			<td>mname</td>
			<td>session</td>
			<td>extra</td>
			<td>ref</td>
			<td>pass</td>
			<td>status</td>
			<td>otp</td>
			<td>notification</td>
			<td>subscriptions</td>
			<td>Action</td>

		</tr>
		<form action="" method="POST">
<?php
if (isset($_GET['id'])) {
	$id = addslashes($_GET['id']);
	$conn = new mysqli($host, $username, $password, $database);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM `users` WHERE `id` = '$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()){
	  	echo "<tr>";
	  	foreach ($row as $key => $value) {
	  		if ($key == 'id') {
	  			$id = $value;
	  		}
	  		echo "
	  		<td><input type='text' name='$key' value='$value'</td>
	  		";

	  	}
	  	echo '<td><input type="submit" name="submit" value="update"></td></tr>';
	  }
	}
}
	

?>

</form>
</body>
</html>