<?php
include_once('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
<style>
img{
    width:60%;
    margin:auto;
    display:block;
}
    </style>
</head>
<body>

<!--php code to access user id -->

<?php
$user_ip=getIPAddress();
$get_user="Select * from  `user_table` where user_ip='$user_ip'";
$result=mysqli_query($connection,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];


?>
  <div class="container">
<h2 class="text-center text-info">payment options</h2>
<div class="row d-flex justify-content-center align-items-center my-5">
    <div class="col-md-6">
    <a href="https://www.paypal.com" target="_blank"><img src="../image/logo.jpg" alt=""></a>
</div>
<div class="col-md-6">
    <a href="order.php?user_id=<?php  echo $user_id ?>"><h2 class="text-center"> Pay offline</h2></a>
</div>
</div>

</div>
</body>
</html>