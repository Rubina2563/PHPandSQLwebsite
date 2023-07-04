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
        <td><a href='index.php?delete_brands=<?php echo $Brands_id?>' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa fa-trash' aria-hidden='true'></i></a></td>
            <td><a href='index.php?edit_brands=<?php echo $Brands_id?>'><i class='fas fa-edit'></i></a></td>    </tr>

        <?php
        }
        ?>
</tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you ant to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_brands=<?php echo $Brands_id?>" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>