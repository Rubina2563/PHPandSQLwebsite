<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
     <!----Bootstrap css link--->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <!----Bootstrap awesome font link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---style.css-->
    <link rel="stylesheet" href="style.css">
    <?php
include('../Admin_Panel/Includes/connect.php');
include('../Functions/commonfunctions.php');
?>
</head>
<body>
    <div class="container my-3">
        <h1 class="text-center">User Login</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6 mb-3">
                <form action="" method="POST" enctype="multipart/form-data">
                      <!--username field-->
                    <div class="form-outline mb-4"> 
                        <label for="user_username" class="form-label"><strong>Username</strong></label>
                        <input type="text" id="user_username" class="form_control w-100" placeholder="Enter your name" autocomplete="off" 
                        name="user_username" required="required">
                      </div>
                
                        <!--password field-->
                    <div class="form-outline mb-4">
                         <label for="user_password" class="form-label"><strong>User password</strong></label>
                        <input type="password" id="user_password" class="form_control w-100" placeholder="Enter your password." autocomplete="off" 
                        name="user_password" required="required">
                    </div>

                    <!--last block-->
                    <div class="mt-1 pt-2">
                        <input type="submit" value="Login" name="user_login" class="bg-primary text-light border-0 rounded p-2 ">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account ?
     <a href="user_registration.php" class="text-danger text-decoration-none">Register</a></p>
                    </div>

                </form>
            </div>
        </div>

    </div>
</body>
</html>

<?php
if(isset($_POST['user_login'])){
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];

$select_query="SELECT * FROM `user_table` WHERE username='$user_username' ";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();

//cart items
$select_query1="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
$result1=mysqli_query($con,$select_query1);
$row_count1=mysqli_num_rows($result1);

if($row_count>0){
if(password_verify($user_password,$row_data['user_passord'])){
   // echo "<script>alert('login successfully')</script>";  
   if($row_count==1 and $row_count1==0){
    echo "<script>alert('login successfully')</script>";  
    echo "<script>window.open('profile.php','_self')</script>";  
   }else{
    echo "<script>alert('login successfully')</script>";  
    echo "<script>window.open('payment.php','_self')</script>";  
   }
   
}else{
    echo "<script>alert('Invalid credentials')</script>";   
}
}else{
    echo "<script>alert('Invalid creddentials')</script>"; 
}

}
?>