					<!-- article box -->
							<div class="article-box">
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
										<div class="col-sm-5">
											<div class="post-gallery">
												<img src="<?php echo $rowy['dpic']; ?>" alt="">
												<a class="category-post world" href="#"><?php echo $rowy['dcategory']; ?></a>
												
											</div>
										</div>
										<div class="col-sm-7">
											<div class="post-content">
												<h2><?php echo $rowy['dtitle']; ?></h2>
												<p><?php echo substr(stripslashes(nl2br($rowy['ddescr'])), 0, 250); ?>...</p>
												<a href="admin_book_edit?post=<?php echo $post; ?>&item=<?php echo $rowy['id']; ?>&catt=group" class="read-more-button">Edit Book</a> 
												<a href="admin_book_delete?post=<?php echo $post; ?>&item=<?php echo $rowy['id']; ?>&catt=group" class="read-more-button" onClick="return confirm('Are you sure that you want to delete this book ?')">Delete Book</a>
											</div>
										</div>
									</div>
								</div>
								
								<?php
								}
								?>

								

							</div>
							<!-- End article box -->

							