<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();

?> 


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login bookflix.com </title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login">
        <div class="lcontainer">
               <h1>Login </h1>
               <form action="" method="post" class="booklogin">
    <div class="ldetails">
    <label for="user_username" class="label">Username
    <input type="text" name="user_username" class="input" placeholder="   Enter your username" required ></label>
    
    <label for="password" class="label">Password
    <input type="password" name="user_password" class="input" placeholder="  Enter your password" required></label>
    
    <p class="fp">Forgot Password? </p>
    <input type="submit" value="Login" name="user_login" class="btn">
    </form>
    
<h5>
    Dont't have an account ?
</h5>
<p> <a href="./registration.php"> Sign Up</a></p>
</div>
</div>
    </div>

</body>
</html>

<?php

if(isset($_POST['user_login']))
{
    $user_username=$_POST['user_username'];

    $user_password=$_POST['user_password']; 
    
    $select_query = "select * from `user_table` where username ='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress() ;



    $select_query_cart="select * from `cart_details` where ip_address= '$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    


    if($row_count>0)
    {
        $_SESSION['user_username']= $user_username;
        echo $_SESSION['user_username'];
       if(password_verify($user_password,$row_data['Password']))
      { 
       // echo "<script>alert('Login successful')</script>";
       if($row_count==1  and $row_count_cart==0 ) 
       {
        $_SESSION['username']= $user_username;
       echo "<script>alert('Login successful for user:".$_SESSION['user_username']."')</script>";
       echo "<script>window.open('profile.php','_self')</script>";
      }
      else
      {
        
        echo "<script>alert('Login successful')
        
        </script>";
        echo "<script>window.open('payment.php','_self')</script>";
      }
    
         }
    else 
    {
        echo "<script>alert('invalid credentials')</script>";
    }

} 
else
{
    echo "<script>alert('invalid credentials')</script>"; 
}
}



?>