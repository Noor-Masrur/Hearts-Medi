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
	<title>Admin</title>
</head>
<body>
<center>
	<h1>Admin Panel</h1><hr>
	<h3><a href="user.php">All User</a></h3>
	<h3><a href="book_payment.php">Book payment</a></h3>
	<h3><a href="channel_payment.php">Channel payment</a></h3>
	<h3><a href="add_book.php">Add Book</a></h3>
	<h3><a href="add_channel.php">Add Channel</a></h3>
</center>
</body>
</html>