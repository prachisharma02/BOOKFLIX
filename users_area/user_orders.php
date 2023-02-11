<style>
        
        h1
        {
            text-align: center;
            margin-top: 10px;
            padding-top: 20px;
            color:rgb(154, 93, 19);

        }
        .pay
        {
          color: black;
        }
th,table,td
 {
    /* margin-left: 150px; */
    margin-top: 30px;
    border: 1px solid;
    border-collapse: collapse;
   text-align: center;
    width: 20px;
   }
  th
  {
   padding: 8px;
  }
  table
  {
    width: 900px;
    margin-left: 150px;
   
  }
  .img
  {
    height:70%;
    width: 70%;
  }
</style>

<body>
    <?php
$username=$_SESSION['user_username'];
$get_user="select * from `user_table` where username='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
// echo $user_id;

?>

<h1>All Your Orders</h1>
    <table class="table">
    <thead>
       
 <tr>
       <th>SI no</th>
         <th>Due Amount</th>
         <th>Invoice Number</th>
         <th>Total Products</th>
         <th>Date</th>
        <th>Complete/Incomplete</th> 
        <th>Status</th>
</tr>
     </thead>
     <tbody>

     <?php
     $get_order_details="select * from `user_orders`";
     $result_orders=mysqli_query($con,$get_order_details);
     $number=1;
     while($row_orders=mysqli_fetch_assoc($result_orders))
     {
      $order_id=$row_orders['order_id'];
      $amount_due=$row_orders['amount_due'];
      $invoice_number=$row_orders['invoice_number'];
      $total_products=$row_orders['total_products'];
      $order_status=$row_orders['order_status'];
      $order_date=$row_orders['order_date'];
      if($order_status=='pending')
      {
        $order_status='Incomplete';
      }
      else
      {
        $order_status='Complete';
      }
     
      echo "<tr>
      <td>$number</td>
      <td>$amount_due</td>
      <td>$invoice_number</td>
      <td>$total_products</td>
      <td>$order_date</td>
      <td>$order_status</td>";
      ?>
      <?php
      if($order_status=='Complete')
      {
        echo "<td>Paid</td>";
      }
      else
      {
      echo "<td><a class='pay' href='./confirm_payment.php?order_id=$order_id'> Confirm</a></td>
            </tr>";
      }
    $number++;
}
     ?>

     </tbody>
        
        
               
             
           
    </table>
    <footer>
      All Rights Reserved &copy
    </footer>