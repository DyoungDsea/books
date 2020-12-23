<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");

//get account
$email=$_SESSION['email_address'];

$query= "SELECT * FROM admin_account WHERE email_address='$email' and status='online'";
$result = mysqli_query($conn,$query);
$row = $result->fetch_assoc();
$id=$row['id'];
$full_name=$row['full_name'];
$email_address=$row['email_address'];
 

if (mysqli_num_rows($result)==0) 
{
$_SESSION["msg"]="<font color=red><b>Invalid Operation!<br>you must login to continue.</b></font>";
header("location: index");
}
else {
$profile = $conn->real_escape_string($_GET['id']);
$action = $conn->real_escape_string($_GET['action']);

?>
<!doctype html>
<html lang="en" class="no-js">

<!-- Mirrored from nunforest.com/hotmagazine/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 02:35:27 GMT -->
<head>
	<title>Bookfrenxy Interactive | Admin Panel</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
	<link href="../../../maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="favicon.png" type="image/x-icon" />
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/ticker-style.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Start Header -->
		<?php include("menu_admin.php"); ?>
		<!-- End Header -->

		
		
		<!-- block-wrapper-section
			================================================== -->
		<section class="block-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">

						<!-- block content -->
						<div class="block-content">

							<!-- carousel box -->
							<div class="carousel-box owl-wrapper">

								<div class="title-section">
									<h1 style="font-size:24px"><span class="world">ADMIN PANEL</span></h1>
								</div>

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									
									
<?php
include("conn.php");
include("function-smilies.php");
$query= "SELECT * FROM subscriptions where id='$profile'";
$result = mysqli_query($conn,$query);

echo '<div class="table-responsive">
                    <table class="table no-margin table-hover">';
                    
                      
             while($row = $result->fetch_assoc()){
             
			 $demail=$row['demail'];
			 $ddcat=$row['dcat'];
			 
						 echo'<tr><td width="100%">Full Name: '.$row['dname'].'</td></tr>';
                         echo'<tr><td width="100%">Phone Number: '.$row['phone'].'</td></tr>';
                         echo'<tr><td width="100%">Email Address: '.$row['demail'].'</td></tr>';
						 echo'<tr><td width="100%">Location: '.$row['address'].'</td></tr>';
                         echo'<tr><td width="100%">Category: '.$row['dcat'].' Member</td></tr>';
						 //echo'<tr><td width="100%">Location: '.$row['city'].', '.$row['state'].' '.$row['country'].'</td></tr>';
						 echo'<tr><td width="100%">Status: '.$row['status'].'</td></tr>';
						 if($ddcat!=='Basic') {
						 echo'<tr><td width="100%">Expiry Date: '.$row['dexpire'].'</td></tr>';
						 echo'<tr><td width="100%">Expiry Status: '.$row['dpaid'].'</td></tr>';
						 }
						
						 if($action=='change') {
						 echo '<tr><td width="100%">';
						 echo '<form name=fupdate method=post action=member_update>';
						 echo '<input type=hidden name=id value='.$row['id'].'>';
						 echo '<div class=row>';
						 echo '<div class=col-md-6>';
						 echo '<b>Change Status:</b>
						 <select name=status class=form-control required>
						 <option value='.$row['status'].' selected=selected>'.ucwords($row['status']).'</option>
						 <option value=offline>Active</option>
						 <option value=banned>Banned</option>
						 </select>';
						 echo '</div>';
						 echo '</div>';
						 echo '<div class=row>';
						 echo '<div class=col-md-6>';
						 echo '<br><input type=submit class="btn btn-primary" value="Update Status"> <a href=admin_member_details?id='.$row['id'].' class="btn btn-default">&laquo; Dont Update</a><br>';
						 echo '</div>';
						 echo '</div>';
						 
						 echo '</form>';
						 echo '</td></tr>';						 
						 }
						 
						 else if($action=='renew') {
						 $fdcat=$row['dcat'];
						 $fid=$row['id'];
						 echo '<tr><td width="100%">';
						 echo '<form name=fupdate method=post action=member_renew>';
						 echo '<input type=hidden name=id value='.$row['id'].'>';
						 echo '<input type=hidden name=dexpire value='.$row['dexpire'].'>';
						 echo '<div class=row>';
						 echo '<div class=col-md-6>';
						 echo '<br><b><font color=blue><u>Member Subscription</u></font></b><hr>
						 <p>No. of months to renew:
						 <input name=dmonths class=form-control required type=number value=1 max=12 min=1></p>';
						 echo '</div>';
						 echo '</div>';
						 echo '<div class=row>';
						 echo '<div class=col-md-6>';
						 echo '<br><input type=submit class="btn btn-primary" value=" Add Subscription "> <a href=admin_member_details?id='.$fid.' class="btn btn-default">&laquo; Cancel</a><br>';
						 echo '</div>';
						 echo '</div>';
						 
						 echo '</form>';
						 echo '</td></tr>';						 
						 }
						 
						 else if($action=='delete') {
						 echo '<tr><td width="100%">';
						 echo '<form name=fupdate method=post action=member_delete>';
						 echo '<input type=hidden name=id value='.$row['id'].'>';
						 echo '<div class=row>';
						 echo '<div class=col-md-6>';
						 echo '<b>Confirm Delete</b>';
						 echo '</div>';
						 echo '</div>';
						 echo '<div class=row>';
						 echo '<div class=col-md-6>';
						 echo '<b><font color=red>Do you really wnt to delete this profile completely?</font></b>';
						 echo '</div>';
						 echo '</div>';
						 echo '<div class=row>';
						 echo '<div class=col-md-6>';
						 echo '<br><input type=submit class="btn btn-danger" value="Yes Delete"> <a href=admin_member_details?id='.$row['id'].' class="btn btn-default">&laquo; Dont Delete</a><br>';
						 echo '</div>';
						 echo '</div>';
						 
						 echo '</form>';
						 echo '</td></tr>';						 
						 }
						 
						 if($action=='') {
							 echo '<tr><td width="100%">';
							 echo '<a href=admin_member_details?id='.$row['id'].'&action=delete class="btn btn-primary">Delete Member</a> ';
							 echo '<a href=admin_member_details?id='.$row['id'].'&action=change class="btn btn-primary">Change Status</a> ';
							 if($ddcat=='Basic') {
							 echo '<a href=admin_member_details?id='.$row['id'].'&action=renew class="btn btn-primary">Add Subscription</a> ';
							 }
							 else {
							 echo '<a href=admin_member_details?id='.$row['id'].'&action=renew class="btn btn-primary">Renew Subscription</a> ';
							 }
							 echo '</td></tr>';
						 }
						 
                         
                    }


                    echo '</table>
                  </div><!-- /.table-responsive -->';
       
?>
									
									
									
									
								</div>
							</div>
							<!-- End carousel box -->

						</div>
						<!-- End block content -->

					</div>

					<div class="col-sm-4">

						<!-- sidebar -->
						<div class="sidebar">

							<?php
							//ads 300x250
							include("ads_300by250.php");
							//-----------
							?>

						</div>
						<!-- End sidebar -->

					</div>

				</div>

			</div>
		</section>
		<!-- End block-wrapper-section -->

		

		

		<!-- footer -->
		<?php include("admin_footer.php"); ?>
		<!-- End footer -->

	</div>
	<!-- End Container -->
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.ticker.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
  	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/plugins-scroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</body>

<!-- Mirrored from nunforest.com/hotmagazine/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 02:37:25 GMT -->
</html>
<?php
$_SESSION['msg']='';
}
?>