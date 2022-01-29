<?php 
if (isset($_POST['submit']) ) {
	if ($_POST['username']=="admin" && $_POST['password']=="admin") {
		require("inc/db.php");
		$_SESSION['admin'] = "admin";
		header("Location: dashboard.php");
	}
	else{
		header("Location: index.php?error=1");
	}
}
else{
	echo "hi";
	header("Location: index.php");
}
?>