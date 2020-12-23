					<!-- article box -->
							<div class="article-box" style="margin-top:-40px;">
								<div class="title-section">
									<h1 style="font-size:36px"><span class="world"><?php echo strtoupper($dcategory); ?></span></h1>
								</div>

								<?php
								$queryy= "SELECT * FROM dbooks where ssid='$dssid' order by id asc";
									$resulty = mysqli_query($conn,$queryy);
											
									while($rowy = $resulty->fetch_assoc()){
																  
								?>
								
								<div class="news-post article-post">
									<div class="row">
										<div class="col-sm-4">
											<div class="post-gallery">
												<img src="<?php echo $rowy['dpic']; ?>" alt="">
												
											</div>
										</div>
										<div class="col-sm-8">
											<div class="post-content">
												<h2><?php echo $rowy['dtitle']; ?></h2><small>By <?php echo $rowy['dauthor']; ?></small>
												<p><?php echo stripslashes(nl2br($rowy['ddescr'])); ?></p>
												<h4 style="color:#993300"><?php echo $rowy['dcost']; ?></h4>
												<?php if($rowy['dapple']) { ?>
												<a href="<?php echo $rowy['dapple']; ?>" target="_blank" class="btn btn-primary btn-sm"> Apple </a> 
												<?php } ?>
												<?php if($rowy['dbn']) { ?>
												<a href="<?php echo $rowy['dbn']; ?>" target="_blank" class="btn btn-primary btn-sm"> B &amp; N </a> 
												<?php } ?>
												<?php if($rowy['damazon']) { ?>
												<a href="<?php echo $rowy['damazon']; ?>" target="_blank" class="btn btn-primary btn-sm"> Amazon </a> 
												<?php } ?>
												<?php if($rowy['dgoogle']) { ?>
												<a href="<?php echo $rowy['dgoogle']; ?>" target="_blank" class="btn btn-primary btn-sm"> Google </a> 
												<?php } ?>
												<?php if($rowy['dkobo']) { ?>
												<a href="<?php echo $rowy['dkobo']; ?>" target="_blank" class="btn btn-primary btn-sm"> Kobo </a> 
												<?php } ?>
												<?php if($rowy['dbam']) { ?>
												<a href="<?php echo $rowy['dbam']; ?>" target="_blank" class="btn btn-primary btn-sm"> BAM </a> 
												<?php } ?>
												<?php if($rowy['dkonga']) { ?>
												<a href="<?php echo $rowy['dkonga']; ?>" target="_blank" class="btn btn-primary btn-sm"> Konga </a> 
												<?php } ?>
												<?php if($rowy['djumia']) { ?>
												<a href="<?php echo $rowy['djumia']; ?>" target="_blank" class="btn btn-primary btn-sm"> Jumia </a> 
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								
								<?php
								}
								?>

								

							</div>
							<!-- End article box -->

							