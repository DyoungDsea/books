<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");

$email=$_SESSION['em'];
$expiry = date('Y-m-d');
$expiredate = date("d-M-Y", strtotime(date("d-M-Y", strtotime($expiry)) . " + 30 day"));
$expirenotice = date("d-M-Y", strtotime(date("d-M-Y", strtotime($expiry)) . " + 23 day"));



						 //check if payment was successfull
						 $result = array();
						//The parameter after verify/ is the transaction reference to be verified
						$payrefrence=$_SESSION['payrefrence'];
						$url = 'https://api.paystack.co/transaction/verify/'.$payrefrence;
						
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt(
						  $ch, CURLOPT_HTTPHEADER, [
							'Authorization: Bearer sk_live_2f1f8cd492dae48fee8cc07ced1e091ddcc029e6']
						);
						$request = curl_exec($ch);
						curl_close($ch);
						
						if ($request) {
						  $result = json_decode($request, true);
						}
						
						if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
						  //top up credit
						  mysqli_query($conn, "update subscriptions set dexpire='$expiredate', fnotify='$expirenotice', dcat='Premium', dpaid='paid' where demail='$email'") or die(mysqli_error($conn));
						  $_SESSION['msg']= "<font color=green><br><b>Your payment was successful and your subscription has been renewd for 1 month</b><br></font>";
						}
						else{
						  $_SESSION['msg']="<font color=red><br><b>Your payment was not successful... contact support to pay for subscription or try again later!</b><br></font>";
						}
						
//unset pay reference
$_SESSION['payrefrence']='';
//---------------
header("location: userhome.php");
?> 