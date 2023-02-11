<?php
include('../includes/connect.php');

session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        
body
{
background-image: linear-gradient(rgb(163, 83, 18),rgb(245, 196, 156));
overflow-x: hidden;
}
a
{
    text-decoration: none;
    color: rgb(28, 27, 27);
}
h1 , h5
{
    text-align: center;
    padding-top: 5%;
    
}
hr
{
   border-width: 5px;
   
}
.input{
width:100%;
height:30px;
border: none;
border-radius: 20px;
margin: 3% 0 5% 0;
}
.ldetails>.label
{
    color: rgb(94, 8, 82);
   margin-bottom: 10%;
}
.login
{
    margin: auto;
    margin-top:5%;
    margin-bottom: 5%;
    width:50%;
    /*height:30%;*/
    background-color: rgb(220, 186, 161);
    padding-bottom: 30px;
}
.ldetails
{
margin:10%
}
.fp
{
    float: right;
    margin: 0;
}
.btn
{
    
  margin-top: 5%;
  width: 100%;
  height:30px ;
  border: none;
  border-radius: 20px;  
  background-color: whitesmoke;
  margin-left: 0;
}
p{
    text-align: center;
}

    </style>
</head>
<body>
<div class="login">
        <div class="lcontainer">
               <h1>Login </h1>
               <form action="" method="post" class="booklogin">
    <div class="ldetails">
    <label for="admin_username" class="label">Username
    <input type="text" name="admin_username" class="input" placeholder="   Enter your username" required ></label>
    
    <label for="password" class="label">Password
    <input type="password" name="admin_password" class="input" placeholder="  Enter your password" required></label>
    
    <p class="fp">Forgot Password? </p>
    <input type="submit" value="Login" name="admin_login" class="btn">
    </form>
    
<h5>
    Dont't have an account ?
</h5>
<p> <a href="./admin_registeration.php"> Sign Up</a></p>
</div>
</div>
    </div>

</body>
</html>

<?php
if(isset($_SESSION))
{
if(isset($_POST['admin_login']))
{
    $admin_username=$_POST['admin_username'];
    $user_password=$_POST['admin_password']; 
    echo  $admin_username;
    $select_query = "select * from `admin_table` where username ='$admin_username'";
    echo  $admin_username;
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    if($row_count>0)
    {
        $_SESSION['admin_username']= $admin_username;
        echo $_SESSION['user_username'];
    if(password_verify($admin_password,$row_data['admin_password']))
      { 
       echo "<script>alert('Login successful')</script>";
      }
    else 
      {
        echo "<script>alert('invalid credentials')</script>";
      }

    } 
else
{
          echo "<script>window.open('admin.php','_self')</script>";

    
}
}
}



?>