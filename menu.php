<?php
// session_start();
//get account
$email=$_SESSION['em'];

include("query_profile.php");
?>

<style type="text/css">
/* Fixed/sticky icon bar (vertically aligned 50% from the top of the screen) */
.icon-bar2 {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index:99999;
}

/* Style the icon bar links */
.icon-bar2 a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

/* Style the social media icons with color, if you want */
.icon-bar2 a:hover {
  background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.linkedin {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.instagram {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}
</style>

<style type="text/css">
#mobileshow { 
display:none; 
}
@media screen and (max-width: 600px) {
#mobileshow { 
display:block; }
}

#desktopshow { 
display:none; 
}
@media screen and (min-width: 600px) {
#desktopshow { 
display:block; }
}
</style>

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
									<li><a href="about">About Us</a></li>
									<li><a href="advertise">Advertise</a></li>
									<li><a href="contact">Contact Us</a></li>
									<?php if (mysqli_num_rows($mresult)==0) { ?>
									<!--li><a href="subscribe">Subscribe</a></li-->
									<!--li><a href="login">Login</a></li-->
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
							<!--a class="navbar-brand" href="index"><img src="logomain.png" alt="Book Frenxy" style="height:80px;" class="img-thumbnail"></a-->
							<h1 align="center" style="font-family:Arial; font-size:45px; font-weight:800; margin-top:-1px;" id="mobileshow"><a href="home" style="text-decoration:none; color:#333333">BOOKFRENXY</a></h1>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<h1 align="center" style="font-family:Arial; font-size:76px; font-weight:800" id="desktopshow"><a href="home" style="text-decoration:none; color:#333333">BOOKFRENXY</a></h1>
								
								
							</div>	
							
						</div>

						
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
										<li><a href="posts?cat=Inspiration">INSPIRATION</a></li>
										<li><a href="posts?cat=Spotlight">SPOTLIGHT</a></li>
										<li><a href="posts?cat=Business">BUSINESS</a></li>
									</ul>
								</li>

								
								<li><a class="travel" href="posts?cat=Deals">DEALS</a></li>
								
								<li><a class="video" href="posts?cat=Events">EVENTS</a></li>

								<li class="drop"><a class="home" href="#">EXTRAS</a>
									<ul class="dropdown">
										<li><a href="posts?cat=Jobs">JOBS</a></li>
										<li><a href="posts?cat=Contests">CONTESTS</a></li>
										<li><a href="posts?cat=Giveaways">GIVEAWAYS</a></li>
										<li><a href="posts?cat=Trivia">TRIVIA</a></li>
										<li><a href="posts?cat=Community">COMMUNITY</a></li>
									</ul>
								</li>
								
								<li><a class="home" href="about">ABOUT US</a></li>
								
								<li class="drop" id="mobileshow"><a class="travel" href="#">CONTACT US</a>
									<ul class="dropdown">
										<li><a href="advertise">Advertise</a></li>
										<li><a href="contact">Contact Us</a></li>
									</ul>
								</li>

							</ul>
							<form class="navbar-form navbar-right" role="search" action="https://www.google.com/search" method="get">
								<input type="text" id="search" name="q" placeholder="Search here">
								<input type="hidden" name="sitesearch" value="bookfrenxy.com" />
								<button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
							</form>
							
							
						</div>
						<!-- /.navbar-collapse -->
					</div>
				</div>
				<!-- End navbar list container -->

			</nav>
			<!-- End Bootstrap navbar -->

		</header>
		
				