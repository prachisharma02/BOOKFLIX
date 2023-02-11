<?php
//include('./includes/connect.php');


function getproducts()
{
    global $con;
$select_query="select * from `Products` order by rand() limit 0,12 ";
$result_query=mysqli_query($con,$select_query);
 // <img src='./admin_area/product_images/ $product_image1'>
//$row=mysqli_fetch_assoc($result_query); 
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query))
{
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    echo "<div class='t'>
    <div class='book'>
    <img class='image' src='$product_image1'>
    </div>
    <div class='ptitle'><h3> $product_title</h3></div>
    <div class='desc'><p> $product_description </p> </div>
    <div class='price'><p>Rs $product_price</p></div>
    <div class='cart'><a class='button' href='homepage.php?add_to_cart=$product_id'>Add To cart</a></div>
    

</div>";

}
}
function search_products()
{
    global $con;
    if(isset($_GET['search_data_products']))
    {
        $search_data_value=$_GET['search_data'];
    $search_query="select * from `products` where product_keyword like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    //$row=mysqli_fetch_assoc($result_query); 
    //echo $row['product_title'];
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0)
    {
        echo "<h1  class='notavailable'>This type of Book is not available</h1>";
    }
    while($row=mysqli_fetch_assoc($result_query))
    {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        echo "<div class='t'>
    
        <div class='book'>
    <img class='image' src='$product_image1'>
    </div>
    <div class='ptitle'><h3> $product_title</h3></div>
    <div class='desc'><p> $product_description </p> </div>
    <div class='price'><p>Rs $product_price</p></div>
    <div class='cart'><a class='button' href='homepage.php?add_to_cart=$product_id'>Add To cart</a></div>
    

</div>";
}
}
}

function getIPAddress() 
{  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;

function cart()
{
    

    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $ip = getIPAddress();  
        $get_product_id=$_GET['add_to_cart'];
        $select_query="select * from `cart_details` where ip_address= '$ip' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0)
        {
            echo "<script>alert('this item is already present in cart')</script>";
            echo "<script>window.open('homepage.php','_self')</script>";
        }
        else
        {
            $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values( $get_product_id,'$ip',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('item is added to cart')</script>";
            echo "<script>window.open('homepage.php','_self')</script>";
        }
        
    }
}
 
function cart_item()
{
    //session_start();
    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $ip = getIPAddress();  
        $select_query="select * from `cart_details` where ip_address= '$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }    
        else
        {
            global $con;
            $ip = getIPAddress();  
            $select_query="select * from `cart_details` where ip_address= '$ip'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
        
         } 
         echo  $count_cart_items;
}
 

function total_cart_price()
{
    global $con;
    $ip= getIPAddress();
    $total_price=0;
    $cart_query="select * from `cart_details` where ip_address='$ip'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result))
    {
        $product_id=$row['product_id'];
        $select_products="select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products))
        {
           $product_price=array($row_product_price['product_price']);
           $product_values=array_sum($product_price);
        $total_price+=$product_values;
        }
        
    }
echo $total_price;
}

//get product count
function product_count($user_username)
{
    global $con;
    $username = $user_username;
    $get_details="select * from user_table where username='$username'";
    

    $result_query=mysqli_query($con,$get_details);
    $user_data = mysqli_fetch_assoc($result_query);
    // $user_id=$user_data['user_id'];
    // echo $user_id;
    $get_orders="select * from user_orders where user_id=2 && order_status='pending'";
    $result_order_query=mysqli_query($con,$get_orders);
    if($result_order_query)
    {
    $row_count = mysqli_num_rows($result_order_query);
    if($row_count > 0)
    {
        echo "<h3>You have <span color:'green'>$row_count</span>Pending orders</h3>
        <a style='color:green' href='profile.php?My_orders'>Order Details</a>";
    }
    else
    {
        echo "<h3>You have 0 Pending orders</h3>
        <a style='color:green' href='../homepage.php?My_orders'>Explore products</a>";
   
    }
}
else{
    echo mysqli_error($con);
}



}

// get user ordr details
function user_order_details($user_username)
{
    global $con; 
    $username = $user_username;
    $get_details="select * from `user_table` where username='$username'";


    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_assoc($result_query))
    {
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account']))
        {
            if(!isset($_GET['My_orders']))
            {
                if(!isset($_GET['Delete_account']))
                {
                    $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_order_query=mysqli_query($con,$get_orders);
                    $row_count=(mysqli_num_rows($result_order_query));
                    if(!$row_count>0)
                    {
                        echo "<h3>You have <span color:'green'>$row_count</span>Pending orders</h3>
                        <a style='color:green' href='profile.php?My_orders'>Order Details</a>";
                    }
                    else
                    {
                        echo "<h3>You have 0 Pending orders</h3>
                        <a style='color:green' href='../homepage.php?My_orders'>Explore products</a>";
                   
                    }
                }
          
            }
         
        }

    }
}
?>
