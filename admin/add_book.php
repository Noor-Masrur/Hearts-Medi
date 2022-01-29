<?php
require("inc/db.php");
if (!isset($_SESSION['admin']) && $_SESSION['admin']!="admin") {
	header("Location: index.php");
}
if (isset($_POST['submit']) && $_POST['submit']=='Upload') {
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$sub = $_POST['sub'];
	$target_dir = "../img/";
	$img 	= md5(rand(0,10000).basename($_FILES["img"]["name"],'.jpg')).'.jpg';
	$cover 	= md5(rand(0,10000).basename($_FILES["cover"]["name"],'.jpg')).'.jpg';
	$video 	= md5(rand(0,10000).basename($_FILES["video"]["name"],'.mp4')).'.mp4';
	$pdf 	= md5(rand(0,10000).basename($_FILES["pdf"]["name"],'.pdf')).'.pdf';
	$s1 	= md5(rand(0,10000).basename($_FILES["s1"]["name"],'.jpg')).'.jpg';
	$s2 	= md5(rand(0,10000).basename($_FILES["s2"]["name"],'.jpg')).'.jpg';
	$s3 	= md5(rand(0,10000).basename($_FILES["s3"]["name"],'.jpg')).'.jpg';
	$s4 	= md5(rand(0,10000).basename($_FILES["s4"]["name"],'.jpg')).'.jpg';
	$s5 	= md5(rand(0,10000).basename($_FILES["s5"]["name"],'.jpg')).'.jpg';
	$video_up = 'vid/'.$video;
	$pdf_up = 'pdf/'.$pdf;
	$image 	= 'img/'.$img;
	$up_cover = 'img/'.$cover;
	$demo 	= "img/".$s1.";img/".$s2.";img/".$s3.";img/".$s4.";img/".$s5;
	move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir.$img);
	move_uploaded_file($_FILES["cover"]["tmp_name"], $target_dir.$cover);
	move_uploaded_file($_FILES["video"]["tmp_name"], '../vid/'.$video);
	move_uploaded_file($_FILES["pdf"]["tmp_name"], '../pdf/'.$pdf);
	move_uploaded_file($_FILES["s1"]["tmp_name"], $target_dir.$s1);
	move_uploaded_file($_FILES["s2"]["tmp_name"], $target_dir.$s2);
	move_uploaded_file($_FILES["s3"]["tmp_name"], $target_dir.$s3);
	move_uploaded_file($_FILES["s4"]["tmp_name"], $target_dir.$s4);
	move_uploaded_file($_FILES["s5"]["tmp_name"], $target_dir.$s5);
	$sql = "INSERT INTO `book` (`name`, `price`, `description`, `video`,`img`, `sub`, `cover`, `demo`, `pdf`) VALUES ('$name', '$price', '$description','$video_up','$image', '$sub', '$up_cover', '$demo' ,'$pdf_up')";
	$conn = new mysqli($host, $username, $password, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$result = $conn->query($sql);
	if ($result) {
		echo "Successfully updated";
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
	<h1>Add Book</h1>
	<h2><a href="home.php">Home</a></h2><hr>
	<h3><a href="add_book.php?list">List</a></h3>
	<h3><a href="add_book.php?upload">Upload</a></h3>
		<?php
		if (isset($_GET['list'])) {
			echo '<table border="1" cellspacing="10" cellpadding="10">
			<tr>
				<td>Id</td>
				<td>Name</td>
				<td>Price</td>
				<td>Description</td>
				<td>Video</td>
				<td>Image</td>
				<td>sub</td>
				<td>Cover</td>
				<td>Screenshort</td>
				<td>pdf</td>
				<td>Action</td>
			</tr>';
			$conn = new mysqli($host, $username, $password, $database);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT * FROM `book`";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					echo "<tr>";
					foreach ($row as $key => $value) {
						if ($key == 'id') {
							$id = $value;
						}
						if ($key == 'img' || $key == 'cover') {
							$value = "<img src='../$value' height='100%' width='100%'>";
						}
						if ($key == 'demo') {
							$data = explode(";", $value);
							foreach ($data as $key1 => $value1) {
								$value .= "<img src='../$value1'height='50%' width='50%'>";
							}

						}
						echo "<td>$value</td>";
					}
					echo "<td><a href='edit.php?name=book&id=$id'>Edit</a></tr>";
				}
			}
		}
		else if(isset($_GET['upload'])){
			echo '<table border="1" cellspacing="10" cellpadding="10">
			<tr>
				<td>Name</td>
				<td>Price</td>
				<td>Description</td>
				<td>Video</td>
				<td>Image</td>
				<td>sub</td>
				<td>Cover</td>
				<td>Screenshort 1</td>
				<td>Screenshort 2</td>
				<td>Screenshort 3</td>
				<td>Screenshort 4</td>
				<td>Screenshort 5</td>
				<td>PDF</td>
			</tr>
			<form action="" method="POST" enctype="multipart/form-data">
				<tr>
				<td><textarea name="name"></textarea></td>
				<td><textarea name="price"></textarea></td>
				<td><textarea name="description"></textarea></td>
				<td><input type="file" name="video"></td>
				<td><input type="file" name="img"></td>
				<td><textarea name="sub"></textarea></td>
				<td><input type="file" name="cover"></td>
				<td><input type="file" name="s1"></td>
				<td><input type="file" name="s2"></td>
				<td><input type="file" name="s3"></td>
				<td><input type="file" name="s4"></td>
				<td><input type="file" name="s5"></td>
				<td><input type="file" name="pdf"></td>
			</tr>
			<tr>
				<td colspan="10" align="center"><input type="submit" name="submit" value="Upload"></td>
			</tr>
			</form>

		</table>';
		}
		?>
</center>

</body>
</html>