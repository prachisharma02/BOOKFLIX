<?php 

include('./includes/connect.php');
include('./functions/common_functions.php');
session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bookflix.com</title>
    <link rel="stylesheet" href="./homepage.css">
</head>
<body>
    <header>
        
        
    <img src="./images/bookflix-logo-removebg-preview.png" class="logo" alt="">
    
        <nav class="nav">
      
               <ul>
                <li>
                    <form action="search_product.php" method="get" >
                    <input class="input" type="search" placeholder="Search" aria-label="search" name="search_data">
             <!--<button class="search" type="submit">Search</button>-->
            <input type="submit" value="search" class="search" name="search_data_products"> 
            </form></li>

                <li> <a class="a" href="./homepage.php"> Home</a></li>
                <li> <a class="a" href="./users_area/profile.php"> Profile</a></li>
                <?php
                if(isset($_SESSION['user_username']))
                {
                    echo" <li> <a class='a' href='./users_area/profile.php'>My Account</a></li>";

                }
                else
                echo "<li> <a class='a' href='./users_area/login_user.php'> Register</a></li>";
                ?>
                <!-- <li> <a class="a" href="./users_area/login_user.php"> Register</a></li> -->
                <li> <a class="a" href="cart.php">Cart<sup><?php  cart_item(); ?></sup></a></li>
                <li> <a class="a" href="./users_area/payment.php"> Payment</a></li>
                <li> <a class="a" href="#">Cart Price:Rs <?php total_cart_price(); ?></a></li>

            </ul>
           
        </nav>
    </header>
    <?php
    cart()
    ?>

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
             50% off on our Bestsellers
</div>
        </div>
          <img  class="e" src="./images/doepicbookspringindia_540x.webp" alt="">
          </section>
          <section class="list">
            <?php
            getproducts();
        
        ?>
           
        </section>
        <footer>
            All rights reserved &copy
        </footer>
        
        </body>
        </html>
