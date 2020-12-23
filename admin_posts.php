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

								<div class="title-section">
									<h1 style="font-size:24px"><span class="world">Admin Panel &raquo; Manage Posts &raquo; <?php echo $dcat; ?></span></h1>
								</div>

								<div>
								
									<b><?php echo $_SESSION['msg']; ?></b>
									
									
									
<!-- The Post textarea panel   -->

<?php
include("conn.php");
$page_name="admin_manage_posts"; 
  $start=$_GET['start'];// 
  if(!($start > 0)) { 
  $start = 0;
}
$eu = ($start - 0);
$limit = 50; // No of records to be shown per page.
$thi = $eu + $limit;
$back = $eu - $limit;
$next = $eu + $limit;

if($dcat=='Inside') {
$query= "SELECT * FROM manage_blog where dcat like '%News%' and dtitle like '%$search%' or dcat like '%Voices%' and dtitle like '%$search%' or dcat like '%Leisure%' and dtitle like '%$search%' or dcat like '%Lists%' and dtitle like '%$search%' or dcat like '%People%' and dtitle like '%$search%' or dcat like '%Places%' and dtitle like '%$search%' ORDER BY id DESC limit $eu, $limit";
}
else if($dcat=='Features') {
$query= "SELECT * FROM manage_blog where dcat like '%Lifestyle%' and dtitle like '%$search%' or dcat like '%Money%' and dtitle like '%$search%' or dcat like '%Mindset%' and dtitle like '%$search%' or dcat like '%Work%' and dtitle like '%$search%' or dcat like '%Business%' and dtitle like '%$search%' ORDER BY id DESC limit $eu, $limit";
}
else if($dcat=='Extras') {
$query= "SELECT * FROM manage_blog where dcat like '%Jobs%' and dtitle like '%$search%' or dcat like '%Contests%' and dtitle like '%$search%' or dcat like '%Giveaways%' and dtitle like '%$search%' or dcat like '%Trivia%' and dtitle like '%$search%' or dcat like '%Community%' and dtitle like '%$search%' ORDER BY id DESC limit $eu, $limit";
}
$result = mysqli_query($conn,$query);

		echo '<table class="table no-margin table-hover">';
                    
                       if ($result->num_rows != 0) {
                        echo' <thead>
                           <tr>
                          
                          
                          <th width="60%">Post Title</th>
                         <th width="25%">Date Posted</th>
                         <th width="15%">Action</th>
                          
                        </tr>
                      </thead>';
                        echo'<tbody>';
                      while($row = $result->fetch_assoc()){

                        
                         echo' <tr>';
                         echo'<td width="60%">'.substr($row['dtitle'], 0, 100).'...</td> ';
                         echo'<td width="25%">'.$row['dtime'].'</td>';
                         echo'<td width="15%">';

                         echo'<div class="btn-group">
						  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"">Action</button>
						  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu" role="menu">';
                      
                           echo'<li><a href=admin_view_post_details?id=' . $row["id"] .'>'.'View Detail'.'</a></li>';
                           echo'<li><a href=post_edit?id=' . $row["id"].'>'.'Edit'.'</a></li>';
						   ?>
                           <li><a href=post_delete?id=<?php echo $row["id"]; ?>  onClick="return confirm('Are you sure that you want to delete this post completely ?')">Delete</a></li>
						   <?php
                           echo'</ul></div>';
                           echo'</td>';
                           echo'</tr>';
                    }

					}
					else{
					 echo '<center> <span style="font-size: 1.2em; font-weight: 600; color: #3782b9">No article posted yet!</span></center>';
					}

                       echo'</tbody>
                    </table>
                 <!-- /.table-responsive -->';
       
?>

<div class="box-footer no-padding">
                  <div class="mailbox-controls">
				   <div align="center">
                      <div class="btn-group">
					  <br>
                         <?php echo "<a href='$page_name?start=$back&cat={$dcat}'> <button class='btn btn-default btn-sm' data-toggle='tooltip' title='Previous'><i class='fa fa-chevron-left'></i></button></a>";  ?>
                         <?php echo "<a href='$page_name?start=$next&cat={$dcat}'> <button class='btn btn-default btn-sm' data-toggle='tooltip' title='Next'><i class='fa fa-chevron-right'></i></button></a>";  ?>

                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->

                  </div>
                </div>


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

							<p><a href="admin_manage_post_new?cat=<?php echo $dcat; ?>" class="btn btn-primary btn-block"> <b>New Post</b> </a></p>
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