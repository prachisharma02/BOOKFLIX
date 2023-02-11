<link rel="stylesheet" href="istyle.css">
    <style>

        h1
        {
            margin: 0;
            padding: 0;
            text-align: center;
            color: brown;
        }
    </style>
<div class="edit">
    <?php 
    
    if(isset($_GET['edit_products']))
    {
      
    $edit_id=$_GET['edit_products'];  
    $get_data="select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
}
?>
<h1>Edit Product</h1>
<form action="" method="post" enctype="multipart/form-data">
   <div class="form">
   <label for="product_title">Product Title</label>
   <input type="text" name="product_title" value="<?php echo $product_title ?>" required>
   </div>
   <div class="form">
   <label for="product_discription">Product_Description</label>
    <input type="text" name="product_discription" id="product_discription" value="<?php echo $product_description ?>"  required>
   </div>
   <div class="form">
    <label for="product_keyword">Product_keyword</label>
    <input type="text" name="product_keyword" id="product_keyword" value="<?php echo $product_keyword ?>" >
   </div>
   <div class="form">
    <label for="product_image1">Product Image 1</label>
    <input class="file" type="file" name="product_image1" id="product_image1" ><img src="<?php echo $product_image1 ?>"alt="">
   </div>
   <div class="form">
    <label for="product_price">Product Price</label>
    <input type="text" name="product_price" id="product_price" value=<?php echo $product_price ?> required>
    </div>
    <div class="form">
        <input type="submit" name="edit_product" class="btn" value="Update Products">
    </div>
</form>

</div>

<!-- editing products -->
<?php
if(isset($_POST['edit_product']))
{
    $productt_title=$_POST['product_title'];
    $product_discription=$_POST['product_discription'];
    $product_keyword=$_POST['product_keyword'];
    $product_image1=$_FILES['product_image1']['name'];
    $temp_product_image1=$_FILES['product_image1']['tmp_name'];
    $product_price=$_POST['product_price'];

    if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_price=='')
    {
        echo "<script>alert('please fill')</script>";
    }
    else

    // query to update
{
    $update_products="update `products` set 
    product_title='$productt_title',
    product_discription='$product_discription',
    product_keyword='$product_keyword',
    product_image1='$product_image1',
    product_price='$product_price' where product_id= $edit_id";
    $result_update=mysqli_query($con,$update_products);
    if($result_update)
    {
        echo"<script>alert('Product updated successsfully')</script>";
        echo "<script>window.open('./insert_products.php','_self')</script>";
    }
}
}






?>
   
