<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<?php
$username=$_SESSION['username'];
$order_query="SELECT * FROM `user_table` WHERE `username`='$username' ";
$order_result=mysqli_query($con,$order_query);
$row_fetch_orders=mysqli_fetch_assoc($order_result);
$user_order_id=$row_fetch_orders['user_id'];
?>
    <h3 class="text-success p-3">All my orders</h3>
    <table class="table table-bordered m-auto">
       <thead>
    <tr>

       <th>S.No</th>
        <th>Amount Due </th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
        
        </tr> 
        </thead>
        <tbody>

        <?php
        $get_user_details="SELECT * FROM `user_orders` WHERE `user_id`=$user_order_id";
        $detail_query=mysqli_query($con,$get_user_details);
          $number=1;
        while($row_details=mysqli_fetch_assoc($detail_query)){
            $order_id=$row_details['order_id'];
            $Amount_due=$row_details['amount_due'];
            $Total_products=$row_details['total_products'];
            $Invoice_number=$row_details['invoice_number'];
            $date=$row_details['order_date'];
            $status=$row_details['order_status'];
            if($status=='pending'){
                $status='Incomplete';
            }else{
                $status='Complete';
            }
            
            echo " <tr>
            <td>$number</td>
            <td>$Amount_due</td>
            <td>$Total_products</td>
            <td>$Invoice_number</td>
            <td>$date</td>
            <td>$status</td>";

        ?>
        <?php

        if($status=='Complete'){
        echo "<td>Paid</td></tr>";
        }else{
echo "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>
</tr>";
        }
        $number++;
    }
        ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>