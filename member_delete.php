<?php
include("conn.php");

$id= $conn->real_escape_string($_POST['id']);


$sql_query="delete from subscriptions where id='$id'";
$query = mysqli_query($conn,$sql_query);

$msg_success= 'profile deleted successfully!';
        
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';

header("location: admin_dashboard");
?>