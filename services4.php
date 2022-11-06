<?php

include('config.php');
session_start();

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>IIC SPIT | Events</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
    <!-- favicon-->
<link rel="icon" type="image/png" sizes="16x16" href="img/iic_logo_s.jpeg">
 
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">

	<!-- start header -->
  <?php include('header.php');?>
  <!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Events</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
		<div class="container content">
        <!-- Events Blcoks -->
						
        <div class="row service-v1 margin-bottom-40">
           

<?php
 $sql = "SELECT  e_id,e_nm, e_dt, e_fdt, e_tdt, e_desc1, e_desc2, e_desc3, e_img1, e_img2, e_img3, e_img4, e_img5 from event";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										
										
<div class="col-md-4 " style="height: 950px;">
			<div class="well" style="height: 900px;">

<img class="img-responsive" src="img/<?php echo htmlentities($result->e_img1);?>" alt="">  
<h3><?php echo htmlentities($result->e_nm);?></h3>
<p><?php echo htmlentities($result->e_desc1);?> </p>
<p><?php echo htmlentities($result->e_desc2);?> </p>
<p><?php echo htmlentities($result->e_desc3);?> </p>

<p> <strong>Event Date :</strong><?php echo htmlentities($result->e_dt);?> </p>
<p> <strong>Registration Open : </strong></p>
<p>	<strong>From :</strong><?php echo htmlentities($result->e_fdt);?> </p>
<p>	<strong>To:  </strong><?php echo htmlentities($result->e_tdt);?></p>



<a href="#" class="lineBtn">Read More</a>
<a href="#" class="lineBtn">Register</a>

					</div>
				</div>
										<?php $cnt=$cnt+1; }} ?>




















            
            
            

        </div>
        <!-- End Service Blcoks -->
 
     

        
    </div>
    </section>
	<?php include('footer.php');?>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>  
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
</body>
</html>