<?php
include('../Admin_Panel/Includes/connect.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    //echo $order_id;
    $select_data="SELECT * FROM `user_orders` WHERE `order_id`=$order_id";
    $result_select=mysqli_query($con,$select_data);
    $select_row=mysqli_fetch_assoc($result_select);
    $invoice_number=$select_row['invoice_number'];
    $amount_due=$select_row['amount_due'];
}


if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount_due=$_POST['amount'];
    $payment_mode=$_POST['payment-mode'];
    $insert_query="INSERT INTO `user_payments`(`order_id`, `invoice_number`, `amount`, `payment_made`) VALUES ($order_id,$invoice_number,$amount_due,'$payment_mode')";
    $reult_insert=mysqli_query($con,$insert_query);

    if($reult_insert){
        echo "<h3 class='text-center text-light'>Successfully completed the payment.</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $update_query="UPDATE `user_orders` SET `order_status`='Complete' WHERE `order_id`=$order_id";
    $result_update=mysqli_query($con,$update_query);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!--bootsrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body class="bg-secondary">
    <div class="container my-5 w-50">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
       
        <div class="form-outline text-center my-4">
            
        <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number; ?>">
        </div>

        <div class="form-outline text-center my-4">
            <label for="amount_due" class="text-light">Amount</label>
        <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due; ?>">
        </div>
        <div class="form-outline text-center my-4">
           <select name="payment-mode" class="form-select w-50 m-auto">
            <option >Select Payment Mode</option>
            <option >UPI</option>
            <option >Net Banking</option>
            <option >Paypal</option>
            <option >Cash offline</option>
           </select>
        </div>

        <div class="form-outline text-center my-4">
        <input type="submit" class="border-0 rounded bg-primary m-auto" value="Confirm" name="confirm_payment">
        </div>
        </form>
    </div>
    
</body>
</html>