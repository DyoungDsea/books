<?php
include("conn.php");

$id= $conn->real_escape_string($_POST['id']);
$status= $conn->real_escape_string($_POST['status']);



$sql_query="update subscriptions set status='$status', verified='yes'  where id='$id'";
$query = mysqli_query($conn,$sql_query);

$msg_success= 'Status updated successfully!';
        
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';

header("location: admin_member_details?id={$id}");
?>