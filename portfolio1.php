<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>IIC SPIT | Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://webthemez.com" />

    <link rel="manifest" href="favi/manifest.json">
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="css/jcarousel.css" rel="stylesheet" />
    <link href="css/flexslider.css" rel="stylesheet" />
    <!-- Vendor Styles -->
    <link href="css/magnific-popup.css" rel="stylesheet">
    <!-- Block Styles -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/gallery-1.css" rel="stylesheet">
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
                        <h2 class="pageTitle">Gallery</h2>
                    </div>
                </div>
            </div>
        </section>
        <!--
	<section id="content">
	<div class="container">
	
						<div class="row"> 
							<div class="col-md-12">
								<div class="about-logo">
									<h3>Our Product Gallery</h3>
									<p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</p>
                                    	<p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</p>
								</div>  
							</div>
						</div> 
						
	</div>
	</section>	-->
        <!-- Start Gallery 1-2 -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <section id="gallery-1" class="content-block section-wrapper gallery-1">
            <div class="container">

                <!--<div class="editContent">
	            <ul class="filter">
	                <li class="active"><a href="#" data-filter="*">All</a></li>
	                <li><a href="#" data-filter=".artwork">Artwork</a></li>
	                <li><a href="#" data-filter=".creative">Creative</a></li>
	                <li><a href="#" data-filter=".nature">Nature</a></li>
	                <li><a href="#" data-filter=".outside">Outside</a></li>
	                <li><a href="#" data-filter=".photography">Photography</a></li>
	            </ul>
			</div>-->
                <!-- /.gallery-filter -->

                <div class="row">
                    <div id="isotope-gallery-container">

<?php
  /*  $servername = "localhost";
    $username = "root";
    $password = "m-Tech@22DB";
    $dbname = "wie";

  
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
*/  include('config.php');

   $sql ="SELECT e_img1, e_img2, e_img3, e_img4, e_img5 FROM event";
$query = $dbh -> prepare($sql);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   





?>

                        <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper artwork creative">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="img/works/<?php echo htmlentities($result->e_img1);?>"  class="img-responsive" alt="1st gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="img/works/<?php echo htmlentities($result->e_img1);?>" class="gallery-zoom">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="gallery-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                                <div class="gallery-details">
                                    <div class="editContent">
                                        <h5>Formidable Talk</h5>
                                    </div>
                                    <div class="editContent">
                                        <p>9
                                            <sup>th</sup>Aug, 2017 </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature outside">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="img/works/<?php echo htmlentities($result->e_img2);?>" class="img-responsive" alt="2nd gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="img/works/<?php echo $row['e_img2'] ?>" class="gallery-zoom">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="gallery-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                                <div class="gallery-details">
                                    <div class="editContent">
                                        <h5>Formidable Talk</h5>
                                    </div>
                                    <div class="editContent">
                                        <p>9
                                            <sup>th</sup>Aug, 2017</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper photography artwork">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="img/works/<?php echo htmlentities($result->e_img3);?>" class="img-responsive" alt="3rd gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="img/works/<?php echo htmlentities($result->e_img3);?>" class="gallery-zoom">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="gallery-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                                <div class="gallery-details">
                                    <div class="editContent">
                                        <h5>Introduction to Bootstrap</h5>
                                    </div>
                                    <div class="editContent">
                                        <p>23
                                            <sup>rd</sup>Sep, 2016 </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper creative nature">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="img/works/<?php echo $row['e_img4'] ?>" class="img-responsive" alt="4th gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="img/works/<?php echo $row['e_img4'] ?>" class="gallery-zoom">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="gallery-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                                <div class="gallery-details">
                                    <div class="editContent">
                                        <h5>Introduction to Bootstrap</h5>
                                    </div>
                                    <div class="editContent">
                                        <p>23
                                            <sup>rd</sup>Sep, 2016 </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.gallery-item-wrapper -->
                        <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature">
                            <div class="gallery-item">
                                <div class="gallery-thumb">
                                    <img src="img/works/<?php echo $row['e_img5'] ?>" class="img-responsive" alt="5th gallery Thumb">
                                    <div class="image-overlay"></div>
                                    <a href="img/works/<?php echo $row['e_img5'] ?>" class="gallery-zoom">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="gallery-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                                <div class="gallery-details">
                                    <div class="editContent">
                                        <h5>Introduction to Bootstrap</h5>
                                    </div>
                                    <div class="editContent">
                                        <p>23
                                            <sup>rd</sup>Sep, 2016 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
    }
}
?>          

                                          

                    </div>
                    <!-- /.isotope-gallery-container -->
                </div>
                <!-- /.row -->
                <!-- /.container -->
            </div>
        </section>
        <!--// End Gallery 1-2 -->
    </div>
    <?php include('footer.php');?>

    </div>
    <a href="#" class="scrollup">
        <i class="fa fa-angle-up active"></i>
    </a>
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.fancybox-media.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <!-- Vendor Scripts -->
    <script src="js/modernizr.custom.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>