<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php"); //include function - very important


$email=$_SESSION['em'];
$pword=$conn->real_escape_string(htmlentities($_POST["pword"],ENT_QUOTES));
$pword1=$conn->real_escape_string(htmlentities($_POST["pword1"],ENT_QUOTES));
$pword2=$conn->real_escape_string(htmlentities($_POST["pword2"],ENT_QUOTES));

$result=mysqli_query($conn, "select * from subscriptions where demail='$email' and pword='$pword'") or die(mysqli_error($conn));

if(mysqli_num_rows($result)==0) {
$_SESSION['msg']="<font color=red><b>Invalid current password supplied!</b></font>";
header("location: change_password");
}
else if($pword1!==$pword2) {
$_SESSION['msg']="<font color=red><b>New password confirmation did not match!</b></font>";
header("location: change_password");
}
else {
mysqli_query($conn, "update subscriptions set pword='$pword2' where demail='$email'") or die(mysql_error($conn)); 
$_SESSION['msg'] = '<font color=green><b>Password changed successfully!</b></font><br>';
header("location: userhome");
}

?>