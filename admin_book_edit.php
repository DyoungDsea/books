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

$post=$_GET['post'];// 

$query= "SELECT * FROM manage_blog where id='$post'";
$result = mysqli_query($conn,$query);

if ($result->num_rows != 0) {
while($row = $result->fetch_assoc()){
$mycat=$row['dcat'];
$dssid=$row['ssid'];

//format video if any
$vurl = $row['durl'];
preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
$id = $matches[1];
$width = '100%';
$height = '400px';
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<title>Bookfrenxy Interactive | Admin Panel</title>

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

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									
									
									
<!-- The Post textarea panel   -->




							<!-- single-post box -->
							<div class="single-post-box">

<?php
$item=$_GET['item'];
$catt=$_GET['catt'];
$queryy= "SELECT * FROM dbooks where id='$item' order by id desc";
$resulty = mysqli_query($conn,$queryy);
		
while($rowy = $resulty->fetch_assoc()){							  
?>
								<h3>EDIT BOOK</h3>
							<form method="post" name="fxx" action="admin_post_updatebook" enctype="multipart/form-data">
							<input type="hidden" name="ssid" value="<?php echo $rowy['ssid']; ?>">
							<input type="hidden" name="post" value="<?php echo $post; ?>">
							<input type="hidden" name="item" value="<?php echo $item; ?>">
							<input type="hidden" name="catt" value="<?php echo $catt; ?>">
								<div class="row">
								<div class="col-md-12">
								<p>*Book Title: <input type="text" name="dtitle" class="form-control" value="<?php echo $rowy['dtitle']; ?>" required></p>
								</div>
								</div>
								
								<div class="row">
								<div class="col-md-12">
								<p>*Author: <input type="text" name="dauthor" class="form-control" value="<?php echo $rowy['dauthor']; ?>" required ></p>
								</div>
								</div>
								
								<div class="row">
								<div class="col-md-12">
								<p>*Short Description: <textarea name="ddescr" rows="4" class="form-control" required ><?php echo stripslashes($rowy['ddescr']); ?></textarea></p>
								</div>
								</div>
								
								<div class="row">
								<div class="col-md-12">
								<p>Category: <input type="text" name="dcategory" class="form-control" value="<?php echo $rowy['dcategory']; ?>"></p>
								</div>
								</div>
								
								<div class="row">
								<div class="col-md-7">
								<p>*Cost: <input type="text" name="dcost" class="form-control" value="<?php echo $rowy['dcost']; ?>" required></p>
								</div>
								</div>
								
								<div class="row">
								<div class="col-md-12">
								<p>Apple: <input type="text" name="dapple" class="form-control" value="<?php echo $rowy['dapple']; ?>"></p>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12">
								<p>B &amp; N: <input type="text" name="dbn" class="form-control" value="<?php echo $rowy['dbn']; ?>"></p>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12">
								<p>Amazon: <input type="text" name="damazon" class="form-control" value="<?php echo $rowy['damazon']; ?>"></p>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12">
								<p>Google: <input type="text" name="dgoogle" class="form-control" value="<?php echo $rowy['dgoogle']; ?>"></p>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12">
								<p>Kobo: <input type="text" name="dkobo" class="form-control" value="<?php echo $rowy['dkobo']; ?>"></p>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12">
								<p>BAM: <input type="text" name="dbam" class="form-control" value="<?php echo $rowy['dbam']; ?>"></p>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12">
								<p>Konga: <input type="text" name="dkonga" class="form-control" value="<?php echo $rowy['dkonga']; ?>"></p>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12">
								<p>Jumia: <input type="text" name="djumia" class="form-control" value="<?php echo $rowy['djumia']; ?>"></p>
								</div>
								</div>
								
								<div class="row">
								<div class="col-md-12">
								<p>
								<b>Change cover Photo</b>
								<input type="file" name="dpic" class="form-control" />
								</p>
								</div>
								</div>
								
								<div class="row">
								<div class="col-md-12">
								<p><input type="submit" class="btn btn-primary" value=" UPDATE BOOK " ></p>
								</div>
								</div>
								
								<br><br>
							
							</form>

								
<?php
}
?>
							</div>
							<!-- End single-post box -->
							
							


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
}
}
?>