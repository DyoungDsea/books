<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");


$post=$conn->real_escape_string($_GET['post']);
$item=$conn->real_escape_string($_GET['item']);
$catt=$conn->real_escape_string($_GET['catt']);

$sql_query="delete from dbooks where id='$item'";
mysqli_query($conn,$sql_query);

$msg_success= 'Book deleted successfully!';
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';
header("location: admin_view_post_books?id={$post}");
?>