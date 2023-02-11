<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
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
</head>
<body>
    <h2>All Products</h2>
    <table class="table">
    <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>total sold</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
             </thead>  
             <?php
             $get_products="select * from `products`";
             $result=mysqli_query($con,$get_products);
             $number=0;
             while($row=mysqli_fetch_assoc($result))
             {
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $status=$row['status'];
                $number++;
                ?>
                <tr>
                    <td><?php echo $number;?></td>
                <td><?php echo $product_title ?></td>
                <td><img class="img" src="<?php echo $product_image1 ?>"></td>
                <td><?php echo $product_price ?></td>
                <td><?php 
                $get_count=" select * from `orders_pending` where product_id=$product_id";
                $result_count=mysqli_query($con,$get_count);
                $rows_count=mysqli_num_rows($result_count);
                echo $rows_count;
                ?></td>
                <td><?php echo $status ?></td>
                <td><a href='./admin.php?edit_products=<?php echo $product_id?>'>Edit</a></td>
                <td><a href='./admin.php?delete_product=<?php echo $product_id?>'>Delete</a></td>
            </tr> 
             
             <?php 
             }
             ?>
             
             <tbody>
             
            
             </tbody>

    </table>
</body>
</html>