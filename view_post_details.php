<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");
include('function-format-url.php');

$post=$_GET['id'];// 
$query= "SELECT * FROM manage_blog where id='$post'";
$result = mysqli_query($conn,$query);

                      if ($result->num_rows != 0) {
                      while($row = $result->fetch_assoc()){
					  $mycat=$row['dcat'];
					  $dssid=$row['ssid'];
					  $mytitle=$row['dtitle'];
					  
					    //format video if any
					    $vurl = $row['durl'];
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
						$id = $matches[1];
						$width = '100%';
						$height = '400px';
						
						//update views
						mysqli_query($conn, "update manage_blog set iviews=iviews+1 where id='$post'");


$_SESSION["loginto"]=$_SERVER["REQUEST_URI"];
?>
<!doctype html>
<html lang="en" class="no-js">

<!-- Mirrored from nunforest.com/hotmagazine/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 02:35:27 GMT -->
<head>
	<title>Bookfrenxy Interactive | <?php echo $mytitle; ?></title>

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
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=668383570332332&autoLogAppEvents=1"></script>

	<!-- Container -->
	<div id="container">
		<!-- Start Header -->
		<?php include("menu.php"); ?>
		<!-- End Header -->

		
		
		<!-- block-wrapper-section
			================================================== -->
		<section class="block-wrapper">
			<div class="container">
				
				<?php
				//big banner adverts section---------------------------------------------------------
				$adquery= "SELECT * FROM manage_adverts where dcat='1140x250' order by rand() limit 1";
				$adresult = mysqli_query($conn,$adquery);
				
				while($adrow = $adresult->fetch_assoc()){
				$adurl=$adrow['durl'];
									  
				?>
					<p>
					<a href="<?php echo $adrow['durl']; ?>" <?php if($adurl!=='#') { ?> target="_blank" <?php } ?> >
					<img src="<?php echo $adrow['dpic']; ?>" alt=""  style="height:250px; width:100%">
					</a>
					</p>
				<?php
				}
				//-------------------------------------------------------------------------------------
				?>
				
				<div class="row">
					<div class="col-sm-8">

						<!-- block content -->
						<div class="block-content">

							<!-- carousel box -->
							<div class="carousel-box owl-wrapper">

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									
									
									
<!-- The Post textarea panel   -->

							<div class="single-post-box">

								<div class="title-post">
									<h1><?php echo $row['dtitle']; ?> </h1>
									<ul class="post-tags">
										<?php if($row['dwritter']!='') { ?>
										<li><i class="fa fa-user"></i>By <a href="getposts?writter=<?php echo $row['dwritter']; ?>"><?php echo $row['dwritter']; ?></a></li>
										<?php } ?>
										<li><i class="fa fa-clock-o"></i>Posted: <?php echo $row['dtime']; ?></li>
										<!--li><i class="fa fa-eye"></i>Views: <?php //echo $row['iviews']; ?></li-->
									</ul>
								</div>
								
								<div class="post-gallery">
									<img src="<?php echo $row['dpic']; ?>" alt="">
								</div>
								
								<div style="clear: both"></div>
											<b>Share this post on social media</b><br>
											<!-- AddToAny BEGIN -->
											<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
											<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
											<a class="a2a_button_facebook"></a>
											<a class="a2a_button_twitter"></a>
											<a class="a2a_button_google_plus"></a>
											<a class="a2a_button_linkedin"></a>
											<a class="a2a_button_whatsapp"></a>
											</div>
											<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
											<!-- AddToAny END -->
								
								<div class="post-content">
									<p align="justify"><?php echo stripslashes($row['dcontent']); ?></p>
									
									<?php if($vurl!='') { ?>
									<iframe id="ytplayer" type="text/html" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="https://www.youtube.com/embed/<?php echo $id; ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
									<?php } ?>
									
								</div>

								
								
								<?php if($row['dpic2']!=='' or $row['dpic3']!=='' or $row['dpic4']!=='' or $row['dpic5']!=='' or $row['dpic6']!=='' or $row['dpic7']!=='' or $row['dpic8']!=='' or $row['dpic9']!=='' or $row['dpic10']!=='') { ?>
								<!-- carousel box -->
								<div class="carousel-box owl-wrapper">

									<div class="owl-carousel" data-num="3">
										<?php if($row['dpic2']!=='') { ?>
										<div class="item news-post image-post3">
											<img src="<?php echo $row['dpic2']; ?>" alt="">
										</div>
										<?php } ?>
										<?php if($row['dpic3']!=='') { ?>
										<div class="item news-post image-post3">
											<img src="<?php echo $row['dpic3']; ?>" alt="">
										</div>
										<?php } ?>
										<?php if($row['dpic4']!=='') { ?>
										<div class="item news-post image-post3">
											<img src="<?php echo $row['dpic4']; ?>" alt="">
										</div>
										<?php } ?>
										<?php if($row['dpic5']!=='') { ?>
										<div class="item news-post image-post3">
											<img src="<?php echo $row['dpic5']; ?>" alt="">
										</div>
										<?php } ?>
										<?php if($row['dpic6']!=='') { ?>
										<div class="item news-post image-post3">
											<img src="<?php echo $row['dpic6']; ?>" alt="">
										</div>
										<?php } ?>
										<?php if($row['dpic7']!=='') { ?>
										<div class="item news-post image-post3">
											<img src="<?php echo $row['dpic7']; ?>" alt="">
										</div>
										<?php } ?>
										<?php if($row['dpic8']!=='') { ?>
										<div class="item news-post image-post3">
											<img src="<?php echo $row['dpic8']; ?>" alt="">
										</div>
										<?php } ?>
										<?php if($row['dpic9']!=='') { ?>
										<div class="item news-post image-post3">
											<img src="<?php echo $row['dpic9']; ?>" alt="">
										</div>
										<?php } ?>
										<?php if($row['dpic10']!=='') { ?>
										<div class="item news-post image-post3">
											<img src="<?php echo $row['dpic10']; ?>" alt="">
										</div>
										<?php } ?>
									
									</div>
								</div>
								<!-- End carousel box -->
								<?php 
								} ?>
								
								<?php include("bookfeed.php"); ?>
								
								<ul class="autor-list">

									<li>

										<div class="autor-box">

											<img src="dphoto.png" alt="">

											<div class="autor-content">

												<div class="autor-title">
													<h1><a href="getposts?writter=<?php echo $row['dwritter']; ?>"><?php echo $row['dwritter']; ?></a></h1>
													
												</div>

												<p>
													<?php echo nl2br($row['dwritter_bio']); ?> 
												</p>

											</div>

										</div>

										

									</li>

								</ul>
								
								
								<div class="fb-comments" data-href="https://www.bookfrenxy.com/" data-width="" data-numposts="5"></div>
								
								<br>
											<div style="clear: both"></div>
											<b>Share this post on social media</b><br>
											<!-- AddToAny BEGIN -->
											<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
											<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
											<a class="a2a_button_facebook"></a>
											<a class="a2a_button_twitter"></a>
											<a class="a2a_button_google_plus"></a>
											<a class="a2a_button_linkedin"></a>
											<a class="a2a_button_whatsapp"></a>
											</div>
											<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
											<!-- AddToAny END -->

							</div>
							


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
							
							<div class="widget tab-posts-widget">

								<div class="title-section">
									<h1><span>Related Posts</span></h1>
								</div>
								<div class="tab-content">
									<div class="tab-pane active" id="option1">
										<ul class="list-posts">
											
											<?php
											$query= "SELECT * FROM manage_blog where dcat='$mycat' and id!='$post' order by id desc limit 4";
											$result = mysqli_query($conn,$query);
											
																  if ($result->num_rows != 0) {
																  while($row = $result->fetch_assoc()){
																  $postt=$row['id'];
																  $mpic=$row['dpic'];
																  
																  $dtitle=$row['dtitle'];
																  $dtitle=strtolower(substr(addline($dtitle), 0, 60));
																  
											?>
											<li>
												<?php if($mpic!=='') { ?>
												<img src="<?php echo $row['dpic']; ?>" alt="" style="height:60px">
												<?php } ?>
												<div class="post-content">
													<h2><a href="<?php echo $dtitle; ?>-<?php echo $postt; ?>.html"><?php echo $row['dtitle']; ?> </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i><?php echo $row['dtime']; ?></li>
													</ul>
												</div>
											</li>
											<?php
											}
											}
											?>

										</ul>
									</div>
									
								</div>
							</div>
							
							

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
}
?>