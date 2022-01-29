<?php
require("inc/db.php");
if (!isset($_SESSION['admin']) && $_SESSION['admin']!="admin") {
	header("Location: index.php");
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
		<h1>All User</h1>
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
<?php
	$conn = new mysqli($host, $username, $password, $database);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM `users`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()){
	  	echo "<tr>";
	  	foreach ($row as $key => $value) {
	  		if ($key == 'id') {
	  			$id = $value;
	  		}
	  		echo "
	  		<td>$value</td>
	  		";

	  	}

	  	echo "<td><a href='edit_user.php?id=$id'>Edit</a></td></tr>";
	  }
	}

?>

</body>
</html>