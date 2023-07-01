

    <h1 class="text-center text-success">View Products</h1>
    <table class="table table-bordered-mt-5 table-secondary">
        <thead class="table-info text-center ">
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
            <?php
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
            ?>
            <tr class='text-center'>
            <td><?php echo $number;?></td>
            <td><?php echo $Product_title;?></td>
            <td><img src='../Images/<?php echo $Product_image1?>' class='product_image'></td>
            <td><?php echo $Product_price?></td>
            <td>
                <?php
                $product_query="SELECT * FROM `order_pending` WHERE `product_id`=$Product_id";
$result_count=mysqli_query($con,$product_query);
$row_count=mysqli_num_rows($result_count);
echo $row_count;
                ?>
            </td>
            <td><?php echo $Product_status?></td>
            <td><a href='index.php?delete'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
            <td><a href='index.php?edit'><i class='fas fa-edit'></i></a></td>
        </tr>
        <?php
            }
            ?>
       
        </tbody>
    </table>
