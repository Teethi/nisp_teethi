<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
if(isset($_POST['submit']))
  {


$EventName=$_POST['EventName'];

$EToDate=date("Y-m-d",strtotime($_POST['EToDate']));
$EFromDate=date("Y-m-d",strtotime($_POST['EFromDate'])); 
$RToDate=date("Y-m-d",strtotime($_POST['RToDate']));      
$RFromDate=date("Y-m-d",strtotime($_POST['RFromDate']));     

$p1=$_POST['p1'];
$p2=$_POST['p2'];
$p3=$_POST['p3'];

$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];

move_uploaded_file($_FILES['img1']['tmp_name'],"../img/works/".$_FILES['img1']['name']);
move_uploaded_file($_FILES["img2"]["tmp_name"],"../img/works/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"../img/works/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"../img/works/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"../reports/".$_FILES["img5"]["name"]);

$sql="INSERT INTO event(e_nm, e_rfdt, e_rtdt, e_fdt, e_tdt, e_desc1, e_desc2, e_desc3, e_img1, e_img2, e_img3, e_img4, e_img5) VALUES (:EventName,:RFromDate,:RToDate,:EFromDate,:EToDate,:p1,:p2,:p3,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5)";




$query = $dbh->prepare($sql);
$query->bindParam(':EventName',$EventName,PDO::PARAM_STR);

$query->bindParam(':RFromDate',$RFromDate,PDO::PARAM_STR);
$query->bindParam(':RToDate',$RToDate,PDO::PARAM_STR);
$query->bindParam(':EFromDate',$EFromDate,PDO::PARAM_STR);
$query->bindParam(':EToDate',$EToDate,PDO::PARAM_STR);
$query->bindParam(':p1',$p1,PDO::PARAM_STR);
$query->bindParam(':p2',$p2,PDO::PARAM_STR);
$query->bindParam(':p3',$p3,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
$query->bindParam(':vimage5',$vimage5,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Event posted successfully.";
}
else 
{
$error="Something went wrong. Please try again";
}

}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>IIC | Admin Post Event</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Post A Event</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
	<label class="col-sm-2 control-label">Event Name <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="EventName" class="form-control" required>
	</div>
</div>



<div class="hr-dashed"></div>
<h4><b>Event Date</b></h4>
<div class="form-group">
	<label class="col-sm-2 control-label">From Date <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="date" name="EFromDate" class="form-control"  required>
	</div>

	<label class="col-sm-2 control-label">To Date <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="date" name="EToDate" class="form-control"  required>
	</div>

</div>


<div class="hr-dashed"></div>
<h4><b>Event Registration</b></h4>
<div class="form-group">
	<label class="col-sm-2 control-label">From Date <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="date" name="RFromDate" class="form-control" value="2018-01-01" required>
	</div>

	<label class="col-sm-2 control-label">To Date <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="date" name="RToDate" class="form-control" value="2018-01-01"  required>
	</div>

</div>

<div class="hr-dashed"></div>
<h4><b>Event Description</b></h4>					
<div class="form-group">
	<label class="col-sm-2 control-label">Paragraph 1<span style="color:red">*</span></label>
	<div class="col-sm-10">
		<textarea class="form-control" name="p1" rows="3" value="" required>Event Description</textarea>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label">Paragraph 2 </label>
	<div class="col-sm-10">
		<textarea class="form-control" name="p2" rows="3" ></textarea>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label">Paragraph 3</label>
	<div class="col-sm-10">
		<textarea class="form-control" name="p3" rows="3" ></textarea>
	</div>
</div>


<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<input type="file" name="img2" >
</div>
<div class="col-sm-4">
Image 3<input type="file" name="img3" >
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
	Image 4<input type="file" name="img4" >
</div>
<div class="col-sm-4">
	Event report (pdf)<input type="file" name="img5">
</div>

</div>
<div class="hr-dashed"></div>									
<button class="btn btn-default" type="reset">Cancel</button>
<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
</form>
</div>
</div>
</div>
</div>
</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>