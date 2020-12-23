<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php"); //include function - very important


$email=$_SESSION['em'];
$dname=$conn->real_escape_string(htmlentities($_POST["dname"],ENT_QUOTES));
$phone=$conn->real_escape_string(htmlentities($_POST["phone"],ENT_QUOTES));
$dlocation=$conn->real_escape_string(htmlentities($_POST["dlocation"],ENT_QUOTES));


mysqli_query($conn, "update subscriptions set dname='$dname', phone='$phone', address='$dlocation' where demail='$email'") or die(mysql_error($conn)); 
$_SESSION['msg'] = '<font color=green><b>Profile information updated successfully!</b></font><br>';
header("location: userhome");

?>