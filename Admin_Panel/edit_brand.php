<?php
if(isset($_GET['edit_brands'])){
$edit_brands=$_GET['edit_brands'];
$get_brand="SELECT * FROM `brands` WHERE `Brands_id`=$edit_brands";
$result_brand=mysqli_query($con,$get_brand);
$row_brand=mysqli_fetch_assoc($result_brand);

$brand_title=$row_brand['Brand_type'];

//echo $category_title;
}

if(isset($_POST['edit_bar'])){
    $bar_title=$_POST['brand_title'];
    $bar_query="UPDATE `brands` SET `Brand_type`='$bar_title' WHERE `Brands_id`=$edit_brands";
    $bar_result=mysqli_query($con,$bar_query);

    if($bar_result){
echo "<script>alert('Brand updated successfully')</script>";
echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>


<div class="container mt-3">
    <h1 class="text-center text-success">Edit Brands</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
<label for="brand_title" class="form-label">Brand Title</label>
<input type="text" name="brand_title" id="brand_title" value='<?php echo $brand_title;?>' class="form-control" required="required">
  <input type="submit" value="update Brand" class="btn btn-primary px-3 m-3" name="edit_bar">     
   </div>
 </form>
</div>
