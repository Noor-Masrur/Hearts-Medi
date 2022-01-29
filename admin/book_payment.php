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
		<h1>Book Payment</h1>
		<h2><a href="home.php">Home</a></h2>
	<table cellpadding="5" border="1">
		<tr>
			<td>id</td>
			<td>A/C type</td>
			<td>User Mobile</td>
			<td>User Name</td>
			<td>Taka Send From</td>
			<td>Shipping Address</td>
			<td>TXID</td>
			<td>Total Payment</td>
			<td>Book name</td>

		</tr>
<?php
	$conn = new mysqli($host, $username, $password, $database);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT `id`,`ac`,`user`,`phone`,`address`,`txid`,`taka`,`book_id` FROM `book_payment`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()){
	  	echo "<tr>";
	  	foreach ($row as $key => $value) {
	  		if ($key == 'id') {
	  			$id = $value;
	  		}
	  		else if($key == "user"){
	  		    $sql = "SELECT * FROM `users` WHERE `mobile`= '$value'";
	  		    $book_id = $conn->query($sql);
	  		    $data = $book_id->fetch_assoc();
                echo "<td>".$data['name']."</td>
                ";
	  		}
	  		else if($key == "book_id"){
	  		    $sql = "SELECT * FROM `book` WHERE `id`= '$value'";
	  		    $book_id = $conn->query($sql);
	  		    $data = $book_id->fetch_assoc();
	  		    $value = $data['name'];
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