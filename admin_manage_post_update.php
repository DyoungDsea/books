<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");


$pid= $conn->real_escape_string($_POST['id']);
$dwritter= $conn->real_escape_string($_POST['dwritter']);
$dwritter_bio= $conn->real_escape_string($_POST['dwritter_bio']);
$dcat= $conn->real_escape_string($_POST['dcat']);
$dtitle= $conn->real_escape_string($_POST['dtitle']);
$dpreview= $conn->real_escape_string($_POST['dpreview']);
$dcontent= $conn->real_escape_string($_POST['dcontent']);
$durl= $conn->real_escape_string($_POST['durl']);

$target = "photos/"; 
 $id=date("Y-m-d-H-i-s-");
 $target1 = $target.$id.basename( $_FILES['dpic']['name']) ; 
 $target2 = $target.$id.basename( $_FILES['dpic2']['name']) ; 
 $target3 = $target.$id.basename( $_FILES['dpic3']['name']) ; 
 $target4 = $target.$id.basename( $_FILES['dpic4']['name']) ; 
 $target5 = $target.$id.basename( $_FILES['dpic5']['name']) ;
 $target6 = $target.$id.basename( $_FILES['dpic6']['name']) ;
 $target7 = $target.$id.basename( $_FILES['dpic7']['name']) ;
 $target8 = $target.$id.basename( $_FILES['dpic8']['name']) ;
 $target9 = $target.$id.basename( $_FILES['dpic9']['name']) ;
 $target10 = $target.$id.basename( $_FILES['dpic10']['name']) ; 
 $ok=1; 
 
if($dtitle!=='' and $dcontent!=='') {
$sql_query="update manage_blog SET dcat='$dcat', dtitle='$dtitle', dpreview='$dpreview', dcontent='$dcontent', durl='$durl', dwritter='$dwritter', dwritter_bio='$dwritter_bio' where id='$pid'";
mysqli_query($conn,$sql_query);

if(move_uploaded_file($_FILES['dpic']['tmp_name'], $target1)) {
$sql_query1="update manage_blog SET dpic='$target1' where id='$pid'";
mysqli_query($conn,$sql_query1);
}
if(move_uploaded_file($_FILES['dpic2']['tmp_name'], $target2)) {
$sql_query2="update manage_blog SET dpic2='$target2' where id='$pid'";
mysqli_query($conn,$sql_query2);
}
if(move_uploaded_file($_FILES['dpic3']['tmp_name'], $target3)) {
$sql_query3="update manage_blog SET dpic3='$target3' where id='$pid'";
mysqli_query($conn,$sql_query3);
}
if(move_uploaded_file($_FILES['dpic4']['tmp_name'], $target4)) {
$sql_query4="update manage_blog SET dpic4='$target4' where id='$pid'";
mysqli_query($conn,$sql_query4);
}
if(move_uploaded_file($_FILES['dpic5']['tmp_name'], $target5)) {
$sql_query5="update manage_blog SET dpic5='$target5' where id='$pid'";
mysqli_query($conn,$sql_query5);
}
if(move_uploaded_file($_FILES['dpic6']['tmp_name'], $target6)) {
$sql_query6="update manage_blog SET dpic6='$target6' where id='$pid'";
mysqli_query($conn,$sql_query6);
}
if(move_uploaded_file($_FILES['dpic7']['tmp_name'], $target7)) {
$sql_query7="update manage_blog SET dpic7='$target7' where id='$pid'";
mysqli_query($conn,$sql_query7);
}
if(move_uploaded_file($_FILES['dpic8']['tmp_name'], $target8)) {
$sql_query8="update manage_blog SET dpic8='$target8' where id='$pid'";
mysqli_query($conn,$sql_query8);
}
if(move_uploaded_file($_FILES['dpic9']['tmp_name'], $target9)) {
$sql_query9="update manage_blog SET dpic9='$target9' where id='$pid'";
mysqli_query($conn,$sql_query9);
}
if(move_uploaded_file($_FILES['dpic10']['tmp_name'], $target10)) {
$sql_query10="update manage_blog SET dpic10='$target10' where id='$pid'";
mysqli_query($conn,$sql_query10);
}

$msg_success= 'Article updated successfully!';
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';
header("location: admin_manage_posts?cat={$dcat}");
}

else {
$_SESSION['msg']='<font color=red>Unable to post data... one or more required items missing! </font><br>';
header("location: admin_manage_posts?cat={$dcat}");
}
?>