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

   
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["pdf_file"]["name"]);
$extension = end($temp);
$upload_pdf=$_FILES["pdf_file"]["name"];
move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploads/pdf/" . $_FILES["pdf_file"]["name"]);

$vimage1=$_FILES["img1"]["name"];


move_uploaded_file($_FILES['img1']['tmp_name'],"../img/works/".$_FILES['img1']['name']);


$sql="INSERT INTO committee_member(c_type, c_name, c_designation,c_email,c_phone,c_photo,c_cv,c_branch,c_year,c_experience,c_qualification) VALUES ('$type', '$name', '$designation', '$email', '$phone', '$vimage1', '$upload_pdf', '$branch', '$year', '$experience', '$qualification')";

$query = $dbh->prepare($sql);
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
					
						<h2 class="page-title">Add a Member</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
<label class="col-sm-2 control-label">Type of Member <span style="color:red">*</span></label>
<div class="col-sm-4" id="type">
        <select class="form-control col-sm-4" name="type" id="type">
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
        <br><input type="text" name="name" class="form-control"  required>
	</div>

	<label class="col-sm-2 control-label">Designation <span style="color:red">*</span></label>
	<div class="col-sm-4">
        <br><input type="text" name="designation" class="form-control"  required>
    </div>
    <br>
    <label class="col-sm-2 control-label">E-Mail <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="" name="email" class="form-control"  required>
	</div>

	<label class="col-sm-2 control-label">Phone <span style="color:red">*</span></label>
	<div class="col-sm-4">
		<br><input type="number" name="phone" class="form-control"  required>
	</div>

</div>

<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Documents</b></h4>
</div>
</div>


<div class="form-group">

<div class="col-sm-6" style="padding-left: 180px;">
Photo <span style="color:red">*</span><input type="file" name="photo" required>
</div>
<div class="col-sm-6">
CV <span style="color:red">*</span><input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" required>
</div>

</div>


<div class="hr-dashed"></div>

<h4><b> Additional Info</b></h4>
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
    
    <script>
       
       $(document).ready(function(){
                $('#student').show();
                $('#not-student').hide();
       });
          
    </script>

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
</body>
</html>
<?php } ?>