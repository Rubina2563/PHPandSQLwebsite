<?php

if(isset($_GET['edit'])){
    $edit_id=$_GET['edit'];
    $get_data="SELECT * FROM `products` WHERE `Product_id`=$edit_id";
    $result_data=mysqli_query($con,$get_data);
    $row_data=mysqli_fetch_assoc($result_data);

    $Product_id=$row_data['Product_id'];
    $Product_title=$row_data['Product_title'];
    $Product_description=$row_data['Product_description'];
    $Product_keyword=$row_data['Product_keyword'];
    $Categories_id=$row_data['Categories_id'];
    $Brands_id=$row_data['Brands_id'];
    $Product_image1=$row_data['Product_image1'];
    $Product_image2=$row_data['Product_image2'];
    $Product_image3=$row_data['Product_image3'];
    $Product_price=$row_data['Product_price'];
    $Product_status=$row_data['Product_status'];

    //fetching category name
    $category_query="SELECT * FROM `categories` WHERE `Categories_id`=$Categories_id";
    $category_result=mysqli_query($con,$category_query);
    $category_row=mysqli_fetch_assoc($category_result);
    $category_name=$category_row['Categories_type'];

//fetching brand name
$brand_query="SELECT * FROM `brands` WHERE `Brands_id`=$Brands_id";
$brand_result=mysqli_query($con,$brand_query);
$brand_row=mysqli_fetch_assoc($brand_result);
$brand_name=$brand_row['Brand_type'];
}
?>




<div class="container mt-5">
    <h1 class="text-center text-success">Edit Product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        
    <div class="form-outine w-50 m-auto p-2">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $Product_title?>" name="product_title" class="form-control" required="required">
         </div>
    

         <div class="form-outine w-50 m-auto p-2">
            <label for="product_desce" class="form-label">Product Description</label>
            <input type="text" id="product_desc" value="<?php echo $Product_description?>" name="product_desc" class="form-control" required="required">
         </div>

         <div class="form-outine w-50 m-auto p-2">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value="<?php echo $Product_keyword?>" name="product_keywords" class="form-control" required="required">
         </div>

        <div class="form-outine w-50 m-auto p-2">
         <label for="Product_brands" class="form-label">Product Brand</label>
         <select name="Product_brands" class="form-select">

           
                <option value="<?php echo $brand_name?>"><?php echo $brand_name?></option>
<?php
 $brand_query_all="SELECT * FROM `brands`";
 $brand_result_all=mysqli_query($con,$brand_query_all);
 while($brand_row_all=mysqli_fetch_assoc($brand_result_all)){
$brand_name=$brand_row_all['Brand_type'];
$brand_id=$brand_row_all['Brands_id'];
echo "<option value='$brand_id'>$brand_name</option>";

 }
?>
            </select>
          </div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="Product_categories" class="form-label">Product Category</label>
            <select name="Product_categories" class="form-select">
            <option value="<?php echo $category_name?>"><?php echo $category_name?></option>
<?php
 $category_query_all="SELECT * FROM `categories`";
 $category_result_all=mysqli_query($con,$category_query_all);
 while($category_row_all=mysqli_fetch_assoc($category_result_all)){
$category_name=$category_row_all['Categories_type'];
$category_id=$category_row_all['Categories_id'];
echo "<option value='$category_id'>$category_name</option>";

 }
?>
            </select>
             </div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="product_image1" class="form-label">Product Image1</label> 
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control" required="required">
            <img src="../Images/<?php echo $Product_image1?>"   class="product_image" alt="">
            </div> 
</div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="product_image2" class="form-label">Product Image2</label> 
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control" required="required">
            <img src="../Images/<?php echo $Product_image2?>" class="product_image" alt="">
            </div> 
</div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="product_image3" class="form-label">Product Image3</label> 
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control" required="required">
            <img src="../Images/<?php echo $Product_image3?>" class="product_image" alt="">
            </div> 
</div>

            <div class="form-outine w-50 m-auto p-2">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo $Product_price?>" name="product_price" class="form-control" required="required">
         </div>


         <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product" class="bg-primary p-2 mb-3 rounded text-light" >
         </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $Product_brands=$_POST['Product_brands'];
   // $Brand_categories=$_POST['Brand_categories'];
    $Product_categories=$_POST['Product_categories'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_desc=='' or $product_keywords=='' or 
     $Product_brands=='' or $Product_categories=='' or $product_price=='' 
    or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo  "<script>alert('Please fill all the fields and preceed further')</script>";
    }else{
        move_uploaded_file($temp_image1,"../Images/$product_image1");
        move_uploaded_file($temp_image2,"../Images/$product_image2");
        move_uploaded_file($temp_image3,"../Images/$product_image3");

       $update_product="UPDATE `products` SET `Product_title`='$product_title',`Product_description`='$product_desc',`Product_keyword`='$product_keywords',
      `Categories_id`=$Product_categories,`Brands_id`=$Product_brands, `Product_image1`='$product_image1',`Product_image2`='$product_image2',`Product_image3`='$product_image3',`Product_price`=$product_price,`Insert_date`=NOW() WHERE `Product_id`=$edit_id";
    $update_query=mysqli_query($con,$update_product);
       
       if($update_query){
       
       echo  "<script>alert('Data updated successfully')</script>";
       echo "<script>window.open('./index.php','_self')</script>";
       }
    }

}
?>