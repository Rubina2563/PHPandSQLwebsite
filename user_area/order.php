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
$invoice_number=mt_rand();
$status='pending';

while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_product="SELECT * FROM `products` WHERE Product_id=$product_id";
    $run_result=mysqli_query($con,$select_product);

    while($row_product=mysqli_fetch_array($run_result)){
        $product_price=array($row_product['Product_price']);
        $product_values=array_sum($product_price);

        $total_price+=$product_values;
    }
}
//getting quantity from cart
$get_cart="SELECT * FROM `cart_details`";
$get_cart_result=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($get_cart_result);
$quantity=$get_item_quantity['quantity'];

if($quantity==0){
    $quantity=1;
    $subtotal_price=$total_price;  
}else{
    $quantity=$quantity;
    $subtotal_price=$total_price*$quantity; 
}

$order_details="INSERT INTO `user_orders`(`user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES ($user_id,$subtotal_price,$invoice_number,$quantity,NOW(),'$status') ";
$order_result=mysqli_query($con,$order_details);

if($order_result){
    echo "<script>alert('Order executed successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}


//inert pending orders
$insert_pending_orders="INSERT INTO `order_pending`(`user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending=mysqli_query($con,$insert_pending_orders);

//delete from cart the value which has been gone for order pendings
$empty_cart="DELETE FROM `cart_details` WHERE ip_address='$get_ip_address' ";
$result_delete=mysqli_query($con,$empty_cart);

?>
