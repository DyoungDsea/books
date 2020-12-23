<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");


$dcat= $conn->real_escape_string($_POST['dcat']);
$dstatus= $conn->real_escape_string($_POST['dstatus']);
$dtitle= $conn->real_escape_string($_POST['dtitle']);
$durl= $conn->real_escape_string($_POST['durl']);
$dtime=date('d-M-Y h:i a');
$ssid=date('YmdHis');

$target = "photos/"; 
 $id=date("Y-m-d-H-i-s-");
 $target1 = $target.$id.basename( $_FILES['dpic']['name']) ; 
 $ok=1; 
 
if($durl!=='') {
$sql_query="INSERT INTO manage_audios SET dtitle='$dtitle', dcat='$dcat', durl='$durl', dstatus='$dstatus', ssid='$ssid'";
mysqli_query($conn,$sql_query);

if(move_uploaded_file($_FILES['dpic']['tmp_name'], $target1)) {
$sql_query1="update manage_audios SET dpic='$target1' where ssid='$ssid'";
mysqli_query($conn,$sql_query1);
}

$msg_success= 'Audio book uploaded successfully!';
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';
header("location: admin_manage_audio_books");
}

else {
$_SESSION['msg']='<font color=red>Unable to upload audio book... one or more required items missing! </font><br>';
header("location: admin_manage_audio_books");
}
?>