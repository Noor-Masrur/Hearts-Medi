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
   $sql = "SELECT * FROM `book` WHERE `id` = '$id'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
      $result = $result->fetch_assoc();
      $name = $result['name'];
      $price = $result['price'];
      $description = $result['description'];
      $img = $result['img'];
      $cover = $result['cover'];
      $demo = explode(";", $result['demo']);
      $pdf = $result['pdf'];
      $video = $result['video'];

   }
}
?>
         <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
               <img class="img-fluid" alt="" src="<?php echo $cover; ?>" style="height: auto;width:auto;">
               <div class="channel-profile">
                  <img class="channel-profile-img" alt="" src="<?php echo $img; ?>">
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
    echo '<li class="nav-item">
                           <a class="nav-link" href="#">Already Bought</a>
                        </li>';
}
else{
   echo '<li class="nav-item">
                           <a class="nav-link" href="book_buy.php?id='.$id.'">Buy @ '.$price.' Taka</a>
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
                           <h6>About this <?php echo $name; ?> Book</h6>
                        </div>
                     </div>
                     <div >
                        <p style="margin-left: 20px; width: 1000px;"><?php echo $description; ?></p>
                     </div>
                     <div>
                         <?php echo '<a class="nav-link" href="book_buy.php?id='.$id.'">'; ?>
                         <button style="padding: 10px; color: #FF0000;">Buy Now</button></a> <br>
                         </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <video width="100%" height="300" controls>
                                 <source src="<?php echo $video; ?>" type="video/mp4">
                                 Your browser does not support the video tag.
                              </video>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#">Into</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a href="<?php echo $demo[0] ; ?>"><img class="img-fluid" src="<?php echo $demo[0] ; ?>" alt=""></a>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#"></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a href="<?php echo $demo[1] ; ?>"><img class="img-fluid" src="<?php echo $demo[1] ; ?>" alt=""></a>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#"></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a href="<?php echo $demo[2] ; ?>"><img class="img-fluid" src="<?php echo $demo[2] ; ?>" alt=""></a>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#"></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a href="<?php echo $demo[3] ; ?>"><img class="img-fluid" src="<?php echo $demo[3] ; ?>" alt=""></a>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#"></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a href="<?php echo $demo[4] ; ?>"><img class="img-fluid" src="<?php echo $demo[4] ; ?>" alt=""></a>
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#"></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <iframe src="<?php echo 'https://docs.google.com/gview?url='.$server_url.$pdf.'&embedded=true'; ?>" onclick='window.open();' height="230" width="300" scrolling="auto"></iframe>
                           </div>
                          <div class="video-card-body">
                              <div class="video-title">
                                 <a href="<?php echo 'https://docs.google.com/gview?url='.$server_url.$pdf.'&embedded=true'; ?>">Look inside</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php
require("include/footer.php");
?>