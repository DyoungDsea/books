<?php
include("conn.php");

$id= $conn->real_escape_string($_POST['id']);
$dexpire= $conn->real_escape_string($_POST['dexpire']);
$dmonths= $conn->real_escape_string($_POST['dmonths']);
$fexpired= $conn->real_escape_string($_POST['fexpired']);

if($fexpired=='no') {
$expiry = $dexpire; 
}
else { 
$expiry = date('Y-m-d');
}

$ddays=(30*$dmonths);
$dnotify=($ddays-7);

$expiredate = date("d-M-Y", strtotime(date("d-M-Y", strtotime($expiry)) . " + ".$ddays." day"));
$expirenotice = date("d-M-Y", strtotime(date("d-M-Y", strtotime($expiry)) . " + ".$dnotify." day"));



$sql_query="update subscriptions set dexpire='$expiredate', fnotify='$expirenotice', dcat='Premium', dpaid='paid'  where id='$id'";
$query = mysqli_query($conn,$sql_query);

$msg_success= 'Membership subscription topup was successful!';
        
$_SESSION['msg']='<font color=green>'.$msg_success.' </font><br>';

header("location: admin_member_details?id={$id}");
?>