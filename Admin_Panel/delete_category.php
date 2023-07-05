<?php
if(isset($_GET['delete_categories'])){
    $delete_cat_id=$_GET['delete_categories'];
   

    $product_id_query="SELECT * FROM `products` WHERE `Categories_id`=$delete_cat_id";
    $result_query1=mysqli_query($con,$product_id_query);
$result_num=mysqli_num_rows($result_query1);

if($result_num==0){
    $delete_cat_query="DELETE FROM `categories` WHERE `Categories_id`=$delete_cat_id";
    $cat_delete_query=mysqli_query($con,$delete_cat_query);

    if($cat_delete_query){
        echo "<script>alert('Category deleted successfully')</script>";
         echo "<script>window.open('./index.php?view_categories','_self')</script>";
     }
}
else{
    $row_product_data=mysqli_fetch_assoc($result_query1);

    $product_ID=$row_product_data['Product_id'];

    $product_query="SELECT * FROM `order_pending` WHERE `product_id`=$product_ID AND `order_status`='pending'";
        $product_query_result=mysqli_query($con,$product_query);
        $product_num=mysqli_num_rows($product_query_result);

 if($product_num>0){
            echo "<script>alert('This category cannot be deleted as the product is being ordered.')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }else{
            $delete_cat_query="DELETE FROM `categories` WHERE `Categories_id`=$delete_cat_id";
    $cat_delete_query=mysqli_query($con,$delete_cat_query);

    if($cat_delete_query){
        echo "<script>alert('Category deleted successfully')</script>";
         echo "<script>window.open('./index.php?view_categories','_self')</script>";
     }
        }
}
    
   
    }
    ?>


