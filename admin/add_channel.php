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
	<h1>Add Channel</h1>
	<h2><a href="home.php">Home</a></h2><hr>
	<h3><a href="add_channel.php?list">List</a></h3>
	<form action="add_channel.php" method="GET">
		Number of Video lecture<input type="text" name="number">
		<input type="submit" name="submit" value="upload">
	</form>
<?php
if (isset($_GET['list'])) {
	echo "<table border='1' cellpadding='10'>
	<tr>
	<td>Id</td>
	<td>Name</td>
	<td>Video link</td>
	<td>Price</td>
	<td>Description</td>
	<td>Thumbnail</td>
	<td>Cover</td>
	<td>Demo_video</td>
	<td>Sub</td>
	<td>Action</td>
	";
	$conn = new mysqli($host, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM `channel`";
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
			echo "<td><a href='edit.php?name=channel&id=$id'>Edit</a></td>";
			
		}
		echo "</tr>";
	}

}
if (isset($_GET['submit']) && $_GET['submit']=='upload') {
	if (isset($_POST['submit']) && $_POST['submit']=='Upload') {
		$target_dir = "../vid/";
		$name = $_POST['name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$sub = $_POST['sub'];
		$demo 	= md5(rand(0,10000).basename($_FILES["demo"]["name"],'.mp4')).'.mp4';
		$cover 	= md5(rand(0,10000).basename($_FILES["cover"]["name"],'.jpg')).'.jpg';
		$demo_lable 	= 'vid/'.$demo;
		$cover_lable = 'img/'.$cover;
		move_uploaded_file($_FILES["demo"]["tmp_name"], $target_dir.$demo);
		move_uploaded_file($_FILES["cover"]["tmp_name"], "../img/".$cover);
		foreach ($_FILES as $key => $value) {
			if (strpos($key, 'video') !== false) {
				$video[] 	= $key; 
			}
			if (strpos($key, 'thumbnail') !== false) {
				$thumbnail[] 	= $key; 
			}
			
		}
		$video_data = NULL;
		foreach ($video as $key => $value) {
				$video = md5(rand(0,10000).basename($_FILES[$value]["name"],'.mp4')).'.mp4';
				$video_data .= "vid/".$video.";";
				move_uploaded_file($_FILES[$value]["tmp_name"], $target_dir.$video);
		}
		$video_data = substr_replace($video_data ,"", -1);
		$thumbnail_data = NULL;
		foreach ($thumbnail as $key => $value) {
			$thumbnail = md5(rand(0,10000).basename($_FILES[$value]["name"],'.jpg')).'.jpg';
			$thumbnail_data .= "img/".$thumbnail.";";
			move_uploaded_file($_FILES[$value]["tmp_name"], "../img/".$thumbnail);
		}
		$thumbnail_data = substr_replace($thumbnail_data ,"", -1);
	$sql = "INSERT INTO `channel` (`name`, `video_link`, `price`, `description`, `thumbnail`, `cover`, `demo_video`, `sub`) VALUES ('$name', '$video_data', '$price', '$description', '$thumbnail_data', '$cover_lable', '$demo_lable', '$sub')";
	$conn = new mysqli($host, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$result = $conn->query($sql);
	if ($result) {
		echo "Successfully updated";
	}
	}
	echo "
	<form action='' method='POST' enctype='multipart/form-data'><table border='1' cellpadding='10'>
	<tr>
	<td>Name</td>
	<td><input type='text' name='name'></td>
	</tr>
	";
	for ($i=1; $i <= $_GET['number'] ; $i++) { 
		echo "
		<tr>
		<td>Video $i</td>
		<td><input type='file' name='video$i'></td>
		</tr>";
	}
	echo "
	<tr>
	<td>Price</td>
	<td><input type='text' name='price'></td>
	</tr>
	";
	echo "
	<tr>
	<td>Description</td>
	<td><input type='text' name='description'></td>
	</tr>
	";
	for ($i=1; $i <= $_GET['number'] ; $i++) { 
		echo "
		<tr>
		<td>Thumbnail $i</td>
		<td><input type='file' name='thumbnail$i'></td>
		</tr>";
	}
	echo "
		<tr>
		<td>Cover</td>
		<td><input type='file' name='cover'></td>
		</tr>";
	echo "
		<tr>
		<td>Demo Video</td>
		<td><input type='file' name='demo'></td>
		</tr>";
		echo "
		<tr>
		<td>Sub</td>
		<td><input type='text' name='sub'></td>
		</tr>";
		echo "
		<tr>
		<td>Action</td>
		<td><input type='submit' name='submit' value='Upload'></td>
		</tr></form>";
}
?>
</center>

</body>
</html>