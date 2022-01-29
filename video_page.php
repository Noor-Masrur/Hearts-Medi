<?php
ob_start();
require("include/header.php");
if (!isset($_SESSION["mobile"])) {
   header("Location: login.php?error=1");
die();
}
if (isset($_GET['id'])) {
   $id = addslashes($_GET['id']);
   $user = $_SESSION["mobile"];
   $conn = new mysqli($host, $username, $password, $database);
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
   $sql = "SELECT * FROM `users` WHERE `mobile` = '$user' AND `subscriptions` LIKE '%$id%'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
      $sql = "SELECT * FROM `channel` WHERE `id` = '$id'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         $result = $result->fetch_assoc();
         $name = $result['name'];
         $description = $result['description'];
         $link = $result['video_link'];
         $thumbnail = $result['thumbnail'];
         $demo = $result['demo_video'];
      }

   }
   else{
      header("Location: 404.php");
   }
}
?>
         <div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="single-video-left">
                           <div class="single-video">
                              <video width="100%" height="300" controls>
                                 <source src="<?php echo $demo; ?>" type="video/mp4">
                                 Your browser does not support the video tag.
                              </video>
                           </div>
                           <div class="single-video-title box mb-3">
                              <h2><a href="#"><?php echo $name; ?></a></h2>
                           </div>
                           <div class="single-video-info-content box mb-3">
                              <h6>Description:</h6>
                              <p><?php echo $description;  ?></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="single-video-right">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="main-title">
                                    <h6>Up Next</h6>
                                 </div>
                              </div>
                              <div class="col-md-12">
<?php
$link = explode(";", $link);
$thumbnail = explode(";", $thumbnail);
foreach ($link as $key => $value) {
   $index = $key+1;
   $name = urldecode("Lecture $index");
   echo '<div class="video-card video-card-list">
<div class="video-card-image">
   <a class="play-icon" href="video_page_next.php?id='.$id.'&vid='.$index.'&name='.$name.'"><i class="fas fa-play-circle"></i></a>
   <a href="video_page_next.php?id='.$id.'&vid='.$index.'&name='.$name.'"><img class="img-fluid" src="'.$thumbnail[$key].'" alt=""></a>
</div>
<div class="video-card-body">
   <div class="video-title">
      <a href="video_page_next.php?id='.$id.'&vid='.$index.'&name='.$name.'">Lecture '.$index.'</a>
   </div>
   <div class="video-page text-success">
      Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
   </div>
</div>
</div>';
}

?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <br><br>
<?php
require("include/footer.php");
?>