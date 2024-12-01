<?php
session_start();
include('config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$studentname=$_POST['studentname'];
$photo=$_FILES["photo"]["name"];
$cgpa=$_POST['cgpa'];
  move_uploaded_file($_FILES["photo"]["tmp_name"],"studentphoto/".$_FILES["photo"]["name"]);
$ret=mysqli_query($bd, "update students set studentName='$studentname',studentPhoto='$photo',cgpa='$cgpa'  where StudentRegno='".$_SESSION['login']."'");
if($ret)
{
$_SESSION['msg']="Student Record updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Student Record not update";
}
}
}
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<link rel="icon" type="image/png" sizes="16x16 32x32 64x64" href="images/favv.jg">
	<link rel="icon" type="image/png" sizes="192x192 512x512" href="images/fav.jpg">
    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>ZETECH UNIVERSITY</title>
	<meta name="description" content="Free Responsive Html5 Css3 Templates | Zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	
    <!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
	================================================== -->
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsiveslides.css">
	
	<!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Owl Carousel Assets -->
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <!-- <link href="owl-carousel/owl.theme.css" rel="stylesheet"> -->
	
	<link rel="stylesheet" href="css/menu.css">
	<script src="js/jquery183.min.js"></script>
	<script src="js/script.js"></script>
	
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/Items/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
	
</head>

<body class="single-page">
	
	<div class="wrap-body">
		<header>
			<div class="top-bar">
				<div class="wrap-top zerogrid">
					<div class="row">
						<div class="col-2-3">
						
						</div>
						<div class="col-1-3">
						
						</div>
					</div>
				</div>
			</div>
			<div class="header-logo">
				<a href="single.php"><img src="images/logo.png"></a>
			</div>
			<div id='cssmenu' >
				<ul>
				   <li class="active"><a href='single.php'><span>ZETECH UNIVERSITY</span></a></li>
				   <li class=' has-sub'>
					  
					  <li><a href='enroll.php'><span>Enroll</span></a></li>
				   <li><a href='myprofile.php'><span>My profile</span></a></li>
				   <li><a href='enroll-history.php'><span>Enroll History</span></a></li>


				   <li><a href='changepassword.php'><span>Change password</span></a></li>
				   <li class='last'><a href='logout.php'><span>Log out</span></a></li>
				</ul>
			</div>
		</header>
		<?php include('header.php');?>

		<!--////////////////////////////////////Container-->
		<section id="container">
			<div class="wrap-container zerogrid">
				<div class="crumbs">
				
				</div>
				<div id="main-content" class="col-2-3">
					<div class="wrap-content">
						<article>
							<div class="art-header">
								<div class="entry-title"> 
								<h1>Register for Your Future <br>
Simplify Your Academic Journey <br>

Enroll Now and Unlock Your Potential</h1><br>

<h5>Thank you for choosing Zetech University, a top-rated university, to invent your future</h5> 

.</h2>
								</div>
								<section class="hero">
    <h1>Why choose us?</h1>
	<br>
    <ol type="1">


<li>Flexible Learning: Choose from a variety of short courses and study modes to fit your lifestyle.</li>
<li>Expert Faculty: Learn from experienced and knowledgeable instructors.</li>
<li>Cutting-Edge Curriculum: Stay ahead with our up-to-date and relevant short courses.</li>
<li>Supportive Learning Environment: Benefit from our dedicated support services and resources.</li></ol>
<img src="images/uni.jpg" />

	<br>
    <a href="enroll.php" button class="btn btn-info"> REGISTER NOW</a>
  </section>							</div>
							<div class="art-content">
							
						</article>
				
				
							
						<!---- Start Widget ---->
						
				</div>
			</div>
		</section>
		<!--////////////////////////////////////Footer-->
		<footer>
			<div class="copyright">
				<div class="zerogrid wrapper">
					Copyright @ ZETECH UNIVERSITY 2024 
					<ul class="quick-link">
					
					</ul>
				</div>
			</div>
		</footer>
	</div>
	
	<!-- carousel -->
	<script src="owl-carousel/owl.carousel.js"></script>
    <script>
    $(document).ready(function() {
      $("#owl-brand").owlCarousel({
        autoPlay: 3000,
        items : 6,
		itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,2],
		navigation: true,
		navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
		pagination: false
      });
    });
    </script>
</body>
</html>