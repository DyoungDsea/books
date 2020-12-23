<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");


$pid= $conn->real_escape_string($_POST['id']);
$dcat= $conn->real_escape_string($_POST['dcat']);
$dtitle= $conn->real_escape_string($_POST['dtitle']);
$dcontent= $conn->real_escape_string($_POST['dcontent']);
$durl= $conn->real_escape_string($_POST['durl']);

$target = "photos/"; 
 $id=date("Y-m-d-H-i-s-");
 $target1 = $target.$id.basename( $_FILES['dpic']['name']) ; 
 $target2 = $target.$id.basename( $_FILES['dpic2']['name']) ; 
 $target3 = $target.$id.basename( $_FILES['dpic3']['name']) ; 
 $target4 = $target.$id.basename( $_FILES['dpic4']['name']) ; 
 $ok=1; 
 
if($dtitle!=='' and $dcontent!=='') {
$sql_query="update manage_blog SET dcat='$dcat', dtitle='$dtitle', dcontent='$dcontent', durl='$durl' where id='$pid'";
mysqli_query($conn,$sql_query);

if(move_uploaded_file($_FILES['dpic']['tmp_name'], $target1)) {
$sql_query1="update manage_blog SET dpic='$target1' where id='$pid'";
mysqli_query($conn,$sql_query1);
}
if(move_uploaded_file($_FILES['dpic2']['tmp_name'], $target2)) {
$sql_query2="update manage_blog SET dpic2='$target2' where id='$pid'";
mysqli_query($conn,$sql_query2);
}

$msg_success= 'Music updated successfully!';
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';
header("location: admin_manage_music?cat={$dcat}");
}

else {
$_SESSION['msg']='<font color=red>Unable to post data... one or more required items missing! </font><br>';
header("location: admin_manage_music?cat={$dcat}");
}
?>