<?php
include('../Admin_Panel/Includes/connect.php');
include('../Functions/commonfunctions.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

//getting total items and total price of all the items

$get_ip_address=getIPAddress();
$total_price=0;
$cart_query_price="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price=mysqli_query($con,$cart_query_price);
$count_products=mysqli_num_rows($result_cart_price);

while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_product="SELECT * FROM `products` WHERE Product_id=$product_id";
    $run_result=mysqli_query($select_product);

    while($row_product=mysqli_fetch_array($run_result)){
        $product_price=array($row_product['Product_price']);
        $product_values=array_sum($product_price);

        $total_price+=$product_Values;
    }
}
?>
