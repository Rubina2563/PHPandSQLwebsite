<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!----Bootstrap css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <!----Bootstrap awesome font link--->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---style.css-->
     <link rel="stylesheet" href="../style.css">

     <style>
   .image_property{
    width:500px;
    height:500px;
   }
   body{
    overflow-y:hidden;
   }
   
   </style>

</head>
<body>

<div class="container_fluid mb-3">
    <h2 class="text-center mb-3">Admin User</h2>
    <div class="row d-flex justify-content-center align-item-center">

        <div class="col-lg-6 col-xl-5">
            <img src="../Images/admin_reg.jpg" alt="Admin Registration" class="image-fluid image_property">
        </div>

        <div class="col-lg-6 col-xl-4">
            <form action="" method="POST">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label"><b>Username</b></label>
                    <input type="text" id="username" name="username" placeholder="Enter your name here" required="required" class="form-control w-70">
                </div>

                

                <div class="form-outline mb-4">
                    <label for="password" class="form-label"><b>Password</b></label>
                    <input type="password" id="password" name="password" placeholder="password" required="required" class="form-control w-70">
                </div>

                

                <div>
                    <input type="submit" value="Login" class="btn bg-primary text-light px-3 py-2" name="admin_registeration">
                    <p class="small fw-bold mt-2">Do you have already an account? <a href="admin_registration.php" class="text-primary">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>


    
</body>
</html>