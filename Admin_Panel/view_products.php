

    <h1 class="text-center text-success">View Products</h1>
    <table class="table table-bordered-mt-5 table-secondary">
        <thead class="table-info text-center">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
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

            while($row=mysqli_fetch_assoc($result_product)){
                
            }            
            ?>
        <tr class="text-center">
                <td>Product ID</td>
                <td>Product Title</td>
                <td>Product Image</td>
                <td>Product Price</td>
                <td>Total Sold</td>
                <td>Status</td>
                <td><a href="" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                <td><a href="" ><i class="fas fa-edit"></i></a></td>
            </tr>
        </tbody>
    </table>
