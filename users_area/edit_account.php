<?php
   


if(isset($_GET['edit_account']))
{

$user_session_name=$_SESSION['user_username'];
$username=$_SESSION['user_username'];



$select_query_update="select * from `user_table` where username='$user_session_name'";
$result_query_update=mysqli_query($con,$select_query_update);
$row=mysqli_fetch_assoc($result_query_update);
$user_id=$row['user_id'];

$username=$_SESSION['user_username'];
$user_email=$row['user_email'];
$user_address=$row['user_address'];
$user_mobile=$row['user_mobile'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    <style>
.edit
{
    text-align: left;
    width: 50%;
    margin-left: 300px;
    
    /* margin: auto; */
    /* margin-right: 200px; */
}
.change
{
    margin-top: 2%;
    margin-bottom: 2%;
    width: 100%;
    border-radius: 2px;

    border:1px solid rgb(233, 210, 190); ;
    height: 30px;
}
.btn
{
    margin-bottom: 10%;
    padding: 3px;
    background-color:rgb(233, 210, 190);
    margin-top: 2%;
    margin-bottom: 2%;
    width: 100%;
    border-radius: 2px;

    border:1px solid black;
    height: 30px;
}
h1
{
    text-align: center;
}
    </style>
</head>
<body>
    <h1>Edit account</h1>
    <form action="" method="post">
        
    <div class="edit">   
   <label for="Username">Username : </label>
   <input class="change" type="text" name="user_username" value="<?php echo $username ?>" placeholder="Enter username" required>
   </div>
   <div class="edit">
   <label for="user_email">Email :</label>
    <input class="change" type="user_mail" name="user_email"  value="<?php echo $user_email ?>" placeholder="Enter your email" required>
   </div>
   <div class="edit">
    <label for="user_address">Address</label>
    <input class="change" type="text" name="address" value="<?php echo $user_address ?>" placeholder="Enter your address" required>
   </div>
   <div class="edit">
    <label for="user_contact">Contact</label>
    <input class="change" type="text" name="user_contact"  value="<?php echo $user_mobile ?>" placeholder="Enter your mobile number" required>
   </div>
   <div class="edit">
 <input  type="submit" name="user_update" class="btn" value="Update">
 <?php
 if(isset($_POST['user_update']))
 {

 $update_id=$user_id;
 
 $username=$_POST['user_username'];
 
 $user_email=$_POST['user_email'];

 $user_address=$_POST['user_address'];
 echo  $user_address;
 $user_mobile=$_POST['user_mobile'];
 
 //update query
 $update_data="update `user_table` set Username='$username',user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile' where user_id=$update_id";
 $result_query_update=mysqli_query($con,$update_data);
 
 if($result_query_update)
 {
     echo "<script>alert('Data Updated successfully')</script>";
    // function redirect($url) {
    //     header('Location: '.$url);
    //     die();
    // }
    //  redirect("../homepage.php");
 
 }
}
 ?>
        </div>

    </form>
    <footer>
        All rights Reserved &copy
    </footer>
</body>
</html>