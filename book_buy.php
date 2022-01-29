<?php
ob_start();
require("include/header.php");
if (!isset($_SESSION["mobile"])) {
   header("Location: login.php?error=1");
die();
}
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
      $cover = $result['cover'];
      $img = $result['img'];

   }
}
?>

         <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
               <img class="img-fluid" alt="" src="<?php echo $cover; ?>">
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
   $buy = true;
    echo '<li class="nav-item">
                           <p style="margin-top: 13px;">Already Bought</p>
                        </li>';
}
else{
   $buy = false;
   echo '<li class="nav-item">
                           <p style="margin-top: 13px;">Buy @ '.$price.' Taka</p>
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
                       <p style="margin-left: 20px; width: 1000px;"><?php echo $description; ?></p>
                     </div>
<?php
   $sql = "SELECT * FROM `book_payment` WHERE `book_id` = '$id' AND `user` = '$user'";
   $result_check = $conn->query($sql);
   if ($result_check->num_rows > 0) {
      $buy = true;
   }
   else{
      $buy = false;
   }
if (empty($_POST)) {
   if($buy == true){
   echo '<div>
            <h4 style="margin-left: 16px;">You Already Bought this feature</h4>

         </div>';
   }
   else{
      $price_new = $price+70;
   echo '<div>
                        <h4 style="margin-left: 16px;">Please Pay '.$price_new.'Taka with <br>bkash 01761319100 (Personal) <br> bkash 01322289164 (Marchant) <br>
                        ROCKET 018525944552 (Personal) <br> Nagad 01852594455  </h4>
                        <form action="" method="POST">
                        <table style="margin-left: 16px;" cellpadding="10" cellspacing="10">
                           <tr>
                              <td><h6>Type of Account</h6></td>
                              <td><select name="ac">
                              <option>bkash</option>
                              <option>Rocket</option>
                              <option>Nagad</option>
                              </select></td>
                           </tr>
                           <tr>
                              <td><h6>From Account</h6></td>
                              <td><input type="text" name="from" required=""></td>
                           </tr>
                           <tr>
                              <td><h6>Address</h6></td>
                              <td><input type="text" name="address" required=""></td>
                           </tr>
                           <tr>
                              <td><h6>TxID</h6></td>
                              <td><input type="text" name="txid" required=""></td>
                           </tr>
                           <tr>
                              <td><h6>Ammount</h6></td>
                              <td><input type="text" name="taka" required=""></td>
                           </tr>
                           <tr>
                              <td colspan="2" align="center"><input type="Submit" name="submit" value="Submit"></td>
                           </tr>
                        </table>
                     </form>
                     </div>';
                  }
      
}
else if(!empty($_POST)){
   $from = $_POST['from'];
   $ac = $_POST['ac'];
   $txid = $_POST['txid'];
   $taka = $_POST['taka'];
   $address = $_POST['address'];
   $user = $user;
   $id = $id;
   $sql = "INSERT INTO `book_payment` (`ac`, `user`, `phone`,`address`,`txid`, `taka`,`book_id`, `status`) VALUES ('$ac', '$user', '$from', '$address', '$txid', '$taka','$id','0')";
   $result_save = $conn->query($sql);
   if ($result_save) {
      echo '<div>
            <h4 style="margin-left: 16px;">Request Pending Please Wait few moments. We will send you a confirmation SMS</h4>

         </div>';
   }
   else{
      echo '<div>
            <h4 style="margin-left: 16px;">Something went wrong.Please contact 01521-204394</h4>

         </div>';
   }
   
   if($buy == true){
   echo '<div>
            <h4 style="margin-left: 16px;">You Already Bought this feature</h4>

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