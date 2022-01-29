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
		<h1>Channel Payment</h1>
		<h2><a href="home.php">Home</a></h2>
	<table cellpadding="5" border="1">
		<tr>
			<td>id</td>
			<td>ac</td>
			<td>user</td>
			<td>phone</td>
			<td>address</td>
			<td>txid</td>
			<td>taka</td>
			<td>book id</td>
			<td>status</td>

		</tr>
<?php
	$conn = new mysqli($host, $username, $password, $database);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM `channel_payment`";
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

	  	echo "</tr>";
	  }
	}

?>

</body>
</html>