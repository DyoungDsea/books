					<!-- article box -->
							<div class="article-box">
								<div class="title-section">
									<h1><span class="world">Trending Music</span></h1>
								</div>

								<?php
								$page_name="trending-music"; 
								  $start=$_GET['start'];// 
								  if(!($start > 0)) { 
								  $start = 0;
								}
								$eu = ($start - 0);
								$limit = 10; // No of records to be shown per page.
								$thi = $eu + $limit;
								$back = $eu - $limit;
								$next = $eu + $limit;										

									$query= "SELECT * FROM manage_blog where dcat='Trending Music' order by id desc limit $eu, $limit";
									$result = mysqli_query($conn,$query);
											
									if ($result->num_rows != 0) {
									while($row = $result->fetch_assoc()){
									$postt=$row['id'];
									$mycat=$row['dcat'];
									
									//format video if any
									$vurl = $row['durl'];
									preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
									$id = $matches[1];
									$width = '100%';
									$height = '250px';
																  
								?>
								
								<div class="news-post article-post">
									<div class="row">
										<div class="col-sm-6">
											<div class="post-gallery">
												<img src="<?php echo $row['dpic']; ?>" alt="">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="post-content">
												<h2><a href="#"><?php echo $row['dtitle']; ?> </a></h2>
												<ul class="post-tags">
													<li><i class="fa fa-clock-o"></i><?php echo $row['dtime']; ?></li>
													<li><i class="fa fa-arrow-circle-down"></i><?php echo $row['iviews']; ?></li>
												</ul>
												<p><?php echo $row['dcontent']; ?></p>
												<a href="try_download?mid=<?php echo $row['id']; ?>&durl=<?php echo $row['dpic2']; ?>" class="read-more-button" target="_blank"><i class="fa fa-arrow-circle-down"></i>Download Music</a>
											</div>
										</div>
									</div>
								</div>
								
								<?php
								}
								}
								?>

								

							</div>
							<!-- End article box -->

							<?php if(mysqli_num_rows($result)>$limit) { ?>
							 <p align="center"><br>
							 <?php echo "<a href='$page_name?start=$back&cat={$dcategory}'> <button class='btn btn-default btn-sm' data-toggle='tooltip' title='Previous'><i class='fa fa-chevron-left'></i></button></a>";  ?>
                         	 <?php echo "<a href='$page_name?start=$next&cat={$dcategory}'> <button class='btn btn-default btn-sm' data-toggle='tooltip' title='Next'><i class='fa fa-chevron-right'></i></button></a>";  ?>
						 	  </p>
							 <?php } ?>
							