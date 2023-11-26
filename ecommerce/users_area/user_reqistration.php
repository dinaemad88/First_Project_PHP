
<?php
include_once('../includes/connect.php');
include('../functions/common_function.php');


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
</head>
<body>
    
<div class="container-fluid my-3">
    <h2 class="text-center">New User Reg</h2>
    <div class="row d-flex align-items-center justify-content-center">
<div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
<div  class="form-outline mb-4">
<label for="user_username"class="form-label">username</label>
<input type="text" id="user_username" class="form-control"
placeholder="Enter your username" autocmplete="off" required="required" name="user_username"/>


</div>
<div  class="form-outline mb-4">
<label for="user_email"class="form-label">email</label>
<input type="email" id="user_email" class="form-control"
placeholder="Enter your email" autocmplete="off" required="required" name="user_email"/>


</div>
<div  class="form-outline mb-4" >
<label for="user_image"class="form-label">image</label>
<input type="file" id="user_image" class="form-control"
 required="required" name="user_image"/>


</div>
<div  class="form-outline mb-4">
<label for="user_password"class="form-label">Password</label>
<input type="password" id="user_password" class="form-control"
placeholder="Enter your password" autocmplete="off" required="required" name="user_password"/>


</div>

<div  class="form-outline mb-4">
<label for="conf_user_password"class="form-label">Confirm Password</label>
<input type="password" id="conf_user_password" class="form-control"
placeholder="confirm password" autocmplete="off" required="required" name="conf_user_password"/>


</div>
<div  class="form-outline mb-4">
<label for="user_address"class="form-label">Address</label>
<input type="text" id="user_address" class="form-control"
placeholder="Enter your address" autocmplete="off" required="required" name="user_address"/>
</div>

<div  class="form-outline mb-4">
<label for="user_contact"class="form-label">Contact</label>
<input type="text" id="user_contact" class="form-control"
placeholder="Enter your mobile num" autocmplete="off" required="required" name="user_contact"/>
</div>

<div class="mt-4 pt-2">

<input type="submit"value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
<p class="small fw-bold"> Already have an account?<a href="user_login.php" class="text-danger"> Login</a></p>
</div>

</form>


</div>

</div>
</div>



</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();


    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($connection,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count >0){
        echo"<script> alert('Username  and email already exist')</script>";
    }elseif ($user_password!=$conf_user_password){
        echo"<script> alert('passwords do not match')</script>";

    } 
    
    
    else{
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
$insert_query="insert into `user_table`(username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
$sql_execute = mysqli_query($connection, $insert_query);

    }

    //select cart items









}






?>