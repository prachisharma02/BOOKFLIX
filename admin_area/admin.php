<?php 

include('../includes/connect.php');
session_start()



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<nav class="navbar">
    <ul>
        <li><img class="logo " src="./product_images/bookflix-logo-removebg-preview copy.png" alt="logo"></li>
        <li class="welcome"><a href="./admin.php"><h3> Welcome Admin</h3> </a> </li>
    </ul>
</nav>
<div class="contain"><h1>Manage Details</h1></div>
    
    <div class="details">
        <div class="modify">
            <div class="buttons">
            <button><a href="./insert_products.php" class="navlink">Insert Products</a></button>
            <button><a href="admin.php?view_products" class="navlink">View Products</a></button>
            <button><a href="./admin.php?all_orders" class="navlink">All Orders</a></button>
            <button><a href="admin.php?list_payments" class="navlink">All Payments</a></button>
            <button><a href="./admin.php?list_users" class="navlink">List Users</a></button>
            <button><a href="./admin_login.php" class="navlink">Logout</a></button>
            </div>
        </div>
    </div>
    <div class="change">
        <?php
        if(isset($_GET['view_products']))
        {
            include('./view_products.php');
        }
        if(isset($_GET['edit_products']))
        {
            include('./edit_products.php');
        }
        if(isset($_GET['delete_product']))
        {
            include('./delete_products.php');
        }
        if(isset($_GET['all_orders']))
        {
            include('./all_orders.php');
        }
        if(isset($_GET['list_payments']))
        {
            include('./list_payments.php');
        }
        if(isset($_GET['list_users']))
        {
            include('./list_users.php');
        }
        
        ?>
    </div>
    <footer>
            All rights reserved &copy
        </footer>
</body>
</html>