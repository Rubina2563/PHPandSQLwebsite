<?php
if(isset($_GET['edit_categories'])){
$edit_categories=$_GET['edit_categories'];
$get_category="SELECT * FROM `categories` WHERE `Categories_id`=$edit_categories";
$result_category=mysqli_query($con,$get_category);
$row_category=mysqli_fetch_assoc($result_category);

$category_title=$row_category['Categories_type'];

//echo $category_title;
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];
    $cat_query="UPDATE `categories` SET `Categories_type`='$cat_title' WHERE `Categories_id`=$edit_categories";
    $cat_result=mysqli_query($con,$cat_query);

    if($cat_result){
echo "<script>alert('Category updated successfully')</script>";
echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>


<div class="container mt-3">
    <h1 class="text-center text-success">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
<label for="category_title" class="form-label">Category Title</label>
<input type="text" name="category_title" id="category_title" value='<?php echo $category_title;?>' class="form-control" required="required">
  <input type="submit" value="update Category" class="btn btn-primary px-3 m-3" name="edit_cat">     
   </div>
 </form>
</div>