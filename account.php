<?php
ob_start();
require("include/header.php");
if (!isset($_SESSION["mobile"])) {
   header("Location: login.php?error=1");
die();
}
?>

                           <div id="content-wrapper">
            <div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <h1>Account</h1>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <font size="3">
<?php
if (empty($_POST)) {
   echo '<form action="" method="POST">
                           <table cellpadding="10" cellspacing="10">
                              <tr>
                                 <td>Current Password </td>
                                 <td><input type="password" name="current"></td>
                              </tr>
                              <tr>
                                 <td>New Password </td>
                                 <td><input type="password" name="new_pass"></td>
                              </tr>
                              <tr>
                                 <td>Confirm Password </td>
                                 <td><input type="password" name="confirm_pass"></td>
                              </tr>
                              <tr>
                                 <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
                              </tr>
                           </table>
                           </form>';
}
else{
   $current = md5($_POST['current']);
   $new_pass = md5($_POST['new_pass']);
   $confirm_pass = md5($_POST['confirm_pass']);
   if ($new_pass == $confirm_pass) {
      $conn = new mysqli($host, $username, $password, $database);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT * FROM `users` WHERE `pass` = '$current'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         $result = $result->fetch_assoc();
         $user = $result['mobile'];
         $sql = "UPDATE `users` SET `pass` = '$confirm_pass' WHERE `users`.`mobile` = '$user'";
         $result = $conn->query($sql);
         if ($result) {
            echo "Your password has been successfully changed ";
         }
         else{
            echo "Carefully enter your credintials";
         }
      }
   }
   else{
      echo "Password is not matched Carefully enter your credentials";
   }
   
   
}
?>
                           
                           
                        </font>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </font>
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