<?php
@session_start();
include('./Includes/connect.php');

//Select repeated vslues if any already present in database
if(!isset($_SESSION['adminname'])){
    include('admin_login.php');
   }else{
    echo "
    <h3 class='text-center text-success'>All Payments</h3>

<table class='table table-bordered mt-5 text-center table-secondary'>
    <thead class='table-info text-center'>";
    $get_payments="SELECT * FROM `user_payments`";
    $payments_result=mysqli_query($con,$get_payments);
    $num_row_pay=mysqli_num_rows($payments_result);
    
    if($num_row_pay==0){
        echo "<h2 class='text-danger text-center mt-5'>No payments yet</h2>";
    }else{
        echo "  <tr> <th>S.No</th>
    
    <th>Invoice Number</th>
    <th>Amount</th>
    <th>Payment mode</th>
    <th>Ordered Date</th>
    
    </tr>
    </thead>
    <tbody>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($payments_result)){
            $order_id=$row_data['order_id'];
            $payment_id=$row_data['payment_id'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $payment_made=$row_data['payment_made'];
            $date=$row_data['date'];
            
            $number++;
    
            echo "<tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_made</td>
            <td>$date</td>";
        }
    }

    echo "</tbody>

    </table>
    ";
   }?>


       
