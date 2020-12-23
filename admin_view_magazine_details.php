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

$dcat=$_GET['cat'];
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
									<h1 style="font-size:24px"><span class="world">Admin Panel &raquo; Manage Posts &raquo; Magazine</span></h1>
								</div>

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									
									
									
<!-- The Post textarea panel   -->

<?php
include("conn.php");
  $post=$_GET['id'];// 

$query= "SELECT * FROM manage_blog where id='$post'";
$result = mysqli_query($conn,$query);

                      if ($result->num_rows != 0) {
                      while($row = $result->fetch_assoc()){
					  $mycat=$row['dcat'];
					  
					    

?>


							<!-- single-post box -->
							<div class="single-post-box">

								<div class="title-post">
									<h1><?php echo $row['dtitle']; ?> </h1>
									<ul class="post-tags">
										<li><i class="fa fa-clock-o"></i><?php echo $row['dtime']; ?></li>
										<li><i class="fa fa-arrow-circle-down"></i><?php echo $row['iviews']; ?></li>
									</ul>
								</div>

=								<div class="post-gallery">
									<img src="<?php echo $row['dpic']; ?>" alt="">
								</div>

								<div class="post-content">
									<p><?php echo stripslashes(nl2br($row['dcontent'])); ?></p>
									
								</div>
								
								<div><p><a href="<?php echo $row['dpic2']; ?>" class="btn btn-primary" target="_blank">Download Magazine</a></p></div>
								
								
							</div>
							<!-- End single-post box -->
							
<?php
}
}
?>							


<!-- The End Post textarea panel -->
									
									
									
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