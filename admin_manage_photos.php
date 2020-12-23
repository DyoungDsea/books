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
$dstatus=$_GET['status'];
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
					<div class="col-sm-12">

						<!-- block content -->
						<div class="block-content">

							<!-- carousel box -->
							<div class="carousel-box owl-wrapper">

								<div class="title-section">
									<div class="row">
									<div class="col-md-9">
									<h1 style="font-size:24px"><span class="world">ADMIN PANEL &raquo; IMAGE GALLERY</span></h1>
									</div>
									<div class="col-md-3" align="right">
									<a href="admin_manage_photo_new" class="btn-primary btn">+ New Image Upload</a>
									</div>
									</div>
								</div>

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									<p>Images uploaded here can be added to blog post rich text editor using the image icon</p>
									
<?php
include("conn.php");

$query= "SELECT * FROM manage_photos ORDER BY id DESC";
$result = mysqli_query($conn,$query);

		echo '<table class="table no-margin table-hover">';
                    
                       if ($result->num_rows != 0) {
                       
                      while($row = $result->fetch_assoc()){
						$mycat=$row['dcat'];
						$mydurl=$row['durl'];
                        
                         echo' <tr>';
						
                         echo'<td width="30%"><img src="'.$row['dpic'].'" width=100%></td>';
						  echo'<td width="50%"><h4>'.stripslashes($row['dtitle']).'</h4><br>URL: '.$row['durl'].'</td>';
						 
                         echo'<td width="20%" align=right>';

                         echo'<div class="btn-group">
						  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"">Action</button>
						  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu" role="menu">';
                      
                           echo'<li><a href='.$row["durl"].' target=_blank>'.'View URL'.'</a></li>';
						   ?>
                           <li><a href=photo_delete?id=<?php echo $row["id"]; ?>  onClick="return confirm('Are you sure that you want to delete this photo completely ?')">Delete</a></li>
						   <?php
                           echo'</ul></div>';
                           echo'</td>';
                           echo'</tr>';
                    }

					}
					else{
					 echo '<center> <span style="font-size: 1.2em; font-weight: 600; color: #3782b9">No image uploaded yet!</span></center><br><br><br><br>';
					}

                       echo'</tbody>
                    </table>
                 <!-- /.table-responsive -->';
       
?>

								</div>
							</div>
							<!-- End carousel box -->

						</div>
						<!-- End block content -->

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