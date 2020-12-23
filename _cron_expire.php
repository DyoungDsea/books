<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");

$today=date('d-M-Y');

$query= "SELECT * FROM subscriptions where dexpire='$today' and dcat!='Basic'";
$result = mysqli_query($conn,$query);
while($row = $result->fetch_assoc()){
$pid=$row['id'];
$dname=$row['dname'];
$dcat=$row['dcat'];
$dexpire=$row['dexpire'];
$dphone=$row['phone'];
$demail=$row['demail'];

//expire account
@mysqli_query($conn, "UPDATE subscriptions set dpaid='expired' where id='$pid'") or die(mysqli_error($conn));

//send expiry email
@mail($demail,"Realglitz - Your magazine subscription has expired", "Hello {$dname},\nYour Realglitz Magazine subscription has expired, however you will still be able to read our free articles.\nKindly login to your profile to pay for your subscription renewal or contact administrator via info@realglitz.com.ng to reactivate your account.\nWe look forward to hearing from you.\nRegards,\nRealglitz Team.","From: noreply@realglitz.com.ng");
//-----------

}
?>