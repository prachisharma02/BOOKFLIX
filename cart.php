<?php 
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart Details</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="cart.css">

</head>
<body>
    <header>
        
        <img src="./images/bookflix-logo-removebg-preview.png" class="logo" alt="">
        <!--<img src="./bookflix-logo-removebg-preview.png" class="logo">  -->
        
        <nav class="nav">
               <ul>
                <li>
                    <form action="search_product.php" method="get" >
                    <input class="input" type="search" placeholder="Search" aria-label="search" name="search_data">
             <!--<button class="search" type="submit">Search</button>-->
            <input type="submit" value="search" class="search" name="search_data_products"> 
            </form></li>

            <li> <a class="a" href="./homepage.php"> Home</a></li>
                <li> <a class="a" href="./users_area/profile.php"> Profile</a></li>
                <li> <a class="a" href="cart.php">Cart<sup><?php  cart_item(); ?></sup></a></li>
               

            </ul>
        </nav>
    </header>
    <?php
    cart()
    ?>

    <nav class="login">
    <ul>
            <?php 
           if(!isset($_SESSION['user_username']))
           {
           echo "<li> <a class='user_login' href='#'>Welcome guest</a></li>";
           }
           else
           {
              echo "<li><a href='#'>Welcome ".$_SESSION['user_username']."</a> </li>";
           }
           if(!isset($_SESSION['user_username'])) 
           {
              echo "<li> <a class='user_login' href='./users_area/login_user.php'>Login</a></li>";
              }
              else
           {
               echo "<li><a class='user_login' href='./users_area/logout.php'>logout</a></li>";
           }  
               
              ?>
              </ul>

    </nav>
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table">
             <!--<thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Remove</th>
                    <th>Operation</th>
                </tr>
             </thead>  
             <tbody>-->
                <?php
                 global $con;
                 $ip= getIPAddress();
                 $total_price=0;
                 $cart_query="select * from `cart_details` where ip_address='$ip'";
                 $result=mysqli_query($con,$cart_query);
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0)
                 { echo "
                    <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Price per unit</th>
                    <th>Remove</th>
                    <th>Operation</th>
                </tr>
             </thead>  
             <tbody>";
                 while($row=mysqli_fetch_array($result))
                 {
                     $product_id=$row['product_id'];
                     $select_products="select * from `products` where product_id='$product_id'";
                     $result_products=mysqli_query($con,$select_products);
                     while($row_product_price=mysqli_fetch_array($result_products))
                     {
                        $product_price=array($row_product_price['product_price']);
                        $price_table=$row_product_price['product_price'];
                        $product_title=$row_product_price['product_title'];
                        $product_image1=$row_product_price['product_image1'];
                        $product_values=array_sum($product_price);
                        $total_price+=$product_values;
                ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img class="cart_images" src="<?php echo $product_image1?>" alt=""></td>
                    <td><input class="quantity" type="text" name="qty"></td>
                    <?php
                    $ip= getIPAddress();
                    if(isset($_POST['update_cart']))
                    {
                      $quantities=$_POST['qty'];
                      $update_cart= "update `cart_details` set quantity= $quantities where ip_address=$ip";
                      $result_products_cart=mysqli_query($con, $update_cart);
                      $total_price=((int)$total_price*(int)$quantities);

                    }
                    ?>
                    <td> Rs<?php echo $price_table?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td >
                        <!--<button>Update</button>-->
                        <input class="submit" type="submit" value="update cart" name="update_cart">
                        <!--<button>Remove</button></td>-->
                        <input class="submit" type="submit" value="remove cart" name="remove_cart">
                       
                </tr>
                <?php
                     }
                    }
                }
                else
                {
                   echo "<div class='h2'><h2>The Cart is Empty</h2></div>" ;
                }
                ?>
             </tbody>
            </table>
            <div class="subtotal">
                <?php
                 $ip= getIPAddress();
                 $cart_query="select * from `cart_details` where ip_address='$ip'";
                 $result=mysqli_query($con,$cart_query);
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0)
                 {
                    echo "<h4>Subtotal:<strong>Rs  $total_price/-</strong></h4>
                    <a class='continue' href='homepage.php'>continue shopping</a>
                    <button><a class='continue' href='./users_area/checkout.php'>check out</a></button>";
              
                 }
                 else
                 {
                  echo " <a class='continue shopping' href='homepage.php'>continue shopping</a>";
                 }
                ?>
                  </div>
        </div>
    </div>
    </form>

<?php 
function remove_cart_item()
{
    global $con;
    
    if(isset($_POST['remove_cart']))
    {
       foreach ($_POST['removeitem'] as $remove_id)
        {
            //echo $remove_id;
            $delete_query="delete from `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete)
            {
                echo "<script>window.open('cart.php','self')</script>";
            }
        }
    }
}
echo $remove_item=remove_cart_item();
?>

       
        </body>
        </html>
