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
$EventReport=$_POST['EventReport'];
$EToDate=date("Y-m-d",strtotime($_POST['EToDate']));
$EFromDate=date("Y-m-d",strtotime($_POST['EFromDate'])); 
$RToDate=date("Y-m-d",strtotime($_POST['RToDate']));      
$RFromDate=date("Y-m-d",strtotime($_POST['RFromDate']));     

$p1=$_POST['p1'];
$p2=$_POST['p2'];
$p3=$_POST['p3'];

$id=intval($_GET['id']);


$sql="UPDATE event SET e_nm=:EventName, e_img5=:EventReport ,e_rfdt=:RFromDate, e_rtdt=:RToDate, e_fdt=:EFromDate, e_tdt=:EToDate, e_desc1=:p1, e_desc2=:p2,e_desc3=:p3 WHERE e_id=:id ";

$query = $dbh->prepare($sql);
$query->bindParam(':EventName',$EventName,PDO::PARAM_STR);
$query->bindParam(':EventReport',$EventReport,PDO::PARAM_STR);
$query->bindParam(':RFromDate',$RFromDate,PDO::PARAM_STR);
$query->bindParam(':RToDate',$RToDate,PDO::PARAM_STR);
$query->bindParam(':EFromDate',$EFromDate,PDO::PARAM_STR);
$query->bindParam(':EToDate',$EToDate,PDO::PARAM_STR);
$query->bindParam(':p1',$p1,PDO::PARAM_STR);
$query->bindParam(':p2',$p2,PDO::PARAM_STR);
$query->bindParam(':p3',$p3,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="Data updated successfully";


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
	
	<title>IIC | Admin Event Info</title>

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
					
						<h2 class="page-title">Edit Event</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Eveent Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from event  where e_id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
	<label class="col-sm-2 control-label">Event Name <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="EventName" class="form-control" value="<?php echo htmlentities($result->e_nm);?>" required>
	</div>
</div>


<div class="hr-dashed"></div>
<h4><b>Event Date</b></h4>
<div class="form-group">
	<label class="col-sm-2 control-label">From Date <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="date" name="EFromDate" class="form-control"  value="<?php echo htmlentities($result->e_fdt);?>" required>
	</div>

	<label class="col-sm-2 control-label">To Date <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="date" name="EToDate" class="form-control" value="<?php echo htmlentities($result->e_tdt);?>"  required>
	</div>

</div>


<div class="hr-dashed"></div>
<h4><b>Event Registration</b></h4>
<div class="form-group">
	<label class="col-sm-2 control-label">From Date <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="date" name="RFromDate" class="form-control" value="<?php echo htmlentities($result->e_rfdt);?>" required>
	</div>

	<label class="col-sm-2 control-label">To Date <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="date" name="RToDate" class="form-control" value="<?php echo htmlentities($result->e_rtdt);?>" required>
	</div>

</div>

<div class="hr-dashed"></div>
<h4><b>Event Description</b></h4>					
<div class="form-group">
	<label class="col-sm-2 control-label">Paragraph 1<span style="color:red">*</span></label>
	<div class="col-sm-10">
		<textarea class="form-control" name="p1" rows="3"  required><?php echo htmlentities($result->e_desc1);?></textarea>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label">Paragraph 2 </label>
	<div class="col-sm-10">
		<textarea class="form-control" name="p2" rows="3"  ><?php echo htmlentities($result->e_desc2);?></textarea>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label">Paragraph 3</label>
	<div class="col-sm-10">
		<textarea class="form-control" name="p3" rows="3"   ><?php echo htmlentities($result->e_desc3);?></textarea>
	</div>
</div>


<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><b>Event Images</b></h4>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
Image 1 <br>
	<img class="img-responsive" src="../img/works/<?php echo htmlentities($result->e_img1);?>" alt="File Not Found" width="300" height="200" style="border:solid 1px #000"> <br>
	<a href="changeimage1.php?imgid=<?php echo htmlentities($result->e_id)?>">Change Image 1</a>
</div>
<div class="col-sm-4">
Image 2 <br>
	<img class="img-responsive" src="../img/works/<?php echo htmlentities($result->e_img2);?>" alt="File Not Found" width="300" height="200" style="border:solid 1px #000"><br>
	<a href="changeimage2.php?imgid=<?php echo htmlentities($result->e_id)?>">Change Image 2</a>
</div>

<div class="col-sm-4">
Image 3 <br>

	<img class="img-responsive" src="../img/works/<?php echo htmlentities($result->e_img3);?>" alt="File Not Found"  width="300" height="200" style="border:solid 1px #000"><br>
	<a href="changeimage3.php?imgid=<?php echo htmlentities($result->e_id)?>">Change Image 3</a>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
Image 4 <br>
	<img class="img-responsive" src="../img/works/<?php echo htmlentities($result->e_img4);?>" alt="File Not Found" width="300" height="200" style="border:solid 1px #000"><br>
	<a href="changeimage4.php?imgid=<?php echo htmlentities($result->e_id)?>">Change Image 4</a>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Report name <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<input type="text" name="EventReport" class="form-control" value="<?php echo htmlentities($result->e_img5);?>" required>
	</div>
</div>

</div>

<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
<?php }} ?>


							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2" >
									<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes
									</button>
								</div>
							</div>
						</form>
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