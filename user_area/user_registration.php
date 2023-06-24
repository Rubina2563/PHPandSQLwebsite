<?php
include('../Admin_Panel/Includes/connect.php');
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

?>

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
</head>
<body>
    <div class="container my-3">
        <h1 class="text-center">New User Resgistration</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6 mb-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!--username field-->
                        <label for="user_username" class="form-label"><strong>Username</strong></label>
                        <input type="text" id="user_username" class="form_control w-100" placeholder="Enter your name" autocomplete="off" 
                        name="user_username" required="required">
</div>
                    <div class="form-outline mb-4">
                         <!--email field-->
                         <label for="user_mail" class="form-label"><strong>User Email</strong></label>
                        <input type="email" id="user_mail" class="form_control w-100" placeholder="Enter your mail." autocomplete="off" 
                        name="user_mail" required="required">

                    </div>

                    <div class="form-outline mb-4">
                         <!--image field-->
                         <label for="user_image" class="form-label"><strong>User Image</strong></label>
                        <input type="file" id="user_image" class="form_control w-100" 
                        name="user_image" required="required">
                    </div>

                    <div class="form-outline mb-4">
                         <!--password field-->
                         <label for="user_password" class="form-label"><strong>User password</strong></label>
                        <input type="password" id="user_password" class="form_control w-100" placeholder="Enter your password." autocomplete="off" 
                        name="user_password" required="required">

                    </div>

                    <div class="form-outline mb-4">
                         <!--confirm password field-->
                         <label for="user_conf_password" class="form-label"><strong>Confirm password</strong></label>
                        <input type="password" id="user_conf_password" class="form_control w-100" placeholder="Enter your password again." autocomplete="off" 
                        name="user_conf_password" required="required">

                    </div>

                    <div class="form-outline mb-4">
                         <!--Address field-->
                         <label for="user_address" class="form-label"><strong>User Address</strong></label>
                        <input type="text" id="user_address" class="form_control w-100" placeholder="Enter your address." autocomplete="off" 
                        name="user_address" required="required">

                    </div>

                    <div class="form-outline mb-4">
                         <!--Contact field-->
                         <label for="user_contact" class="form-label"><strong>User Contact</strong></label>
                        <input type="type" id="user_contact" class="form_control w-100" placeholder="Enter your contact number." autocomplete="off" 
                        name="user_contact" required="required">
<p class="small fw-bold mt-2 pt-1">Already have an account ?<a href="userlogin.php" class="text-danger text-decoration-none"> login</a></p>
                    </div>
                    <div class="mt-1 pt-2">
                        <input type="submit" value="Register" name="user_register" class="bg-primary text-light border-0 rounded p-2 ">
                    </div>
                </form>
            </div>
        </div>

    </div>


    <?php
    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_mail=$_POST['user_mail'];
        $user_password=$_POST['user_password'];
        $hashed_password=password_hash($user_password,PASSWORD_DEFAULT);
        $user_conf_password=$_POST['user_conf_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        //select query
        $select_user="SELECT * FROM `user_table` WHERE `username`='$user_username' AND `user_email`='$user_mail'";
        $selected_query=mysqli_query($con,$select_user);
        $user_num=mysqli_num_rows($selected_query);

        move_uploaded_file($user_image_tmp,'./user_image/$user_image');

        if( $user_num>0){
            echo "<script>alert('Username and email already exist')</script>";
        }elseif($user_password!=$user_conf_password){
            echo "<script>alert('Password doesnot match with confirm password')</script>";
        }
        else{
        $insert_query="INSERT INTO `user_table`(`username`, `user_email`, `user_passord`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES ('$user_username','$user_mail','$hashed_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Data inserted successfully')</script>";
        }else{
            die(mysqli_error($con));
        }}

        
        $select_cart_items="SELECT * FROM `cart_details` WHERE ip_address='$user_ip' ";
        $cart_item_query=mysqli_query($con,$select_cart_items);
        $items_num=mysqli_num_rows($cart_item_query);

        if($items_num>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in cart')</script>"; 
            echo "<script>window.open('checkout.php','-self')</script>";
        }else{
            echo "<script>window.open('..index.php','-self')</script>";
        }
    }


    ?>
</body>
</html>