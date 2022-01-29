<?php
require("include/header.php");
?>
         <div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="top-mobile-search">
                  <div class="row">
                     <div class="col-md-12">   
                        <form class="mobile-search">
                           <div class="input-group">
                             <input type="text" placeholder="Search for..." class="form-control">
                               <div class="input-group-append">
                                 <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                               </div>
                           </div>
                        </form>   
                     </div>
                  </div>
               </div>
               
               <div class="top-category section-padding mb-4">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Books</h6>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="owl-carousel owl-carousel-category">
<?php
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `book`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      echo '<div class="item">
                              <div class="category-item">
                                 <a href="single_book.php?id='.$row['id'].'">
                                    <img class="img-fluid" src="'.$row['img'].'" alt="">
                                    <h6>'.$row['name'].'</h6>
                                    <p>BDT '.$row['price'].' Taka</p>
                                 </a>
                              </div>
                           </div>';
   }
}
?>
                        </div>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Featured Videos</h6>
                        </div>
                     </div>
<?php
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `channel`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      $thumbnail = explode(";", $row['thumbnail']);
      $name = $row['name'];
      $id = $row['id'];
      echo '<div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="single_channel.php?id='.$id.'"><i class="fas fa-play-circle"></i></a>
                              <a href="#"><img class="img-fluid" src="'.$thumbnail[0].'" alt=""></a>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="single_channel.php?id='.$id.'">'.$name.'</a>
                              </div>
                           </div>
                        </div>
                     </div>';
                  }
}
?>
                     
                  </div>
               </div>
            </div>
<?php
require("include/footer.php");
?>