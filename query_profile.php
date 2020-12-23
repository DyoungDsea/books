<?php
//include("conn.php"); 

$mquery= "SELECT * FROM subscriptions where demail='$email'";
$mresult = mysqli_query($conn,$mquery);
$mrow = $mresult->fetch_assoc();
$mdcat=$mrow['dcat'];
$mdstatus=$mrow['dpaid'];
$mdexpire=$mrow['dexpire'];
$mdname=$mrow['dname'];
$mdphone=$mrow['dphone'];

$mdcheck=mysqli_num_rows($mresult);
?>