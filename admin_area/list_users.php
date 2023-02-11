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
    <h2>All Users</h2>
    <table class="table">
    <thead>
        <?php 
        
        $get_payment="select * from `user_table` ";
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
                echo "<h1>No Users</h1>";
             }
             else
             {
              echo " <tr>
        <th>SI no</th>
        <th>Username</th>
        <th>User Email </th>
        <th>User Address</th>
        <th>User Mobile</th>
    </tr>
    </thead>";
                $number=0;
                while($row_data=mysqli_fetch_assoc( $result))
                {
                    $user_id=$row_data['user_id'];
                    $username=$row_data['Username'];
                    $user_email=$row_data['user_email'];
                    $user_address=$row_data['user_address'];
                    $user_mobile=$row_data['user_mobile'];

                    $number++;
                    echo "<tr>
                    <td>$number</td>
                    <td>$username</td>
                    <td>$user_email</td>
                    <td>$user_address</td>
                    <td>$user_mobile</td>
       </tr>";
                    
                    
                }
             }
             ?>
             


             </tbody>  
    </table>