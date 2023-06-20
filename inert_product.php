<?php 

include('./Admin_Panel/Includes/connect.php');

if(isset($_POST['Insert_product'])){
    
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $keywords=$_POST['keywords'];
    $product_categories=$_POST['product_categories'];
    $brand_categories=$_POST['brand_categories'];
    $product_price=$_POST['price'];
    $product_status='true';

    //Accessing images
    $product_image1=$_FILES["product_image1"]["name"];
    $product_image2=$_FILES["product_image2"]["name"];
    $product_image3=$_FILES["product_image3"]["name"];

    //Accessing image tmp_name
    $tmp_image1=$_FILES['product_image1']['tmp_name'];
    $tmp_image2=$_FILES['product_image2']['tmp_name'];
    $tmp_image3=$_FILES['product_image3']['tmp_name'];


    if($product_title==0 or  $description==0 or $keywords==0 or $product_categories==0 or 
    $brand_categories==0 or  $product_image1==0 or  $product_image2==0 or  $product_image3==0 ){
      

        echo "<script> alert ('All fields are required .') </script>  ";

        exist();

    }else{
        //insert images in file name product_images 
        
        
        move_uploaded_file($tmp_image3,"./Images/$product_image3");
        move_uploaded_file($tmp_image2,"./Images/$product_image2");
        move_uploaded_file($tmp_image1,"./Images/$product_image1");

        //inserting all data into table products
        $insert_products= "INSERT INTO `products`( `Product_title`, `Product_description`, `Product_keyword`, `Categories_id`, `Brands_id`, `Product_image1`, `Product_image2`, `Product_image3`, `Product_price`, `Insert_date`, `Product_status`) 
        VALUES ('$product_title',' $description',
        '$keywords','$product_categories','$brand_categories',
        '$product_image1','$product_image2','$product_image3',
        '$product_price',NOW(),'$product_status')";

            $product_result=mysqli_query($con,$insert_products);

           

            if($product_result){
                echo "<script> alert ('All data enetered successfuFILES') </script>  "   ;
            }else{
                echo("Error description: " . $insert_products-> error);
            }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----Bootstrap css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <!----Bootstrap awesome font link--->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---style.css-->
     <link rel="stylesheet" href="../style.css">

    <title>Insert Products</title>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="m-2 text-center">Insert Product</h1>

        <!--insert form--->
        <form action="" method="post" enctype="multipart/form-data" >
<!--title-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" class="form-control" name="product_title" placeholder="product title" id="product_title" autocoplete="off" required>
        </div>


        <!--description-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Enter description here" id="description" autocoplete="off" required>
        </div>
        

        <!--keywords-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="keywords" class="form-label">Keywords</label>
            <input type="text" class="form-control" name="keywords" placeholder="Enter keywords here" id="keywords" autocoplete="off" required>
        </div>

        <!--Select category-->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_categories" id="" class="form-select">
                <option value="">Select Category . </option>
<?php
$select_cat="SELECT * FROM categories";
$result_select1= mysqli_query($con,$select_cat);

while($row1=mysqli_fetch_assoc($result_select1)){

    $category_type=$row1['Categories_type'];
    $category_id=$row1['Categories_id'];
    echo " <option value='$category_id'> $category_type</option> ";
}
?>
 </select>

</div>

<!--Select brand-->
<div class="form-outline mb-4 w-50 m-auto">
            <select name="brand_categories" id="" class="form-select">
                <option value="">Select brand</option>

<?php
$select_brand="SELECT * FROM brands";
$result_select2= mysqli_query($con,$select_brand);

while($row2=mysqli_fetch_assoc($result_select2)){

    $Brand_type=$row2['Brand_type'];
    $Brands_id=$row2['Brands_id'];
    echo " <option value='$Brands_id'>$Brand_type</option> ";
}
?> 

</select>
</div>

<!--Image1-->
<div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="product_image1"  id="product_image1" >
        </div>

        <!--Image2-->
<div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="product_image2"  id="product_image2" >
        </div>

        <!--Image3-->
<div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="product_image3"  id="product_image3" >
        </div>

     <!--price-->
     <div class="form-outline mb-4 w-50 m-auto">
            <label for="price" class="form-label">price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter price here" id="price" autocoplete="off" required="required">
        </div>  
        
      <!--submit-->
     <div class="form-outline mb-4 w-50 m-auto">
            
            <input type="submit" class="btn btn-primary" name="Insert_product" value="Insert Product" id="price" >
        </div>  
          
        </form>
    </div>
</body>
</html>