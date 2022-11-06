<!DOCTYPE html>
<html lang="en">

<?php include("config.php"); ?>

<head>
    <meta charset="utf-8">
    <title>IIC SPIT | Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="manifest" href="favi/manifest.json">


    <!-- css -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="css/jcarousel.css" rel="stylesheet" />
    <link href="css/flexslider.css" rel="stylesheet" />


    <!-- Vendor Styles -->
    <!-- <link href="css/magnific-popup.css" rel="stylesheet"> -->


    <!-- Block Styles -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/gallery-1.css" rel="stylesheet">

    <!-- favicon-->
    <link rel="icon" type="image/png" sizes="16x16" href="img/iic_logo_s.jpeg">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>

        .gallery-title{
                font-size: 36px;
                /*color: #42B32F;*/
                text-align: center;
                font-weight: 500;
                margin-bottom: 70px;
            }

            .gallery-title:after {
                content: "";
                position: absolute;
                width: 7.5%;
                left: 46.5%;
                height: 45px;
                /*border-bottom: 1px solid #5e5e5e;*/
            }

            .filter-button{
                font-size: 18px;
                /*border: 1px solid #42B32F;*/
                border-radius: 5px;
                text-align: center;
                /*color: #42B32F;*/
                margin-bottom: 30px;

            }

            .filter-button:hover{
                font-size: 18px;
                /*border: 1px solid #42B32F;*/
                border-radius: 5px;
                text-align: center;
                color: #ffffff;
                /*background-color: #42B32F;*/

            }

            .btn-default:active .filter-button:active{
                background-color: #42B32F;
                color: white;
            }

            .gallery_product{
                margin-bottom: 30px;
            }

</style>

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


        <!-- Start Gallery 1-2 -->
        <br>
        <br>


        <?php

            $queryYr = "SELECT * FROM event ORDER BY e_fdt DESC";
            $stmtYr = $dbh->prepare($queryYr);
            $stmtYr->execute();

            $dataYr = $stmtYr->fetchAll();

            $acyrs = array();

            $i = 1;

            foreach($dataYr as $dYr){
                $date = DateTime::createFromFormat("Y-m-d", $dYr['e_fdt']);
                //echo $i . " : " . $date->format("Y-m-d") . "<br>";

                $yr = intval($date->format("Y"));
                //echo "Year : " . $yr . "<br>";

                $acyr;

                $tmpDate = $yr . '-07-01';
                $tmp = DateTime::createFromFormat("Y-m-d", $tmpDate);
                //echo "String to Date : " . $tmp->format("Y-m-d") . "<br>";

                if($date->format("Y-m-d") >= $tmp->format("Y-m-d")){
                    $acyr = $yr . "-" . ($yr+1);
                }
                else if($date->format("Y-m-d") < $tmp->format("Y-m-d")){
                    $acyr = ($yr-1) . "-" . $yr;
                }
                
                //echo "Academic Year : " . $acyr . "<br><br>";

                array_push($acyrs, $acyr);

                $i++;
            }

            //echo "<br><hr><br>";

            //Array of Academic Year
            //print_r($acyrs);
            //echo "<br><br>";

            $uniqueAcyrs = array();
            $uniqueAcyrs = array_unique($acyrs);
            //print_r($uniqueAcyrs);
            //echo "<br><br>";

            $usableAcyr = array();
            $usableAcyr = array_values($uniqueAcyrs);
            //print_r($usableAcyr);

            rsort($usableAcyr);
            $len = count($usableAcyr);

            //echo "<br>" . $len;
            //echo "<br><br>";

            //Academic Year tabs

        ?>


        <!-- Tabs -->

        <div align="center">

            <button class="btn btn-default filter-button" data-filter="all">All</button>

            <?php 
                    $i = 0;

                    for($i = 0; $i<$len; $i++){
                ?>
            <button class="btn btn-default filter-button" data-filter="<?php echo $usableAcyr[$i]; ?>">
                <?php echo $usableAcyr[$i]; ?></button>

            <?php
                        if($i == 5){
                           break; 
                        }
                    }
                ?>

            <!-- 
                <button class="btn btn-default filter-button" data-filter="sprinkle">Sprinkle Pipes</button>
                <button class="btn btn-default filter-button" data-filter="spray">Spray Nozzle</button>
                <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button>
                -->

        </div>


        <!-- ./Tabs -->


        <br>

        <section id="gallery-1" class="content-block section-wrapper gallery-1">

            <div class="container">

                <div class="row">

                    <div id="isotope-gallery-container">


                        <?php

                            $query = "SELECT * FROM event ORDER BY e_fdt DESC";
                            $stmt = $dbh->prepare($query);
                            $stmt->execute();

                            $data = $stmt->fetchAll();

                            $i = 0;

                            foreach($data as $d){

                                $date1 = DateTime::createFromFormat("Y-m-d", $d['e_fdt']);
                                //echo ++$i . " : " . $date->format("Y-m-d") . "<br>";
                    
                                $yr1 = intval($date1->format("Y"));
                                //echo "Year : " . $yr . "<br>";
                    
                                $acyr1 = "";
                    
                                $tmpDate1 = $yr1 . '-07-01';
                                $tmp1 = DateTime::createFromFormat("Y-m-d", $tmpDate1);
                                //echo "String to Date : " . $tmp->format("Y-m-d") . "<br>";
                    
                                if($date1->format("Y-m-d") >= $tmp1->format("Y-m-d")){
                                    $currentMonth = intval(date("m"));
                                    // if($currentMonth < 5){
                                        $acyr1 = $yr1 . "-" . ($yr1+1);
                                    // }
                                    // echo "if<br>";
                                }
                                else if($date->format("Y-m-d") < $tmp1->format("Y-m-d")){
                                    $acyr1 = ($yr1-1) . "-" . $yr1;
                                    // echo "else<br>";
                                }                                
                               
                                // echo "Acyr1".$acyr1 . "1<br>";
                                // echo "F_Date : " . $date1->format("Y-m-d") . "...";
                                // echo "Academic Yr : " . $acyr1 . "<br>";
                        ?>


                        <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper artwork creative gallery_product filter <?php echo $acyr1; ?>">

                            <div class="gallery-item">

                                <div class="gallery-thumb">
                                    
                                    <img src="img/works/<?php echo htmlentities($d['e_img2']); ?>" style="height: 250px; width=350px;"
                                        class="img-responsive img-thumbnail" alt="<?php echo htmlentities($d['e_img1']); ?>">
                                    <div class="image-overlay"></div>
                                    <a  href="reports/<?php echo htmlentities($d['e_img5']);?>" 
                                            target="_blank"  class="gallery-zoom" >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>

                                <div class="gallery-details">
                                    <div class="editContent">
                                        <h5>
                                            <?php echo htmlentities($d['e_nm']); ?>
                                        </h5>
                                    </div>
                                    <div class="editContent">
                                        <p>
                                            <?php echo htmlentities($d['e_fdt']); ?>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <?php } ?>

                        <!-- Modal -->
                        <?php

                                $query1 = "SELECT * FROM event ORDER BY e_fdt DESC";
                                $stmt1 = $dbh->prepare($query);
                                $stmt1->execute();

                                $data1 = $stmt1->fetchAll();

                                foreach($data1 as $d1){
                            ?>

                        <div class="modal fade bs-modal-lg" id="<?php echo htmlentities($d1['e_id']); ?>" tabindex="-1"
                            role="dialog" aria-labelledby="<?php echo htmlentities($d1['e_id']); ?>Label" aria-hidden="true">

                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h3 class="modal-title" id="<?php echo htmlentities($d1['e_id']); ?>Label">
                                            <?php echo htmlentities($d1['e_nm']); ?>
                                        </h3>
                                    </div>

                                    <div class="modal-body">
                                        <!-- Carousel -->

                                        <?php

                                                $query2 = "SELECT * FROM event_photos where e_id = " . $d1['e_id'];
                                                $stmt2 = $dbh->prepare($query2);
                                                $stmt2->execute();

                                                $data2 = $stmt2->fetchAll();

                                                $cntPhotos = 0;
                                                $cntPhotosV2 = 0;

                                                foreach($data2 as $d3){
                                                    $cntPhotos++;
                                                    $cntPhotosV2++;
                                                }

                                                $i = 0;

                                            ?>

                                        <div id="carousel-<?php echo htmlentities($d1['e_id']); ?>-generic" class="carousel slide"
                                            data-ride="carousel">

                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                <?php

                                                for($i = 0; $i < $cntPhotos; $i++ ){

                                                    if($i == 0){
                                            ?>
                                                <li data-target="#carousel-<?php echo htmlentities($d1['e_id']); ?>-generic"
                                                    data-slide-to="<?php echo $i; ?>" class="active"></li>
                                                <?php

                                                    }else{

                                            ?>
                                                <li data-target="#carousel-<?php echo htmlentities($d1['e_id']); ?>-generic"
                                                    data-slide-to="<?php echo $i; ?>"></li>
                                                <?php

                                                    }

                                                }
                                            ?>

                                            </ol>

                                            <div class="carousel-inner">

                                                <?php
                                                        $tmpCnt = 0;

                                                        foreach($data2 as $d3){

                                                            if($tmpCnt == 0){
                                                                $tmpCnt++;
                                                    ?>

                                                <div class="item active">
                                                    <img src="img/works/<?php echo htmlentities($d3['img_nm']); ?>" alt="<?php echo htmlentities($d3['img_nm']); ?>">
                                                    <div class="carousel-caption"></div>
                                                </div>

                                                <?php

                                                            }else{

                                                    ?>

                                                <div class="item">
                                                    <img src="img/works/<?php echo htmlentities($d3['img_nm']); ?>" alt="<?php echo htmlentities($d3['img_nm']); ?>">
                                                    <div class="carousel-caption"></div>
                                                </div>

                                                <?php

                                                            }

                                                        }

                                                    ?>

                                                <?php

                                                    ?>

                                            </div>

                                            <!-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> -->

                                            <!-- Indicators -->
                                            <!-- <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                                </ol> -->


                                            <!-- Wrapper for slides -->
                                            <!-- <div class="carousel-inner"> -->

                                            <!-- <div class="item active">
                                                        <img src="img/works/1.jpeg" alt="1">
                                                        <div class="carousel-caption">
                                                            First Image
                                                        </div>
                                                    </div> -->

                                            <!--
                                                    <div class="item">
                                                        <img src="img/works/2.jpeg" alt="2">
                                                        <div class="carousel-caption">
                                                            Second Image
                                                        </div>
                                                    </div>

                                                    <div class="item">
                                                        <img src="img/works/3.jpeg" alt="3">
                                                        <div class="carousel-caption">
                                                            Third Image
                                                        </div>
                                                    </div> -->

                                            <!-- </div> -->


                                            <!-- Controls -->
                                            <?php 
                                                    if($cntPhotos > 1){
                                                ?>
                                            <a class="left carousel-control" href="#carousel-<?php echo htmlentities($d1['e_id']); ?>-generic"
                                                data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left">
                                                    <!-- <img src="img/bg_direction_nav.png" /> --></span>
                                            </a>

                                            <a class="right carousel-control" href="#carousel-<?php echo htmlentities($d1['e_id']); ?>-generic"
                                                data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right">
                                                    <!-- <img src="img/bg_direction_nav.png"/> --></span>
                                            </a>
                                            <?php } ?>

                                        </div>

                                        <!-- ./ Carousel-->

                                        <!-- I think Event Info Goes Here... -->
                                        <br>
                                        <br>

                                        <div class="well well-lg">

                                            <?php
                                            
                                                //use $d1 for fectching info
                                                
                                                //if($d1['e_desc3'] != ""){ echo "true"; }else { echo "false"; }

                                                if(($d1['e_desc1']) != "" ){
                                                    echo htmlentities($d1['e_desc1']);
                                                }
                                                if(($d1['e_desc2']) != ""){
                                                    echo "<br><br>" . htmlentities($d1['e_desc2']);
                                                }
                                                if(($d1['e_desc3']) != ""){
                                                    echo "<br><br>" .htmlentities($d1['e_desc3']);
                                                }

                                            ?>

                                        </div>

                                    </div>

                                    <div class="modal-footer">

                                        <!-- PHP Code for Report -->
                                        <?php

                                                $queryReport = "SELECT e_img5 FROM event where e_id = " . $d1['e_id'];
                                                $stmtReport = $dbh->prepare($queryReport);
                                                $stmtReport->execute();

                                                $dataReport = $stmtReport->fetchAll();                                                

                                                $report_file_name = "";
                                                $knt = 0;

                                                foreach($dataReport as $dR){
                                                    $report_file_name = $dR['e_img5'];
                                                    $knt++;
                                                }

                                                if(file_exists("reports/" . $report_file_name) && $knt != 0 ){
                                                
                                            ?>
                                        <a href="reports/<?php echo $report_file_name; ?>" class="btn btn-default"
                                            target="_blank">View Report</a>
                                        <a href="reports/<?php echo $report_file_name; ?>" class="btn btn-primary"
                                            download="<?php echo $report_file_name; ?>">Download Report</a>

                                        <?php

                                                }

                                            ?>


                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php } ?>

                    </div>
                    <!-- /.isotope-gallery-container -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->

        </section>
        <!--// End Gallery 1-2 -->

    </div>


    <!-- Footer Goes Here -->

    <?php include('footer.php');?>

    <a href="#" class="scrollup">
        <i class="fa fa-angle-up active"></i>
    </a>


    <!-- javascript ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->
    <!--<<script src="js/jquery.js"></script>-->
    <script src="js/jquery.easing.1.3.js"></script>

    <!-- <script src="js/bootstrap.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.fancybox-media.js"></script>
    <script src="js/jquery.flexslider.js"></script>


    <!-- Vendor Scripts -->
    <script src="js/modernizr.custom.js"></script>
    <script src="js/jquery.isotope.min.js"></script>

    <!-- <script src="js/jquery.magnific-popup.min.js"></script> -->

    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>


    <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {

            $(".filter-button").click(function () {
                var value = $(this).attr('data-filter');

                if (value == "all") {
                    //$('.filter').removeClass('hidden');
                    $('.filter').show('1000');
                } else {
                    //$('.filter[filter-item="'+value+'"]').removeClass('hidden');
                    //$(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                    $(".filter").not('.' + value).hide('3000');
                    $('.filter').filter('.' + value).show('3000');

                }
            });

            if ($(".filter-button").removeClass("active")) {
                $(this).removeClass("active");
            }

            $(this).addClass("active");

        });
    </script>

</body>

</html>