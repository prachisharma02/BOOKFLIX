<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="./registration.css">
</head>
<body>
<body class="insert">
    <div class="container">
    <h3>Admin  Registration</h3>
<form action="" method="post" enctype="multipart/form-data">
   <div class="form">
   <label for="Username">Username</label>
   <input type="text" name="admin_name" id="username" placeholder="Enter username" required>
   </div>
   <div class="form">
   <label for="user_email">Email</label>
    <input type="user_mail" name="admin_email" id="user_email" placeholder="Enter your email" required>
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
   
   <div class="form">
 
     <input type="submit" name="admin_register" class="btn" value="Register">
        <p class="already"> Already have an Account ? <a class="login"  href="./admin_login.php">Login</a> </p>
</div>
</body>
</html>


<?php
function redirect($url) {
    header('Location: '.$url);
    die();
}

 if(isset($_POST['admin_register'])) 
 {
    $admin_username=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    

    $select_query="select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email'";
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
    $insert_query="insert into `admin_table` (admin_name,admin_email,password) values ('$admin_username','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo "<script>window.open('./admin.php'.'_self')</script>";
    
    if($sql_execute){
       echo "<script>alert('Data inserted Successfully')</script>"; 
        // echo "<script>window.open('./homepage.php'.'_self')</script>";
        redirect("./admin.php");
    }else{
        die(mysqli_error($con)); 
    }
    }
}
    ?>