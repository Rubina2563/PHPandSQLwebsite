<?php 
include('../Admin_Panel/Includes/connect.php');
include('../Functions/commonfunctions.php');
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <!----Bootstrap css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <!----Bootstrap awesome font link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---style.css-->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x:hidden;
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
    <?php
cart();
?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="..\index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="..\display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="..\cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_num();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php totalPrice(); ?>/-</a>
        </li>
      </ul>


      <form class="d-flex" action ="../search_product.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
        <input type="submit" value="Search" class="btn bg-success btn-outline-light" name="search_data_product">

      </form>


    </div>
  </div>
</nav>
<!--second child-->


<nav class="navbar navbar-expand-lg  bg-primary mt-1" >
    <ul class="navbar-nav me-auto">



        <?php

if(!isset($_SESSION['username'])){
  echo " <li class='nav-item '>
  <a class='nav-link' href='#'><b>Welcome guests</b></a>
   </li>";
  }else{
   echo "<li class='nav-item '>
   <a class='nav-link' href='#'><b>Welcome ".$_SESSION['username']."</b></a>
 </li>";
  }

       if(!isset($_SESSION['username'])){
       echo " <li class='nav-item '>
          <a class='nav-link' href='.\userlogin.php'><b>Login</b></a>
        </li>";
       }else{
        echo " <li class='nav-item '>
        <a class='nav-link' href='.\logout.php'><b>Log out</b></a>
      </li>";
       }
       ?>

    </ul>
</nav>
<!--third child-->
<div class="bg-light ">
    <h1 class="text-center">Its my store.</h1>
    <p class="text-center mb-0">Have your all item from from all favotite brands at one plce.</p>
</div>

<!--fourth child-->
<div class="row">
    <div class="col-md-2 p-0 ">
        <ul class="navbar-nav bg-secondary text-center">
        <li class="nav-item bg-primary">
          <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
        </li>

        <?php
        $username=$_SESSION['username'];
        $user_image_query="SELECT * FROM `user_table` WHERE username='$username' ";
        $image_query_result=mysqli_query($con,$user_image_query);
        $row_data=mysqli_fetch_array($image_query_result);
        $my_image=$row_data['user_image'];

        echo "<li class='nav-item bg-secondary'>
        <img class='profile_image' src='./user_image/$my_image' alt='profile image'>
      </li> ";
        
        ?>

        

        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php">Pending orders</a>
        </li>  

        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?edit_account">Edit account</a>
        </li>  

        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?my_orders">My orders</a>
        </li>  

        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?delete_account">Delete account</a>
        </li>  

        <li class="nav-item ">
          <a class="nav-link text-light" href=".\logout.php">Logout</a>
        </li>  
        </ul>
    </div>
    <div class="col-md-10 text-center">
        <?php get_user_orders_details();
        
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }

        if(isset($_GET['my_orders'])){
            include('user_orders.php');
        }
        if(isset($_GET['delete_account'])){
          include('delete_account.php');
      }
        ?>
    </div>
</div>

<?php
include("../Functions/footer.php");
?>

    <!----Bootstrap ajs link link---> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>