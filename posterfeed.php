					<!-- article box -->
							<div class="article-box">
								<div class="title-section">
									<h1 style="font-size:36px"><span class="world"><?php echo strtoupper($dcategory); ?></span></h1>
								</div>

								<?php
								$page_name="getposts"; 
								  $start=$_GET['start'];// 
								  if(!($start > 0)) { 
								  $start = 0;
								}
								$eu = ($start - 0);
								$limit = 10; // No of records to be shown per page.
								$thi = $eu + $limit;
								$back = $eu - $limit;
								$next = $eu + $limit;										

									$query= "SELECT * FROM manage_blog where dwritter='$writter' and ispublished='yes' order by id desc limit $eu, $limit";
									$result = mysqli_query($conn,$query);
											
									if ($result->num_rows != 0) {
									while($row = $result->fetch_assoc()){
									$postt=$row['id'];
									$mycat=$row['dcat'];
									
									$dtitle=$row['dtitle'];
									$dtitle=strtolower(substr(addline($dtitle), 0, 60));
									
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
												<?php if($mycat=='Featured Videos') { ?>
												<iframe id="ytplayer" type="text/html" width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="https://www.youtube.com/embed/<?php echo $id; ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
												<?php } else { ?>
												<img src="<?php echo $row['dpic']; ?>" alt="">
												<a class="category-post world" href="posts?cat=<?php echo $row['dcat']; ?>"><?php echo $row['dcat']; ?></a>
												<?php } ?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="post-content">
												<h2><a href="<?php echo $dtitle; ?>-<?php echo $postt; ?>.html"><?php echo $row['dtitle']; ?> </a></h2>
												<ul class="post-tags">
													<li><i class="fa fa-clock-o"></i><?php echo $row['dtime']; ?></li>
													<li><i class="fa fa-eye"></i><?php echo $row['iviews']; ?></li>
												</ul>
												<p><?php echo substr(stripslashes(nl2br($row['dcontent'])), 0, 250); ?>...</p>
												<a href="<?php echo $dtitle; ?>-<?php echo $postt; ?>.html" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
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
							