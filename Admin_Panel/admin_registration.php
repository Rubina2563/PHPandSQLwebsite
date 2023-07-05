<?php
include('.\Includes\connect.php');
?>
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
    <h2 class="text-center mb-3">Admin Registration</h2>
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
                    <label for="Email" class="form-label"><b>Email</b></label>
                    <input type="email" id="Email" name="Email" placeholder="Email" required="required" class="form-control w-70">
                </div>

                <div class="form-outline mb-4">
                    <label for="password" class="form-label"><b>Password</b></label>
                    <input type="password" id="password" name="password" placeholder="password" required="required" class="form-control w-70">
                </div>

                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label"><b>confirm password</b></label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required="required" class="form-control w-70">
                </div>

                <div>
                    <input type="submit"  name="admin" value="Register" class="btn bg-primary text-light px-3 py-2" >
                    <p class="small fw-bold mt-2">Do you have an account? <a href="admin_login.php" class="text-danger">Login</a></p>
                </div>
               
            </form>

            <?php

    if(isset($_POST['admin'])){
        $admin_username=$_POST['username'];
        $admin_mail=$_POST['Email'];
        $admin_password=$_POST['password'];
        $hashed_password=password_hash($admin_password,PASSWORD_DEFAULT);
        $admin_conf_password=$_POST['confirm_password'];
        
        echo "<script>alert{'first OK')</script>";
        //$user_ip=getIPAddress();

        //select query
        $select_admin="SELECT * FROM `admin_table` WHERE `admin_name`='$admin_username' AND `admin_email`='$admin_mail'";
        $selected_query=mysqli_query($con,$select_admin);
        $admin_num=mysqli_num_rows($selected_query);

        echo "<script>alert{'second OK')</script>";

        if( $admin_num>0){
            echo "<script>alert('Username and email already exist')</script>";
        }elseif($admin_password!=$admin_conf_password){
            echo "<script>alert('Password doesnot match with confirm password')</script>";
        }
        else{
        $insert_query="INSERT INTO `admin_table`(`admin_name`, `admin_email`, `admin_password`) VALUES ('$admin_username','$admin_mail','$hashed_password')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Data inserted successfully')</script>";
        }else{
            die(mysqli_error($con));
        }
    }

       
    }
?>
        </div>
    </div>
</div>

<!--admin registeration php code --> 
</body>
</html>


    
