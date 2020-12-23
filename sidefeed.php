					<div class="widget features-slide-widget">
								<div class="title-section">
									<h1><span>Trivia</span></h1>
								</div>
								<div class="image-post-slider">
									<ul class="bxslider">
										<?php
											$query= "SELECT * FROM manage_blog where dcat='Trivia' and ispublished='yes'";
											$result = mysqli_query($conn,$query);
											
											  if ($result->num_rows != 0) {
											  while($row = $result->fetch_assoc()){
											  $postt=$row['id'];
											  $mpic=$row['dpic'];
											  
											  $dtitle=$row['dtitle'];
											  $dtitle=strtolower(substr(addline($dtitle), 0, 60));
																  
										?>
										<li>
											<div class="news-post image-post2">
												<img src="<?php echo $row['dpic']; ?>" alt="<?php echo $row['dtitle']; ?>">
												<div class="hover-box">
													<div class="inner-hover">
														<h2><a href="<?php echo $dtitle; ?>-<?php echo $postt; ?>.html"><?php echo $row['dtitle']; ?> </a></h2>
														<ul class="post-tags">
															<li><i class="fa fa-clock-o"></i>27 may 2013</li>
															<?php if($row['dwritter']!='') { ?>
															<li><i class="fa fa-user"></i>By <a href="getposts?writter=<?php echo $row['dwritter']; ?>">
															<?php echo $row['dwritter']; ?></a></li>
															<?php } ?>
															<li><i class="fa fa-clock-o"></i><?php echo $row['dtime']; ?></li>
															<li><i class="fa fa-eye"></i><?php echo $row['iviews']; ?></li>
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
							</div>

							<div class="widget tab-posts-widget">

								<div class="title-section">
									<h1><span>Latest Posts</span></h1>
								</div>
								<div class="tab-content">
									<div class="tab-pane active" id="option1">
										<ul class="list-posts">
											
											<?php
											$query= "SELECT * FROM manage_blog where ispublished='yes' order by id desc limit 5";
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