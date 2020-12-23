
		<header class="clearfix">
			<!-- Bootstrap navbar -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation">

				<!-- Top line -->
				<div class="top-line">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<ul class="top-line-list">
									<li>Bookfrenxy Admin</li>
									<li><span class="time-now"><?php echo date('D, dS M, Y - h:i a'); ?></span></li>
									<li><a href="http://www.bookfrenxy.com/webmail" target="_blank">WebMail</a></li>
									<li><a href="admin_changepass">Change Password</a></li>
									<li><a href="logout">Log Out</a></li>
								</ul>
							</div>	
						</div>
					</div>
				</div>
				<!-- End Top line -->

				<!-- Logo & advertisement -->
				<div class="logo-advertisement">
					<div class="container">

						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="admin_dashboard"><img src="logomain.png" alt="Bookfrenxy" class="img-responsive" style="height:70px;"></a>
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

								<li><a class="home" href="admin_dashboard">DASHBOARD</a></li>
								
								<!--li class="drop"><a class="home" href="#">MANAGE SUBSCRIBERS</a>
									
									<ul class="dropdown">
										<li><a href="admin_members?catt=Basic">Basic Members</a></li>
										<li><a href="admin_members?catt=Premium">Premium Members</a></li>
									</ul>
								</li-->
								
								<li class="drop"><a class="home" href="#">INSIDE</a>
									<ul class="dropdown">
										<li><a href="admin_manage_posts?cat=News">NEWS</a></li>
										<li><a href="admin_manage_posts?cat=Voices">VOICES</a></li>
										<li><a href="admin_manage_posts?cat=Leisure">LEISURE</a></li>
										<li><a href="admin_manage_posts?cat=Lists">LISTS</a></li>
										<li><a href="admin_manage_posts?cat=People">PEOPLE</a></li>
										<li><a href="admin_manage_posts?cat=Places">PLACES</a></li>
									</ul>
								</li>
								
								<li class="drop"><a class="video" href="#">FEATURES</a>
									<ul class="dropdown">
										<li><a href="admin_manage_posts?cat=Lifestyle">LIFESTYLE</a></li>
										<li><a href="admin_manage_posts?cat=Money">MONEY</a></li>
										<li><a href="admin_manage_posts?cat=Inspiration">INSPIRATION</a></li>
										<li><a href="admin_manage_posts?cat=Spotlight">SPOTLIGHT</a></li>
										<li><a href="admin_manage_posts?cat=Business">BUSINESS</a></li>
									</ul>
								</li>

								
								<li><a class="travel" href="admin_manage_posts?cat=Deals">DEALS</a></li>
								
								<li><a class="video" href="admin_manage_posts?cat=Events">EVENTS</a></li>

								<li class="drop"><a class="home" href="#">EXTRAS</a>
									<ul class="dropdown">
										<li><a href="admin_manage_posts?cat=Jobs">JOBS</a></li>
										<li><a href="admin_manage_posts?cat=Contests">CONTESTS</a></li>
										<li><a href="admin_manage_posts?cat=Giveaways">GIVEAWAYS</a></li>
										<li><a href="admin_manage_posts?cat=Trivia">TRIVIA</a></li>
										<li><a href="admin_manage_posts?cat=Community">COMMUNITY</a></li>
									</ul>
								</li>
								
								<li class="drop"><a class="home" href="#">MANAGE ADVERTS</a>
									<ul class="dropdown">
										<li><a href="admin_manage_advert_new">Create New Advert</a></li>
										<li><a href="admin_manage_adverts?status=running">Running Adverts</a></li>
									</ul>
								</li>
							
							</ul>
							
							<form class="navbar-form navbar-right" action="admin_manage_posts" method="post">
								<input type="text" id="search" name="search" placeholder="Search here" value="<?php echo $search; ?>">
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
		