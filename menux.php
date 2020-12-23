<?php
//get account
$email=$_SESSION['em'];

include("query_profile.php");
?>
		<header class="clearfix">
			<!-- Bootstrap navbar -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation">

				<!-- Top line -->
				<div class="top-line">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<ul class="top-line-list">
									<li><span class="time-now"><?php echo date('D, dS M, Y - h:i a'); ?></span></li>
									<li><a href="advertise">Advertise</a></li>
									<li><a href="contact">Contact Us</a></li>
									<?php if (mysqli_num_rows($mresult)==0) { ?>
									<li><a href="subscribe">Subscribe</a></li>
									<li><a href="login">Log In</a></li>
									<?php } else { ?>
									<li><a href="userhome"><b>Hi <?php echo $mdname; ?>!</b></a></li>
									<li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
									<?php } ?>
								</ul>
							</div>	
							<div class="col-md-3">
								<ul class="social-icons">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a class="linkedin" href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>	
						</div>
					</div>
				</div>
				<!-- End Top line -->

				<!-- Logo & advertisement -->
				<div class="logo-advertisement" style="background-color:#FFFFFF">
					<div class="container">

						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index"><img src="logomain.png" alt="Book Frenxy" style="height:80px;" class="img-thumbnail"></a>
						</div>

						<?php
							$adquery= "SELECT * FROM manage_adverts where dcat='730x90' order by rand() limit 1";
							$adresult = mysqli_query($conn,$adquery);
							
							while($adrow = $adresult->fetch_assoc()){
							$adurl=$adrow['durl'];
												  
						?>
						<div class="advertisement">
							<br />
							<div class="desktop-advert">
								<span>Advertisement</span>
								<a href="<?php echo $adrow['durl']; ?>" <?php if($adurl!=='#') { ?> target="_blank" <?php } ?> >
								<img src="<?php echo $adrow['dpic']; ?>" alt="" height="90">
								</a>
							</div>
							<div class="tablet-advert">
								<span>Advertisement</span>
								<a href="<?php echo $adrow['durl']; ?>" <?php if($adurl!=='#') { ?> target="_blank" <?php } ?> >
								<img src="<?php echo $adrow['dpic']; ?>" alt="" height="90">
								</a>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<!-- End Logo & advertisement -->

				<!-- navbar list container -->
				<div class="nav-list-container">
					<div class="container">
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-left">

								<li><a class="home" href="index">HOME</a></li>
								
								<li class="drop"><a class="travel" href="#">ABOUT US</a>
									<ul class="dropdown">
										<li><a href="about">Our Profile</a></li>
										<li><a href="contact">Contact Us</a></li>
									</ul>
								</li>
								
								<li class="drop"><a class="home" href="#">INSIDE</a>
									<ul class="dropdown">
										<li><a href="posts?cat=News">NEWS</a></li>
										<li><a href="posts?cat=Voices">VOICES</a></li>
										<li><a href="posts?cat=Leisure">LEISURE</a></li>
										<li><a href="posts?cat=Lists">LISTS</a></li>
										<li><a href="posts?cat=People">PEOPLE</a></li>
										<li><a href="posts?cat=Places">PLACES</a></li>
									</ul>
								</li>
								
								<li class="drop"><a class="video" href="#">FEATURES</a>
									<ul class="dropdown">
										<li><a href="posts?cat=Lifestyle">LIFESTYLE</a></li>
										<li><a href="posts?cat=Money">MONEY</a></li>
										<li><a href="posts?cat=Mindset">MINDSET</a></li>
										<li><a href="posts?cat=Work">WORK</a></li>
										<li><a href="posts?cat=Business">BUSINESS</a></li>
									</ul>
								</li>

								
								<li><a class="travel" href="posts?cat=Deals">DEALS</a></li>
								
								<li><a class="video" href="posts?cat=Events">EVENTS</a></li>

								<li class="drop"><a class="home" href="#">EXTRAS</a>
									<ul class="dropdown">
										<li><a href="posts?cat=Jobs">JOBS</a></li>
										<li><a href="posts?cat=Contests">Contests</a></li>
										<li><a href="posts?cat=Giveaways">GIVEAWAYS</a></li>
										<li><a href="posts?cat=Trivia">TRIVIA</a></li>
										<li><a href="posts?cat=Community">COMMUNITY</a></li>
									</ul>
								</li>

							</ul>
							<form class="navbar-form navbar-right" role="search" action="http://www.google.com/search" method="get">
								<input type="text" id="search" name="q" placeholder="Search here">
								<input type="hidden" name="sitesearch" value="bookfrenxy.com" />
								<button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
							</form>
							
							<?php
							$adquery= "SELECT * FROM manage_adverts where dcat='730x90' order by rand() limit 1";
							$adresult = mysqli_query($conn,$adquery);
							
							while($adrow = $adresult->fetch_assoc()){
							$adurl=$adrow['durl'];
												  
							?>
						
								<a href="<?php echo $adrow['durl']; ?>" <?php if($adurl!=='#') { ?> target="_blank" <?php } ?> >
								<img src="<?php echo $adrow['dpic']; ?>" alt=""  style="height:250px; width:1140px">
								</a>
							<?php
							}
							?>
						</div>
						<!-- /.navbar-collapse -->
					</div>
				</div>
				<!-- End navbar list container -->

			</nav>
			<!-- End Bootstrap navbar -->

		</header>
		