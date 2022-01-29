<?php
require("include/header.php");
if(isset($_SESSION["mobile"])) {
   $user = $_SESSION["mobile"];
}
else{
   $user = "-1";
}
if (isset($_GET['id'])) {
   $id = addslashes($_GET['id']);
   $conn = new mysqli($host, $username, $password, $database);
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
   $sql = "SELECT * FROM `channel` WHERE `id` = '$id'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
      $result = $result->fetch_assoc();
      $name = $result['name'];
      $price = $result['price'];
      $description = $result['description'];
      $cover = $result['cover'];
      $demo = $result['demo_video'];
      $video = explode(";", $result['video_link']);
      $thumbnail = explode(";", $result['thumbnail']);

   }
}
?>

         <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
               <img class="img-fluid" alt="" src="<?php echo $cover; ?>">
               <div class="channel-profile">
                  <img class="channel-profile-img" alt="" src="<?php echo $thumbnail[0]; ?>">
               </div>
            </div>
            <div class="single-channel-nav">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="channel-brand" href="#"><?php echo $name; ?> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Available"><i class="fas fa-check-circle text-success"></i></span></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="#">Description <span class="sr-only">(current)</span></a>
                        </li>
<?php 
if (strpos($result['sub'], $user) !== false) {
   $buy = true;
    echo '<li class="nav-item">
                           <a class="nav-link" href="#">Already Bought</a>
                        </li>';
}
else{
   $buy = false;
   echo '<li class="nav-item">
                           <a class="nav-link" href="channel_buy.php?id='.$id.'">Buy @ '.$price.' Taka</a>
                        </li>';
}
?>
                        
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>About this <?php echo $name; ?> Video</h6>
                        </div>
                     </div>
                     <div>
                        <p style="margin-left: 20px; width: 1000px;"><?php echo $description; ?>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                        <video width="100%" height="170" controls>
                           <source src="<?php echo $demo; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#">Demo Lecture</a>
                              </div>
                           </div>
                        </div>
                     </div>
<?php
foreach ($video as $key => $value) {
   $count = $key+1;
   if ($buy) {
   echo '<div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                           <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                           <div class="container">
                              <img src="'.$thumbnail[$key].'" alt="Avatar" class="image" width="100%">
                              <div class="middle">
                              </div>
                              </div>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#">Lecture '.$count.'</a>
                              </div>
                           </div>
                        </div>
                     </div>';
   }
   else {
   echo '<div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                           <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                           <div class="container">
                              <img src="'.$thumbnail[$key].'" alt="Avatar" class="image" width="100%">
                              <div class="middle">
                              </div>
                              </div>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#">Lecture '.$count.'</a>
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
         </div>
      </div>
   </div>
<?php
require("include/footer.php");
?>