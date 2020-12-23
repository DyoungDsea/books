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
 

if (mysqli_num_rows($result)>0) 
{
header("location: userhome");
}
else {
?>
<!doctype html>
<html lang="en" class="no-js">

<!-- Mirrored from nunforest.com/hotmagazine/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 02:35:27 GMT -->
<head>
	<title>Bookfrenxy Interactive | Subscribe</title>

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
									<h1 style="font-size:24px"><span class="world">NEW MEMBER SUBSCRIPTION</span></h1>
								</div>

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									
									<form method="post" action="do_register" name="formx">
									
									<div class="row">
									<div class="col-md-10">
									<p>
									<b>Full Name:</b>
									<input type="text" name="fullname" class="form-control" required>
									</p>
									</div>
									</div>
									
									<div class="row">
									<div class="col-md-10">
									<p>
									<b>Phone Number:</b>
									<input type="text" name="phone" class="form-control" required>
									</p>
									</div>
									</div>
									
									<div class="row">
									<div class="col-md-10">
									<p>
									<b>Email Address:</b>
									<input type="text" name="email" class="form-control" required>
									</p>
									</div>
									</div>
									
									<div class="row">
									<div class="col-md-5">
									<p>
									<b>Password:</b>
									<input type="password" name="pword" class="form-control" required>
									</p>
									</div>
									
									<div class="col-md-5">
									<p>
									<b>Confirm Password:</b>
									<input type="password" name="pword2" class="form-control" required>
									</p>
									</div>
									</div>
									
									<div class="row">
									<div class="col-md-10" align="right">
									<p><?php
									 $rand=date('his');
									 ?>
									 <input type="hidden" id="spamcode" name="spamcode" value="<?php echo $rand; ?>">
									 <label>Verify that you're a human being</label>: 
									 <span style="font-weight:600; color:#f00; font-size:18px"> <i><?php echo $rand; ?></i></span>
									 <input type="text" id="spamcode2" name="spamcode2" placeholder="Enter anti-spam code" required>
									 </p>
									</div>
									</div>
									<div class="row">
									<div class="col-md-10">
									<p>
									<input type="submit" name="b1" class="btn btn-primary pull-right" value=" &nbsp;&nbsp; SUBSCRIBE &nbsp;&nbsp; ">
									</p>
									</div>
									</div>
									
									</form>
									
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