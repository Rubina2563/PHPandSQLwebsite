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

   .footer{
    position:absolute;
    bottom:0%;
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
       
        <nav class="navbar navbar-expand-lg ">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome guest</a>
                </li>
            </ul>
        </nav>

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
        <a href="#"><img src="../Images/laptop.png" alt="" class="imageAdmin m-2"></img></a>
        <p class="text-center">Admin panel</p></div>

        <div class="button text-center">
            <button class="m-2 rounded"><a href="..\inert_product.php" class="nav-link text-light bg-success p-3">Insert Products</a></button>
            <button class="m-2 rounded"><a href="" class="nav-link text-light bg-success p-3">View</a></button>
            <button class="m-2 rounded"><a href="index.php?insert_category" class="nav-link text-light bg-success p-3">Insert Categories</a></button>
            <button class="m-2 rounded"><a href="" class="nav-link text-light bg-success p-3">view Categories</a></button>
            <button class="m-2 rounded"><a href="index.php?insert_brand" class="nav-link text-light bg-success p-3">Insert Brands</a></button>
            <button class="m-2 rounded"><a href="" class="nav-link text-light bg-success p-3">Orders</a></button>
            <button class="m-2 rounded"><a href="" class="nav-link text-light bg-success p-3">All Payments</a></button>
            <button class="m-2 rounded"><a href="" class="nav-link text-light bg-success p-3">List User</a></button>
            <button class="m-2 rounded"><a href="" class="nav-link text-light bg-success p-3 ">Log out</a></button>
            
            
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


 <!---last child--->
 <div class="bg-primary p-3 text-center footer p-3 m-3">
<p>logout </p>
</div>

  <!----Bootstrap ajs link link---> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>