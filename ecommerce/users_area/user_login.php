<?php
include_once('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
<style>
body{
    overflow-x:hidden;

}

</style>
</head>
<body>
    
<div class="container-fluid my-3">
    <h2 class="text-center"> User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
<div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
<div  class="form-outline mb-4">
<label for="user_username"class="form-label">username</label>
<input type="text" id="user_username" class="form-control"
placeholder="Enter your username" autocmplete="off" required="required" name="user_username"/>


</div>

<div  class="form-outline mb-4">
<label for="user_password"class="form-label">Password</label>
<input type="password" id="user_password" class="form-control"
placeholder="Enter your password" autocmplete="off" required="required" name="user_password"/>


</div>




<div class="mt-4 pt-2">

<input type="submit"value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
<p class="small fw-bold"> Dont have an account? <a href="user_reqistration.php" class="text-danger"> Reqister</a></p>
</div>

</form>


</div>

</div>
</div>


</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username'";
    $result = mysqli_query($connection, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    //cart item
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $select_cart = mysqli_query($connection, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart); // Fix variable name here

    if($row_count > 0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password, $row_data['user_password'])){
            if($row_count == 1 && $row_count_cart == 0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>
