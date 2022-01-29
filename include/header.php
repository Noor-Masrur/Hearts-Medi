<?php
require("db.php");
if(isset($_SESSION["mobile"])) {
   $mobile = $_SESSION["mobile"];
   $conn = new mysqli($host, $username, $password, $database);
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   $sql = "SELECT * FROM `users` WHERE `status` = 1 AND `mobile` = '$mobile'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
      $result = $result->fetch_assoc();
      $name = $result['name'];
      $notification = $result['notification'];
      $subscriptions = $result['subscriptions'];
      if ($notification == "No notification") {
         $notification_count = "";

      }
      else{
         $notification_count = 1;
      }
   }
   $conn->close();
}
else{
$notification = "";
$notification_count = "";


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
      <title>Hearts Medi Study</title>
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
   <body id="page-top">
      <nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
         &nbsp;&nbsp; 
         <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
         <i class="fas fa-bars"></i>
         </button> &nbsp;&nbsp;
         <a class="navbar-brand mr-1" href="index.php"><img class="img-fluid" alt="" src="img/logo.png"></a>
         <!-- Navbar Search -->
         <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="Search for...">
               <div class="input-group-append">
                  <button class="btn btn-light" type="button">
                  <i class="fas fa-search"></i> 
                  </button>
               </div>
            </div>
         </form>
         <!-- Navbar -->
         <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
            <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-bell fa-fw"></i>
               <span class="badge badge-danger"><?php echo $notification_count; ?></span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                 <p class="dropdown-item"><?php echo $notification; ?></p>
               </div>
            </li>
            <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
               <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               
<?php
if (isset($name)) {
   echo '<img alt="Avatar" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/User_font_awesome.svg">'.$name.'
   </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="account.php"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Account</a>
                  <a class="dropdown-item" href="subscriptions.php"><i class="fas fa-fw fa-video"></i> &nbsp; Subscriptions</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>
               </div>';
}
else{
   echo '<img alt="Avatar" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/User_font_awesome.svg"> Login 
   </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="login.php"><i class="fas fa-fw fa-user-circle"></i> &nbsp; Login</a>
                  <a class="dropdown-item" href="register.php"><i class="fas fa-fw fa-user-circle"></i> &nbsp; Register</a>
               </div>';
}
?>
               
            </li>
         </ul>
      </nav>
      <div id="wrapper">
         <!-- Sidebar -->
         <ul class="sidebar navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="index.php">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="channels.php">
               <i class="fas fa-fw fa-users"></i>
               <span>Course</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="book.php">
               <i class="fas fa-book"></i>
               <span>Books</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="about.php">
               <i class="fas fa-info"></i>
               <span>About us</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="contact.php">
               <i class="fas fa-file-contract"></i>
               <span>Contact us</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="event.php">
               <i class="fas fa-calendar-alt"></i>
               <span>Event</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="faq.php">
               <i class="fas fa-question"></i>
               <span>FAQ</span>
               </a>
            </li>
<?php
if(!empty($subscriptions)) {
   $subscriptions = explode(";", $subscriptions);
   echo '<li class="nav-item channel-sidebar-list">
               <h6>SUBSCRIPTIONS</h6>
               <ul>';
   foreach ($subscriptions as $key => $value) {
      $conn = new mysqli($host, $username, $password, $database);
      if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM `channel` WHERE `id` = '$value'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         $result = $result->fetch_assoc();
         $thumbnail = explode(";", $result['thumbnail']);
         echo '
            <li>
               <a href="video_page.php?id='.$value.'">
               <img class="img-fluid" alt="" src="'.$thumbnail[0].'"> '.$result['name'].'
               </a>
            </li>';
                     
                  
            }
         }
         echo '</ul>
               </li>';
}

?>
</ul>