<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

    session_start();
    // if(isset($_SESSION))
    // {
    // $user_name =  $_SESSION['user_username'];}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome <?php echo $_SESSION['user_username']?> </title>
    <link rel="stylesheet" href="../homepage.css">
    <style>
.profile
{
    color:brown;
    text-align: left;
   
}
.please
{
    text-align: center;
}
.li
{
padding: 10px;
border: none;
box-sizing: border-box;
margin-left: 35px;
background-color: rgb(233, 210, 190);
border-radius: 5px;
text-decoration: none;
display: flex;
}
h1
{
    padding-top: 10%;
    color:brown;
   
}
.user{
   
   
    margin-left: 20%;
    margin-right: 20%;
}
.ul 
{
    display: flex;
}
.user_profile
{
    display: flex; 
    flex-direction: row;
    margin-top: 100px;
}
.links
{
    /* margin-left: 250px; */
    text-align: center;
    margin-top: 50px;
}
    </style>
</head>
<body>
<header>
        
        
        <img src="../images/bookflix-logo-removebg-preview.png" class="logo" alt="">
            
            <nav class="nav">
                   <ul>
                    <li>
                        <form action="../search_product.php  " method="get" >
                        <input class="input" type="search" placeholder="Search" aria-label="search" name="search_data">
                 <!--<button class="search" type="submit">Search</button>-->
                <input type="submit" value="search" class="search" name="search_data_products"> 
                </form></li>
    
                <li> <a class="a" href="../homepage.php"> Home</a></li>
               
                <?php
                if(isset($_SESSION['user_username']))
                {
                    echo" <li> <a class='a' href='./profile.php'>My Account</a></li>";

                }
                else
                echo "<li> <a class='a' href='registration.php'> Register</a></li>";
                ?>
                <li> <a class="a" href="../cart.php">Cart<sup><?php  cart_item(); ?></sup></a></li>
                <li> <a class="a" href="#"> Cart Price:Rs <?php total_cart_price();?></a></li>

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
                    echo "<li> <a class='user_login' href='../users_area/login_user.php'>Login</a></li>";
                    }
                    else
                 {
                     echo "<li><a class='user_login' href='./logout.php'>logout</a></li>";
                 }   
                   
                  ?>
                  </ul>
    
        </nav>

      
                <?php
                if(isset($_SESSION['user_username']))
                {
                 $username=$_SESSION['user_username'];
                 $_SESSION['user_username']= $username;
                 echo " <div class='contain'>
                 <div class='user_profile'>
        <div class='user'>
       
            <ul class='ul'>
                 <li class='li'><a class='profile' href='./profile.php'>Your Profile</a></l1>
                 <li class='li'><a class='profile' href='./profile.php?My_orders'>Pending orders</a></li>
                 <li class='li'><a class='profile' href='../users_area/profile.php?edit_account'> Edit account</a></li>
                 <li class='li'><a class='profile' href='../users_area/profile.php?user_orders'> My Orders</a></li>
                 <li class='li'><a class='profile' href='../users_area/profile.php?Delete_account'> Delete Account</a></li>
                 
             </ul>
             </div>
             </div>";
                }
                else
                {
                    echo "<a href='./login_user.php'><h1 class='please' >Please Login</h1></a>";
                }
                 ?> 
             <div class="links">
            <?php

            if(isset($_GET['My_orders']))
            { 
            product_count($_SESSION['user_username']);
            }
            
            if(isset($_GET['edit_account']))
            {
                include('./edit_account.php');
            }

            if(isset($_GET['user_orders']))
            {
                include('./user_orders.php');
            }
            ?>
             </div>
            </div>
        
       </div>
</body>
</html>