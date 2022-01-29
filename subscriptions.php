<?php
ob_start();
require("include/header.php");
if (!isset($_SESSION["mobile"])) {
   header("Location: login.php?error=1");
die();
}
?>
        <div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Books</h6>
                        </div>
                     </div>
<?php
$user = $_SESSION["mobile"];
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `book` WHERE `sub` LIKE '%$user%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      echo '<div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><img class="img-fluid" src="'.$row['img'].'" alt=""></a>
                              <div class="channels-card-image-btn"><button onclick="window.location.href=\'single_book.php?id='.$row['id'].'\'" type="button" class="btn btn-outline-danger btn-sm">Open </button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">'.$row['name'].'</a>
                              </div>
                              <div class="channels-view"> Price
                                 '.$row['price'].' Taka
                              </div>
                           </div>
                        </div>
                     </div>';
   }
}
else{
   echo "<div><p style=\"padding-left: 20px;\">No Books bought</div>";
} 
   echo '</div>
   <div class="row">
   <div class="col-md-12">
      <div class="main-title">
         <h6>Course</h6>
      </div>
   </div>';
$user = $_SESSION["mobile"];
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `channel` WHERE `sub` LIKE '%$user%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      $thumbnail = explode(";", $row['thumbnail']);
      $name = $row['name'];
      $id = $row['id'];
      echo '<div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="video_page.php?id='.$id.'"><i class="fas fa-play-circle"></i></a>
                              <a href="#"><img class="img-fluid" src="'.$thumbnail[0].'" alt=""></a>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="video_page.php?id='.$id.'">'.$name.'</a>
                              </div>
                           </div>
                        </div>
                     </div>';
   }
}
else{
   echo "<div><p style=\"padding-left: 20px;\">No course bought</div>";
}

$conn->close();
?>
                  </div>
               </div>
            </div>


<?php
require("include/footer.php");
?>