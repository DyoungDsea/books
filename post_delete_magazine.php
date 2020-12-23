<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");


$id= $conn->real_escape_string($_GET['id']);
$sql_query="delete from manage_blog where id='$id'";
mysqli_query($conn,$sql_query);

$msg_success= 'Magazine deleted successfully!';
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';
header("location: admin_manage_magazine");
?>