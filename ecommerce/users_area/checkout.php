
<?php
include_once('../includes/connect.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce -checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_reqistration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

</ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search"
         placeholder="Search" aria-label="Search" name="search_data"  >
<!--         <button class="btn btn-outline-light" type="submit">Search</button>
 -->     

<input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product" > 
</form>
    </div>
  </div>
</nav>

<!--calling cart function-->



<!-- Secend child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">
<li class="nav-item">
    <a class="nav-link" href="#">Welcom Guest</a>
</li>
<?php
if(!isset($_SESSION['username'])){
  echo"<li class='nav-item'>
  <a class='nav-link' href='./user_login.php'>Login</a>
</li>";
}else{
  echo"<li class='nav-item'>
  <a class='nav-link' href='logout.php'>Logout</a>
</li>";
}


?>

</ul>

</nav>
<!--third child-->

<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and community</p>
</div>

<!--fourth child-->
<div class="row px-1">
<div class="col md-12">
<div class="row">
<?php
if(!isset($_SESSION['username'])){
include('user_login.php');
}else{
    include('../payment.php');  
}
?>
<!--row end -->
</div>
</div>


</div>
 <div class="bg-info p-3 text-center">
    <p>All rights reserved Designed  by Dina  2023</p>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>