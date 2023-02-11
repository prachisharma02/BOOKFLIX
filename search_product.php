<?php 
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>homepage</title>
    <link rel="stylesheet" href="./homepage.css">
    <style>
        .book
        {
            text-align: center;
        }
        .list
        {
            background-color: rgb(233, 210, 190);
        }
    </style>
</head>
<body>
    <header>
        
        
        <img src="./images/bookflix-logo-removebg-preview.png" class="logo">  
        
        <nav class="nav">
               <ul>
                <li>
                    <form action="search_product.php" method="get" >
                    <input class="input" type="search" placeholder="Search" aria-label="search" name="search_data">
             <!--<button class="search" type="submit">Search</button>-->
            <input type="submit" value="search" class="search" name="search_data_products"> 
            </form></li>
                <li> <a class="a" href="./homepage.php"> Home</a></li>
                <li> <a class="a" href="#"> Profile</a></li>
                <li> <a class="a" href="#">Register</a></li>
                <li> <a class="a" href="cart.php">Cart<sup><?php  cart_item(); ?></sup></a></li>
                <li> <a class="a" href="#"> Cart Price:Rs <?php total_cart_price();?></a></li>

            </ul>
        </nav>
    </header>
    <nav class="login">
        <ul>
        <?php 
           if(!isset($_SESSION['user_username']))
           {
           echo "<li> <a class='user_login' href='#'>Welcome guest</a></li>";
           }
           else
           {
              echo "<li><a href='#'>Welcome ".$_SESSION['user_username']."</a> </li>";
           }
           if(!isset($_SESSION['user_username'])) 
           {
              echo "<li> <a class='user_login' href='./users_area/login_user.php'>Login</a></li>";
              }
              else
           {
               echo "<li><a class='user_login' href='./users_area/logout.php'>logout</a></li>";
           }  
               
              ?>
        </ul>

    </nav>
    <section class="p">
        <div class="title">
         <div class="details">
             Biggest
             <div class="sale">sale</div>
             50% off on our bestsellers
</div>
        </div>
          <img  class="e" src="./images/doepicbookspringindia_540x.webp" alt="">
          </section>
          <section class="list">
            <?php
          
            search_products();
        
        ?>
           
        </section>
        <footer>
            All Rights Reserved &copy
        </footer>
        
        </body>
        </html>
