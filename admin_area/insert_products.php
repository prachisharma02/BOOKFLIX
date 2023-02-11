<?php
include('../includes/connect.php');
if(isset($_POST['insert_product']))

{
    $product_title=$_POST['product_title'];
    $product_discription=$_POST['product_discription'];
    $product_keyword=$_POST['product_keyword'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    $product_image1=$_FILES['product_image1']['name'];
    //$product_image2=$_FILES['product_image2']['name'];
    //$product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
   // $temp_image2=$_FILES['product_image2']['tmp_name'];
    //$temp_image3=$_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_discription=='' or $product_keyword=='' or $product_price=='')
{
    echo "<script>alert('Please fill all the available fields')</script>";
    exit();
    }
    else
    {
    move_uploaded_file($temp_image1,"$product_image1" );
    //move_uploaded_file($temp_image2,"./admin_area/product_images/$product_image2" );
    //move_uploaded_file($temp_image3,"./admin_area/product_images/$product_image3" );   
    
     //insert query
     $insert_products="insert into `products` (product_title,product_description,product_keyword,product_image1,product_price,date,status	) 
     values (' $product_title','$product_discription',' $product_keyword','$product_image1','$product_price',NOW(),' $product_status' )";
     $result_query=mysqli_query($con,$insert_products);
     if($result_query)
     {
        echo "<script>alert('Successfully inserted the products')</script>";
         
     }
}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link rel="stylesheet" href="istyle.css">
</head>
<body class="insert">
    <div class="container">
    <h3>Insert Products</h3>
  
   <form action="" method="post" enctype="multipart/form-data">
   <div class="form">
   <label for="product_title">Product Title</label>
   <input type="text" name="product_title" id="product_title" placeholder="enter product title" required>
   </div>
   <div class="form">
   <label for="product_discription">Product_Description</label>
    <input type="text" name="product_discription" id="product_discription" placeholder="description details" required>
   </div>
   <div class="form">
    <label for="product_keyword">Product_keyword</label>
    <input type="text" name="product_keyword" id="product_keyword" placeholder="keyword details" required>
   </div>
   <div class="form">
    <label for="product_image1">Product Image 1</label>
    <input class="file" type="file" name="product_image1" id="product_image1" placeholder="choose product image" required>
   </div>
   <div class="form">
    <label for="product_price">Product Price</label>
    <input type="text" name="product_price" id="product_price" placeholder="product price" required>
    </div>
    <div class="form">
        <input type="submit" name="insert_product" class="btn" value="insert_products">
    </div>
</form>

    
    </div>
</body>
</html>