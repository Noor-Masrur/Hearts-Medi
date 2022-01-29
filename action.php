<?php
if (isset($_POST['submit']) && $_POST['submit']=='Submit') {
   require("include/db.php");

   $name = $_POST['name'];
   $email = $_POST['email'];
   $mobile = $_POST['mobile'];
   $bmdc = $_POST['bmdc'];
   $nid = $_POST['nid'];
   $dob = $_POST['dob'];
   $mname = $_POST['mname'];
   $session = $_POST['session'];
   $extra = $_POST['extra'];
   $ref = $_POST['ref'];
   $pass = md5($_POST['pass']);
   $otp = rand(1000,9999);
   $sms = "Hello $name Your OTP is $otp Hearts Medi Study";
   $_SESSION["user"] = $mobile;
   /*try{
      $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
      $paramArray = array(
      'apiKey'  => "8c2cc372-e", 
      'messageText'  => $sms,
      'numberList'  => $mobile,
      'smsType'  => "TEXT",
      'maskName'  => '',
      'campaignName'  => '',
      );
      $value = $soapClient->__call("NumberSms", array($paramArray));
      //echo $value->NumberSmsResult;
   } catch (Exception $e) {
      //echo $e->getMessage();
   }*/
   $sql = "INSERT INTO `users` (`name`, `email`, `mobile`, `bmdc`, `nid`, `dob`, `mname`, `session`, `extra`, `ref`, `pass`, `status`, `otp`, `notification`, `subscriptions`) VALUES ('$name', '$email', '$mobile', '$bmdc', '$nid', '$dob', '$mname', '$session', '$extra', '$ref', '$pass', '1', '$otp', 'No notification', '0')";
   $conn = new mysqli($host, $username, $password, $database);
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
   $result = $conn->query($sql);
   header("Location: login.php?done=1");
}
else{
   header("Location: register.php");
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
      <title>Hearts Medi Study | Register</title>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="js/form_slider.js"></script>
      <style type="text/css">
         .tabs {
            width:100%;
            display:inline-block;
         }

         .tabs h4 {
            color: #00447c;
            margin: 5px 0 15px 0;
            display: inline-block;
         }

         .tab-links:after {
            display:block;
            clear:both;
            content:'';
         }

         .tab-links {
            padding: 0;
            margin: -5px 0 0 0;
            position: relative;
            top: -20px;
         }

         .tab-links li {
            margin:0px 5px 0 0;
            float:left;
            padding-top: 2px;
            list-style:none;
         }

         .tab-links a {
            padding:9px 8px 6px;
            display:inline-block;
            background: #c7d8e8;
            border: 2px solid #c7d8e8;
            border-bottom: 3px solid #c7d8e8;
            font-size: 10.5px;
            font-weight:600;
            color:#00447c;
            transition:all linear 0.15s;
         }
         .tab-links input {
            margin-top: 10px;
            padding:9px 8px 6px;
            display:inline-block;
            background: #c7d8e8;
            border: 2px solid #c7d8e8;
            border-bottom: 3px solid #c7d8e8;
            font-size: 10.5px;
            font-weight:600;
            color:#00447c;
            transition:all linear 0.15s;
         }

         .tab-links a:hover {
            background: #a7cce5;
            text-decoration:none;
            border: 2px solid #a7cce5;
            border-bottom: 3px solid #a7cce5;  
            color: #ee3124;
         }
         .tab-links input:hover {
            background: #a7cce5;
            text-decoration:none;
            border: 2px solid #a7cce5;
            border-bottom: 3px solid #a7cce5;  
            color: #ee3124;
         }

         li.active a, li.active a:hover {
            background:#fff;
            height: 16px;
            border-bottom: none;
            color: #ee3124;
         }

         .tab-content, .uploaded-documents-container {
            padding: 3px;
            background: #fff;
            font-size: .95em;
         }

         .tab-content-scroll {
            max-height: 375px;
            min-height: 375px;
            max-width: 1100px;
            min-width: 450px;
            overflow: auto;
            clear:both;
         }

         .tab-content-scroll-home {
            min-height: 135px;
         }

         .button-bar-scroll {
            min-height: 235px;
         }

         .tab-content-scroll>p {
            margin-top: 0;
            padding-right: 12px;
         }

         .tab-content a {
            margin-top: 10px;
            color: #00447c;
         }

         .tab {
            display:none;
         }

         .tab.active {
            display:block;
         }
      </style>
      <script src="js/form.js"></script>
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
                        <p>The Complete Indoor Solutions For<br>
                           Medicine,Paediatrcs, Surgery, Eye, ENT,Obstetrics &amp; <br>
                           Gynaecology</p>
                     </div>
                     <form name="myForm" action="action_next.php" method="POST" onsubmit="return validateForm()">
                        <div class="form-group">
                                 <label>OTP <font color="#ff0000">*</font></label>
                                 <input name="otp" type="text" class="form-control" placeholder="Enter OTP">
                        </div>
                              <ul class="tab-links">
                                 <li>
                                    <input type="submit" name="submit" value="Submit">
                                 </li>
                              </ul>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Already have an Account? <a href="login.php">Sign In</a></p>
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