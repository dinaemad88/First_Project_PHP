<?php
include_once('../includes/connect.php');

if(isset($_POST["insert_brand"])) {
    $brand_title = $_POST["brand_title"];
    
    // Check if brand already exists
    $select_query = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
    $result_select = mysqli_query($connection, $select_query);
    $number = mysqli_num_rows($result_select);
    
    if($number > 0){
        echo "<script>alert('This brand is already present in the database')</script>";
    } else {
        // Insert the new brand
        $sql = "INSERT INTO brands (brand_id, brand_title) VALUES (NULL, '$brand_title')";
        
        if(mysqli_query($connection, $sql)){
            echo "<script>alert('Brand has been inserted successfully')</script>";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }
}
?>






<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title"
        placeholder="Insert Brands" aria-label="brands" aria-desribedby="basic-addon1">

</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class=" bg-info border-0 p-2 my-3"name="insert_brand"
        value="Insert Barnds" >


    
</div>
</form>