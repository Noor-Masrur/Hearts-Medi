<?php
require("include/db.php");
$message = "";
if (isset($_POST['submit'])) {
   $mobile = addslashes($_POST['mobile']);
   $pass = md5($_POST['password']);
   $conn = new mysqli($host, $username, $password, $database);
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   $sql = "SELECT * FROM `users` WHERE `status` = 1 AND `pass` = '$pass' AND `mobile` = $mobile";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
      $result = $result->fetch_assoc();
      if ($mobile === $result['mobile'] && $pass === $result['pass']) {
         $_SESSION["mobile"] = $mobile;
         header("location: index.php");
      }
      else{
         $message = "Incorrect credentials";
      }
   } 
   else {
       $message = "Incorrect credentials";
   }
   $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
   
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>Hearts Medi Study | Login</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
   </head>
   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to Hearts Medi Study</h5>
                        <p>
                        </p>
                     </div>
                     <p align="center"><font color="#ff0000">
                     <?php
                     if (isset($_GET['error']) && $_GET['error']==1) {
                        echo "Please Login first";
                     }
                     if (isset($_GET['done']) && $_GET['done']==1) {
                        echo "Registration successful";
                     }
                     echo $message;
                     ?>
                     </font></p>
                     <form action="login.php" method="POST">
                        <div class="form-group">
                           <label>Mobile number</label>
                           <input type="text" name="mobile" class="form-control" placeholder="Enter mobile number">
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mt-4">
                           <div class="row">
                              <div class="col-12">
                                 <button name="submit" type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign In</button>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Don’t have an account? <a href="register.php">Sign Up</a><br>
                        <a href="forgot-password.php">Forgot password?</a>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">​Buy online course</h5>
                              <p class="mb-4">A Good Detailed Clinical Guideline for<br>
                                 Obstetrics And Genecology.</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Learn more about Medical study</h5>
                              <p class="mb-4">A Good Detailed Clinical Guideline for<br>
                                 Obstetrics And Genecology.</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Get more knowledge</h5>
                              <p class="mb-4">A Complete Guideline for<br>
                                 Short Cases, Long Cases &amp; OSPE </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Owl Carousel -->
      <script src="vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/custom.js"></script>
   </body>

</html>