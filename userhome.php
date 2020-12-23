<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");

//get account
$email=$_SESSION['em'];

$query= "SELECT * FROM subscriptions WHERE demail='$email' and status='online'";
$result = mysqli_query($conn,$query);
$row = $result->fetch_assoc();
$id=$row['id'];
$full_name=$row['dname'];
$ddcat=$row['dcat'];
$ddexpire=$row['dexpire'];
$ddpaid=$row['dpaid'];
 

if (mysqli_num_rows($result)==0) 
{
$_SESSION["msg"]="<font color=red><b>Invalid Operation!<br>you must login to continue.</b></font>";
header("location: login");
}
else {

?>
<!doctype html>
<html lang="en" class="no-js">

<!-- Mirrored from nunforest.com/hotmagazine/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 02:35:27 GMT -->
<head>
	<title>Bookfrenxy Interactive | <?php echo $full_name; ?></title>

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
		<?php include("menu.php"); ?>
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
									<h1 style="font-size:24px"><span class="world">Welcome <?php echo $full_name; ?>!</span></h1>
								</div>

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									<p>Subscription Plan: <?php echo $ddcat; ?></p>
									<?php if($ddcat!=='Basic') { ?>
									<p>Expiry Date: <?php echo $ddexpire; ?></p>
									<p>Status: <?php echo $ddpaid; ?></p>
									<p><a href="edit_profile">Edit Profile</a> .::. <a href="change_password">Change Password</a> </p>
									<?php 
									}
									?>
									<hr>
									<h3>Subscription Information</h3>
									<p style="color:#990000"><b>PAY ONLINE</b></p>
									<p style="color:#990000">Note: You can pay the sum of N1,000 using online for instant 1 month subscription</p>
									<form action="do_pay.php" method="POST" >
									<?php 
									$transix="RealGlitz-".date('dmYHis');
									$_SESSION['payrefrence']=$transix;
									$_SESSION['ddexpire']=$ddexpire;
									 ?>
									  <script
										src="https://js.paystack.co/v1/inline.js" 
										data-key="pk_live_f25d14b642cac208a2967633d90869498ce0ec39"
										data-email="<?php echo $email; ?>"
										data-amount="100000"
										data-ref="<?php echo $transix; ?>" >
									  </script>
									</form>
									<hr>
								
									<!--h3>Alternatively</h3>
									<p style="color:#333333">Pay N1,000 to the following account details for 1 month premium subscription</p>
									<p style="color:#333333">Bank: Diamond bank</p>
									<p style="color:#333333">Account Name: Umera-Okeke Real</p>
									<p style="color:#333333">Account No: 0021352015</p>
									<p style="color:#FF0000">After payment, send your email address and payment information to info@realglitz.com.ng or call 08065439995</p-->
									
									
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
		<?php include("footer.php"); ?>
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