<?php
session_start();
$_SESSION['username'] = "Dina";
$_SESSION['password'] = "coding";
$_SESSION['email'] = "coding@gmail.com";
echo "Session data is saved";
?>
