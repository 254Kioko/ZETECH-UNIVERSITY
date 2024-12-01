<?php
session_start();
include('config.php');
if(isset($_POST['submit']))
{
  $studentname=$_POST['studentname'];
  $studentregno=$_POST['studentregno'];
  $course=$_POST['course'];

$ret=mysqli_query($bd, "insert into shortcourses (studentName, StudentRegno, course) values('$studentname','$studentregno','$course')");
if($ret)
{
  echo '<script>alert("Enrollment was successful!!!")</script>';
  echo '<script>window.location.href=enroll.php</script>';
  }else{
  echo '<script>alert("Error : Not Enroll")</script>';
  echo '<script>window.location.href=enroll.php</script>';
  }
  }
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
    <title>Course Enroll</title>
   
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
				   <li><a href='single.php'><span>ZETECH UNIVERSITY</span></a></li>
				   <li class=' has-sub'>
					  
					  <li class="active"><a href='enroll.php'><span>Enroll</span></a></li>
				   <li><a href='myprofile.php'><span>My profile</span></a></li>
           <li><a href='enroll-history.php'><span>Enroll History</span></a></li>


				   <li><a href='changepassword.php'><span>Change password</span></a></li>
				   <li class='last'><a href='logout.php'><span>Log out</span></a></li>
				</ul>
			</div>
		</header>

    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Short Course Enroll </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Short Course Enroll
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($bd, "select * from students where StudentRegno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname">Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['studentName']);?>"  />
  </div>

 <div class="form-group">
    <label for="studentregno">Student Reg No   </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['StudentRegno']);?>"  placeholder="Student Reg no" readonly />
    
  </div>

  <div class="form-group">
    <label for="Course">Course  </label>
    <select class="form-control" name="course" id="course"  required="required">
   <option value="">Select Short Course</option> 

 


 <?php } ?>

  
   <?php 
$sql=mysqli_query($bd ,"select * from course");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['courseName']);?>"><?php echo htmlentities($row['courseName']);?></option>
<?php } ?>
    </select> 
    <span style="font-size:12px;">
  </div>



 <button type="submit" name="submit" id="submit" class="btn btn-info">Enroll</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
<script>
function courseAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
data:'cid='+$("#course").val(),
type: "POST",
success:function(data){
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<footer>
			<div class="copyright">
				<div class="zerogrid wrapper">
					Copyright @ ZETECH UNIVERSITY 2024 
					<ul class="quick-link">
					
					</ul>
				</div>
			</div>
		</footer>

</body>
</html>
