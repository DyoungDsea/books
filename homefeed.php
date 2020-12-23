					<!-- article box -->
							<div class="article-box">
								
								<?php
									$query= "SELECT * FROM manage_blog where dcat!='Recommended Readings' and ispublished='yes' order by id desc limit 5";
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
									// $id = $matches[1];
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
												<img src="<?php echo $row['dpic']; ?>" style="height:220px; width:100%" alt="">
												<a class="category-post world" href="posts?cat=<?php echo $row['dcat']; ?>"><?php echo $row['dcat']; ?></a>
												<?php } ?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="post-content">
												<h2><a href="<?php echo $dtitle; ?>-<?php echo $postt; ?>.html"><?php echo $row['dtitle']; ?> </a></h2>
												<ul class="post-tags">
													<li><i class="fa fa-clock-o"></i><?php echo $row['dtime']; ?></li>
												</ul>
												<p><?php echo substr(stripslashes($row['dpreview']), 0, 200); ?>...</p>
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

							
							