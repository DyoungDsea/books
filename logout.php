<?php
include("conn.php"); 

$email=$_SESSION['email_address'];
$em=$_SESSION['em'];
mysqli_query($conn, "update admin_account set status='offline' where email_address='$email'");
mysqli_query($conn, "update subscriptions set status='offline' where demail='$em'");

session_destroy();
header("location: login");
?>