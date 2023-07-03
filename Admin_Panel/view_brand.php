<h1 class="text-center text-success">All Brands</h1>
<table class="table table-bordered mt-5 table-secondary">
<thead class="table-info text-center">
    <tr>
        <th>S.No</th>
        <th>Brands</th>
        <th>Delete</th>
        <th>Edit</th>
</tr>
    </thead>
<tbody>
    <?php
    $select_brand="SELECT * FROM `brands`";
    $result_bar=mysqli_query($con,$select_brand);
    $number=0;
    while($row_bar=mysqli_fetch_assoc($result_bar)){
        $Brands_id=$row_bar['Brands_id'];
        $Brand_type=$row_bar['Brand_type'];
        $number++;
    
    ?>

    <tr class="text-center">
        <td><?php echo $number;?></td>
        <td><?php echo $Brand_type?></td>
        <td><a href='index.php?delete_brands=<?php echo $Brands_id?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
            <td><a href='index.php?edit_brands=<?php echo $Brands_id?>'><i class='fas fa-edit'></i></a></td>    </tr>

        <?php
        }
        ?>
</tbody>
</table>