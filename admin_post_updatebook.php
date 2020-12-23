<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");

$post=$conn->real_escape_string($_POST['post']);
$item=$conn->real_escape_string($_POST['item']);
$catt=$conn->real_escape_string($_POST['catt']);
$ssid=$conn->real_escape_string($_POST['ssid']);

$dcategory= $conn->real_escape_string($_POST['dcategory']);
$dauthor= $conn->real_escape_string($_POST['dauthor']);
$dtitle= $conn->real_escape_string($_POST['dtitle']);
$ddescr= $conn->real_escape_string($_POST['ddescr']);
$dcost= $conn->real_escape_string($_POST['dcost']);
$dapple= $conn->real_escape_string($_POST['dapple']);
$dbn= $conn->real_escape_string($_POST['dbn']);
$damazon= $conn->real_escape_string($_POST['damazon']);
$dgoogle= $conn->real_escape_string($_POST['dgoogle']);
$dkobo= $conn->real_escape_string($_POST['dkobo']);
$dbam= $conn->real_escape_string($_POST['dbam']);
$dkonga= $conn->real_escape_string($_POST['dkonga']);
$djumia= $conn->real_escape_string($_POST['djumia']);

$target = "photos/"; 
 $id=date("Y-m-d-H-i-s-");
 $target1 = $target.$id.basename( $_FILES['dpic']['name']) ; 
 $ok=1; 
 
if($dtitle!=='' and $ddescr!=='') {
	$sql_query="update dbooks SET dcategory='$dcategory', dauthor='$dauthor', dtitle='$dtitle', ddescr='$ddescr', dcost='$dcost', dapple='$dapple', dbn='$dbn', 
	damazon='$damazon', dgoogle='$dgoogle', dkobo='$dkobo', dbam='$dbam', dkonga='$dkonga', djumia='$djumia' where id='$item'";
	mysqli_query($conn,$sql_query) or die(mysqli_error($conn));

	if(move_uploaded_file($_FILES['dpic']['tmp_name'], $target1)) {
	$sql_query1="update dbooks SET dpic='$target1' where id='$item'";
	mysqli_query($conn,$sql_query1);
	}
	$msg_success= 'Book updated successfully!';
	$_SESSION['msg']='<font color=green>'.$msg_success.' </font><hr>';
	header("location: admin_view_post_books?id={$post}");
}

else {
	$_SESSION['msg']='<font color=red>Unable to post data... one or more required items missing! </font><br>';
	header("location: admin_view_post_books?id={$post}");
}
?>