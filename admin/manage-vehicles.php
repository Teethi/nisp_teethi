<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);

$sql = "delete from event where e_id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();

$msg="Event record deleted successfully";
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
	
	<title> IIC |Admin Manage Events   </title>

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

						<h2 class="page-title">Manage Events</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading"  >Event Details</div>
							<div class="panel-body" style="overflow:auto;" >
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" >
									<thead>
										<tr>
											<th>#</th>
											<th>Event Name</th>
											<th>Registration From </th>
											<th>Registration To</th>
											<th>Event From </th>
											<th>Event To</th>
											<th>Description 1</th>
											<th>Description 2</th>
											<th>Description 3</th>
											<th>Image 1</th>
											<th>Image 2</th>
											<th>Image 3</th>
											<th>Image 4</th>
											<th>Image 5</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Event Name</th>
											<th>Registration From </th>
											<th>Registration To</th>
											<th>Event From </th>
											<th>Event To</th>
											<th>Description 1</th>
											<th>Description 2</th>
											<th>Description 3</th>
											<th>Image 1</th>
											<th>Image 2</th>
											<th>Image 3</th>
											<th>Image 4</th>
											<th>Image 5</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>

<?php $sql = "SELECT  e_id, e_nm, e_rfdt, e_rtdt, e_fdt, e_tdt, e_desc1, e_desc2, e_desc3, e_img1, e_img2, e_img3, e_img4, e_img5 from event";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->e_nm);?></td>
											<td><?php echo htmlentities($result->e_rfdt);?></td>
											<td><?php echo htmlentities($result->e_rtdt);?></td>
											<td><?php echo htmlentities($result->e_fdt);?></td>
											<td><?php echo htmlentities($result->e_tdt);?></td>
											<td><?php echo htmlentities($result->e_desc1);?></td>
											<td><?php echo htmlentities($result->e_desc2);?></td>
											<td><?php echo htmlentities($result->e_desc3);?></td>
											<td><?php echo htmlentities($result->e_img1);?></td>
											<td><?php echo htmlentities($result->e_img2);?></td>
											<td><?php echo htmlentities($result->e_img3);?></td>
											<td><?php echo htmlentities($result->e_img4);?></td>
											<td><?php echo htmlentities($result->e_img5);?></td>

		<td><a href="edit-vehicle.php?id=<?php echo $result->e_id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="manage-vehicles.php?del=<?php echo $result->e_id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

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
