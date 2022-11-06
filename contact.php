<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>NISP SPIT | Contact</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<!-- css -->
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
				<h2 class="pageTitle">Contact NISP SPIT</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
		<div class="row"> 
							<div class="col-md-12">
								<div class="about-logo">
								<b>Institution's Innovation Council</b><br>
								<p style="margin-bottom: 0px;">Sardar Patel Institute of Technology</p>
                            <p style="margin-bottom: 0px;">Bhavan’s Campus, Munshi Nagar, Andheri (West), Mumbai 400 058</p>
                            <p style="margin-bottom: 0px;"><b>Phone: </b>(91)-(022)-26707440, 26287250</p>
                             <p><b>Email: </b>iic@spit.ac.in</p>
								</div>  
							</div>
						</div>
	<div class="row">
								<div class="col-md-6">
									<p></p>
								  	
		   <!-- Form itself -->
          <!-- <form name="sentMessage" id="contactForm"  novalidate>  -->
		 <div class="control-group">
                    <div class="controls">
			<input type="text" class="form-control" 
			   	   placeholder="Full Name" id="name" required
			           data-validation-required-message="Please enter your name" />
			  <p class="help-block"></p>
		   </div>
	         </div> 	
                <div class="control-group">
                  <div class="controls">
			<input type="email" class="form-control" placeholder="Subject" 
			   	            id="email" required
			   		   data-validation-required-message="Please enter your subject" />
		</div>
	    </div> 	
			  <p class="help-block"></p>
               <div class="control-group">
                 <div class="controls">
				 <textarea rows="10" cols="100" class="form-control" 
                       placeholder="Message" id="message" required
		       data-validation-required-message="Please enter your message" minlength="5" 
                       data-validation-minlength-message="Min 5 characters" 
                        maxlength="999" style="resize:none"></textarea>
		</div>
               </div> 	
               <p class="help-block"></p>	 
	     <div id="success"> </div> <!-- For success/fail messages -->
	    <button onclick="createEmail()" class="btn btn-primary pull-right">Send</button><br />
          <!-- </form> -->
								</div>
								<div class="col-md-6" id="map-frame">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.646049226283!2d72.83392671451583!3d19.12317758706089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9d90e067ba9%3A0x16268e5d6bca2e6a!2sBharatiya+Vidya+Bhavan&#39;s+Sardar+Patel+Institute+of+Technology!5e0!3m2!1sen!2sin!4v1516978145209" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
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

 <!-- <script src="contact/jqBootstrapValidation.js"></script> -->
 <script src="js/contact_me.js"></script>
</body>
</html>