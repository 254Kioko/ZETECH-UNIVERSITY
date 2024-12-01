<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
header("location:student-registration.php");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
header("location:admin.php");
exit();
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="images/png" sizes="16x16 32x32 64x64" href="images/favv.jg">
<link rel="icon" type="images/png" sizes="192x192 512x512" href="images/fav.jpg">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin Login</title>
	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsiveslides.css">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Owl Carousel Assets -->
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <!-- <link href="owl-carousel/owl.theme.css" rel="stylesheet"> -->
	
	<link rel="stylesheet" href="css/menu.css">
	<script src="js/jquery183.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>
<div class="header-logo">
				<a href="single.php"><img src="images/logo.png"></a>
			</div>
            <div id='cssmenu' >
				<ul>
				   <li class=' has-sub'>
					  
					  <li><a href='index.php'><span>STUDENT LOGIN</span></a></li>


				</ul>
			</div>
	<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">ADMIN LOGIN </h4>

                </div>

            </div>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label> Username : </label>
                        <input type="text" name="username" class="form-control" required />
                        <label> Password :  </label>
                        <input type="password" name="password" class="form-control" required />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                </div>
                </form>
               
    
     
        <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
