
<?php
include('./Includes/connect.php');

//Select repeated vslues if any already present in database

@session_start();


//Select repeated vslues if any already present in database
if(!isset($_SESSION['username'])){
    include('admin_login.php');
   }else{
    if(isset($_POST['insert_brand'])){

        $brand_type=$_POST['brand_items'];
    
        $select_query=" SELECT * FROM brands WHERE Brand_type='$brand_type'";
    $brand_selected=mysqli_query($con,$select_query);
    
    $numberB= mysqli_num_rows($brand_selected);
    
    if($numberB>0){
        echo "<script> alert('Brand already present')</script>"; 
    }else{
    
        $insert_Bquery= "INSERT INTO brands (Brand_type) VALUES ('$brand_type')";
    
        $result_B= mysqli_query($con,$insert_Bquery);
    
        if($result_B){
            echo "<script> alert('Brand  added successfully')</script>";
        }
    }
    }
    echo "<div class='container m-3'f>

    <h1 class='text-center p-2'>Insert Brands.</h1>
    <form action=' method='post' class='mb-2'f>
    <div class='input-group  w-90 mb-2'>
      <span class='input-group-text' id='basic-addon1'><i class='fa-solid fa-receipt'></i></span>
      <input type='text' class='form-control' name='brand_items' placeholder='Insert brands' aria-label='Insert brands' aria-describedby='basic-addon1'>
      
    </div>
    
    <div class='input-group  w-20 m-3'>
     
     <input type='submit' class='bg-primary p-3 rounded m-3' name='insert_brand' value='Insert brand' aria-label='Insert brand' aria-describedby='basic-addon1'>
    
    
    </div>
    
    </form>
    </div>";
   }
?>
