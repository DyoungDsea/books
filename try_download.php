<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");


$pid= $conn->real_escape_string($_GET['mid']);
$durl= $conn->real_escape_string($_GET['durl']);
 
$sql_query="update manage_blog SET iviews=iviews+1 where id='$pid'";
mysqli_query($conn,$sql_query);

header("location: {$durl}");
?>