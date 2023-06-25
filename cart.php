<?php 
include('Admin_Panel\Includes\connect.php');
include('Functions\commonfunctions.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website Project1</title>
    <!----Bootstrap css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <!----Bootstrap awesome font link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---style.css-->
    <link rel="stylesheet" href="style.css">
    <style>
         .cart_image{
    width: 80px;
    height: 80px;
    object-fit: contain;
  }
    </style>
</head>

<body>
    <!---navbar---->
<div class="container-fluid"></div>

<!-- copiednavbar-brand from bootstrap-->
<nav class="navbar navbar-expand-lg  bg-primary">
  <div class="container-fluid">
  <img src="./Images/image2.png" alt="logo" class="logo"></img>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_area\user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_num();?></sup></a>
        </li>
       
      </ul>



    </div>
  </div>
</nav>
<!--second child-->

<?php
cart();
?>
<nav class="navbar navbar-expand-lg  bg-primary mt-1" >
    <ul class="navbar-nav me-auto">

    <li class="nav-item ">
        <!--this "welcome guest " will change to "welcome name" when some login"-->
          <a class="nav-link" href="#"><b>Welcome guests</b></a>
        </li>

        <li class="nav-item">
        <!--this "Login " will change to "llog out" when some login"-->
          <a class="nav-link" href="./user_area/userlogin.php">Login</a>
        </li>

    </ul>
</nav>
<!--third child-->
<div class="bg-light">
    <h1 class="text-center">Its my store.</h1>
    <p class="text-center">Have your all item from from all favotite brands at one plce.</p>
</div>


<!--fourth child-->
<div class="container">
    <div class="row">
        <form action="" method="POST">
        <table class="table table-bordered text-center">
           
          
<?php
         global $con;
         $ip=getIPAddress();
         $total_price=0;
         $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
         
         $result_query1=mysqli_query($con,$select_query);
         $result_Num_row=mysqli_num_rows($result_query1);

 if($result_Num_row){
  echo " <thead>
  <tr>
      <th>Product Title</th>
      <th>Product Image</th>
      <th>Quantity</th>
      <th>Total Price</th>
      <th>Remove</th>
      <th colspan='2'>Operations</th>
  </tr>
</thead>
<tbody>";
         while($row=mysqli_fetch_array($result_query1)){
             $user_product_id=$row['product_id'];
         $select_user_product="SELECT * FROM `products` WHERE Product_id=$user_product_id";
         $result_user_query=mysqli_query($con,$select_user_product);
         while($row1=mysqli_fetch_array($result_user_query)){
 
          $product_price=array($row1['Product_price']);
          $product_title=$row1['Product_title'];
         $product_image1=$row1['Product_image1'];
         $price=$row1['Product_price'];
          
          $product_values=array_sum($product_price);
          
          $total_price+=$product_values;
      
        
    
        ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img class="cart_image" src="./Images/<?php echo $product_image1?>" alt=""></td>
                   <td><form action="" method="POST"><input type="number" id="quantity" name="quantity" min="1" max="100" step="1" class="form-input w-50"></form></td>
                  <?php
                  $get_ip=getIPAddress();
                  if(isset($_POST['update_cart'])){
                    $Quantity=$_POST['quantity'];
                    $update_cart="UPDATE `cart_details` SET `quantity`=$Quantity WHERE `ip_address`='$get_ip' ";
                    $result_query=mysqli_query($con, $update_cart);
                    $total_price= $total_price*(int)$Quantity;
                  }
                  ?>
                    <td><?php echo $price ?>/-Quantity  </td>
                    <td><input type="checkbox" name="items[]" value="<?php echo $user_product_id ;?>"></td>
                    <td>
                     <!--  <button class="bg-primary rounded p-3 mx-3">Update</button>-->
                        <input type="submit" value="Update Cart" name="update_cart" class="bg-primary rounded p-3 mx-3" >
                        <input type="submit" value="Remove" name="remove_cart" class="bg-primary rounded p-3 mx-3" >
                      
                    </td>
                </tr>
                
        
                <?php 
          } }}
         else{
          echo "<h1 class='text-center text-danger'>Cart is empty.</h1>";
         }
            ?>
               
 
            
            </tbody>
         
        </table>
      
</div>

   
<!--subtotal -->
<div class="d-flex">
  <?php
  global $con;
  $ip=getIPAddress();
 
  $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
  
  $result_query1=mysqli_query($con,$select_query);
  $result_Num_row1=mysqli_num_rows($result_query1);

if($result_Num_row1>0){
  echo " <h4 class='p-3'>Subtotal:<strong class='text-primary'>$total_price</strong></h4>
  <button type='submit' class='bg-primary text-light rounded p-3 m-3'><a class ='text-light text-decoration-none' href='index.php'>Continue Shopping</a></button>
  
  <button type='submit' class='bg-secondary text-light rounded p-3 m-3'><a class ='text-light text-decoration-none' href='./user_area/checkout.php'>Checkout</a></button>";
}else{
  echo " <button type='submit' class='bg-primary text-light rounded p-3 m-3'><a class ='text-light text-decoration-none' href='index.php'>Continue Shopping</a></button>";
}

if(isset($_POST['Continue_Shopping'])){
  echo "<script>window.open('index.php','_self')</script>";
}
  ?>
    
        </div>
</div>
</form>
<!--function to delete item-->
<?php
function removeItem(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['items'] as $removeId){
      echo $removeId;
      $delete_query="DELETE FROM `cart_details` WHERE product_id =$removeId";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}

echo $remove_item=removeItem();
?>


<!--last child-->


<?php
include("./Functions/footer.php");
?>

    <!----Bootstrap ajs link link---> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>