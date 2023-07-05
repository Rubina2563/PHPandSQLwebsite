<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
</head>
<body>
    <?php
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];

        $product_query="SELECT * FROM `order_pending` WHERE `product_id`=$delete_id AND `order_status`='pending'";
        $product_query_result=mysqli_query($con,$product_query);
        $product_num=mysqli_num_rows($product_query_result);

        if($product_num>0){
            echo "<script>alert('This product cannot be deleted as the product is being ordered.')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }else{
        $delete_query="DELETE FROM `products` WHERE `Product_id`=$delete_id";
        $result_delete=mysqli_query($con,$delete_query);

        if($result_delete){
            echo "<script>alert('Product deletedd succefully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
    }
    ?>
</body>
</html>