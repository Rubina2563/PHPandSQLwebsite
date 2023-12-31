<?php 
include('./Includes/connect.php');
include('../Functions/commonfunctions.php');
session_start();
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

     <style>
         .imageAdmin{
    width: 100px;
    padding:4px;
    object-fit: contain;
   }

   .product_image{
    width:10%;
   }
.fa-trash {
  color: black;
}
.fa-edit {
  color: black;
}
   

   body {
  overflow-x: hidden;
}
   </style>
    <title>Document</title>

</head>
<body>
  <!--first child -->
  <div class="container-fluid p-0 ">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid ">
        <img src="../Images/image2.png" alt="logo" class="logo"></img>
</div>
        
        </nav>

        
  </div>

 <!--second child -->
 <div class="bg-light p-2">
    <h3 class="text-center">Manage Details.</h3>
 </div>



 <!--third child -->
 <div class="row ">
    <div class="col-12 text-primary-emphasis bg-primary-subtle p-1 d-flex align-items-center">
        <div>
        
        
         
        <?php if(!isset($_SESSION['adminname'])){
  echo " <p class='text-center'><b>Welcome guests</b></a>
   </p>";
  }else{
   echo "<li class='nav-item '>
   <p class='text-center'><b>Welcome ".$_SESSION['adminname']."</b></a>
 </p>";
  }

       ?>
</div>
      

        <div class="button text-center">
        <button class="m-2 rounded"><a href="..\index.php" class="nav-link text-light bg-warning p-3">Home</a></button>
            <button class="m-2 rounded"><a href=".\inert_product.php" class="nav-link text-light bg-success p-3">Insert Products</a></button>
            <button class="m-2 rounded"><a href="index.php?view_products" class="nav-link text-light bg-success p-3">View Products</a></button>
            <button class="m-2 rounded"><a href="index.php?insert_category" class="nav-link text-light bg-success p-3">Insert Categories</a></button>
            <button class="m-2 rounded"><a href="index.php?view_categories" class="nav-link text-light bg-success p-3">view Categories</a></button>
            <button class="m-2 rounded"><a href="index.php?insert_brand" class="nav-link text-light bg-success p-3">Insert Brands</a></button>
            <button class="m-2 rounded"><a href="index.php?view_brands" class="nav-link text-light bg-success p-3">View Brands</a></button>
            <button class="m-2 rounded"><a href="index.php?list_orders" class="nav-link text-light bg-success p-3">All Orders</a></button>
            <button class="m-2 rounded"><a href="index.php?list_payments" class="nav-link text-light bg-success p-3">All Payments</a></button>
            <button class="m-2 rounded"><a href="index.php?list_users" class="nav-link text-light bg-success p-3">List User</a></button>
           
            <?php
            
       if(!isset($_SESSION['adminname'])){
        echo " <button class='m-2 rounded'>
           <a class='nav-link text-light bg-success p-3' href='.\admin_login.php'><b>Login</b></a>
         </button>";
        }else{
         echo " <button class='m-2 rounded'>
           <a class='nav-link text-light bg-success p-3' href='.\admin_logout.php'><b>Logout</b></a>
         </button>";
        }
            ?>
            
        </div>
    </div>
 </div>

 <!--fourth child-->
 <div class="container">
  <?php  if(isset($_GET['insert_category'])){
    include('insert_categories.php');
  }
  ?>
 </div>
 <!--fifth child-->
 <div class="container">
  <?php  if(isset($_GET['insert_brand'])){
    include('insert_brands.php');
  }
  ?>
 </div>


<!--sixth child-->
 
  <?php  if(isset($_GET['view_products'])){
    include('view_products.php');
  }
  ?>

<!--seventh child-->
<div class="container">
  <?php  if(isset($_GET['delete'])){
    include('delete.php');
  }
  ?>
 </div>
 
 <!--eigth child-->
 <div class="container">
  <?php  if(isset($_GET['edit'])){
    include('edit.php');
  }
  ?>
 </div>
 
<!--sixth child-->
<?php  if(isset($_GET['view_categories'])){
    include('view_category.php');
  }
  ?>


<?php  if(isset($_GET['view_brands'])){
    include('view_brand.php');
  }
  ?>

<?php  if(isset($_GET['edit_brands'])){
    include('edit_brand.php');
  }
  ?> 

<?php  if(isset($_GET['delete_brands'])){
    include('delete_brand.php');
  }
  ?> 

<?php  if(isset($_GET['edit_categories'])){
    include('edit_category.php');
  }
  ?> 

<?php  if(isset($_GET['delete_categories'])){
    include('delete_category.php');
  }
  ?> 

<?php  if(isset($_GET['list_orders'])){
    include('list_orders.php');
  }
  ?> 

<?php  if(isset($_GET['list_payments'])){
    include('list_payments.php');
  }
  ?> 
  
  <?php  if(isset($_GET['list_users'])){
    include('list_users.php');
  }
  ?>





<!---last child--->


<?php
include("../Functions/footer.php");
?>





  <!----Bootstrap ajs link link---> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>