<?php 
include('../includes/connect.php');
session_start();
echo $_SESSION['user_username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>checkout page</title>
    <link rel="stylesheet" href="../homepage.css">
    <!--<link rel="stylesheet" href="login.css">-->
</head>
<body>
<header>
        
        
        <img src="../images/bookflix-logo-removebg-preview.png" class="logo" alt="">
            
            <nav class="nav">
                   <ul>
                    <li>
                        
    
                <li> <a class="a" href="../homepage.php"> Home</a></li>
                    <li> <a class="a" href="../users_area/login_user.php"> Register</a></li>
                    <li> <a class="a" href="../cart.php">Cart</a></li>
                   
    
                </ul>
            </nav>
        </header>
<div class="container">
    
<nav class="nav_login">
        <ul>
            <li><a href="#">Welcome guest</a> </li>
            <?php
          if(!isset($_SESSION['user_username']))
            echo"<li><a href='./login_user.php'>Login</a> </li>";
            else{
                echo"<li><a href='logout.php'>Logout</a> </li>";
            }
            ?>
</nav>
    </div>
<div class="list">
    
            <?php
          if(!isset($_SESSION['user_username']))
           {
            
            header('Location:login_user.php' );
           }
          else
          header('Location:payment.php' );
          
           ?>
</div>
        
        </body>
        </html>
