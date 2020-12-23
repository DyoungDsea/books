<?php
include("conn.php"); //include function - very important


$email= $conn->real_escape_string($_POST['email']);
$pword = $conn->real_escape_string($_POST['pword']);
$dtime=date('d-M-Y h:i a');

$result = mysqli_query($conn, "SELECT * FROM subscriptions WHERE demail='$email' and pword='$pword'");
$result2 = mysqli_query($conn, "SELECT * FROM subscriptions WHERE demail='$email' and pword='$pword' and verified='no'");
$result3 = mysqli_query($conn, "SELECT * FROM subscriptions WHERE demail='$email' and pword='$pword' and status='banned'");


$dcheck=mysqli_num_rows($result);
$dcheck2=mysqli_num_rows($result2);
$dcheck3=mysqli_num_rows($result3);

//admin login
$admin = mysqli_query($conn, "SELECT * FROM admin_account WHERE email_address='$email' and password='$pword'");

$dcheck_adm=mysqli_num_rows($admin);

if($dcheck_adm>0) {
$_SESSION['email_address']=$email;
mysqli_query($conn, "update admin_account set status='online' where email_address='$email'");
header("location: admin_dashboard");
}
//-------------

else if($dcheck3>0) {
$msg_warning= 'Your account has been banned by the administrator!';
$_SESSION['msg']='<font color=red><b>'.$msg_warning.' </b></font><br>';
header("location: login");
} 
/**else if($dcheck2>0) {
$msg_warning= 'Your email address has not been verified... kindly check your email or <a href="resend?email={$email}">click here</a> to resend verification link!';
$_SESSION['msg']='<font color=red><b>'.$msg_warning.' </b></font><br>';
header("location: login");
} **/
else if($dcheck==0) {
$msg_warning= 'Invalid login credentials!';
$_SESSION['msg']='<font color=red><b>'.$msg_warning.' </b></font><br>';
header("location: login");
}
else {
mysqli_query($conn, "update subscriptions set status='online' where demail='$email'");
//get account
$query= "SELECT * FROM subscriptions where demail='$email'";
$result = mysqli_query($conn,$query);
$row = $result->fetch_assoc();
$dcat=$row['dcat'];
$dprice=$row['dprice'];
$dpaid=$row['dpaid'];
$docc=$row['occupation'];
$dname=$row['dname'];
$_SESSION['dcat']=$dcat;
$_SESSION['dname']=$dname;
$_SESSION['em']=$email;
//-------

//redirect to logged in page
$uri=$_SESSION["loginto"];
if($uri=='') {
header("location: userhome");
}
else {
header("location: {$uri}");
}
//----------------

} 
?>