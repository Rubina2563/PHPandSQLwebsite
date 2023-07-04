<h3 class="text-center text-success">All Users</h3>

<table class="table table-bordered mt-5 text-center table-secondary">
    <thead class="table-info text-center">
    <?php
$get_users="SELECT * FROM `user_table`";
$users_result=mysqli_query($con,$get_users);
$num_row=mysqli_num_rows($users_result);



if($num_row==0){
    echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
}else{
    echo "  <tr> <th>S.No</th>
<th>User Namet</th>
<th>User Email</th>
<th>User Image</th>
<th>User Address</th>
<th>User Mobile</th>
<th>Delete</th>
</tr>
</thead>
<tbody>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($users_result)){
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
       
        $number++;

        echo "<tr>
        <td>$number</td>
       
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../Images/$user_image' alt='$username' class='product_image'></td>
        <td>$user_address</td>
        <td> $user_mobile</td>
        <td><a href='' class='text-center'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
    </tr>";
    }
}
?>
       
            
        </tbody>

</table>