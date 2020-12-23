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
							<div class="col-md-12">
								<h1 align="center" style="font-family:Arial; font-size:56px; font-weight:800">BOOKFRENXY</h1>
							</div>	
							
						</div>
					</div>
				</div>
				<!-- End Top line -->

				<!-- Logo & advertisement -->
				<div class="" style="background-color:#FFFFFF">
					<div class="container">

						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						

						<?php
							$adquery= "SELECT * FROM manage_adverts where dcat='730x90' order by rand() limit 1";
							$adresult = mysqli_query($conn,$adquery);
							
							while($adrow = $adresult->fetch_assoc()){
							$adurl=$adrow['durl'];
												  
						?>
						<div class="advertisement" style="float:left">
							<br />
							<div class="desktop-advert">
								<span>Advertisement</span>
								<a href="<?php echo $adrow['durl']; ?>" <?php if($adurl!=='#') { ?> target="_blank" <?php } ?> >
								<img src="<?php echo $adrow['dpic']; ?>" alt="" style="height:250px; width:1140px">
								</a><br /><br />
							</div>
							<div class="tablet-advert">
								<span>Advertisement</span>
								<a href="<?php echo $adrow['durl']; ?>" <?php if($adurl!=='#') { ?> target="_blank" <?php } ?> >
								<img src="<?php echo $adrow['dpic']; ?>" alt="" height="150">
								</a><br />
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
								
								<li class="drop"><a class="home" href="#">ABOUT US</a>
									
									<ul class="dropdown">
										<li><a href="about">Our Profile</a></li>
										<li><a href="contact">Contact Us</a></li>
									</ul>
								</li>

								
								<li><a class="travel" href="articles">ARTICLES</a></li>

								<li><a class="travel" href="posts?cat=Products">FEATURED BOOKS</a></li>
								
								<li><a class="video" href="posts?cat=Trending Videos">BOOK STORES</a></li>

								<li><a class="travel" href="posts?cat=Exclusives">EXCLUSIVES</a></li>

							</ul>
							<form class="navbar-form navbar-right" role="search" action="http://www.google.com/search" method="get">
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
		
<style type="text/css">
/* Fixed/sticky icon bar (vertically aligned 50% from the top of the screen) */
.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index:99999;
}

/* Style the icon bar links */
.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

/* Style the social media icons with color, if you want */
.icon-bar a:hover {
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