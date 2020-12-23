<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");


$dcat= $conn->real_escape_string($_POST['dcat']);
$dstatus= $conn->real_escape_string($_POST['dstatus']);
$dtitle= $conn->real_escape_string($_POST['dtitle']);
$dtime=date('d-M-Y h:i a');
$ssid=date('YmdHis');

$target = "photos/"; 
 $id=date("Y-m-d-H-i-s-");
 $target1 = $target.$id.basename( $_FILES['dpic']['name']) ; 
 $ok=1; 
 
if($dtitle!=='') {
$sql_query="INSERT INTO manage_photos SET dtitle='$dtitle', durl='$target1', dstatus='$dstatus', ssid='$ssid'";
mysqli_query($conn,$sql_query);

if(move_uploaded_file($_FILES['dpic']['tmp_name'], $target1)) {
$sql_query1="update manage_photos SET dpic='$target1' where ssid='$ssid'";
mysqli_query($conn,$sql_query1);
}

$msg_success= 'Image uploaded successfully!';
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';
header("location: admin_manage_photos");
}

else {
$_SESSION['msg']='<font color=red>Unable to upload image... one or more required items missing! </font><br>';
header("location: admin_manage_photos");
}
?>