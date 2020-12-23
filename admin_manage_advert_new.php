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

			<form name="frmMain" action="admin_manage_advert_insert" method="POST" enctype="multipart/form-data">
						
						
						
						<div class="form-group">
                            <div class="input-group col-xs-10">
                                <b>Advert Category*</b>
								<select name="dcat" class="form-control" required="required">
								<option value="" selected="selected" disabled="disabled">--</option>
								<!--option value="730x90">730x90</option-->
								<option value="300x250">300x250</option>
								<option value="300x500">300x500</option>
								<option value="1140x250">1140x250</option>
								</select>
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-10">
                                <b>Advert URL*</b>
								<input type="text" name="durl" class="form-control" placeholder="Advert URL" required="required" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group col-xs-10">
                                <b>Browse Picture*</b>
								<input type="file" name="dpic" class="form-control" required="required" />
								<input type="hidden" name="dstatus" value="running">
                            </div>
                        </div>
						
						<!--div class="form-group">
                            <div class="input-group col-xs-10">
                                <b>Advert Status*</b>
								<select name="dstatus" class="form-control" required="required">
								<option value="running" selected="selected">Running</option>
								<option value="suspended">Suspended</option>
								</select>
                            </div>
                        </div-->
      
                    <div class="modal-footer" style="margin-top:20px;">
                        
                        <input type="submit" class="btn btn-primary" value=" UPLOAD ADVERT " >

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

							<p><a href="admin_manage_adverts?status=running" class="btn btn-primary btn-block"> <b>Manage Running Adverts</b> </a></p>
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

</html>
<?php
$_SESSION['msg']='';
}
?>