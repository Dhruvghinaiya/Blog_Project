 <?php

     require 'config/database.php';
    // session_start();
    //  if(!isset($_SESSION['user-id'])){

    //     header('Location:index.php');
    //  }
     
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Blog Website</title>

    <!-- connect stylesheet  design file  -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--============= GOOGLE FONT =================  -->


</head>
<body>
    <nav>
        <div class="container nav_container">
            <a href="index.php" class="nav_logo">Blog Website</a>
            <ul class="nav_items">
                <li><a href="blog.php">Blog</a></li>
                <li><a href=" about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                   
                <li><a href="signin.php">Sign In</a></li>
                    
            </ul>
               <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
               <button id="close_nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

    <!-- ============================= END OF NAV =========================== -->
