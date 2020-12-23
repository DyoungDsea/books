<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

include("conn.php");

//get account
$email=$_SESSION['email_address'];

$query= "SELECT * FROM admin_account WHERE email_address='$email' and status='online'";
$result = mysqli_query($conn,$query);
$row = $result->fetch_assoc();
$id=$row['id'];
$full_name=$row['full_name'];
$email_address=$row['email_address'];
 

if (mysqli_num_rows($result)==0) 
{
$_SESSION["msg"]="<font color=red><b>Invalid Operation!<br>you must login to continue.</b></font>";
header("location: index");
}
else {

$dcat=$_GET['cat'];
?>
<!doctype html>
<html lang="en" class="no-js">

<!-- Mirrored from nunforest.com/hotmagazine/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 02:35:27 GMT -->
<head>
	<title>Bookfrenxy Interactive | Home</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
	<link href="../../../maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="favicon.png" type="image/x-icon" />
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/ticker-style.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">


<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  
</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Start Header -->
		<?php include("menu_admin.php"); ?>
		<!-- End Header -->

		
		
		<!-- block-wrapper-section
			================================================== -->
		<section class="block-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">

						<!-- block content -->
						<div class="block-content">

							<!-- carousel box -->
							<div class="carousel-box owl-wrapper">

								<div class="title-section">
									<h1 style="font-size:24px"><span class="world">Admin Panel &raquo; New Post &raquo; <?php echo $dcat; ?></span></h1>
								</div>

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									
									
									
<!-- The Post textarea panel   -->

			<form name="frmMain" action="admin_manage_post_insert" method="POST" enctype="multipart/form-data">
						
						<div class="form-group">
                            <div class="input-group col-xs-12">
                                <b>Category*</b>
								<select name="dcat" class="form-control" required="required">
								<?php if ($dcat=='') { ?>
								<option selected="selected" value="">--</option>
								<?php } else { ?>
								<option selected="selected" value="<?php echo $dcat; ?>"><?php echo strtoupper($dcat); ?></option>
								<?php } ?>
								<option value="" disabled="disabled">--INSIDE--</option>
								<option value="News">NEWS</option>
								<option value="Voices">VOICES</option>
								<option value="Leisure">LEISURE</option>
								<option value="Lists">LISTS</option>
								<option value="People">PEOPLE</option>
								<option value="Places">PLACES</option>
								
								<option value="" disabled="disabled">--FEATURES--</option>
								<option value="Lifestyle">LIFESTYLE</option>
								<option value="Money">MONEY</option>
								<option value="Inspiration">INSPIRATION</option>
								<option value="Spotlight">SPOTLIGHT</option>
								<option value="Business">BUSINESS</option>
								
								<option value="" disabled="disabled">--</option>		
								<option value="Deals">DEALS</option>
								
								<option value="" disabled="disabled">--</option>
								<option value="Events">EVENTS</option>

								<option value="" disabled="disabled">--EXTRAS--</option>
								<option value="Jobs">JOBS</option>
								<option value="Contests">CONTESTS</option>
								<option value="Giveaways">GIVEAWAYS</option>
								<option value="Trivia">TRIVIA</option>
								<option value="Community">COMMUNITY</option>
								</select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-12">
                                <b>Post Title*</b>
								<input type="text" name="dtitle" class="form-control" placeholder="Post Title" required="required" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-12">
                                <b>Post Preview Text*</b> <small><i>(200 characters max.)</i></small>
								<textarea name="dpreview" class="form-control" required="required" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group col-xs-12">
                               <b> Article Body*</b>
								<textarea name="dcontent" id="editor1" class="form-control" placeholder="Article..." rows="15" required="required"></textarea>
								<script>
									CKEDITOR.replace( 'editor1' );
								</script>
                            </div>
                        </div>
						
						<?php if($dcat!=='Recommended Readings') { ?>
						<div class="form-group">
                            <div class="input-group col-xs-11">
                                <b>Youtube URL<?php if($dcat=='Featured Videos' or $dcat=='Audio Books') { ?>*<?php } ?></b>
								<input type="text" name="durl" class="form-control" placeholder="Enter Youtube URL" <?php if($dcat=='Featured Videos' or $dcat=='Audio Books') { ?> required="required" <?php } ?> />
                            </div>
                        </div>
						<?php } ?>
						
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture<?php if($dcat!=='Featured Videos') { ?>*<?php } ?></b>
								<input type="file" name="dpic" class="form-control" <?php if($dcat!=='Featured Videos') { ?> required="required" <?php } ?> />
                            </div>
                        </div>
						
						<?php if($dcat!=='Featured Videos' and $dcat!=='Audio Books' and $dcat!=='Recommended Readings') { ?>
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture</b>
								<input type="file" name="dpic2" class="form-control" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture</b>
								<input type="file" name="dpic3" class="form-control" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture</b>
								<input type="file" name="dpic4" class="form-control" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture</b>
								<input type="file" name="dpic5" class="form-control" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture</b>
								<input type="file" name="dpic6" class="form-control" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture</b>
								<input type="file" name="dpic7" class="form-control" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture</b>
								<input type="file" name="dpic8" class="form-control" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture</b>
								<input type="file" name="dpic9" class="form-control" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-8">
                                <b>Browse Picture</b>
								<input type="file" name="dpic10" class="form-control" />
                            </div>
                        </div>
						<?php } ?>
						
						<div class="form-group">
                            <div class="input-group col-xs-11">
                                <b>Written By:</b>
								<input type="text" name="dwritter" class="form-control" value="The Bookfrenxy Team" required="required" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-11">
                                <b>Writer's Bio:</b>
								<textarea name="dwritter_bio" class="form-control" required="required" rows="2"></textarea>
                            </div>
                        </div>
      
                    <div class="modal-footer" style="margin-top:20px;">
                        
                        <input type="submit" class="btn btn-primary" value=" ADD POST " >

                    </div>
                </form>


<!-- The End Post textarea panel -->
									
									
									
								</div>
							</div>
							<!-- End carousel box -->

						</div>
						<!-- End block content -->

					</div>

					<div class="col-sm-4">

						<!-- sidebar -->
						<div class="sidebar">

							<p><a href="admin_manage_posts?cat=<?php echo $dcat; ?>" class="btn btn-primary btn-block"> <b>Manage Posts</b> </a></p>
							<hr>
							
							<?php
							//ads 300x250
							include("ads_300by250.php");
							//-----------
							?>

						</div>
						<!-- End sidebar -->

					</div>

				</div>

			</div>
		</section>
		<!-- End block-wrapper-section -->

		

		

		<!-- footer -->
		<?php include("admin_footer.php"); ?>
		<!-- End footer -->

	</div>
	<!-- End Container -->
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.ticker.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
  	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
	<script type="text/javascript" src="js/plugins-scroll.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</body>

<!-- Mirrored from nunforest.com/hotmagazine/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 02:37:25 GMT -->
</html>
<?php
$_SESSION['msg']='';
}
?>