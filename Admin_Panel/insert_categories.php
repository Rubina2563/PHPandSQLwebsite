

<?php
@session_start();
include('./Includes/connect.php');

//Select repeated vslues if any already present in database
if(!isset($_SESSION['username'])){
    include('admin_login.php');
   }else{
    if(isset($_POST['insert_cat'])){

        $category_type=$_POST['cat_items'];
    
        $select_query=" SELECT * FROM categories WHERE Categories_type='$category_type'";
    $selected=mysqli_query($con,$select_query);
    
    $number= mysqli_num_rows($selected);
    
    if($number>0){
        echo "<script> alert('Category already present')</script>"; 
    }else{
    
        $insert_query= "INSERT INTO categories (Categories_type) VALUES ('$category_type')";
    
        $result= mysqli_query($con,$insert_query);
    
        if($result){
            echo "<script> alert('Category  added successfully')</script>";
        }
    }
    }


    echo "<div class='container m-3'>
    <h1 class='text-center p-2'>Insert Categories.</h1>
<form action='' method='post' class='mb-2'>
<div class='input-group  w-90 mb-2'>
  <span class='input-group-text' id='basic-addon1'><i class='fa-solid fa-receipt'></i></span>
  <input type='text' class='form-control' name='cat_items' placeholder='Insert categories' aria-label='Insert categories' aria-describedby='basic-addon1'>
  
</div>

<div class='input-group  w-20 m-3'>
 
 <input type='submit' class='bg-primary p-3 rounded m-3' name='insert_cat' value='Insert categories' aria-label='Username' aria-describedby='basic-addon1'>


</div>

</form>
</div>";
   }?>

