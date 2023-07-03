
<h1 class="text-center text-success">All Categories</h1>
<table class="table table-bordered mt-5 table-secondary">
<thead class="table-info text-center">
    <tr>
        <th>S.No</th>
        <th>Category</th>
        <th>Delete</th>
        <th>Edit</th>
</tr>
    </thead>
<tbody>
    <?php
    
    $select_category="SELECT * FROM `categories`";
    $result_cat=mysqli_query($con,$select_category);
    $number=0;
    while($row_cat=mysqli_fetch_assoc($result_cat)){
        $Categories_id=$row_cat['Categories_id'];
        $Categories_type=$row_cat['Categories_type'];
        $number++;
    
    ?>

    <tr class="text-center">
        <td><?php echo $number;?></td>
        <td><?php echo $Categories_type?></td>
        <td><a href='index.php?delete_categories=<?php echo $Categories_id?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
        <td><a href='index.php?edit_categories=<?php echo $Categories_id?>'><i class='fas fa-edit'></i></a></td>    </tr>

        <?php
        }
        ?>
</tbody>
</table>