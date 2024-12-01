<?php
session_start();
include('config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
    
<?php if($_SESSION['login']!="")
{
}
 ?>
    
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Enroll History  </h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Enroll History
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                                 <th>Student Name </th>
                                                    <th>Student Reg no </th>
                                            <th>Course Name </th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($bd, "select shortcourses.studentName AS sname, shortcourses.StudentRegno AS sregno, shortcourses.course AS courseFROM 
        shortcourses ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                              <td><?php echo htmlentities($row['sname']);?></td>
                                            <td><?php echo htmlentities($row['sregno']);?></td>
                                            <td><?php echo htmlentities($row['courseName']);?></td>
                                          
                                           
                                            <td>
                                            <a href="print.php?id=<?php echo $row['cid']?>" target="_blank">
<button class="btn btn-primary"><i class="fa fa-print "></i> Print</button> </a>                                        


                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>





        </div>
    </div>
   
  <?php include('footer.php');?>
    
    <script src="assets/js/jquery-1.11.1.js"></script>
    
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>
