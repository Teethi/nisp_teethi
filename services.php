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
				<h2 class="pageTitle">Upcoming Events</h2>
			</div>
		</div>
	</div>
	</section>
	<div class="container" style="margin-top: 25px;">
	  <div class="row">
  <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/case_study.jpeg" alt="IPL Auction" class="img-responsive">
              </div>
              <h3><a href="#" style="color: #000;">National Business Case Study Competition</a></h3>
              <p>Got a thing for businesses? Think you can analyse the market well enough and bail your company out of complicated situations? SPIT E-SUMMIT 2020 presents National Business Case Study Competition in association with SPJIMR, E-Cell IIT-B, E-Cell IIT-BHU, 101 Open Starts and IIC S.P.I.T. as our support partners. An actual industry-based situation will be given to the participants. Step into the boots of the higher management and devise strategies to make the company profitable against its competitors, who already have a huge market share.  </p>            </div>
		  	<!--<a href="iicspithack2020/"><button class="btn-danger" >Know More</button></a>-->
			</div>
	  </div>
  </div>
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