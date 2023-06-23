<?php
//including connecting file
include('./Admin_Panel/Includes/connect.php');

//getting products data when neither the product nor brand is clicked 
function getProducts(){
global $con;


If(!isset($_GET['category']))

{
    if(!isset($_GET['brand'])){
$select_query="SELECT * FROM `products` ORDER BY  rand() LIMIT 0,1 ";
$result_query=mysqli_query($con,$select_query);


while($row=mysqli_fetch_assoc($result_query)){


  $product_id=$row['Product_id'];
  $product_title=$row['Product_title'];
  $product_description=$row['Product_description'];
  $product_image1=$row['Product_image1'];
  $product_price=$row['Product_price'];
  $category_id=$row['Categories_id'];
  $brand_id=$row['Brands_id'];

echo " <div class='col-md-4 '>
<div class='card'>
   <img src='./Images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'> $product_title</h5>
       <p class='card-text'> $product_description</p>
       <p class='card-text'>  $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add cart</a>
       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View cart</a>
    </div>
</div>
</div> ";
}

}
}

}


//getting all products .
function AllProducts(){
    global $con;
    
    
    If(!isset($_GET['category']))
    
    {
        if(!isset($_GET['brand'])){
    $select_query="SELECT * FROM `products` ORDER BY  rand()  ";
    $result_query=mysqli_query($con,$select_query);
    
    
    while($row=mysqli_fetch_assoc($result_query)){
    
    
      $product_id=$row['Product_id'];
      $product_title=$row['Product_title'];
      $product_description=$row['Product_description'];
      $product_image1=$row['Product_image1'];
      $product_price=$row['Product_price'];
      $category_id=$row['Categories_id'];
      $brand_id=$row['Brands_id'];
    
    echo " <div class='col-md-4 '>
    <div class='card'>
       <img src='./Images/$product_image1' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'> $product_title</h5>
           <p class='card-text'> $product_description</p>
           <p class='card-text'> Price: $product_price/-</p>
           <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View cart</a>
        </div>
    </div>
    </div> ";
    }
    
    }
    }
    
    }

//for  getting unique category items list



function getUniqueCategory(){
    global $con;
    
    
    If(isset($_GET['category']))
    
    {
        $categories_id=$_GET['category'];
       
    $select_query="SELECT * FROM `products`  WHERE Categories_id=$categories_id  ";
    $result_query=mysqli_query($con,$select_query);

    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h1 class='text-center text-danger'>There is no item in this category.</h1>";
    }
    
    
    while($row=mysqli_fetch_assoc($result_query)){
    
    
      $product_id=$row['Product_id'];
      $product_title=$row['Product_title'];
      $product_description=$row['Product_description'];
      $product_image1=$row['Product_image1'];
      $product_price=$row['Product_price'];
      $category_id=$row['Categories_id'];
      $brand_id=$row['Brands_id'];
    
    echo " <div class='col-md-4 '>
    <div class='card'>
       <img src='./Images/$product_image1' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'> $product_title</h5>
           <p class='card-text'> $product_description</p>
           <p class='card-text'> Price: $product_price/-</p>
           <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View cart</a>
        </div>
    </div>
    </div> ";
    
    
    }
    }
    
    }


    //for displaying unique brands 
    
function getUniqueBrands(){
    global $con;
    
    
    If(isset($_GET['brand']))
    
    {
        $brands_id=$_GET['brand'];
       
    $select_query="SELECT * FROM `products`  WHERE Brands_id=$brands_id";
    $result_query=mysqli_query($con,$select_query);

    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h1 class='text-center text-danger'>There is no item in this brand. .</h1>";
    }
    
    
    while($row=mysqli_fetch_assoc($result_query)){
    
    
      $product_id=$row['Product_id'];
      $product_title=$row['Product_title'];
      $product_description=$row['Product_description'];
      $product_image1=$row['Product_image1'];
      $product_price=$row['Product_price'];
      $category_id=$row['Categories_id'];
      $brand_id=$row['Brands_id'];
    
    echo " <div class='col-md-4 '>
    <div class='card'>
       <img src='./Images/$product_image1' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'> $product_title</h5>
           <p class='card-text'> $product_description</p>
           <p class='card-text'> Price: $product_price/-</p>
           <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View cart</a>
        </div>
    </div>
    </div> ";
    
    
    }
    }
    
    }
    
//for displaying brands names 

function getBrands(){
    global $con;
    $select_brands="SELECT * FROM brands ";
        $result_brands=mysqli_query($con, $select_brands);

       // $row_data=mysqli_fetch_assoc($result_brands);
       // echo  $row_data['Brand_type'];

        while($row_data=mysqli_fetch_assoc($result_brands)){

          $brand_type=$row_data['Brand_type'];
          $brand_Id=$row_data['Brands_id'];

          echo "  <a href='index.php?brand=$brand_Id' class='list-group-item list-group-item-action text-center bg-secondary btn'>$brand_type</a> ";
        }

}

function getCategories(){
    global $con;
    $select_categories="SELECT * FROM categories ";
        $result_categories=mysqli_query($con, $select_categories);

       // $row_data=mysqli_fetch_assoc($result_brands);
       // echo  $row_data['Brand_type'];

        while($row_data=mysqli_fetch_assoc( $result_categories)){

          $category_type=$row_data['Categories_type'];
          $category_Id=$row_data['Categories_id'];

          echo "  <a href='index.php?category=$category_Id' class='list-group-item list-group-item-action text-center bg-secondary btn'>$category_type</a> ";
        }
}



//searchingproducts using  keywords
function search_product(){

    global $con;
    
if(isset($_GET['search_data_product'])){
    $user_search=$_GET['search_data'];
    $Select_query="SELECT * FROM `products` WHERE Product_keyword LIKE '%$user_search%' ";
    $result_query=mysqli_query($con,$Select_query);
    
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h1 class='text-center text-danger'>There is no item for this keywords. .</h1>";
    }
    
    
    while($row=mysqli_fetch_assoc($result_query)){
    
    
      $product_id=$row['Product_id'];
      $product_title=$row['Product_title'];
      $product_description=$row['Product_description'];
      $product_image1=$row['Product_image1'];
      $product_price=$row['Product_price'];
      $category_id=$row['Categories_id'];
      $brand_id=$row['Brands_id'];
    
    echo " <div class='col-md-4 '>
    <div class='card'>
       <img src='./Images/$product_image1' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'> $product_title</h5>
           <p class='card-text'> $product_description</p>
           <p class='card-text'> Price: $product_price/-</p>
           <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View cart</a>
        </div>
    </div>
    </div> ";
   
    }
}

}


//function for clicking view cart
function viewCart(){
    global $con;
    
  
if(isset($_GET['product_id'])){
If(!isset($_GET['category']))

{
    if(!isset($_GET['brand'])){

        $product_details=$_GET['product_id'];
$Select_query="SELECT * FROM `products` WHERE Product_id= '$product_details' ";
$result_query=mysqli_query($con,$Select_query);


while($row=mysqli_fetch_assoc($result_query)){


  $product_id=$row['Product_id'];
  $product_title=$row['Product_title'];
  $product_description=$row['Product_description'];
  $product_image1=$row['Product_image1'];
  $product_image2=$row['Product_image2'];
  $product_image3=$row['Product_image3'];
  $product_price=$row['Product_price'];
  $category_id=$row['Categories_id'];
  $brand_id=$row['Brands_id'];

echo " <div class='col-md-4 '>
<div class='card'>
   <img src='./Images/$product_image1' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'> $product_title</h5>
       <p class='card-text'> $product_description</p>
       <p class='card-text'> Price: $product_price/-</p>
       <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add cart</a>
       <a href='index.php' class='btn btn-secondary'>Go Home</a>
    </div>
</div>
</div> 

<div class='col-md-8'>
    <div class='row'>
        <div class='col-md-12'>
            <h1 class='text-center text-primary'>Related products</h1>
    
        </div>

        <div class='col-md-6'>
        <img src='./Images/$product_image2' class='card-img-top' alt=' $product_title'>
        </div>
        <div class='col-md-6'>
        <img src='./Images/$product_image1' class='card-img-top' alt=' $product_title'>
        </div>
    </div>
</div>";
}
}

}
}

}


//getting IP address 
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

// dd to cart details
function cart(){
    global $con;

    if(isset($_GET['add_to_cart'])){
        $ip=getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
       // echo "<script>alert('$ip')</script>";
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip' AND product_id=$get_product_id ";

        $result_query=mysqli_query($con,$select_query);


        $num_of_rows=mysqli_num_rows($result_query);
       

if($num_of_rows>0){
            echo "<script>alert('This product is already present in the cart')</script>";
            $insert_query=" INSERT INTO `cart_details`(product_id,ip_address,quantity) VALUES ($get_product_id,'$ip',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('This product is added again in the cart')</script>";
            echo "<script>window.open('index.php','_self'.)</script>";
        }else{
            $insert_query=" INSERT INTO `cart_details`(product_id,ip_address,quantity) VALUES ($get_product_id,'$ip',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('This product is added to cart')</script>. ";
        
        }
       
    }
}


// function for countingnumbersof items in cart
function cart_item_num(){
    

    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip=getIPAddress();
       
       
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";

        $result_query=mysqli_query($con,$select_query);


        $num_of_items=mysqli_num_rows($result_query);
     
    }

else{ 
    global $con;
    $ip=getIPAddress();
   
   
    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";

    $result_query=mysqli_query($con,$select_query);


    $num_of_items=mysqli_num_rows($result_query);
        }
echo $num_of_items;
    }    


    // giving the total price of cart
    function totalPrice(){
        global $con;
        $ip=getIPAddress();
        $total_price=0;
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);

        while($row=mysqli_fetch_array( $result_query)){
            $user_product_id=$row['product_id'];
        $select_user_product="SELECT * FROM `products` WHERE Product_id=$user_product_id";
        $result_user_query=mysqli_query($con,$select_user_product);
        while($row1=mysqli_fetch_array($result_user_query)){

         $product_price=array($row1['Product_price']);
         
         $product_values=array_sum($product_price);
         
         $total_price+=$product_values;
        
        }
       
        }
        echo $total_price;
    }
?>


