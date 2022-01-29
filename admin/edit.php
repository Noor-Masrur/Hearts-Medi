<?php
require("inc/db.php");
if (!isset($_SESSION['admin']) && $_SESSION['admin']!="admin") {
	header("Location: index.php");
}
if (isset($_GET['name']) && $_GET['name']=='book') {
		if (isset($_POST['submit']) && $_POST['submit']=='Upload') {
		$id = addslashes($_GET['id']);
		$name = $_POST['name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$sub = $_POST['sub'];
		$sql = "UPDATE `book` SET `name` = '$name', `price` = '$price', `description` = '$description', `sub` = '$sub' WHERE `book`.`id` = $id";
		$conn = new mysqli($host, $username, $password, $database);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		if ($result) {
		echo "Successfully updated";
		}
	}
	$id = addslashes($_GET['id']);
	$conn = new mysqli($host, $username, $password, $database);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM `book` WHERE `id` = $id";
	$result = $conn->query($sql);
	$result = $result->fetch_assoc();
	echo '<center>
	<h1>Edit Book</h1><hr>
	<h2><a href="home.php">Home</a></h2>
	<table border="1" cellspacing="10" cellpadding="10">
			<tr>
				<td>Name</td>
				<td>Price</td>
				<td>Description</td>
				<td>sub</td>
			</tr>
			<form action="" method="POST" enctype="multipart/form-data">
				<tr>
				<td><textarea name="name">'.$result['name'].'</textarea></td>
				<td><input type="text" name="price" value='.$result['price'].'> </td>
				<td><textarea name="description">'.$result['description'].'</textarea></td>
				<td><textarea name="sub">'.$result['sub'].'</textarea></td>
			</tr>
			<tr>
				<td colspan="10" align="center"><input type="submit" name="submit" value="Upload"></td>
			</tr>
			</form>

		</table>';
}

if (isset($_GET['name']) && $_GET['name']=='channel') {
		if (isset($_POST['submit']) && $_POST['submit']=='Upload') {
		$id = addslashes($_GET['id']);
		$name = $_POST['name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$sub = $_POST['sub'];
		$old = $_POST['sub'];
		$sub = explode(";", $sub);
		$count = count($sub);
		$sub = $sub[$count-1];
		$sql = "UPDATE `channel` SET `name` = '$name', `price` = '$price', `description` = '$description', `sub` = '$old' WHERE `channel`.`id` = $id";
		$conn = new mysqli($host, $username, $password, $database);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		if ($result) {
		echo "Successfully updated";
		}
		$sql = "SELECT * FROM `users` WHERE `mobile` = '$sub'";
		$conn = new mysqli($host, $username, $password, $database);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query($sql);
		$result = $result->fetch_assoc();
		$subscriptions = $result['subscriptions'];
		if (strpos($subscriptions, $id) == false) {
			echo 1;
			$subscriptions = $subscriptions.';'.$id;
			$sql = "UPDATE `users` SET `subscriptions` = '$subscriptions' WHERE `users`.`mobile` = '$sub'; ";
			$conn = new mysqli($host, $username, $password, $database);
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			$result = $conn->query($sql);
		} 
	}
	$id = addslashes($_GET['id']);
	$conn = new mysqli($host, $username, $password, $database);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM `channel` WHERE `id` = $id";
	$result = $conn->query($sql);
	$result = $result->fetch_assoc();
	echo '<center>
	<h1>Edit Channel</h1><hr>
	<h2><a href="home.php">Home</a></h2>
	<table border="1" cellspacing="10" cellpadding="10">
			<tr>
				<td>Name</td>
				<td>Price</td>
				<td>Description</td>
				<td>sub</td>
			</tr>
			<form action="" method="POST" enctype="multipart/form-data">
				<tr>
				<td><textarea name="name">'.$result['name'].'</textarea></td>
				<td><input type="text" name="price" value='.$result['price'].'> </td>
				<td><textarea name="description">'.$result['description'].'</textarea></td>
				<td><textarea name="sub">'.$result['sub'].'</textarea></td>
			</tr>
			<tr>
				<td colspan="10" align="center"><input type="submit" name="submit" value="Upload"></td>
			</tr>
			</form>

		</table>';
}
?>