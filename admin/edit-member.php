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
    $name=$_POST['name'];
    $type=$_POST['type'];
    $designation=$_POST['designation'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $experience=$_POST['experience'];
    $qualification=$_POST['qualification'];
    $branch=$_POST['branch'];
    $year=$_POST['year'];

$id=intval($_GET['id']);


$sql="UPDATE event SET c_type='$type', c_name='$name', c_designation='$designation', c_email='$email', c_phone='$phone', c_experience='$experience', c_qualification='$qualification', c_branch='$branch', c_year='$year' WHERE c_id=:id ";

$query = $dbh->prepare($sql);

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
					
						<h2 class="page-title">Edit Member</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Member Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from committee_member  where c_id=:id";
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
<label class="col-sm-2 control-label">Type of Member <span style="color:red">*</span></label>
<div class="col-sm-4" id="type">
        <select class="form-control col-sm-4" name="type" id="type" value="<?php echo htmlentities($result->c_type);?>">
              <option>Student</option>
              <option>Faculty</option>
              <option>Industry</option>
        </select>
        <?php echo ($type); ?>
</div>
</div>

<div class="hr-dashed"></div>
<h4><b>Basic Info</b></h4>

<div class="form-group">
	<label class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
	<div class="col-sm-4">
        <br><input type="text" name="name" class="form-control" value="<?php echo htmlentities($result->c_name);?>" required>
	</div>

	<label class="col-sm-2 control-label">Designation <span style="color:red">*</span></label>
	<div class="col-sm-4">
        <br><input type="text" name="designation" class="form-control" value="<?php echo htmlentities($result->c_designation);?>" required>
    </div>
    <br>
    <label class="col-sm-2 control-label">E-Mail <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="" name="email" class="form-control" value="<?php echo htmlentities($result->c_email);?>" required>
	</div>

	<label class="col-sm-2 control-label">Phone <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="number" name="phone" class="form-control" value="<?php echo htmlentities($result->c_phone);?>" required>
	</div>

</div>


<div class="hr-dashed"></div>



<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><b>Event Documents</b></h4>
</div>
</div>

<div class="form-group">
<div class="col-sm-6">
    Photo <br>
	<img class="img-responsive" src="../img/works/<?php echo htmlentities($result->c_photo);?>" alt="File Not Found" width="300" height="200" style="border:solid 1px #000"> <br>
	<a href="change-committee-image.php?imgid=<?php echo htmlentities($result->c_id)?>">Change Image </a>
</div>
<div class="col-sm-6">
    CV <br>
        <a href="changeimage1.php?imgid=<?php echo htmlentities($result->c_id)?>">Change File</a>
        
</div>
</div>

<div class="hr-dashed"></div>

<div id="student" >
<div class="form-group">
	<label class="col-sm-2 control-label">Branch </label>
	<div class="col-sm-4">
		<br><input type="text" name="branch" class="form-control" >
	</div>

	<label class="col-sm-2 control-label">Year </label>
	<div class="col-sm-4">
		<br><input type="text" name="year" class="form-control"  >
    </div>
</div>
</div>
<div id="not-student" >
<div class="form-group">
	<label class="col-sm-2 control-label">Experience (In years) </label>
	<div class="col-sm-4">
		<br><input type="number" name="experience" class="form-control" >
	</div>

	<label class="col-sm-2 control-label">Qualification </span></label>
	<div class="col-sm-4">
		<br><input type="text" name="qualification" class="form-control"  >
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