<?php
session_start();
error_reporting(1);
include("config.php");
if(isset($_POST['submit']))
{
    $regno=$_POST['regno'];
    $password=md5($_POST['password']);
$query=mysqli_query($bd, "SELECT * FROM students WHERE StudentRegno='$regno' and password='$password'");
if(mysqli_num_rows($query)>0)
{
$num=mysqli_fetch_array($query);
$extra="single.php";//
$_SESSION['login']=$_POST['regno'];
$_SESSION['id']=$num['studentRegno'];
$_SESSION['sname']=$num['studentName'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($bd, "insert into userlog(studentRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else 
{
$_SESSION['errmsg']="Invalid Reg no or Password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" sizes="16x16 32x32 64x64" href="images/favv.jg">
<link rel="icon" type="image/png" sizes="192x192 512x512" href="images/fav.jpg">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Student Login</title>
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
					  
					  <li><a href='admin.php'><span>ADMIN LOGIN</span></a></li>


				</ul>
			</div>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
						<h1 class="t-center" style="margin: 40px 0;color: #212121;letter-spacing: 2px;font-weight: 500;">STUDENT LOGIN</h1>

                </div>
              

            </div>
			<div class="formm>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
			 <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>Enter Reg no : </label>
                        <input type="text" name="regno" class="form-control"  />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control"  />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                </div> <br>

                </form>
                
</div>
			
     
    <script src="assets/js/jquery-1.11.1.js"></script>

    <script src="assets/js/bootstrap.js"></script>
    
</body>

</html>