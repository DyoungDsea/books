<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");
include('function-format-url.php');

$_SESSION["loginto"]=$_SERVER["REQUEST_URI"];

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<title>Bookfrenxy | Bookish News &amp; Trends, Book Culture, Reading Recommendations, Events</title>

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

		<!-- heading-news-section2
			================================================== -->
		<section class="heading-news2">

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
					<img src="<?php echo $adrow['dpic']; ?>" alt=""  style="height:250px; width:100%" class="img-responsive" id="desktopshow">
					<img src="<?php echo $adrow['dpic']; ?>" alt=""  style="width:100%" class="img-responsive" id="mobileshow">
					</a>
					</p>
				<?php
				}
				//-------------------------------------------------------------------------------------
				?>
				
				<div class="ticker-news-box">
					<span class="breaking-news">Top Stories</span>
					<ul id="js-news">
							<?php
								$query= "SELECT * FROM manage_blog where dcat='News' and ispublished='yes' order by id desc limit 7";
								$result = mysqli_query($conn,$query);
							
									if ($result->num_rows != 0) {
									while($row = $result->fetch_assoc()){
									$postx=$row['id'];
									$dtitle=$row['dtitle'];
									$dtitle=strtolower(substr(addline($dtitle), 0, 60));
												  
							?>
							<li class="news-item">
							<span class="time-news"><?php echo $row['dtime']; ?></span>  
							<a href="<?php echo $dtitle; ?>-<?php echo $postx; ?>.html" style="color:#333333;"><?php echo $row['dtitle']; ?>...</a> 
							</li>
							<?php
							}
							}
							?>
					</ul>
				</div>

				<div class="iso-call heading-news-box">
					<div class="image-slider snd-size">
						<span class="top-stories">Latest Posts</span>
						<ul class="bxslider">
							
							<?php
							$query= "SELECT * FROM manage_blog where dcat='News' and ispublished='yes' order by id desc limit 7";
							$result = mysqli_query($conn,$query);
							
												  if ($result->num_rows != 0) {
												  while($row = $result->fetch_assoc()){
												  $post=$row['id'];
												  $dtitle=$row['dtitle'];
												  $dtitle=strtolower(substr(addline($dtitle), 0, 60));
												  
							?>
							<li>
								<div class="news-post image-post" style="overflow: hidden; height:480px;">
									<img src="<?php echo $row['dpic']; ?>"  alt="">
									<div class="hover-box">
										<div class="inner-hover">
											<h2><a href="<?php echo $dtitle; ?>-<?php echo $post; ?>.html"><?php echo $row['dtitle']; ?> </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i><?php echo $row['dtime']; ?></li>
												<?php if($row['dwritter']!='') { ?>
												<li><i class="fa fa-user"></i>by <a href="getposts?writter=<?php echo $row['dwritter']; ?>"><?php echo $row['dwritter']; ?></a></li>
												<?php } ?>
												<!--li><i class="fa fa-eye"></i><?php //echo $row['iviews']; ?></li-->
											</ul>
										</div>
									</div>
								</div>
							</li>
							<?php
							}
							}
							?>							

						</ul>
					</div>

					<div class="news-post image-post default-size" style="overflow: hidden; height:240px;">
						<?php
							$query= "SELECT * FROM manage_blog where dcat='Voices' and ispublished='yes' order by rand() limit 1";
							$result = mysqli_query($conn,$query);
							
												  if ($result->num_rows != 0) {
												  while($row = $result->fetch_assoc()){
												  $post=$row['id'];
												  $dtitle=$row['dtitle'];
												  $dtitle=strtolower(substr(addline($dtitle), 0, 60));
												  
						?>
						<img src="<?php echo $row['dpic']; ?>" style="height:240px;">
						<div class="hover-box">
							<div class="inner-hover">
											<a class="category-post travel" href="posts?cat=<?php echo $row['dcat']; ?>">Voices</a>
								<h2><a href="<?php echo $dtitle; ?>-<?php echo $post; ?>.html"><?php echo $row['dtitle']; ?></a></h2>
								
							</div>
						</div>
						<?php
						}
						}
						?>
					</div>

					<div class="news-post image-post" style="overflow: hidden; height:240px;">
						<?php
							$query= "SELECT * FROM manage_blog where dcat='Lifestyle' and ispublished='yes' order by rand() limit 1";
							$result = mysqli_query($conn,$query);
							
												  if ($result->num_rows != 0) {
												  while($row = $result->fetch_assoc()){
												  $post=$row['id'];
												  $dtitle=$row['dtitle'];
												  $dtitle=strtolower(substr(addline($dtitle), 0, 60));
												  
						?>
						<img src="<?php echo $row['dpic']; ?>" style="height:240px;">
						<div class="hover-box">
							<div class="inner-hover">
											<a class="category-post travel" href="posts?cat=<?php echo $row['dcat']; ?>">Lifestyle</a>
								<h2><a href="<?php echo $dtitle; ?>-<?php echo $post; ?>.html"><?php echo $row['dtitle']; ?></a></h2>
								
							</div>
						</div>
						<?php
						}
						}
						?>
					</div>

					
				</div>
			</div>

		</section>
		<!-- End heading-news-section -->
		
		
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
								
								<?php include("homefeed.php"); ?>
								
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
							include("sidefeed.php");
							//-----------
							?>
							
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

		
		<!-- features-today-section
			================================================== -->
		<section class="features-today">
			<div class="container">

				<div class="title-section">
					<h1><span>RECOMMENDED READING</span></h1>
				</div>

				<div class="features-today-box owl-wrapper">
					<div class="owl-carousel" data-num="4">
					
						<?php
							$query= "SELECT * FROM manage_blog where dcat='Recommended Readings' and ispublished='yes' order by rand() limit 7";
							$result = mysqli_query($conn,$query);
							
												  if ($result->num_rows != 0) {
												  while($row = $result->fetch_assoc()){
												  $post=$row['id'];
												  $dtitle=$row['dtitle'];
												  $dtitle=strtolower(substr(addline($dtitle), 0, 60));
												  
						?>
						<div class="item news-post standard-post">
							<div class="post-gallery">
								<a href="<?php echo $dtitle; ?>-<?php echo $post; ?>.html"><img src="<?php echo $row['dpic']; ?>" style="height:200px;" ></a>
								<a class="category-post world" href="posts?cat=<?php echo $row['dcat']; ?>"><?php echo $row['dcat']; ?></a>
							</div>
							<div class="post-content">
								<h2><a href="<?php echo $dtitle; ?>-<?php echo $post; ?>.html"><?php echo $row['dtitle']; ?> </a></h2>
							</div>
						</div>
						<?php
						}
						}
						?>



					</div>
				</div>

			</div>
		</section>
		<!-- End features-today-section -->

		<!-- block-wrapper-section
			================================================== -->
		<section class="block-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">

						<!-- block content -->
						<div class="block-content">

							<!-- masonry box -->
							<div class="masonry-box">

								<div class="title-section">
									<h1><span>DEALS</span></h1>
								</div>

								<div class="latest-articles iso-call">

									<?php
									$query= "SELECT * FROM manage_blog where dcat='Deals' and ispublished='yes' order by rand() limit 2";
									$result = mysqli_query($conn,$query);
											
									if ($result->num_rows != 0) {
									while($row = $result->fetch_assoc()){
									$postt=$row['id'];
									$mpic=$row['dpic'];
									$dtitle=$row['dtitle'];
									$dtitle=strtolower(substr(addline($dtitle), 0, 60));
																  
									?>
									<div class="news-post standard-post2 default-size">
										<div class="post-gallery">
											<a href="<?php echo $dtitle; ?>-<?php echo $postt; ?>.html" title="click to view details">
											<img src="<?php echo $row['dpic']; ?>" alt="">
											</a>
										</div>
										<div class="post-title">
											<h2><a href="<?php echo $dtitle; ?>-<?php echo $postt; ?>.html"><?php echo $row['dtitle']; ?> </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i><?php echo $row['dtime']; ?></li>
												<?php if($row['dwritter']!='') { ?>
												<li><i class="fa fa-user"></i>by <a href="#"><?php echo $row['dwritter']; ?></a></li>
												<?php } ?>
												<li><a href="#"><i class="fa fa-eye"></i><span><?php echo $row['iviews']; ?></span></a></li>
											</ul>
										</div>
									</div>
									<?php
									}
									}
									else {
									echo '<font color=red>No deal available at the moment</font>';
									}
									?>

								</div>

							</div>
							<!-- End masonry box -->
							
							

						</div>
						<!-- End block content -->

					</div>

					<div class="col-sm-4">

						<!-- sidebar -->
						<div class="sidebar">

							<div class="widget features-slide-widget">
								<?php
								//ads 300x500
								include("ads_300by500.php");
								//-----------
								?>
							</div>

						</div>
						<!-- End sidebar -->

					</div>

				</div>

			</div>
		</section>
		<!-- End block-wrapper-section -->
		
		<!-- features-today-section
			================================================== -->
		<section class="block-wrapper">
			<div class="container">

				<div class="title-section">
					<h1><span>FEATURED AUDIO BOOKS</span></h1>
				</div>

				<div class="features-today-box owl-wrapper">
					<div class="owl-carousel" data-num="4">
					
						<?php
							$query= "SELECT * FROM manage_audios where dpic!='' order by rand() limit 7";
							$result = mysqli_query($conn,$query);
							
												  if ($result->num_rows != 0) {
												  while($row = $result->fetch_assoc()){
												  $post=$row['id'];
												  $dtitle=$row['dtitle'];
												  
						?>
						<div class="item news-post standard-post" align="center">
							<div class="post-gallery">
								<a href="<?php echo $row['durl']; ?>" title="cick to read <?php echo $dtitle; ?>" target="_blank"><img src="<?php echo $row['dpic']; ?>" style="height:300px; width:250px" ></a>
							</div>
							
						</div>
						<?php
						}
						}
						?>



					</div>
				</div>

			</div>
		</section>
		<!-- End features-today-section -->
		
		<br><br>

		<!-- feature-video-section 
			================================================== -->
		<section class="feature-video">
			<div class="container">
				<div class="title-section white">
					<h1><span>Featured Video</span></h1>
				</div>

				<div class="features-video-box owl-wrapper">
					<div class="owl-carousel" data-num="4">
					
						
						<?php
							$query= "SELECT * FROM manage_blog where dcat='Featured Videos' and ispublished='yes' order by id desc limit 5";
							$result = mysqli_query($conn,$query);
							
							if ($result->num_rows != 0) {
							while($row = $result->fetch_assoc()){
							$post=$row['id'];
							$dtitle=$row['dtitle'];
							$dtitle=strtolower(substr(addline($dtitle), 0, 60));
												  
							//format video
							$vurl = $row['durl'];
							preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
							$id = $matches[1];
							$width = '100%';
							$height = '200px';
												  
						?>
						<div class="item news-post video-post">
							<iframe id="ytplayer" type="text/html" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="https://www.youtube.com/embed/<?php echo $id; ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
							<a href="<?php echo $row['durl']; ?>" class="video-link"><i class="fa fa-play-circle-o"></i></a>
							<div class="hover-box">
								<h2><a href="<?php echo $dtitle; ?>-<?php echo $post; ?>.html"><?php echo $row['dtitle']; ?> </a></h2>
								<ul class="post-tags">
									<li><i class="fa fa-clock-o"></i><?php echo $row['dtime']; ?></li>
								</ul>
							</div>
						</div>
						<?php
						}
						}
						?>
					
					
					</div>
				</div>
			</div>
		</section>
		<!-- End feature-video-section -->

		

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

</html>