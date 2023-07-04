<?php
if(isset($_GET['delete_brands'])){
    $delete_bar_id=$_GET['delete_brands'];
    $delete_bar_query="DELETE FROM `brands` WHERE `Brands_id`=$delete_bar_id";
    $bar_delete_query=mysqli_query($con,$delete_bar_query);

    if($bar_delete_query){
       echo "<script>alert('Brand deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
    ?>

    