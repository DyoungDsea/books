<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

if($_SESSION['loaded']=='yes') {
header("location: home");
}
else {
include("home.php");
$_SESSION['loaded']='yes';
}
?>