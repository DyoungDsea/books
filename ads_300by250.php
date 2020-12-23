						<?php
							$adquery= "SELECT * FROM manage_adverts where dcat='300x250' order by rand() limit 1";
							$adresult = mysqli_query($conn,$adquery);
							
							while($adrow = $adresult->fetch_assoc()){
							$adurl=$adrow['durl'];
												  
						?>
						
						 <div class="advertisement">
								<div class="desktop-advert">
									<span>Advertisement</span>
									<a href="<?php echo $adrow['durl']; ?>" <?php if($adurl!=='#') { ?> target="_blank" <?php } ?> >
									<img src="<?php echo $adrow['dpic']; ?>" alt="" width="300">
									</a>
								</div>
								<div class="tablet-advert">
									<span>Advertisement</span>
									<a href="<?php echo $adrow['durl']; ?>" <?php if($adurl!=='#') { ?> target="_blank" <?php } ?> >
									<img src="<?php echo $adrow['dpic']; ?>" alt="" width="300">
									</a>
								</div>
								<div class="mobile-advert">
									<span>Advertisement</span>
									<a href="<?php echo $adrow['durl']; ?>" <?php if($adurl!=='#') { ?> target="_blank" <?php } ?> >
									<img src="<?php echo $adrow['dpic']; ?>" alt="" width="300">
									</a>
								</div>
							</div>
							
							<?php
							}
							?>