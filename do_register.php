<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");


$fullname= $conn->real_escape_string($_POST['fullname']);
$email= $conn->real_escape_string($_POST['email']);
$phone= $conn->real_escape_string($_POST['phone']);
$pword= $conn->real_escape_string($_POST['pword']);
$pword2= $conn->real_escape_string($_POST['pword2']);
$spamcode= $conn->real_escape_string($_POST['spamcode']);
$spamcode2= $conn->real_escape_string($_POST['spamcode2']);


$ssid=date('YmdHis');

if($pword!==$pword2) {
$_SESSION['msg']='<font color=red>Unable to complete registration... password confirmation did not match! </font><br>';
header("location: subscribe");
}
else if($spamcode!==$spamcode2) {
$_SESSION['msg']='<font color=red>Unable to complete registration... invalid antispam code supplied! </font><br>';
header("location: subscribe");
} 
else if(mysqli_num_rows(mysqli_query($conn, "select id, demail from subscriptions where demail='$email'"))==0) {
$sql_query="INSERT INTO subscriptions SET dname='$fullname', demail='$email', phone='$phone', pword='$pword', dcat='Basic', verified='no', session_id='$ssid'";
mysqli_query($conn,$sql_query) or die(mysqli_error($conn));

$msg_success= 'Your registration was successful.. Login below!';
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';
$_SESSION["loginto"]='';
header("location: login?email={$email}");
}

else {
$_SESSION['msg']='<font color=red>Unable to complete registration... email address already exist on realglitz! </font><br>';
header("location: subscribe");
}
?>