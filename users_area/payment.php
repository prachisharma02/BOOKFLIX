<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="./payment.css">
    <link rel="stylesheet" href="../homepage.css">
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
                <li> <a class="a" href="./profile.php"> Profile</a></li>
                <li> <a class="a" href="./registration.php">Register</a></li>
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
              echo "<li> <a class='user_login' href='./users_area/login_user.php'>Login</a></li>";
              }
              else
           {
               echo "<li><a class='user_login' href='./users_area/logout.php'>logout</a></li>";
           }  
               
              ?>
                  </ul>
    
        </nav>
<?php
$user_ip= getIPAddress();
$get_user="select * from  `user_table` where user_ip= '$user_ip'";
$result=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
?>
<div class="container">
        <h2>Payment Otions</h2>
        <div class="pay">
        <div class="row">
            
            <a class="payment" href="https://paypal.com">Pay through UPI</a>
        </div>
    <div class="row">
        <a class="payment" href="order.php?user_id=<?php echo $user_id ?>">Pay offline</a>
    </div>
    </div>
    </div>
</body>
</html>