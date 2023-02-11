<?php 

?>
<style>
        
        h2
        {
            text-align: center;
            margin-top: 0px;
            padding-top: 20px;
            color: brown;
        }
th,table,td
 {
    margin-left: 200PX;
    margin-top: 60px;
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
   
  }
  .img
  {
    height:70%;
    width: 70%;
  }
</style>

<body>
    <h2>All Payments</h2>
    <table class="table">
    <thead>
        <?php 
        
        $get_payment="select * from `user_payment` ";
        $result=mysqli_query($con,$get_payment);
        $row_count=mysqli_num_rows($result);
    //     echo " <tr>
    //     <th>SI no</th>
    //     <th>Due Amount</th>
    //     <th>Invoice Number</th>
    //     <th>Total Products</th>
        
    //     <th>Status</th>
    //     <th>Delete</th>
    // </tr>
    // </thead>";
        
        
               
             
             if($row_count==0)
             {
                echo "<h1>No Payments Yet</h1>";
             }
             else
             {
              echo " <tr>
        <th>SI no</th>
        <th>Invoice Number</th>
        <th>Amount due</th>
        <th>Payment Mode</th>
        <th>Order Date</th>
    </tr>
    </thead>";
                $number=0;
                while($row_data=mysqli_fetch_assoc( $result))
                {
                    $order_id=$row_data['order_id'];
                    $payment_id=$row_data['payment_id'];
                    $amount_due=$row_data['amount_due'];
                    $invoice_number=$row_data['invoice_number'];
                    $payment_mode=$row_data['payment_mode'];
                    $date=$row_data['date'];

                    $number++;
                    echo "<tr>
                    <td>$number</td>
                    <td>$invoice_number</td>
                    <td>$amount_due</td>
                    <td>$payment_mode</td>
                    <td>$date</td>
       </tr>";
                    
                    
                }
             }
             ?>
             


             </tbody>  
    </table>