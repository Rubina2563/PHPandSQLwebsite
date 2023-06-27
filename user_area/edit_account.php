<?php
if(isset($_GET['edit_account'])){

    $user_session_name=$_SESSION['username'];
    $select_query="SELECT * FROM `user_table` WHERE username='$user_session_name' ";
    $result_select=mysqli_query($con,$select_query);
    $result_fetch=mysqli_fetch_assoc($result_select);
    $user_id=$result_fetch['user_id'];
    $user_name=$result_fetch['username'];
    $user_email=$result_fetch['user_email'];
    $user_mobile=$result_fetch['user_mobile'];
    $user_address=$result_fetch['user_address'];



    if(isset($_POST['user_update'])){
    $update=$user_id;
    $user_name=$_POST['user_username'];
    $user_email=$_POST['email'];
    $user_mobile=$_POST['mobile'];
    $user_address=$_POST['address'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp,"./user_image/$user_image");
    

    //update query
    $update_data="UPDATE `user_table` SET`username`='$user_name',`user_email`='$user_email',`user_image`='$user_image',`user_address`='$user_address',`user_mobile`='$user_mobile' WHERE `user_id`=$update";
   
    $result_query_update=mysqli_query($con,$update_data);

if($result_query_update){
  echo  "<script>alert('Data updated successfully')</script>";
  echo  "<script>window.open('logout.php','_self')</script>";
}

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>

        .edit_image{
            width:100px;
            height:100px;
            object-fit:contain;
        }

        </style>
</head>
<body>
    <h3 class="text-success">Edit Account</h3>
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name ="user_username" value="<?php echo $user_name?>">
        </div>

        <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" name ="email" value="<?php echo $user_email?>">
        </div>

        <div class="form-outline mb-4 d-flex w-50 m-auto">
        <input type="file" class="form-control m-auto" name ="user_image">
        <img src=".\user_image\<?php echo $my_image?>" alt="profile image" class="edit_image">
            </div>

        <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name ="address" value="<?php echo $user_address?>">
        </div>

        <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name ="mobile" value="<?php echo $user_mobile?>">
        </div>

        <div class="form-outline mb-4">
        <input type="submit" class="bg-primary rounded p-2 text-light border-0" value="update" name ="user_update">
        </div>
    </form>
</body>
</html>