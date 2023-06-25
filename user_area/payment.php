<?php
include('../Admin_Panel/Includes/connect.php');
include('../Functions/commonfunctions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
        <!----Bootstrap css link--->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <!----Bootstrap awesome font link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---style.css-->
</head>
<body>

<?php
$user_ip=getIPAddress();
$user_query="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
$user_result=mysqli_query($con,$user_query);
$data_fetch=mysqli_fetch_array($user_result);
$user_id=$data_fetch['user_id'];
?>
    <div class="container mb-3">
        <h1 class="text-center text-primary my-5"> Payment Options </h1>
        <div class="row">

            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../Images/payonline.jpg" alt=""></a>

             </div>

             <div class="col-md-6 align-items-center">
             <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center pt-5"> Pay Offline </h2></a>
              </div>
        </div>
    </div>

  
</body>
</html>