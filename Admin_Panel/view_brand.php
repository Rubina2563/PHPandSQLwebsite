<?php
@session_start();
include('./Includes/connect.php');

//Select repeated vslues if any already present in database
if(!isset($_SESSION['adminname'])){
    include('admin_login.php');
   }else{
    echo "<h1 class='text-center text-success'>All Brands</h1>
    <table class='table table-bordered mt-5 table-secondary'>
    <thead class='table-info text-center'>
        <tr>
            <th>S.No</th>
            <th>Brands</th>
            
            <th>Edit</th>
    </tr>
        </thead>
    <tbody>";
   
    $select_brand="SELECT * FROM `brands`";
    $result_bar=mysqli_query($con,$select_brand);
    $number=0;
    while($row_bar=mysqli_fetch_assoc($result_bar)){
        $Brands_id=$row_bar['Brands_id'];
        $Brand_type=$row_bar['Brand_type'];
        $number++;

        echo "<tr class='text-center'>
        <td>$number</td>
        <td>$Brand_type</td>
       
            <td><a href='index.php?edit_brands=$Brands_id'><i class='fas fa-edit'></i></a></td></tr>";
    }
         echo "</tbody>
</table>";
    }?>


   




