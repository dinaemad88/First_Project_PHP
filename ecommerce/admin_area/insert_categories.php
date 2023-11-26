
<?php
include_once('../includes/connect.php');

if(isset($_POST["insert_cat"])) {
    $category_title = $_POST["cat_title"];
    
    // Check if category already exists
    $select_query = "SELECT * FROM categories WHERE category_title = '$category_title'";
    $result_select = mysqli_query($connection, $select_query);
    $number = mysqli_num_rows($result_select);
    
    if($number > 0){
        echo "<script>alert('This category is already present in the database')</script>";
    } else {
        // Insert the new category
        $sql = "INSERT INTO categories (category_id, category_title) VALUES (NULL, '$category_title')";
        
        if(mysqli_query($connection, $sql)){
            echo "<script>alert('Category has been inserted successfully')</script>";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }
}

?>



<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title"
        placeholder="Insert categories" aria-label="Username" aria-desribedby="basic-addon1">

</div>
<div class="input-group w-10 mb-2 m-auto">
      <input type="submit" class="bg-info  border-o p-2 my-3"name="insert_cat"
        value="Insert Categories" aria-label="Username"
        aria-describedby="basic-addon1" class="bg-info">


</div>
</form>