<?php
if(isset($_GET['delete_categories'])){
    $delete_cat_id=$_GET['delete_categories'];
    $delete_cat_query="DELETE FROM `categories` WHERE `Categories_id`=$delete_cat_id";
    $cat_delete_query=mysqli_query($con,$delete_cat_query);

    if($cat_delete_query){
       echo "<script>alert('Category deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
    ?>


