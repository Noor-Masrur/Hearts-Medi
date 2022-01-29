<?php
require("include/header.php");
?>
         <div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h6>Course</h6>
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
      $img = explode(";",$row['thumbnail']);
      echo '<div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><img class="img-fluid" src="'.$img[0].'" alt=""></a>
                              <div class="channels-card-image-btn"><button onclick="window.location.href=\'single_channel.php?id='.$row['id'].'\'" type="button" class="btn btn-outline-danger btn-sm">Buy</button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">'.$row['name'].'</a>
                              </div>
                              <div class="channels-view">
                                 Price '.$row['price'].' Taka                              
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
            <br><br><br><br>
<?php
require("include/footer.php");
?>