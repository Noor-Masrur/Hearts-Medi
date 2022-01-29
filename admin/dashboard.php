<?php //adminOnly(); ?>
<?php
require("inc/db.php");
if (!isset($_SESSION['admin']) && $_SESSION['admin']!="admin") {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Section - Dashboard</title>

    <link rel="icon" type="image/png" href="../img/logo2.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Text Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">

     <!-- Custom Styling -->
     <link rel="stylesheet" href="style.css">
    
    <!-- Admin Styling -->
    <link rel="stylesheet" href="admin.css">

</head>


<body>
    

    
    <!--Admin Page Wrapper-->
    <div class="admin-wrapper">

        <!--Left Sidebar-->
        <div class="left-sidebar">
            <ul>
                <li><img src="../img/logo2.png" class="logo"></li>
                <li><a href="user.php">Manage Users</a></li>
                <li><a href="book_payment.php">Book Payment</a></li>
                <li><a href="channel_payment.php">Channel Payment</a></li>
                <li><a href="add_book.php">Add Book</a></li>
                <li><a href="add_channel.php">Add Channel</a></li>
            </ul>
        </div>

        <!--//Left Sidebar-->

        <!--Admin Content-->
        <div class="admin-content">

            <div class="content">
                <h2 class="page-title">Dashboard</h2>
                <?php //include(ROOT_PATH . "/app/includes/messages.php"); ?>
                

            </div>

        </div>

        <!--//Admin Content-->







    </div>

    <!--//Admin Page Wrapper-->
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Online editor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>

    <!-- Custom Script -->
    <!--<script src="../assets/js/scripts.js"></script>--> 




</body>
</html>