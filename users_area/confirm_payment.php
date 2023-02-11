<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}
if(isset($_POST['confirm']))
{
    $invoice_number=$_POST['invoice_number'];
    echo $invoice_number;
    $amount_due=$row_fetch['amount_due'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payment`(order_id,invoice_number,amount_due,payment_mode) 
    values ($order_id, $invoice_number,$amount_due,'$payment_mode')" ;
    $result=mysqli_query($con,$insert_query);
    if($result) 
    {
         echo "<script>window.open('./profile.php?user_orders')</script>";
 } 
 $update_order="update `user_orders` set order_status='Complete'
 where order_id=$order_id";
 $result_order=mysqli_query($con,$update_order);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body
        {
            text-align: center;
        }
      .container
      {
        margin-top: 2%;
        margin-bottom: 5%;
        background-color: #C99588;
        height: 500px;
        width: 100%;
      }
      input
      {
        width: 50%;
      }
      .form
      {
        margin: 7%;
      }
      .btn 
      {
        padding: 10px;
        border: none;
    

    background-color: #A66555;
    border-radius: 5px;
    text-decoration: none;
    color: whitesmoke;
    width: 15%;
      } 
    </style>
</head>
<body>
   
<div class="container">
<h1>Confirm Payment</h1>
<form action="" method="post">
    <div class="form">
        <label for="invoice">Invoice : </label>
        <input type="text" name="invoice_number" value="<?php echo $invoice_number ?>">
    </div>
    <div class="form">
    <label for="amount">Amount : </label>
        <input type="text" name="amount" value="<?php echo  $amount_due ?>">
    </div>
    <div class="form">
        <select name="payment_mode" >
            <option >Select Payment Mode </option>
            <option >UPI </option>
            <option >Net Banking </option>
            <option > PayPal</option>
            <option >Cash on Delivery </option>
            <option >Pay Offline</option>
        </select>
    </div>
    <div class="form">
        <input class="btn" type="submit"  name="confirm" value="confirm">
    </div>

</form>

</div>
        
</body>
</html>