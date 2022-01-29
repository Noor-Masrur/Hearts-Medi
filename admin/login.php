<?php 
if (isset($_POST['submit']) && $_POST['submit']=="Enter") {
	if ($_POST['username']=="admin" && $_POST['password']=="admin") {
		require("inc/db.php");
		$_SESSION['admin'] = "admin";
		header("Location: home.php");
	}
	else{
		header("Location: index.php?error=1");
	}
}
else{
	header("Location: index.php");
}
?>