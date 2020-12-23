<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

function spamcheck($field)
  {
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }


  $mailcheck = spamcheck($_REQUEST['email']);
  $email = strip_tags($_REQUEST['email']);
    $phone = strip_tags($_REQUEST['phone']);
    $message = strip_tags($_REQUEST['message']);
	$name = strip_tags($_REQUEST['name']);
	$sub = strip_tags($_REQUEST['subject']);
	$spam1 = strip_tags($_REQUEST['spam1']);
	$spam2 = strip_tags($_REQUEST['spam2']);
	$durl = strip_tags($_REQUEST['durl']);

  if($name=='' or $message=='') {
    $_SESSION["msg"]= "<h3><font color=red>One or more required inputs missing... Try again!</font></h3><br>";
	header("location: {$durl}");
    }
	
	else if ($mailcheck==FALSE)
    {
    $_SESSION["msg"]= "<h3><font color=red>Invalid email address format. try again!</font></h3><br>";
	header("location: {$durl}");
    }
	
	else if($spam1!==$spam2) {
	$_SESSION["msg"]= "<h3><font color=red>Invalid anti-spam code supplied... Try again!</font></h3><br>";
	header("location: {$durl}");
    }
	
  else
    {
	//send email
    $subject="Web Enquiry from - ".$name." - ".$sub;
	$details="Sender: ".$name."\n"."Email Address: ".$email."\n"."Phone number: ".$phone."\n\n".$message;
	
    @mail("hello@bookfrenxy.com", $subject, $details, "From: $email");
    $_SESSION["msg"]= "<h3><font color=green><b>Your message was delivered successfully!</b>
<br>We'll get back to you as soon as possible.</font></h3><br>";
header("location: {$durl}");
  }
?>