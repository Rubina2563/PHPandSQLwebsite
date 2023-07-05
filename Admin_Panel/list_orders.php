<?php
@session_start();
include('./Includes/connect.php');

//Select repeated vslues if any already present in database
if(!isset($_SESSION['username'])){
    include('admin_login.php');
   }
?>
<h3 class="text-center text-success">All Orders</h3>

<table class="table table-bordered mt-5 text-center table-secondary">
    <thead class="table-info text-center">
    <?php
$get_orders="SELECT * FROM `user_orders`";
$orders_result=mysqli_query($con,$get_orders);
$num_row=mysqli_num_rows($orders_result);



if($num_row==0){
    echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
}else{
    echo "  <tr> <th>S.No</th>
<th>Due Amount</th>
<th>Invoice Number</th>
<th>Total Product</th>
<th>Ordered Date</th>
<th>Status</th>

</tr>
</thead>
<tbody>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($orders_result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;

        echo "<tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$total_products</td>
        <td>$order_date</td>
        <td>$order_status</td>
       ";
    }
}
?>
       
            
        </tbody>

</table>