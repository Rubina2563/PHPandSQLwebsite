
<?php
include('../Admin_Panel/Includes/connect.php');
session_start();
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
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!---navbar---->
<div class="container-fluid"></div>

<!-- copiednavbar-brand from bootstrap-->
<nav class="navbar navbar-expand-lg  bg-primary">
  <div class="container-fluid">
  <img src="../Images/image2.png" alt="logo" class="logo"></img>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        
      </ul>


 

    </div>
  </div>
</nav>
<!--second child-->


<nav class="navbar navbar-expand-lg  bg-primary mt-1" >
    <ul class="navbar-nav me-auto">

    <li class="nav-item ">
        <!--this "welcome guest " will change to "welcome name" when some login"-->
          <a class="nav-link" href="#"><b>Welcome guests</b></a>
        </li>

        
        <?php
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
<div class="bg-light">
    <h1 class="text-center">Its my store.</h1>
    <p class="text-center">Have your all item from from all favotite brands at one plce.</p>
</div>


<!--fourth child-->
<div class="row">
  <div class="col-md-12">
    <?php
       if(!isset($_SESSION['username'])){
        include('userlogin.php');
       }else{
        include('payment.php');
       }
       ?>
    <div class="row">





</div>
     
    </div>
</div>



<!--last child-->

<?php
include("../Functions/footer.php");
?>

    <!----Bootstrap ajs link link---> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>