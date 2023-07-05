
<?php
@session_start();
include('./Includes/connect.php');

//Select repeated vslues if any already present in database
if(!isset($_SESSION['username'])){
    include('admin_login.php');
   }else{
    echo "<h1 class='text-center text-success'>View Products</h1>
    <table class='table table-bordered-mt-5 table-secondary'>
        <thead class='table-info text-center'>
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th >Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
       
        <tbody>
        
        ";
        $product_query="SELECT * FROM `products`";
            $result_product=mysqli_query($con,$product_query);
$number=0;
            while($row=mysqli_fetch_assoc($result_product)){
                $Product_id=$row['Product_id'];
                $Product_title=$row['Product_title'];
                $Product_price=$row['Product_price'];
                $Product_image1=$row['Product_image1'];
                $Product_status=$row['Product_status'];
               
            $number++;
   

   echo "<tr class='text-center'>
   <td>$number</td>
   <td>$Product_title</td>
   <td><img src='../Images/$Product_image1' class='product_image'></td>
   <td>$Product_price</td>
   <td>";

   $product_query="SELECT * FROM `order_pending` WHERE `product_id`=$Product_id";
   $result_count=mysqli_query($con,$product_query);
   $row_count=mysqli_num_rows($result_count);
   echo $row_count;
   echo " </td>
   <td>$Product_status</td>
   <td><a href='index.php?delete=$Product_id'  type='button' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
   <td><a href='index.php?edit=$Product_id'><i class='fas fa-edit'></i></a></td>
</tr>";
   }
   echo "
   </tbody>
   </table>

   <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
 <div class='modal-dialog' role='document'>
 
 <div class='modal-content'>
      
      <div class='modal-body'>
        <h4>Are you sure you ant to delete this?</h4>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'><a href='./index.php?view_products' class='text-light text-decoration-none'>No</a></button>
        <button type='button' class='btn btn-primary'><a href='index.php?delete=$Product_id' class='text-light text-decoration-none'>Yes</a></button>
      </div>
    </div>
  </div>
</div>";}?>

