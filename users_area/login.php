<?php
$con = new mysqli('localhost','root','','bookflix');
if($con->connect_error)
{
    die('connection failed : '.$con->connect_error);
}
else
{
    $stmt = $con->prepare("insert into login(user_id,username,user_email,password,user_ip,user_address,user_mobile)values(?,?,?,?,?,?,?)");
    $stmt->bind_param("issssss",$user_id,$username,$user_email,$password,$user_ip,$user_address,$user_mobile);
    $stmt->execute();
    
    $stmt->close();
    $con->close();


}


?>

