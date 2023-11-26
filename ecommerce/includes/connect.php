<?php
$connection= mysqli_connect('localhost','root','','Mystore');
if($connection){
    //die(mysqli_error($connection));
    echo"connected";
}else{
    die(mysqli_error($connection));
}
?>