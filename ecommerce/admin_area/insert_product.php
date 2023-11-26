<?php
include_once('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['description'];
    $product_Keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image tmp name

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking empty condition

    if($product_title == '' || $product_description == '' || $product_Keywords == '' || $product_category == '' 
    || $product_price == '' || $product_brands == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == ''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // insert query
        $insert_products = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id,
        product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', '$product_description',
        '$product_Keywords', '$product_category', '$product_brands', '$product_image1', '$product_image2', '$product_image3',
        '$product_price', NOW(), '$product_status')";
        
        $result_query = mysqli_query($connection, $insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the product')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert product-Admin</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
    
<div class="container mt-3">

<h1 class="text-center">Insert Products</h1>
<!-- //form// -->
<form action="" method="post" enctype="multipart/form-data">
    <!-- title -->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form-label">product title</label>
        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required>
    </div>
    <!-- description -->
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="description" class="form-label">product description</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product description" autocomplete="off" required>
    </div>
        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_keywords" class="form-label">product keywords</label>
        <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product keywords" autocomplete="off" required>
    </div>
    <!-- categories -->
    <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_category" id="" class="form-select">
            <option value="">select a category</option>
            <?php

$select_query = "SELECT * FROM categories ";
$result_query = mysqli_query($connection, $select_query);
while($row=mysqli_fetch_assoc($result_query)){
    $category_title=$row['category_title'];
    $category_id=$row['category_id'];
    echo "<option value='$category_id'>$category_title</option>";
}

            ?>
           
           
        </select>
           </div>
             <!-- brands -->
    <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_brands" id="" class="form-select">
        <option value="">select a brands</option>
        <?php

$select_query = "SELECT * FROM brands ";
$result_query = mysqli_query($connection, $select_query);
while($row=mysqli_fetch_assoc($result_query)){
    $brand_title=$row['brand_title'];
    $brand_id=$row['brand_id'];
    echo "<option value='$brand_id'>$brand_title</option>";
}

            ?>
           
        </select>
           </div>

            <!-- image1 -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label">product image1</label>
        <input type="file" name="product_image1" id="product_image1" class="form-control" required>
    </div>
      <!-- image2 -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image2" class="form-label">product image2</label>
        <input type="file" name="product_image2" id="product_image2" class="form-control" required>
    </div>
      <!-- image3 -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image3" class="form-label">product image3</label>
        <input type="file" name="product_image3" id="product_image3" class="form-control" required>
    </div>

     <!-- price -->
     <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_price" class="form-label">product price</label>
        <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product price" autocomplete="off" required>
    </div>
    <!-- price -->
    <div class="form-outline mb-4 w-50 m-auto">
 <input type="submit"  name="insert_product" class="btn btn-info mb-3 px-3" value="insert products">
   
    <button>
    <a href="../index.php"class="btn btn-info   px-3">Go Home</a>
    </button>
</div>

</form>

</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>/