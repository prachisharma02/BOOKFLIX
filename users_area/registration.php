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
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body class="insert">
    <div class="container">
    <h3>New User Registration</h3>
<form action="" method="post" enctype="multipart/form-data">
   <div class="form">
   <label for="Username">Username</label>
   <input type="text" name="user_username" id="username" placeholder="Enter username" required>
   </div>
   <div class="form">
   <label for="user_email">Email</label>
    <input type="user_mail" name="user_email" id="user_email" placeholder="Enter your email" required>
   </div>
   <div class="form">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Enter your password" required>
   </div>
   <div class="form">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
   </div>
   <div class="form">
    <label for="user_address">Address</label>
    <input type="text" name="address" id="address" placeholder="Enter your address" required>
   </div>
   <div class="form">
    <label for="user_contact">Contact</label>
    <input type="text" name="user_contact" id="user_contact" placeholder="Enter your mobile number" required>
   </div>
   <div class="form">
 
     <input type="submit" name="user_register" class="btn" value="Register">
        <p class="already"> Already have an Account ? <a class="login"  href="./login_user.php">Login</a> </p>
</div>
</body>
</html>

<?php
function redirect($url) {
    header('Location: '.$url);
    die();
}

 if(isset($_POST['user_register'])) 
 {
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $user_address=$_POST['address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();

    $select_query="select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0)
    {
        echo "<script>alert('Username or Email already exist')</script>";
    }
    else if($password!=$confirm_password)
{
    echo "<script>alert('Password doesn't match')</script>";
}
    else
    {
    $insert_query="insert into `user_table` (username,user_email,password,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo "<script>window.open('../homepage.php'.'_self')</script>";
    
    if($sql_execute){
       echo "<script>alert('Data inserted Successfully')</script>"; 
        //echo "<script>window.open('./homepage.php'.'_self')</script>";
        redirect("../homepage.php");
    }else{
        die(mysqli_error($con)); 
    }


    
    //selecting cart items
    
    $select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0)
    {
        $_SESSION['username']= $user_username;
       // echo "<script>('You have items in your cart')</script>";
        redirect("./checkout.php");
    }
    else
    {
        redirect("../homepage.php");
    }
    
    
    


    }}


?>