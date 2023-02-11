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
    <h2>All Orders</h2>
    <table class="table">
    <thead>
        <?php 
        
        $get_orders="select * from `user_orders` ";
        $result=mysqli_query($con,$get_orders);
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
                echo "<h1>No Orders</h1>";
             }
             else
             {
              echo " <tr>
        <th>SI no</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
    </thead>";
                $number=0;
                while($row_data=mysqli_fetch_assoc( $result))
                {
                    $order_id=$row_data['order_id'];
                    $user_id=$row_data['user_id'];
                    $amount_due=$row_data['amount_due'];
                    $invoice_number=$row_data['invoice_number'];
                    $total_products=$row_data['total_products'];
                    $order_date=$row_data['order_date'];
                    $order_status=$row_data['order_status'];
                    $number++;
                    echo "<tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    <td>$order_status</td>
                    <td>delete</td>
                    
       </tr>";
                    
                    
                }
             }
             ?>
             


             </tbody>  
    </table>