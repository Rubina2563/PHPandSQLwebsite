
<?php
@session_start();
include('./Includes/connect.php');

//Select repeated vslues if any already present in database
if(!isset($_SESSION['username'])){
    include('admin_login.php');
   }else{
    echo "<h1 class='text-center text-success'>All Categories</h1>
    <table class='table table-bordered mt-5 table-secondary'>
    <thead class='table-info text-center'>
        <tr>
            <th>S.No</th>
            <th>Category</th>
            
            <th>Edit</th>
    </tr>
        </thead>
    <tbody>";

    
    $select_category='SELECT * FROM `categories`';
    $result_cat=mysqli_query($con,$select_category);
    $number=0;
    while($row_cat=mysqli_fetch_assoc($result_cat)){
        $Categories_id=$row_cat['Categories_id'];
        $Categories_type=$row_cat['Categories_type'];
        $number++;

        echo "<tr class='text-center'>
   <td>$number</td>
   <td>$Categories_type</td>
   
   <td><a href='index.php?edit_categories=$Categories_id'><i class='fas fa-edit'></i></a></td></tr>";
   }

   echo "</tbody>
   </table>";
   
  }
  
?>

   

    


