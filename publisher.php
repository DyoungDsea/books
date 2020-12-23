<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");


$item= $conn->real_escape_string($_GET['item']);
$action= $conn->real_escape_string($_GET['action']);
//$dtime=date('d-M-Y h:i a');
$dtime = date('d-M-Y h:i a',strtotime(date("d-M-Y h:i a", mktime()) . " + 5 hours"));

if($action=='publish') {
mysqli_query($conn,"update manage_blog set ispublished='yes', dtime='$dtime' where id='$item'");
}
else {
mysqli_query($conn,"update manage_blog set ispublished='no' where id='$item'");
}

$msg_success= 'Post '.$action.'ed successfully';
$_SESSION['msg']='<br><font color=green>'.$msg_success.' &#10004;</font><hr>';
header("location: admin_view_post_details?id={$item}");
?>