<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");
?>
<!doctype html>
<html lang="en" class="no-js">

<!-- Mirrored from nunforest.com/hotmagazine/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 02:35:27 GMT -->
<head>
	<title>Bookfrenxy Interactive | Contact Us</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
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
									<h1 style="font-size:24px"><span class="world">CONTACT US</span></h1>
								</div>

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									
									<p style="color:#333333">Whether you’ve problem accessing our services, comments about our products, or seeking recommendations on what to read next, get in touch. We value your opinions, and we’re always excited to hear from you!</p>
									
									<form name="contact-form" method="post" action="postmail" class="contact-form" >
						<input type="hidden" name="durl" value="<?php echo $_SERVER["REQUEST_URI"]; ?>">

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control placeholder" required />
                                </div>
                            </div>
							
							<div class="row">
							<div class="col-md-6">
							<div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="name">Phone Number</label>
                                    <input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-control placeholder" required />
                                </div>
                            </div>
							</div>
							<div class="col-md-6">
                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control placeholder" required />
                                </div>
                            </div>
							</div>
							</div>

                            <div class="outer required">
                                <div class="form-group af-inner">
                                    <label class="sr-only" for="subject">Subject</label>
                                    <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control placeholder" required />
                                </div>
                            </div>

                            <div class="form-group af-inner">
                                <label class="sr-only" for="input-message">Message</label>
                                <textarea name="message" id="input-message" placeholder="Message" rows="8" class="form-control placeholder" required></textarea>
                            </div>
							
							<?php
 $rand=date('his');
 ?>
 <input type="hidden" id="spam1" name="spam1" value="<?php echo $rand; ?>">
 <label>Verify that you're a human being</label>: 
<span style="font-weight:600; color:#f00"> <i><?php echo $rand; ?></i></span>


 <input type="text" id="spam2" name="spam2" placeholder="Enter anti-spam code" required>

                            <div class="outer required" align="right">
                                <div class="form-group af-inner">
								<hr>
                                    <input type="submit" name="submit" class="btn btn-primary btn-lg" id="submit_btn" value="Send message" />
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
						  <p>
						  <strong style="font-size:24px">General Enquiries, Comments and  Feedback</strong><br>
						    For all general  enquiries, comments, feedback, high-fives, and thumb-downs, please send an  email to hello[@]bookfrenxy.com<br><br>
  <strong style="font-size:24px">Authors and Publishers?</strong><br>
						    If you are an author  or publisher and are interested in having your book featured, please send an  email to editor[@]bookfrenxy.com<br>
						    If you want to send  an advance copy of your book for review, our mailing address is:<br>
						    The Editor,<br>
						    Bookfrenxy.com<br>
						    P.O Box 10887,<br>
						    Port Harcourt, Nigeria</p>
						  

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
?>